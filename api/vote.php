<?php
$title = 'Vote por Pontos';

RECLASSIC::LoginRequired();

try {
    // Buscar pontos do usuário usando COUNT(*) da tabela cp_vfp_logs (compatível com NPC)
    $conta = filter_var($_SESSION['conta'], FILTER_SANITIZE_NUMBER_INT);
    $stmt = $conn->prepare("SELECT COUNT(*) as points FROM cp_vfp_logs WHERE account_id = ?");
    $stmt->bind_param("i", $conta);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $pontos = ($result !== null && isset($result['points'])) ? $result['points'] : 0;

} catch (Exception $e) {
    define("__ERROR__", true);
    include "fatalerror.php";
    exit();
}

?>
