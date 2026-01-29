<?php

$title = 'Pagamento - Pacote Fundador';

// Verificar login obrigatorio
RECLASSIC::LoginRequired();

// Validar pacote selecionado
$pacoteTier = isset($_GET['pacote']) ? (int)$_GET['pacote'] : 0;

if ($pacoteTier < 1 || $pacoteTier > 3) {
    header("Location: ?to=pacote-fundador");
    exit();
}

// Importar configuracao dos pacotes
include_once __DIR__ . '/pacote-fundador.php';

// Verificar se o pacote existe
if (!isset($founderPackages[$pacoteTier])) {
    header("Location: ?to=pacote-fundador");
    exit();
}

$selectedPackage = $founderPackages[$pacoteTier];

// Funcao para gerar ID de transacao aleatorio (9 caracteres)
function gerarIdTransacao() {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $id = '';
    for ($i = 0; $i < 9; $i++) {
        $id .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $id;
}

// Processar pagamento quando form for submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_pagamento'])) {
    header('Content-Type: application/json');

    $account_id = (int)$_SESSION['conta'];
    $userid = $_SESSION['user'];
    $valor = $selectedPackage['price'];

    // Obter IP do usuario
    $ip_pag = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_pag = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    }

    // Gerar ID unico de transacao
    $id_pag = gerarIdTransacao();

    // Verificar unicidade do ID
    $checkSql = "SELECT COUNT(*) as cnt FROM rp_doacoes WHERE id_pag = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $id_pag);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Se ID ja existe, gerar novo
    while ($row['cnt'] > 0) {
        $id_pag = gerarIdTransacao();
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    }

    // Buscar URL da API PIX
    $urlSql = "SELECT url_api_pix_csl FROM rp_ragpay LIMIT 1";
    $urlResult = $conn->query($urlSql);

    if (!$urlResult || $urlResult->num_rows == 0) {
        echo json_encode(['success' => false, 'message' => 'Erro: Gateway de pagamento nao configurado.']);
        exit();
    }

    $urlRow = $urlResult->fetch_assoc();
    $url_pix = $urlRow['url_api_pix_csl'];

    // Inserir transacao na tabela rp_doacoes
    $insertSql = "INSERT INTO rp_doacoes
        (account_id, id_pag, valor, ip_pag, tipo_pag, banco, retorno_pag, status_pag, userid, is_pacote)
        VALUES (?, ?, ?, ?, 'Pix', 'MP Pix', 'Aguardando Pagamento', '1', ?, '1')";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("isiss", $account_id, $id_pag, $valor, $ip_pag, $userid);

    if ($stmt->execute()) {
        // Construir URL de redirecionamento
        $redirect_url = rtrim($url_pix, '/') . '/' . $id_pag;

        echo json_encode([
            'success' => true,
            'redirect_url' => $redirect_url,
            'transaction_id' => $id_pag
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao criar transacao. Tente novamente.']);
    }

    exit();
}

?>
