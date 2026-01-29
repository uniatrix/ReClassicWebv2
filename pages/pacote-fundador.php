<div class="founder-page">
    <div class="founder-hero">
        <h1><span class="text-white">Pacote</span> <span class="text-highlight">Fundador</span></h1>
        <p>Nao e so um novo servidor. E um reload nos velhos tempos, faca parte da base e entre pra historia desde o inicio.</p>
    </div>

    <div class="founder-packages-row">
        <?php foreach($founderPackages as $tier => $package): ?>
        <div class="founder-card <?php echo $tier === 3 ? 'featured-card' : ''; ?>">
            <?php if($tier === 3): ?>
            <div class="featured-badge">MAIS VENDIDO</div>
            <?php endif; ?>
            <div class="card-header">
                <h2>Pacote <?php echo htmlspecialchars($package['name']); ?></h2>
                <div class="card-price" style="color: <?php echo $package['color']; ?>">
                    R$ <?php echo number_format($package['price'], 2, ',', '.'); ?>
                </div>
            </div>

            <div class="card-items">
                <?php foreach($package['items'] as $item): ?>
                <div class="item-row">
                    <img src="<?php echo iconImage($item['id']); ?>"
                         alt="<?php echo htmlspecialchars($item['name']); ?>"
                         onerror="this.src='assets/img/noimage.png'">
                    <span class="item-name"><?php echo htmlspecialchars($item['name']); ?> [<?php echo $item['qty']; ?>]</span>
                    <?php if(strpos($item['desc'], '+') !== false): ?>
                    <span class="item-plus">+</span>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>

            <a href="?to=pagamento-fundador&pacote=<?php echo $tier; ?>" class="btn-adquirir" style="color: <?php echo $package['color']; ?>; border-color: <?php echo $package['color']; ?>">
                ADQUIRIR
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.founder-page {
    padding: 40px 20px 150px;
    min-height: 100vh;
}

.founder-hero {
    text-align: center;
    margin-bottom: 50px;
    padding: 20px;
}

.founder-hero h1 {
    font-family: 'Silkscreen', cursive;
    font-size: 2.5rem;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.founder-hero .text-white {
    color: #fff;
}

.founder-hero .text-highlight {
    color: #3498db;
}

.founder-hero p {
    color: #fff;
    font-size: 1rem;
    max-width: 700px;
    margin: 0 auto;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
}

.founder-packages-row {
    display: flex;
    justify-content: center;
    gap: 25px;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto 80px;
}

.founder-card {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 16px;
    width: 320px;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    position: relative;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
}

.founder-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    background: rgba(255, 255, 255, 0.12);
}

.founder-card.featured-card {
    border: 2px solid rgba(52, 152, 219, 0.6);
    box-shadow: 0 8px 32px rgba(52, 152, 219, 0.25);
    background: rgba(52, 152, 219, 0.1);
}

.founder-card.featured-card:hover {
    box-shadow: 0 15px 50px rgba(52, 152, 219, 0.35);
    background: rgba(52, 152, 219, 0.15);
}

.featured-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
    padding: 6px 20px;
    font-family: 'Silkscreen', cursive;
    font-size: 0.75rem;
    border-radius: 20px;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.5);
    z-index: 10;
    white-space: nowrap;
}

.card-header {
    text-align: center;
    padding: 25px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(255, 255, 255, 0.03);
    border-radius: 16px 16px 0 0;
}

.card-header h2 {
    font-family: 'Silkscreen', cursive;
    color: #fff;
    font-size: 1.1rem;
    margin: 0 0 10px 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.card-price {
    font-family: 'Silkscreen', cursive;
    font-size: 1.8rem;
    font-weight: bold;
}

.card-items {
    padding: 15px 20px;
    flex-grow: 1;
}

.item-row {
    display: flex;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    gap: 12px;
}

.item-row:last-child {
    border-bottom: none;
}

.item-row img {
    width: 24px;
    height: 24px;
    object-fit: contain;
    flex-shrink: 0;
}

.item-row .item-name {
    color: rgba(255, 255, 255, 0.85);
    font-size: 0.85rem;
    flex-grow: 1;
}

.item-row .item-plus {
    color: #3498db;
    font-weight: bold;
    font-size: 1.2rem;
}

.btn-adquirir {
    display: block;
    margin: 15px 20px 20px;
    padding: 14px 20px;
    text-align: center;
    border: 2px solid;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.05);
    font-family: 'Silkscreen', cursive;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
    letter-spacing: 1px;
    position: relative;
    z-index: 5;
}

.btn-adquirir:hover {
    background: rgba(52, 152, 219, 0.2);
    text-decoration: none;
    transform: scale(1.02);
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
}

@media (max-width: 1024px) {
    .founder-packages-row {
        flex-direction: column;
        align-items: center;
    }

    .founder-card {
        width: 100%;
        max-width: 400px;
    }
}

@media (max-width: 768px) {
    .founder-hero h1 {
        font-size: 1.8rem;
    }

    .founder-page {
        padding: 20px 10px 200px;
    }

    .founder-packages-row {
        margin-bottom: 100px;
    }

    .card-price {
        font-size: 1.5rem;
    }
}
</style>
