<?php
require_once('config/config.php');

if (isset($_SESSION["conta"]) && !empty($_SESSION["conta"])) {
    header("Location: ?to=inicio");
    exit();
}

$title = 'Registro';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $usuario = $_POST['UserID'];
    $senha = $_POST['UserPW'];
    $confirmarSenha = $_POST['ReUserPW'];
    $nome_completo = $_POST['FullName'];
    $email = $_POST['Email'];
    $sexo = isset($_POST['sex']) ? $_POST['sex'] : '';
    $whatsapp = isset($_POST['whatsapp']) ? $_POST['whatsapp'] : '';
      
    if (empty($sexo) || empty($usuario) || empty($email) || empty($senha) || empty($confirmarSenha)) {
        echo "<div class='error'>Preencha todos os campos</div>";
    } elseif (!isset($_POST['termsCheckbox']) || $_POST['termsCheckbox'] != 'on') {
        echo "<div class='error'>Você deve aceitar os termos de uso e serviço.</div>";
    } elseif ($senha !== $confirmarSenha) {
        echo "<div class='error'>As senhas não coincidem.</div>";
    } elseif (strlen($usuario) < 6 || strlen($senha) < 6) {
        echo "<div class='error'>A usuario e senha deve ter entre 4 e 12 caracteres.</div>";
    } elseif (!ctype_alnum($usuario)) {
        echo "<div class='error'>Caracter inválido. Use apenas letras e números.</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='error'>E-mail inválido.</div>";
    } else {
       
        $query_verificar_email = "SELECT * FROM login WHERE email = ?";
        $stmt_verificar_email = $conn->prepare($query_verificar_email);
        $stmt_verificar_email->bind_param("s", $email);
        $stmt_verificar_email->execute();
        $result_verificar_email = $stmt_verificar_email->get_result();
        
        if ($result_verificar_email->num_rows > 0) {
            echo "<div class='error'>Email já registrado.</div>";
        } else {
            $query_verificar_usuario = "SELECT * FROM login WHERE userid = ?";
            $stmt_verificar_usuario = $conn->prepare($query_verificar_usuario);
            $stmt_verificar_usuario->bind_param("s", $usuario);
            $stmt_verificar_usuario->execute();
            $result_verificar_usuario = $stmt_verificar_usuario->get_result();
            
            if ($result_verificar_usuario->num_rows > 0) {
                echo "<div class='error'>Usuário já registrado.</div>";
            } else {  

            	$senhaUser = md5($senha);

                $sql = "INSERT INTO login (userid, email, user_pass, sex, whatsapp, full_name) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $usuario, $email, $senhaUser, $sexo, $whatsapp, $nome_completo);

                if ($stmt->execute()) {
                    echo "<div class='success-message'>Conta criada com sucesso</div>";echo "<script>
				        showRegistrationPopup();
				        $('html, body').animate({ scrollTop: 0 }, 'slow');  
				      </script>";

                } else {
                    echo "<div class='error'>Erro ao criar a conta. Contate o suporte!</div>";
                }           
            }
        }
    }
}
    
?>