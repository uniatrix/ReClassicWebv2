<div class="payment-founder-container">
    <div class="payment-header">
        <h2><i class="fas fa-credit-card"></i> Pagamento - Pacote <?php echo htmlspecialchars($selectedPackage['name']); ?></h2>
        <p>Revise os detalhes do seu pedido e confirme o pagamento via PIX</p>
    </div>

    <div class="payment-content">
        <div class="order-summary">
            <div class="summary-header" style="background: <?php echo $selectedPackage['color']; ?>">
                <i class="fas <?php echo $selectedPackage['icon']; ?>"></i>
                <h3>Pacote <?php echo htmlspecialchars($selectedPackage['name']); ?></h3>
            </div>

            <div class="summary-items">
                <h4><i class="fas fa-box-open"></i> Itens do Pacote</h4>
                <ul class="items-list">
                    <?php foreach($selectedPackage['items'] as $item): ?>
                    <li>
                        <img src="<?php echo itemImage($item['id']); ?>"
                             alt="<?php echo htmlspecialchars($item['name']); ?>"
                             onerror="this.src='assets/img/noimage.png'">
                        <span class="item-info">
                            <strong><?php echo htmlspecialchars($item['name']); ?></strong>
                            <small>x<?php echo $item['qty']; ?> - <?php echo htmlspecialchars($item['desc']); ?></small>
                        </span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="summary-total">
                <span>Total:</span>
                <span class="price">R$ <?php echo number_format($selectedPackage['price'], 2, ',', '.'); ?></span>
            </div>
        </div>

        <div class="payment-form-section">
            <form id="formPagamentoFounder">
                <input type="hidden" name="pacote" value="<?php echo $pacoteTier; ?>">
                <input type="hidden" name="confirmar_pagamento" value="1">

                <div class="form-field">
                    <label><i class="fas fa-user"></i> Usuario</label>
                    <input type="text" value="<?php echo htmlspecialchars($_SESSION['user']); ?>" readonly class="readonly-field">
                    <small>O pacote sera enviado para esta conta</small>
                </div>

                <?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])): ?>
                <div class="form-field">
                    <label><i class="fas fa-envelope"></i> E-mail</label>
                    <input type="text" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly class="readonly-field">
                </div>
                <?php endif; ?>

                <div class="payment-method">
                    <h4><i class="fas fa-qrcode"></i> Metodo de Pagamento</h4>
                    <div class="pix-option">
                        <input type="radio" id="pix" name="metodo" value="pix" checked>
                        <label for="pix">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo%E2%80%94pix_powered_by_Banco_Central_%28Brazil%2C_2020%29.svg" alt="PIX" class="pix-logo">
                            <span>Pagamento instantaneo via PIX</span>
                        </label>
                    </div>
                </div>

                <div class="payment-notice">
                    <i class="fas fa-info-circle"></i>
                    <p>Apos clicar em "Pagar com PIX", voce sera redirecionado para a pagina de pagamento. Os itens serao entregues automaticamente ao logar no jogo apos a confirmacao do pagamento.</p>
                </div>

                <div id="message"></div>

                <button type="submit" id="submitPagamento" class="btn-pagar" style="background: <?php echo $selectedPackage['color']; ?>">
                    <i class="fas fa-qrcode"></i> Pagar com PIX - R$ <?php echo number_format($selectedPackage['price'], 2, ',', '.'); ?>
                </button>

                <a href="?to=pacote-fundador" class="btn-voltar">
                    <i class="fas fa-arrow-left"></i> Voltar para pacotes
                </a>
            </form>
        </div>
    </div>
</div>

<style>
.payment-founder-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.2);
    margin-top: -40px;
}

.payment-header {
    text-align: center;
    margin-bottom: 30px;
}

.payment-header h2 {
    font-family: 'Silkscreen', cursive;
    color: var(--primary-color);
    margin-bottom: 10px;
}

.payment-header p {
    color: #666;
    font-size: 0.95rem;
}

.payment-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.order-summary {
    background: #f9f9f9;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #eee;
}

