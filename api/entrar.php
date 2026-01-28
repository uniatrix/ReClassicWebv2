<?php
require_once "config/config.php";


$title = 'Entrar';

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    header("Location: ?to=inicio");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["UserID"];
    $senha = $_POST["UserPW"];

    if (empty($usuario) || empty($senha)) {
        echo "<div class='error'>Preencha todos os campos.</div>";
    } else {
        $stmt = $conn->prepare("SELECT * FROM login WHERE userid = ?");
        if ($stmt === false) {
            echo "Error: " . $conn->error;
            exit();
        }

        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows == 1) {
            $user = $resultado->fetch_assoc();
                //$senhaUser = md5($senha);
                $senhaUser = $senha;
            if ($senhaUser == $user["user_pass"]) {
                $_SESSION["user"] = $user["userid"];
                $_SESSION["conta"] = $user["account_id"];
                $_SESSION["grupo"] = $user["group_id"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["sex"] = $user["sex"];


                if (isset($_SESSION['redirect_url'])) {
                    $redirect_url = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']); 
                    echo "<div class='success-message'>Login bem sucedido, redirecionado...</div>";
                    echo "<script>
                    setTimeout(function(){
                        window.location.href = '$redirect_url';
                        }, 2000);
                        </script>";
                } else {
                    echo "<div class='success-message'>Login bem sucedido, redirecionado...</div>";

                    echo "<script>
                    setTimeout(function(){
                        window.location.href = '?to=inicio';
                        }, 2000);
                        </script>";
                }
                exit();

            } else {
                echo "<div class='error'>Usuário ou senha incorretos.</div>";
            }
        } else {
            echo "<div class='error'>Usuário ou senha incorretos.</div>";
        }

        $stmt->close();
    }
}

?>
