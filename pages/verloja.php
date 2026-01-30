<!-- Toast Notification -->
<div id="shop-toast" class="shop-toast">
    <i class="fas fa-check-circle"></i>
    <span>Copiado para area de transferencia!</span>
</div>

<div class="shop-container">
    <?php if($_GET['type'] == 'vendedores'):?>
    <!-- Vendedor Shop Header -->
    <div class="shop-detail-header">
        <h1 class="shop-detail-title">
            <img src="<?php echo iconImage($vending->extended_vending_item); ?>" alt="Currency">
            <?php echo htmlspecialchars($title); ?>
            <img src="<?php echo iconImage($vending->extended_vending_item); ?>" alt="Currency">
        </h1>
        <div class="shop-detail-location">
            <i class="fas fa-map-marker-alt"></i>
            <?php echo $vending->map; ?> (<?php echo $vending->x; ?>, <?php echo $vending->y; ?>)
        </div>
        <button class="shop-copy-btn" onclick="copyLocation()">
            <i class="fas fa-copy"></i> Copiar /navi
        </button>
    </div>

    <?php if($items): ?>
    <!-- Items Container -->
    <div class="shop-items-container">
        <h3 class="shop-items-header">
            <i class="fas fa-box-open"></i> Itens a Venda (<?php echo count($items); ?>)
        </h3>

        <?php foreach ($items as $item): ?>
        <div class="shop-item-row">
            <div class="shop-item-icon">
                <img src="<?php echo iconImage($item->nameid); ?>" alt="<?php echo htmlspecialchars($item->item_name); ?>">
            </div>
            <div class="shop-item-info">
                <div class="shop-item-name">
                    <?php if($item->refine > 0): ?>
                    <span class="shop-item-refine">+<?php echo $item->refine; ?></span>
                    <?php endif; ?>
                    <a href="?to=veritem&id=<?php echo $item->nameid; ?>"><?php echo htmlspecialchars($item->item_name); ?></a>
                    <?php if($item->slots > 0): ?>
                    <span class="shop-item-slots">[<?php echo $item->slots; ?>]</span>
                    <?php endif; ?>
                </div>
                <div class="shop-item-cards">
                    <?php if ($item->card0 > 3999 && $item->card0 != 254 && $item->card0 != 255): ?>
                    <span class="shop-item-card-badge">
                        <a href="?to=veritem&id=<?php echo $item->card0; ?>"><?php echo RECLASSIC::getInfoItem($item->card0)['name_english']; ?></a>
                    </span>
                    <?php endif; ?>
                    <?php if ($item->card1 > 3999 && $item->card1 != 254 && $item->card1 != 255): ?>
                    <span class="shop-item-card-badge">
                        <a href="?to=veritem&id=<?php echo $item->card1; ?>"><?php echo RECLASSIC::getInfoItem($item->card1)['name_english']; ?></a>
                    </span>
                    <?php endif; ?>
                    <?php if ($item->card2 > 3999 && $item->card2 != 254 && $item->card2 != 255): ?>
                    <span class="shop-item-card-badge">
                        <a href="?to=veritem&id=<?php echo $item->card2; ?>"><?php echo RECLASSIC::getInfoItem($item->card2)['name_english']; ?></a>
                    </span>
                    <?php endif; ?>
                    <?php if ($item->card3 > 3999 && $item->card3 != 254 && $item->card3 != 255): ?>
                    <span class="shop-item-card-badge">
                        <a href="?to=veritem&id=<?php echo $item->card3; ?>"><?php echo RECLASSIC::getInfoItem($item->card3)['name_english']; ?></a>
                    </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="shop-item-price">
                <?php echo number_format($item->price, 0, ',', '.'); ?>
                <img src="<?php echo iconImage($vending->extended_vending_item); ?>" alt="Currency">
            </div>
            <div class="shop-item-amount">x<?php echo $item->amount; ?></div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="shop-empty">
        <i class="fas fa-box-open fa-4x"></i>
        <h3>Loja vazia</h3>
        <p>Esta loja nao possui itens no momento.</p>
    </div>
    <?php endif; ?>

    <!-- Back Button -->
    <div class="shop-pagination" style="margin-top: 20px;">
        <a href="?to=comercio&type=vendedores" class="shop-page-btn">
            <i class="fas fa-arrow-left"></i> Voltar para Vendedores
        </a>
    </div>

    <?php elseif($_GET['type'] == 'compradores'):?>
    <!-- Comprador Shop Header -->
    <div class="shop-detail-header">
        <h1 class="shop-detail-title">
            <i class="fas fa-shopping-cart" style="color: var(--accent-color);"></i>
            <?php echo htmlspecialchars($title); ?>
            <i class="fas fa-shopping-cart" style="color: var(--accent-color);"></i>
        </h1>
        <div class="shop-detail-location">
            <i class="fas fa-map-marker-alt"></i>
            <?php echo $store->map; ?> (<?php echo $store->x; ?>, <?php echo $store->y; ?>)
        </div>
        <button class="shop-copy-btn" onclick="copyLocation()">
            <i class="fas fa-copy"></i> Copiar /navi
        </button>
    </div>

    <?php if($items): ?>
    <!-- Items Container -->
    <div class="shop-items-container">
        <h3 class="shop-items-header">
            <i class="fas fa-hand-holding-usd"></i> Itens que Compra (<?php echo count($items); ?>)
        </h3>

        <?php foreach ($items as $item): ?>
        <div class="shop-item-row">
            <div class="shop-item-icon">
                <img src="<?php echo iconImage($item->nameid); ?>" alt="<?php echo htmlspecialchars($item->item_name); ?>">
            </div>
            <div class="shop-item-info">
                <div class="shop-item-name">
                    <a href="?to=veritem&id=<?php echo $item->nameid; ?>"><?php echo htmlspecialchars($item->item_name); ?></a>
                </div>
            </div>
            <div class="shop-item-price">
                <?php echo number_format($item->price, 0, ',', '.'); ?>
                <img src="<?php echo iconImage(673); ?>" alt="Zeny">
            </div>
            <div class="shop-item-amount">x<?php echo $item->amount; ?></div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="shop-empty">
        <i class="fas fa-box-open fa-4x"></i>
        <h3>Loja vazia</h3>
        <p>Esta loja nao possui itens no momento.</p>
    </div>
    <?php endif; ?>

    <!-- Back Button -->
    <div class="shop-pagination" style="margin-top: 20px;">
        <a href="?to=comercio&type=compradores" class="shop-page-btn">
            <i class="fas fa-arrow-left"></i> Voltar para Compradores
        </a>
    </div>

    <?php endif; ?>
</div>

<script>
function copyLocation() {
    <?php if($_GET['type'] == 'vendedores'): ?>
    const textToCopy = '/navi <?php echo $vending->map . " " . $vending->x . "/" . $vending->y; ?>';
    <?php elseif($_GET['type'] == 'compradores'): ?>
    const textToCopy = '/navi <?php echo $store->map . " " . $store->x . "/" . $store->y; ?>';
    <?php endif; ?>

    // Modern clipboard API
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(textToCopy).then(() => {
            showToast();
        }).catch(() => {
            fallbackCopy(textToCopy);
        });
    } else {
        fallbackCopy(textToCopy);
    }
}

function fallbackCopy(text) {
    const tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999);
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    showToast();
}

function showToast() {
    const toast = document.getElementById('shop-toast');
    if (toast) {
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 2500);
    }
}
</script>
