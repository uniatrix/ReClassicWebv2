<?php if(!$isLoggedIn): ?>
<div class="login-required-container">
    <div class="login-required-box">
        <i class="fas fa-lock"></i>
        <h2>Login Necessario</h2>
        <p>Para continuar com a compra do <strong>Pacote <?php echo htmlspecialchars($selectedPackage['name']); ?></strong>, voce precisa estar logado.</p>
        <button onclick="loginParaComprar(<?php echo $pacoteTier; ?>);" class="btn-login-required">
            <i class="fas fa-sign-in-alt"></i> Fazer Login
        </button>
        <a href="?to=pacote-fundador" class="btn-voltar-pacotes">
            <i class="fas fa-arrow-left"></i> Voltar para pacotes
        </a>
    </div>
</div>

<style>
.login-required-container {
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
}

.login-required-box {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    padding: 50px 40px;
    text-align: center;
    max-width: 450px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.login-required-box i.fa-lock {
    font-size: 3.5rem;
    color: var(--accent-color);
    margin-bottom: 20px;
}

.login-required-box h2 {
    font-family: 'Cinzel', serif;
    color: var(--text-primary);
    margin-bottom: 15px;
    font-size: 1.5rem;
}

.login-required-box p {
    color: var(--text-secondary);
    margin-bottom: 30px;
    line-height: 1.6;
}

.login-required-box strong {
    color: var(--accent-color);
}

.btn-login-required {
    display: block;
    width: 100%;
    padding: 14px 30px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border: none;
    border-radius: var(--header-radius);
    font-family: 'Montserrat', sans-serif;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 15px;
    letter-spacing: 0.5px;
}

.btn-login-required:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
}

.btn-voltar-pacotes {
    display: block;
    padding: 12px 20px;
    color: var(--text-secondary);
    text-decoration: none;
    border: 1px solid var(--glass-border);
    border-radius: var(--header-radius);
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.btn-voltar-pacotes:hover {
    background: rgba(255, 255, 255, 0.05);
    color: var(--text-primary);
    text-decoration: none;
}
</style>

<script>
function loginParaComprar(pacote) {
    sessionStorage.setItem('redirectAfterLogin', '?to=pagamento-fundador&pacote=' + pacote);
    openLoginPopup();
}
</script>

<?php else: ?>

<div class="payment-page">
    <div class="payment-container">
        <!-- Header -->
        <div class="payment-header">
            <span class="payment-step">Finalizar Compra</span>
            <h1>Pacote <?php echo htmlspecialchars($selectedPackage['name']); ?></h1>
        </div>

        <div class="payment-grid">
            <!-- Resumo do Pedido -->
            <div class="order-card">
                <div class="order-header" style="background: <?php echo $selectedPackage['color']; ?>">
                    <i class="fas <?php echo $selectedPackage['icon']; ?>"></i>
                    <span>Pacote <?php echo htmlspecialchars($selectedPackage['name']); ?></span>
                </div>

                <div class="order-items">
                    <?php foreach($selectedPackage['items'] as $item): ?>
                    <div class="order-item">
                        <img src="<?php echo iconImage($item['id']); ?>"
                             alt="<?php echo htmlspecialchars($item['name']); ?>"
                             onerror="this.src='assets/img/noimage.png'">
                        <div class="item-details">
                            <span class="item-name"><?php echo htmlspecialchars($item['name']); ?></span>
                            <span class="item-qty">x<?php echo $item['qty']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="order-total">
                    <span>Total</span>
                    <span class="total-price">R$ <?php echo number_format($selectedPackage['price'], 2, ',', '.'); ?></span>
                </div>
            </div>

            <!-- Formulario de Pagamento -->
            <div class="payment-form-card">
                <form id="formPagamentoFounder">
                    <input type="hidden" name="pacote" value="<?php echo $pacoteTier; ?>">
                    <input type="hidden" name="confirmar_pagamento" value="1">

                    <!-- Conta -->
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Conta</label>
                        <div class="account-display">
                            <span><?php echo htmlspecialchars($_SESSION['user']); ?></span>
                            <small>Os itens serao enviados para esta conta</small>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email</label>
                        <div class="account-display">
                            <span><?php echo htmlspecialchars($conta_query['email']); ?></span>
                            <small>Comprovante sera enviado para este email</small>
                        </div>
                    </div>

                    <!-- Metodo de Pagamento -->
                    <div class="form-group">
                        <label><i class="fas fa-credit-card"></i> Pagamento</label>
                        <div class="payment-method-card">
                            <div class="method-icon pix-icon">
                                <i class="fab fa-pix"></i>
                            </div>
                            <div class="method-info">
                                <span class="method-name">PIX</span>
                                <span class="method-desc">Pagamento instantaneo</span>
                            </div>
                            <i class="fas fa-check-circle method-check"></i>
                        </div>
                    </div>

                    <!-- Aviso -->
                    <div class="payment-info">
                        <i class="fas fa-info-circle"></i>
                        <span>Apos o pagamento, os itens serao entregues automaticamente ao logar no jogo.</span>
                    </div>

                    <div id="message"></div>

                    <!-- Botao de Pagamento -->
                    <button type="submit" id="submitPagamento" class="btn-pay">
                        <i class="fas fa-lock"></i>
                        <span>Pagar R$ <?php echo number_format($selectedPackage['price'], 2, ',', '.'); ?></span>
                    </button>

                    <a href="?to=pacote-fundador" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.payment-page {
    padding: 20px;
    min-height: 70vh;
}

.payment-container {
    max-width: 900px;
    margin: 0 auto;
}

.payment-header {
    text-align: center;
    margin-bottom: 30px;
}

.payment-step {
    display: inline-block;
    color: var(--accent-color);
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 8px;
}

.payment-header h1 {
    font-family: 'Cinzel', serif;
    color: var(--text-primary);
    font-size: 1.6rem;
    margin: 0;
    letter-spacing: 1px;
}

.payment-grid {
    display: grid;
    grid-template-columns: 1.3fr 1fr;
    gap: 25px;
    align-items: start;
}

/* Order Card */
.order-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    overflow: hidden;
    backdrop-filter: blur(20px);
    display: flex;
    flex-direction: column;
}

