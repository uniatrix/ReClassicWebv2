<?php
error_reporting(0);
require_once "config/config.php";

RECLASSIC::LoginRequired();

$user = $_SESSION["user"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senhaAtual = $_POST["senhaatual"];
    $novaSenha = $_POST["senhanova"];
    $confirmarSenha = $_POST["confsenhanova"];

    if (empty($senhaAtual) || empty($novaSenha) || empty($confirmarSenha)) {
        echo "<p class='error'>Preencha todos os campos.</p>";
    } elseif ($novaSenha !== $confirmarSenha) {
        echo "<p class='error'>As senhas não coincidem.</p>";
    } elseif (strlen($novaSenha) < 6) {
        echo "<p class='error'>A nova senha deve ter no mínimo 6 caracteres!</p>";
    } else {
        // Consulta para obter a senha atual
        $sql = "SELECT user_pass FROM login WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $linha = $result->fetch_assoc();


        $senhaArmazenada = $linha["user_pass"];
        $senhaAtualValida = false;

        // Verifica bcrypt (novas senhas)
        if (password_verify($senhaAtual, $senhaArmazenada)) {
            $senhaAtualValida = true;
        }
        // Verifica MD5 legado
        elseif (md5($senhaAtual) === $senhaArmazenada) {
            $senhaAtualValida = true;
        }

        $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Valida a senha atual
        if ($senhaAtualValida) {
            // Atualiza a senha
            $sql_update = "UPDATE login SET user_pass = ? WHERE userid = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ss", $novaSenhaHash, $user);

            if ($stmt_update->execute()) {
                echo "<p class='success-message'>Senha Alterada! Relogue...</p>";
                echo "<script>
                        setTimeout(function(){
                            window.location.href = '?to=sair';
                        }, 2000);
                     </script>";
            } else {
                    echo "<p class='error'>Error: " . $conn->error . "</p>";
            }
        } else {
            echo "<p class='error'>Senha atual incorreta.</p>";
        }
    }
}

?>
