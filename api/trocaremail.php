<?php
error_reporting(0);
require_once "config/config.php";

RECLASSIC::LoginRequired();

$user = $_SESSION["user"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailatual = $_POST["emailatual"];
    $emailnovo = $_POST["emailnovo"];
    $confirmaremailnovo = $_POST["confemailnovo"];

    if (empty($emailatual) || empty($emailnovo) || empty($confirmaremailnovo)) {
        echo "<p class='error'>Preencha todos os campos.</p>";
    } elseif ($emailnovo !== $confirmaremailnovo) {
        echo "<p class='error'>Email novo e antigo não conicidem.</p>";
    } elseif (!filter_var($emailnovo, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='error'>Digite um Email válido.</p>";
    } else {
        // Verifica se o novo email já está em uso
        $sql_check_email = "SELECT email FROM login WHERE email = ?";
        $stmt_check_email = $conn->prepare($sql_check_email);
        $stmt_check_email->bind_param("s", $emailnovo);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if ($result_check_email->num_rows > 0) {
            echo "<p class='error'>Email já cadastrado</p>";
        } else {
            // Obtém o email atual do usuário
            $sql_get_email = "SELECT email FROM login WHERE userid = ?";
            $stmt_get_email = $conn->prepare($sql_get_email);
            $stmt_get_email->bind_param("s", $user);
            $stmt_get_email->execute();
            $result_get_email = $stmt_get_email->get_result();
            $linha = $result_get_email->fetch_assoc();

            if ($linha && $emailatual === $linha["email"]) {
                // Atualiza o email para o novo
                $sql_update_email = "UPDATE login SET email = ? WHERE userid = ?";
                $stmt_update_email = $conn->prepare($sql_update_email);
                $stmt_update_email->bind_param("ss", $emailnovo, $user);

                if ($stmt_update_email->execute()) {
                    echo "<p class='success-message'>Email alterado com sucesso, relogue...</p>";
                    echo "<script>
                        setTimeout(function(){
                          window.location.href = '?to=sair';
                        }, 2000);
                      </script>";
                } else {
                    echo "<p class='error'>Error: " . $conn->error . "</p>";
                }
            } else {
                echo "<p class='error'>Email atual incorreto.</p>";
            }
        }
    }
}


?>
