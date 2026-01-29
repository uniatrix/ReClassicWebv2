<!-- Pagina de Registro Modernizada -->
<section class="register-section">
    <div class="container">
        <div class="register-card">
            <!-- Titulo -->
            <div class="register-header text-center">
                <h1 class="register-title">Garanta seu <span class="highlight">Lugar</span></h1>
                <p class="register-subtitle">Faca o pre-registro e receba recompensas exclusivas.</p>
            </div>

            <!-- Recompensas do Pre-Registro -->
            <div class="rewards-section">
                <div class="rewards-label">
                    <span>RECOMPENSAS</span>
                    <span class="highlight">PRE-REGISTRO</span>
                </div>
                <div class="rewards-grid">
                    <div class="reward-item">
                        <img src="<?php echo iconImage(5381); ?>" alt="Item" onerror="this.src='assets/img/noimage.png'">
                        <span>[Visual] Faixa de Ragnarok</span>
                    </div>
                    <div class="reward-item">
                        <div class="reward-quantity">20</div>
                        <img src="<?php echo iconImage(501); ?>" alt="Item" onerror="this.src='assets/img/noimage.png'">
                        <span>Pocao Menor de Vida</span>
                    </div>
                    <div class="reward-item">
                        <div class="reward-quantity">2</div>
                        <img src="<?php echo iconImage(12208); ?>" alt="Item" onerror="this.src='assets/img/noimage.png'">
                        <span>Manual de Combate</span>
                    </div>
                    <div class="reward-item">
                        <div class="reward-quantity">2</div>
                        <img src="<?php echo iconImage(12210); ?>" alt="Item" onerror="this.src='assets/img/noimage.png'">
                        <span>Goma de Mascar</span>
                    </div>
                </div>
            </div>

            <!-- Formulario -->
            <form id="formRegistro" class="register-form">
                <div class="form-group">
                    <label for="UserID">Usuario</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" name="UserID" id="UserID" placeholder="Seu usuario no jogo" maxlength="20" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="FullName">Nome / Apelido</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" name="FullName" id="FullName" placeholder="Como voce quer ser chamado" maxlength="50" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Email">E-mail</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="Email" id="Email" placeholder="seu@email.com" maxlength="35" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="whatsapp">Telefone / WhatsApp</label>
                    <div class="input-wrapper">
                        <i class="fab fa-whatsapp"></i>
                        <input type="tel" name="whatsapp" id="whatsapp" placeholder="(00) 00000-0000" maxlength="15" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="UserPW">Senha</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="UserPW" id="UserPW" placeholder="Senha" maxlength="12" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ReUserPW">Confirmar Senha</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="ReUserPW" id="ReUserPW" placeholder="Repita sua senha" maxlength="12" required>
                    </div>
                </div>

                <!-- Campo oculto para sexo (padrao) -->
                <input type="hidden" name="sex" value="M">

                <!-- Termos de Uso -->
                <div class="terms-wrapper">
                    <label class="terms-checkbox">
                        <input type="checkbox" id="termsCheckbox" name="termsCheckbox" required>
                        <span class="checkmark"></span>
                        <span class="terms-text">Li e aceito os <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">termos de uso e servico</a></span>
                    </label>
                </div>

                <!-- Mensagem de Erro/Sucesso -->
                <div id="message" class="message-container"></div>

                <!-- Botao de Submit -->
                <button type="submit" class="btn-register" id="submitRegistro">
                    FINALIZAR PRE-REGISTRO
                </button>
            </form>

            <!-- Link para Login -->
            <div class="login-link text-center">
                <p>Ja possui conta? <a href="?to=entrar">Fazer login</a></p>
            </div>
        </div>
    </div>
</section>

<!-- Popup de Sucesso -->
<div id="successPopup" class="success-popup" style="display: none;">
    <div class="success-content">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h2>Registro Concluido!</h2>
        <p>Sua conta foi criada com sucesso. Bem-vindo ao ReClassic!</p>
        <div class="success-actions">
            <a href="https://drive.google.com/file/d/1ROEqhrWH4mnp40ULfnM0wul84jp6knn4/view?usp=sharing" target="_blank" class="btn-success-action">
                <i class="fas fa-download"></i> Download do Jogo
            </a>
            <a href="https://discord.gg/JG6vTMbT58" target="_blank" class="btn-success-action secondary">
                <i class="fab fa-discord"></i> Entrar no Discord
            </a>
        </div>
        <a href="?to=entrar" class="btn-go-login">Ir para Login</a>
    </div>
