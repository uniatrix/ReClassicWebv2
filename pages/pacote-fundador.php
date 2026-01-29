<div class="founder-page">
    <div class="founder-hero">
        <h1><span class="text-white">Pacote</span> <span class="text-highlight">Fundador</span></h1>
        <p>Nao e so um novo servidor. E um reload nos velhos tempos, faca parte da base e entre pra historia desde o inicio.</p>
    </div>

    <div class="founder-packages-row">
        <?php foreach($founderPackages as $tier => $package): ?>
        <div class="founder-card">
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
    padding: 40px 20px;
    min-height: 80vh;
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
    color: #ff7f32;
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
    margin: 0 auto;
}

.founder-card {
    background: rgba(20, 20, 30, 0.92);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 10px;
    width: 320px;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    backdrop-filter: blur(5px);
}

.founder-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
}

.card-header {
    text-align: center;
    padding: 25px 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
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
    color: #ddd;
    font-size: 0.85rem;
    flex-grow: 1;
}

.item-row .item-plus {
    color: #ff7f32;
    font-weight: bold;
    font-size: 1.2rem;
}

.btn-adquirir {
    display: block;
    margin: 15px 20px 20px;
    padding: 12px 20px;
    text-align: center;
    border: 2px solid;
    border-radius: 5px;
    background: transparent;
    font-family: 'Silkscreen', cursive;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
    letter-spacing: 1px;
}

.btn-adquirir:hover {
    background: rgba(255, 127, 50, 0.15);
    text-decoration: none;
    transform: scale(1.02);
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
        padding: 20px 10px;
    }

    .card-price {
        font-size: 1.5rem;
    }
}
</style>
