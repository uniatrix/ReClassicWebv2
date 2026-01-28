<?php
require_once "config/config.php";

header('Content-Type: application/json');

// Verificar login
if (!isset($_SESSION['conta']) || empty($_SESSION['conta'])) {
    echo json_encode(['success' => false, 'message' => 'Voce precisa estar logado para comprar itens.']);
    exit;
}

$account_id = (int) $_SESSION['conta'];
$transaction_id = isset($_POST['transaction_id']) ? (int) $_POST['transaction_id'] : 0;

// Validar ID da transacao
if ($transaction_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'ID de transacao invalido.']);
    exit;
}

// Verificar se a transacao existe e esta disponivel
$sql = "SELECT * FROM `pix_transactions`
        WHERE `id` = ?
        AND `status` = 'waiting_buyer'
        AND (`buyer_aid` = 0 OR `buyer_aid` IS NULL)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $transaction_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo json_encode(['success' => false, 'message' => 'Item nao disponivel ou ja foi vendido.']);
    exit;
}

$transaction = $result->fetch_assoc();

// Verificar se o comprador nao e o vendedor
if ($transaction['seller_aid'] == $account_id) {
    echo json_encode(['success' => false, 'message' => 'Voce nao pode comprar seu proprio item.']);
    exit;
}

// Obter IP do comprador
$buyer_ip = $_SERVER['REMOTE_ADDR'];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $buyer_ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
}

// Reservar o item para este comprador
$sql_update = "UPDATE `pix_transactions`
               SET `buyer_aid` = ?,
                   `buyer_ip` = ?
               WHERE `id` = ?
               AND `status` = 'waiting_buyer'
               AND (`buyer_aid` = 0 OR `buyer_aid` IS NULL)";
$stmt_update = $conn->prepare($sql_update);
$stmt_update->bind_param("isi", $account_id, $buyer_ip, $transaction_id);

if ($stmt_update->execute() && $stmt_update->affected_rows > 0) {
    // Formatar informacoes do item para a resposta
    $item_info = $transaction['item_name'];
    if ($transaction['item_refine'] > 0) {
        $item_info = '+' . $transaction['item_refine'] . ' ' . $item_info;
    }

    $price_formatted = 'R$ ' . number_format($transaction['price_brl'], 2, ',', '.');

    echo json_encode([
        'success' => true,
        'message' => 'Item: ' . $item_info . "\nValor: " . $price_formatted . "\n\nFaca o PIX para a chave do vendedor e confirme no NPC.",
        'transaction_id' => $transaction_id,
        'item_name' => $item_info,
        'price' => $price_formatted,
        'seller_pix' => $transaction['seller_chave_pix']
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Nao foi possivel reservar o item. Ele pode ter sido vendido para outra pessoa. Tente novamente.']);
}
?>