</div>

<!-- Modal de Termos -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Termos de Uso e Servico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Regras de Conduta</h4>
                <p>As punicoes serao aplicadas a criterio da equipe do Ragnarok ReClassic e serao analisadas caso a caso.</p>
                <p>A equipe reserva o direito de punir a violacao das regras com ou sem aviso previo.</p>

                <h5>1. OFENSAS</h5>
                <p>Proibido o uso de violencia verbal, linguagem ofensiva, ou qualquer comportamento rude que prejudique a experiencia de outros jogadores.</p>

                <h5>2. ATIVIDADE IRREGULAR</h5>
                <p><strong>PROIBIDO O USO DE BOT E QUALQUER FORMA DE AUTOMACAO. O USO DE BOT RESULTA EM BANIMENTO PERMANENTE.</strong></p>

                <h5>3. NOMES INAPROPRIADOS</h5>
                <p>Proibido nomes ofensivos, obscenos ou que facam apologia a drogas, odio, racismo ou qualquer discurso discriminatorio.</p>

                <p>O Servidor Ragnarok ReClassic se reserva o direito de aplicar punicoes conforme a gravidade da infracao.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<style>
/* ===============================================
   REGISTER PAGE STYLES
   =============================================== */
.register-section {
    padding: 40px 0 80px;
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
}

.register-card {
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    padding: 2.5rem;
    max-width: 550px;
    margin: 0 auto;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
}

.register-header {
    margin-bottom: 2rem;
}

.register-title {
    font-family: 'Cinzel', serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--text-primary);
    text-transform: uppercase;
    margin-bottom: 0.5rem;
}

.register-title .highlight {
    color: var(--accent-color);
}

.register-subtitle {
    color: var(--text-secondary);
    font-size: 0.95rem;
}

/* Rewards Section */
.rewards-section {
    background: rgba(0, 0, 0, 0.2);
    border-radius: var(--header-radius);
    padding: 1.25rem;
    margin-bottom: 2rem;
}

.rewards-label {
    text-align: center;
    font-size: 0.75rem;
    letter-spacing: 3px;
    margin-bottom: 1rem;
    color: var(--text-secondary);
}

.rewards-label .highlight {
    color: var(--accent-color);
    margin-left: 5px;
}

.rewards-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.75rem;
}

.reward-item {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(30, 41, 59, 0.6);
    border: 1px solid var(--glass-border);
    border-radius: var(--header-radius);
    padding: 10px 12px;
    position: relative;
}

.reward-item img {
    width: 32px;
    height: 32px;
    object-fit: contain;
}

.reward-item span {
    font-size: 0.8rem;
    color: var(--text-primary);
    flex: 1;
}

.reward-quantity {
    position: absolute;
    top: -5px;
    left: 35px;
    background: var(--accent-color);
    color: var(--dark-bg);
    font-size: 0.65rem;
    font-weight: 700;
    padding: 1px 5px;
    border-radius: 3px;
}

