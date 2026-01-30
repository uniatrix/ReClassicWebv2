<?php
$title = 'Vote por Pontos';

$pontos = 0;
$loggedIn = isset($_SESSION['conta']) && !empty($_SESSION['conta']);

if ($loggedIn) {
    // Desativar exceções do mysqli temporariamente
    @mysqli_report(MYSQLI_REPORT_OFF);

    try {
        $conta = filter_var($_SESSION['conta'], FILTER_SANITIZE_NUMBER_INT);

        // Verificar se a tabela existe antes de consultar
        $tableCheck = @$conn->query("SHOW TABLES LIKE 'cp_vfp_logs'");

        if ($tableCheck && $tableCheck->num_rows > 0) {
            $stmt = @$conn->prepare("SELECT COUNT(*) as points FROM cp_vfp_logs WHERE account_id = ?");
            if ($stmt) {
                $stmt->bind_param("i", $conta);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result) {
                    $row = $result->fetch_assoc();
                    $pontos = ($row !== null && isset($row['points'])) ? (int)$row['points'] : 0;
                }
                $stmt->close();
            }
        }

    } catch (Exception $e) {
        $pontos = 0;
    } catch (Error $e) {
        $pontos = 0;
    }
}

?>
