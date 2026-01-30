<div class="rmt-container">
    <div class="rmt-header">
        <h2><i class="fas fa-hand-holding-usd"></i> Marketplace RMT</h2>
        <p>Compre itens de outros jogadores com pagamento via PIX</p>

        <?php if(isset($_SESSION["conta"]) && !empty($_SESSION["conta"])): ?>
            <div class="rmt-user-balance">
                <i class="fas fa-coins"></i>
                Seu saldo: <?php echo RECLASSIC::formatCashToBRL(RECLASSIC::getCashBalance($_SESSION["conta"])); ?>
            </div>
        <?php else: ?>
            <div class="rmt-login-notice">
                <i class="fas fa-info-circle"></i>
                <a href="?to=entrar">Faca login</a> para comprar itens
            </div>
        <?php endif; ?>
    </div>

    <?php if(!empty($items_rmt)): ?>
        <div class="rmt-grid">
            <?php foreach($items_rmt as $item): ?>
                <?php
                $cards = getCardNames($item['item_card1'], $item['item_card2'], $item['item_card3'], $item['item_card4']);
                ?>
                <div class="rmt-item-card" data-item-id="<?php echo (int)$item['id']; ?>">
                    <div class="rmt-item-image">
                        <img src="<?php echo itemImage($item['item_id']); ?>" alt="<?php echo htmlspecialchars($item['item_name']); ?>" onerror="this.src='assets/img/icones/categoriaitem/unknown.png'">
                    </div>

                    <div class="rmt-item-name">
                        <?php if($item['item_refine'] > 0): ?>
                            <span class="refine">+<?php echo (int)$item['item_refine']; ?></span>
                        <?php endif; ?>
                        <?php echo htmlspecialchars($item['item_name']); ?>
                    </div>

                    <div class="rmt-item-details">
                        Quantidade: <?php echo (int)$item['item_amount']; ?>
                    </div>

                    <?php if(!empty($cards)): ?>
                        <div class="rmt-item-cards">
                            <i class="fas fa-gem"></i> <?php echo htmlspecialchars(implode(', ', $cards)); ?>
                        </div>
                    <?php else: ?>
                        <div class="rmt-item-cards">&nbsp;</div>
                    <?php endif; ?>

                    <div class="rmt-item-seller">
                        <i class="fas fa-user"></i> <?php echo htmlspecialchars($item['seller_char_name']); ?>
                    </div>

                    <div class="rmt-item-price">
                        R$ <?php echo number_format($item['price_brl'], 2, ',', '.'); ?>
                    </div>

                    <?php if(isset($_SESSION["conta"]) && !empty($_SESSION["conta"])): ?>
                        <?php if($_SESSION["conta"] != $item['seller_aid']): ?>
                            <button class="rmt-buy-btn" onclick="comprarItem(<?php echo (int)$item['id']; ?>)">
                                <i class="fas fa-shopping-cart"></i> Comprar
                            </button>
                        <?php else: ?>
                            <button class="rmt-buy-btn" disabled>
                                <i class="fas fa-ban"></i> Seu item
                            </button>
                        <?php endif; ?>
                    <?php else: ?>
                        <button class="rmt-buy-btn" disabled>
                            Faca login para comprar
                        </button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if($total_pages > 1): ?>
            <div class="rmt-pagination">
                <?php if($prev_page_url): ?>
                    <a href="<?php echo $prev_page_url; ?>">
                        <i class="fas fa-chevron-left"></i> Anterior
                    </a>
                <?php endif; ?>

                <span>Pagina <?php echo $pagina; ?> de <?php echo $total_pages; ?></span>

                <?php if($next_page_url): ?>
                    <a href="<?php echo $next_page_url; ?>">
                        Proxima <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="rmt-empty">
            <i class="fas fa-box-open fa-4x"></i>
            <h3>Nenhum item disponivel</h3>
            <p>No momento nao ha itens a venda no marketplace RMT.</p>
            <p>Acesse o NPC Mediador PIX no jogo para colocar seus itens a venda!</p>
        </div>
    <?php endif; ?>
</div>

<script>
function comprarItem(transactionId) {
    if(!confirm('Deseja realmente comprar este item?\n\nApos confirmar, voce sera direcionado para realizar o pagamento via PIX.')) {
        return;
    }

    $.ajax({
        type: 'POST',
        url: 'api/rmt-comprar.php',
        data: { transaction_id: transactionId },
        dataType: 'json',
        beforeSend: function() {
            $('button.rmt-buy-btn').prop('disabled', true);
        },
        success: function(response) {
            if(response.success) {
                alert('Item reservado com sucesso!\n\n' + response.message + '\n\nAcesse o NPC Mediador PIX no jogo para ver os detalhes de pagamento.');
                location.reload();
            } else {
                alert('Erro: ' + response.message);
                $('button.rmt-buy-btn').prop('disabled', false);
            }
        },
        error: function() {
            alert('Erro ao processar a compra. Tente novamente.');
            $('button.rmt-buy-btn').prop('disabled', false);
        }
    });
}
</script>