/* Form Styles */
.register-form {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-group label {
    font-size: 0.85rem;
    color: var(--text-secondary);
    font-weight: 500;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.input-wrapper i {
    position: absolute;
    left: 15px;
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.input-wrapper input {
    width: 100%;
    height: 48px;
    background: rgba(0, 0, 0, 0.3);
    border: 1px solid var(--dark-border);
    border-radius: var(--header-radius);
    padding: 0 15px 0 45px;
    color: var(--text-primary);
    font-size: 0.95rem;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.input-wrapper input[type="text"],
.input-wrapper input[type="email"],
.input-wrapper input[type="tel"],
.input-wrapper input[type="password"] {
    height: 48px;
    line-height: 48px;
}

.input-wrapper input::placeholder {
    color: rgba(255, 255, 255, 0.3);
}

.input-wrapper input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}

/* Terms Checkbox */
.terms-wrapper {
    margin-top: 0.5rem;
}

.terms-checkbox {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    font-size: 0.85rem;
    color: var(--text-secondary);
}

.terms-checkbox input {
    display: none;
}

.checkmark {
    width: 18px;
    height: 18px;
    border: 2px solid var(--dark-border);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.terms-checkbox input:checked + .checkmark {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.terms-checkbox input:checked + .checkmark::after {
    content: '\f00c';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    font-size: 0.7rem;
    color: white;
}

.terms-text a {
    color: var(--accent-color);
    text-decoration: none;
}

.terms-text a:hover {
    text-decoration: underline;
}

/* Message Container */
.message-container {
    min-height: 20px;
}

.message-container .alert {
    padding: 10px 15px;
    border-radius: var(--header-radius);
    font-size: 0.85rem;
    margin: 0;
}

/* Submit Button */
.btn-register {
    width: 100%;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border: none;
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.95rem;
    font-weight: 700;
    letter-spacing: 1px;
    padding: 16px;
    border-radius: var(--header-radius);
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(52, 152, 219, 0.4);
}

.btn-register:hover {
    background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(79, 195, 247, 0.5);
}

.btn-register:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

/* Login Link */
.login-link {
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--glass-border);
}

.login-link p {
    color: var(--text-secondary);
    font-size: 0.9rem;
    margin: 0;
}

.login-link a {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 600;
}

.login-link a:hover {
    text-decoration: underline;
}

/* Success Popup */
.success-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10001;
    padding: 20px;
}

.success-content {
    background: var(--glass-bg);
    backdrop-filter: blur(10px);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    padding: 3rem 2rem;
    text-align: center;
    max-width: 400px;
    width: 100%;
}

.success-icon {
    font-size: 4rem;
    color: #22c55e;
    margin-bottom: 1.5rem;
}

.success-content h2 {
    font-family: 'Cinzel', serif;
    color: var(--text-primary);
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.success-content p {
    color: var(--text-secondary);
    font-size: 0.95rem;
    margin-bottom: 2rem;
}

.success-actions {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
}

.btn-success-action {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 12px 20px;
    border-radius: var(--header-radius);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-success-action:hover {
    transform: translateY(-2px);
    color: white;
}

.btn-success-action.secondary {
    background: #5865f2;
}

.btn-go-login {
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 0.9rem;
}

.btn-go-login:hover {
    color: var(--accent-color);
}

/* Modal Styles */
.modal-content {
    background: var(--dark-surface);
    color: var(--text-primary);
    border: 1px solid var(--glass-border);
}

.modal-header {
    border-bottom-color: var(--glass-border);
}

.modal-footer {
    border-top-color: var(--glass-border);
}

.modal-body h4, .modal-body h5 {
    color: var(--accent-color);
    margin-top: 1.5rem;
}

.modal-body p {
    color: var(--text-secondary);
}

.btn-close {
    filter: invert(1);
}

/* Responsive */
@media (max-width: 768px) {
    .register-section {
        padding-bottom: 40px; /* Body has padding for mobile nav */
    }
}

@media (max-width: 576px) {
    .register-card {
        padding: 1.5rem;
        margin: 0 15px;
    }

    .register-title {
        font-size: 1.8rem;
    }

    .rewards-grid {
        grid-template-columns: 1fr;
    }

    .input-wrapper input {
        padding: 12px 12px 12px 42px;
    }
}
</style>

<script>
$(document).ready(function() {
    $('#formRegistro').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitRegistro');
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> PROCESSANDO...');

        $.ajax({
            type: 'POST',
            url: 'api/registro.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message').html(response);
                $btn.prop('disabled', false).html('FINALIZAR PRE-REGISTRO');

                // Verificar se registro foi bem sucedido
                if (response.includes('sucesso') || response.includes('Sucesso') || response.includes('criada')) {
                    showSuccessPopup();
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisicao', status, error);
                $btn.prop('disabled', false).html('FINALIZAR PRE-REGISTRO');
            }
        });
    });
});

function showSuccessPopup() {
    document.getElementById('successPopup').style.display = 'flex';
}

function closeSuccessPopup() {
    document.getElementById('successPopup').style.display = 'none';
    window.location.href = '?to=entrar';
}
</script>