.summary-header {
    padding: 20px;
    text-align: center;
    color: white;
}

.summary-header i {
    font-size: 2rem;
    margin-bottom: 10px;
    display: block;
}

.summary-header h3 {
    font-family: 'Silkscreen', cursive;
    margin: 0;
    color: white;
    text-shadow: 2px 2px 0 rgba(0,0,0,0.3);
}

.summary-items {
    padding: 20px;
    max-height: 400px;
    overflow-y: auto;
}

.summary-items h4 {
    margin: 0 0 15px 0;
    font-size: 0.9rem;
    color: #555;
}

.items-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.items-list li {
    display: flex;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    gap: 10px;
}

.items-list li:last-child {
    border-bottom: none;
}

.items-list li img {
    width: 32px;
    height: 32px;
    object-fit: contain;
}

.items-list .item-info {
    display: flex;
    flex-direction: column;
}

.items-list .item-info strong {
    font-size: 0.85rem;
    color: #333;
}

.items-list .item-info small {
    font-size: 0.75rem;
    color: #888;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background: #333;
    color: white;
    font-size: 1.2rem;
}

.summary-total .price {
    font-family: 'Silkscreen', cursive;
    font-size: 1.5rem;
}

.payment-form-section {
    padding: 20px;
}

.form-field {
    margin-bottom: 20px;
}

.form-field label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 500;
}

.form-field label i {
    margin-right: 8px;
    color: var(--primary-color);
}

.form-field input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
}

.form-field input.readonly-field {
    background: #f5f5f5;
    color: #666;
    cursor: not-allowed;
}

.form-field small {
    display: block;
    margin-top: 5px;
    color: #888;
    font-size: 0.8rem;
}

.payment-method {
    margin: 25px 0;
}

.payment-method h4 {
    margin: 0 0 15px 0;
    color: #333;
}

.pix-option {
    display: flex;
    align-items: center;
    padding: 15px;
    border: 2px solid var(--primary-color);
    border-radius: 8px;
    background: #f0f8ff;
}

.pix-option input[type="radio"] {
    width: auto;
    margin-right: 15px;
}

.pix-option label {
    display: flex;
    align-items: center;
    gap: 15px;
    cursor: pointer;
    margin: 0;
}

.pix-logo {
    height: 30px;
    width: auto;
}

.payment-notice {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 15px;
    background: #fff3cd;
    border-radius: 8px;
    margin-bottom: 20px;
}

.payment-notice i {
    color: #856404;
    font-size: 1.2rem;
    margin-top: 2px;
}

.payment-notice p {
    margin: 0;
    color: #856404;
    font-size: 0.85rem;
    line-height: 1.5;
}

.btn-pagar {
    display: block;
    width: 100%;
    padding: 15px 20px;
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: bold;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Silkscreen', cursive;
    margin-bottom: 15px;
}

.btn-pagar:hover {
    filter: brightness(1.1);
    transform: scale(1.02);
}

.btn-pagar:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.btn-voltar {
    display: block;
    text-align: center;
    padding: 12px 20px;
    color: #666;
    text-decoration: none;
    border: 1px solid #ddd;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-voltar:hover {
    background: #f5f5f5;
    color: #333;
    text-decoration: none;
}

#message .error {
    background: #f8d7da;
    color: #721c24;
    padding: 12px;
    border-radius: 5px;
    margin-bottom: 15px;
}

#message .success {
    background: #d4edda;
    color: #155724;
    padding: 12px;
    border-radius: 5px;
    margin-bottom: 15px;
}

@media (max-width: 768px) {
    .payment-content {
        grid-template-columns: 1fr;
    }

    .payment-founder-container {
        margin-top: 0;
        border-radius: 0;
    }

    .summary-items {
        max-height: 250px;
    }
}
</style>

<script>
$(document).ready(function() {
    $('#formPagamentoFounder').on('submit', function(e) {
        e.preventDefault();

        var $btn = $('#submitPagamento');
        var originalText = $btn.html();

        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processando...');
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
