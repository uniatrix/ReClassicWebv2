<?php
$title = 'Vote por Pontos';

RECLASSIC::LoginRequired();

$pontos = 0;

try {
    // Buscar pontos do usuário usando COUNT(*) da tabela cp_vfp_logs (compatível com NPC)
    $conta = filter_var($_SESSION['conta'], FILTER_SANITIZE_NUMBER_INT);

    // Verificar se a tabela existe antes de consultar
    $tableCheck = $conn->query("SHOW TABLES LIKE 'cp_vfp_logs'");

    if ($tableCheck && $tableCheck->num_rows > 0) {
        $stmt = $conn->prepare("SELECT COUNT(*) as points FROM cp_vfp_logs WHERE account_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $conta);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            $pontos = ($result !== null && isset($result['points'])) ? $result['points'] : 0;
        }
    }

} catch (Exception $e) {
    // Tabela não existe ou outro erro - manter pontos como 0
    $pontos = 0;
}

?>
