<!-- Página de Login Modernizada -->
<section class="login-section">
    <div class="container">
        <div class="login-card">
            <!-- Título -->
            <div class="login-header text-center">
                <h1 class="login-title">Bem-vindo de <span class="highlight">Volta</span></h1>
                <p class="login-subtitle">Acesse sua conta para continuar sua jornada em Midgard.</p>
            </div>

            <!-- Formulário -->
            <form id="formLogin" class="login-form">
                <div class="form-group">
                    <label for="UserID">Usuário</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" name="UserID" id="UserID" placeholder="Seu usuário" maxlength="20" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="UserPW">Senha</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="UserPW" id="UserPW" placeholder="Sua senha" maxlength="12" required>
                    </div>
                </div>

                <div id="message" class="message-container"></div>

                <button type="submit" class="btn-login" id="submitLogin">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>ENTRAR</span>
                </button>
            </form>

            <!-- Link para Registro -->
            <div class="login-footer">
                <p>Ainda não tem conta? <a href="?to=registro">Criar conta</a></p>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#formLogin').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitLogin');
        $btn.prop('disabled', true);

        $.ajax({
            type: 'POST',
            url: 'api/entrar.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message').html(response);
                $btn.prop('disabled', false);
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição', status, error);
                $btn.prop('disabled', false);
            }
        });
    });
});
</script>