.order-header {
    padding: 18px 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: white;
}

.order-header i {
    font-size: 1.3rem;
}

.order-header span {
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    font-size: 0.95rem;
}

.order-items {
    padding: 15px 20px;
    overflow-y: auto;
    max-height: 336px;
}

.order-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid var(--glass-border);
}

.order-item:last-child {
    border-bottom: none;
}

.order-item img {
    width: 28px;
    height: 28px;
    object-fit: contain;
}

.item-details {
    display: flex;
    justify-content: space-between;
    flex: 1;
    align-items: center;
}

.item-details .item-name {
    color: var(--text-secondary);
    font-size: 0.85rem;
}

.item-details .item-qty {
    color: var(--text-secondary);
    font-size: 0.8rem;
    opacity: 0.7;
}

.order-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 20px;
    background: rgba(0, 0, 0, 0.2);
    border-top: 1px solid var(--glass-border);
}

.order-total span:first-child {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

.total-price {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--accent-color);
}

/* Payment Form Card */
.payment-form-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    padding: 25px;
    backdrop-filter: blur(20px);
    display: flex;
    flex-direction: column;
}

.payment-form-card form {
    display: flex;
    flex-direction: column;
    flex: 1;
}

.payment-form-card .payment-info {
    margin-top: auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    color: var(--text-secondary);
    font-size: 0.8rem;
    font-weight: 500;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-group label i {
    margin-right: 8px;
    color: var(--accent-color);
}

.account-display {
    background: rgba(0, 0, 0, 0.2);
    border: 1px solid var(--glass-border);
    border-radius: var(--header-radius);
    padding: 14px 16px;
}

.account-display span {
    display: block;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.95rem;
}

.account-display small {
    color: var(--text-secondary);
    font-size: 0.75rem;
    margin-top: 4px;
    display: block;
}

.payment-method-card {
    display: flex;
    align-items: center;
    gap: 15px;
    background: rgba(79, 195, 247, 0.1);
    border: 2px solid var(--accent-color);
    border-radius: var(--header-radius);
    padding: 16px;
}

.method-icon img {
    height: 24px;
    width: auto;
}

.method-icon.pix-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, #32BCAD, #00B4A6);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.method-icon.pix-icon i {
    font-size: 1.5rem;
    color: white;
}

.method-info {
    flex: 1;
}

.method-name {
    display: block;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.9rem;
}

.method-desc {
    color: var(--text-secondary);
    font-size: 0.75rem;
}

.method-check {
    color: var(--accent-color);
    font-size: 1.2rem;
}

.payment-info {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 14px;
    background: rgba(255, 193, 7, 0.1);
    border: 1px solid rgba(255, 193, 7, 0.3);
    border-radius: var(--header-radius);
    margin-bottom: 20px;
}

.payment-info i {
    color: #ffc107;
    font-size: 1rem;
    margin-top: 2px;
}

.payment-info span {
    color: var(--text-secondary);
    font-size: 0.8rem;
    line-height: 1.5;
}

.btn-pay {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border: none;
    border-radius: var(--header-radius);
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 12px;
}

.btn-pay:hover {
    background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
}

.btn-pay:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

.btn-back {
    display: block;
    text-align: center;
    padding: 12px;
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 0.85rem;
    transition: color 0.3s ease;
}

.btn-back:hover {
    color: var(--text-primary);
    text-decoration: none;
}

#message .error {
    background: rgba(220, 53, 69, 0.15);
    color: #ff6b6b;
    padding: 14px;
    border-radius: var(--header-radius);
    margin-bottom: 15px;
    font-size: 0.85rem;
    border: 1px solid rgba(220, 53, 69, 0.3);
}

#message .success {
    background: rgba(40, 167, 69, 0.15);
    color: #51cf66;
    padding: 14px;
    border-radius: var(--header-radius);
    margin-bottom: 15px;
    font-size: 0.85rem;
    border: 1px solid rgba(40, 167, 69, 0.3);
}

@media (max-width: 768px) {
    .payment-grid {
        grid-template-columns: 1fr;
    }

    .payment-page {
        padding: 15px 10px 40px;
    }

    .order-items {
        max-height: 264px;
        flex: none;
    }

    .payment-header h1 {
        font-size: 1.3rem;
    }
}
</style>

<script>
$(document).ready(function() {
    $('#formPagamentoFounder').on('submit', function(e) {
        e.preventDefault();

        var $btn = $('#submitPagamento');
        var originalText = $btn.html();

        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> <span>Processando...</span>');
        $('#message').html('');

        $.ajax({
            type: 'POST',
            url: '?to=pagamento-fundador&pacote=<?php echo $pacoteTier; ?>',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#message').html('<div class="success"><i class="fas fa-check-circle"></i> Redirecionando para pagamento...</div>');
                    setTimeout(function() {
                        window.location.href = response.redirect_url;
                    }, 1000);
                } else {
                    $('#message').html('<div class="error"><i class="fas fa-exclamation-circle"></i> ' + response.message + '</div>');
                    $btn.prop('disabled', false).html(originalText);
                }
            },
            error: function() {
                $('#message').html('<div class="error"><i class="fas fa-exclamation-circle"></i> Erro ao processar. Tente novamente.</div>');
                $btn.prop('disabled', false).html(originalText);
            }
        });
    });
});
</script>

<?php endif; ?>
