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

            <?php if(isset($_SESSION["conta"]) && !empty($_SESSION["conta"])): ?>
            <a href="?to=pagamento-fundador&pacote=<?php echo $tier; ?>" class="btn-adquirir" style="color: <?php echo $package['color']; ?>; border-color: <?php echo $package['color']; ?>">
                ADQUIRIR
            </a>
            <?php else: ?>
            <a href="#" class="btn-adquirir" style="color: <?php echo $package['color']; ?>; border-color: <?php echo $package['color']; ?>" onclick="loginParaComprar(<?php echo $tier; ?>); return false;">
                ADQUIRIR
            </a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.founder-page {
    padding: 40px 20px 80px;
    min-height: 100vh;
}

.founder-hero {
    text-align: center;
    margin-bottom: 50px;
    padding: 20px;
}

.founder-hero h1 {
    font-family: 'Cinzel', serif;
    font-size: 2.5rem;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.founder-hero .text-white {
    color: #fff;
}

.founder-hero .text-highlight {
    color: var(--accent-color);
    text-shadow: 0 0 30px rgba(79, 195, 247, 0.5);
}

.founder-hero p {
    color: var(--text-secondary);
    font-size: 1rem;
    max-width: 700px;
    margin: 0 auto;
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
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    width: 320px;
    display: flex;
    flex-direction: column;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    position: relative;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.founder-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
    border-color: rgba(79, 195, 247, 0.3);
}

.founder-card.featured-card {
    border: 2px solid rgba(79, 195, 247, 0.5);
    box-shadow: 0 8px 32px rgba(79, 195, 247, 0.2);
}

.founder-card.featured-card:hover {
    box-shadow: 0 20px 50px rgba(79, 195, 247, 0.3);
}

.featured-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 6px 20px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.7rem;
    font-weight: 700;
    border-radius: 20px;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.5);
    z-index: 10;
    white-space: nowrap;
}

.card-header {
    text-align: center;
    padding: 25px 20px;
    border-bottom: 1px solid var(--glass-border);
    background: rgba(0, 0, 0, 0.1);
    border-radius: var(--card-radius) var(--card-radius) 0 0;
}

.card-header h2 {
    font-family: 'Cinzel', serif;
    color: #fff;
    font-size: 1.1rem;
    margin: 0 0 10px 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.card-price {
    font-family: 'Montserrat', sans-serif;
    font-size: 1.8rem;
    font-weight: 700;
}

.card-items {
    padding: 15px 20px;
    flex-grow: 1;
}

.item-row {
    display: flex;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid var(--glass-border);
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
    color: var(--text-secondary);
    font-size: 0.85rem;
    flex-grow: 1;
}

.item-row .item-plus {
    color: var(--accent-color);
    font-weight: bold;
    font-size: 1.2rem;
}

.btn-adquirir {
    display: block;
    margin: 15px 20px 20px;
    padding: 14px 20px;
    text-align: center;
    border: 1px solid;
    border-radius: var(--header-radius);
    background: transparent;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    letter-spacing: 1px;
    position: relative;
    z-index: 5;
}

.btn-adquirir:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white !important;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(52, 152, 219, 0.4);
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
        padding: 20px 10px 40px; /* Body has padding for mobile nav */
    }

    .founder-packages-row {
        margin-bottom: 30px;
    }

    .card-price {
        font-size: 1.5rem;
    }
}
</style>

<script>
function loginParaComprar(pacote) {
    // Salva o destino para redirecionar após login
    sessionStorage.setItem('redirectAfterLogin', '?to=pagamento-fundador&pacote=' + pacote);
    openLoginPopup();
}

// Verifica após login se há redirect pendente
$(document).ready(function() {
    // Intercepta o sucesso do login para redirecionar
    var originalSubmitHandler = $('#loginPopupForm').data('events');

    $('#loginPopupForm').off('submit').on('submit', function(e) {
        e.preventDefault();
        var $btn = $(this).find('button[type="submit"]');
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> ENTRANDO...');

        $.ajax({
            type: 'POST',
            url: 'api/entrar.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#loginPopupMessage').html(response);
                $btn.prop('disabled', false).html('ENTRAR');

                if (response.includes('sucesso') || response.includes('Sucesso') || response.includes('window.location')) {
                    var redirectUrl = sessionStorage.getItem('redirectAfterLogin');
                    sessionStorage.removeItem('redirectAfterLogin');

                    setTimeout(function() {
                        if (redirectUrl) {
                            window.location.href = redirectUrl;
                        } else {
                            window.location.reload();
                        }
                    }, 1000);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição', status, error);
                $btn.prop('disabled', false).html('ENTRAR');
            }
        });
    });
});
</script>
