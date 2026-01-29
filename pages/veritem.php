<!-- ========================== ITEM DETAILS - MODERN LAYOUT ======================= -->
<style type="text/css">
/* Item Detail Page Styles */
.item-header {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    padding: 30px;
    margin-bottom: 20px;
    display: flex;
    gap: 30px;
    align-items: flex-start;
}

.item-sprite {
    flex-shrink: 0;
}

.item-sprite img {
    max-width: 80px;
    image-rendering: pixelated;
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.4));
}

.item-info {
    flex: 1;
}

.item-id {
    color: #ff9800;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.item-aegis {
    color: var(--text-secondary);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
}

.item-name {
    font-family: 'Cinzel', serif;
    font-size: 2rem;
    color: var(--text-primary);
    margin: 10px 0 20px 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.item-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.item-badge {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.item-badge-label {
    color: var(--text-secondary);
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    height: 16px;
}

.item-badge-value {
    background: rgba(79, 195, 247, 0.15);
    border: 1px solid rgba(79, 195, 247, 0.3);
    padding: 10px 16px;
    border-radius: 8px;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    height: 42px;
}

/* Info Cards Container */
.item-info-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 30px;
}

/* Info Cards Grid */
.item-info-cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.item-info-card {
    background: rgba(20, 30, 48, 0.6);
    border: 1px solid rgba(79, 195, 247, 0.15);
    border-radius: 10px;
    padding: 18px 15px;
    text-align: left;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.item-info-card-label {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
}

.item-info-card-label i {
    font-size: 0.85rem;
    opacity: 0.7;
}

.item-info-card-value {
    color: var(--text-primary);
    font-size: 1.4rem;
    font-weight: 700;
}

.item-info-card-value.small {
    font-size: 1.1rem;
}

/* Description Container */
.item-description-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 30px;
}

.item-description-text {
    background: #ffffff;
    border: 1px solid rgba(79, 195, 247, 0.15);
    border-radius: 10px;
    padding: 20px;
    color: #2c3e50;
    font-size: 0.95rem;
    line-height: 1.8;
    white-space: pre-wrap;
    font-family: 'Courier New', monospace;
}

/* Obtained From Container */
.item-obtained-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
}

/* Monster Grid */
.monster-drops-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
}

.monster-drop-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 10px;
    padding: 15px;
    transition: all 0.3s ease;
    text-decoration: none;
    color: white;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 15px;
}

.monster-drop-card:hover {
    border-color: var(--accent-color);
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(79, 195, 247, 0.2);
}

.monster-drop-icon {
    width: 50px;
    height: 50px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.monster-drop-icon img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.monster-drop-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    text-align: left;
}

.monster-drop-name {
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 5px;
}

.monster-drop-rate {
    color: var(--accent-color);
    font-weight: 700;
    font-size: 0.85rem;
}

/* Tab Section */
.tab-section-title {
    font-family: 'Cinzel', serif;
    font-size: 1.3rem;
    color: var(--text-primary);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.tab-section-title i {
    color: #ff9800;
}

/* Empty State */
.empty-section {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 60px 30px;
    text-align: center;
}

.empty-section i {
    font-size: 4rem;
    color: var(--text-secondary);
    opacity: 0.5;
    margin-bottom: 20px;
    display: block;
}

.empty-section p {
    color: var(--text-secondary);
    font-size: 1.1rem;
    margin: 0;
}

/* Mobile Responsiveness */
@media (max-width: 992px) {
    .item-info-cards-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .item-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .monster-drops-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    /* Item Header - Mobile */
    .item-header {
        padding: 20px;
        gap: 15px;
    }

    .item-sprite img {
        max-width: 60px;
    }

    .item-name {
        font-size: 1.4rem;
        margin: 8px 0 15px 0;
    }

    .item-id {
        font-size: 0.9rem;
    }

    .item-aegis {
        font-size: 0.75rem;
    }

    /* Item Badges - Wrap */
    .item-badges {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .item-badge {
        gap: 4px;
    }

    .item-badge-label {
        font-size: 0.65rem;
    }

    .item-badge-value {
        padding: 8px 12px;
        font-size: 0.85rem;
        height: 38px;
        gap: 4px;
    }

    /* Tab Section Titles */
    .tab-section-title {
        font-size: 1.1rem;
        margin-bottom: 15px;
    }

    /* Item Info Cards - 2 columns */
    .item-info-container {
        padding: 20px;
    }

    .item-info-cards-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .item-info-card {
        padding: 14px 12px;
    }

    .item-info-card-label {
        font-size: 0.65rem;
    }

    .item-info-card-value {
        font-size: 1.2rem;
    }

    .item-info-card-value.small {
        font-size: 1rem;
    }

    /* Description Section */
    .item-description-container {
        padding: 20px;
    }

    .item-description-text {
        padding: 15px;
        font-size: 0.85rem;
        line-height: 1.7;
    }

    /* Obtained From Section */
    .item-obtained-container {
        padding: 20px;
    }

    .monster-drops-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .monster-drop-card {
        padding: 12px;
        gap: 12px;
    }

    .monster-drop-icon {
        width: 45px;
        height: 45px;
    }

    .monster-drop-name {
        font-size: 0.9rem;
    }

    .monster-drop-rate {
        font-size: 0.8rem;
    }

    /* Empty Section */
    .empty-section {
        padding: 40px 20px;
    }

    .empty-section i {
        font-size: 2.5rem;
    }

    .empty-section p {
        font-size: 0.95rem;
    }
}
</style>

<!-- Database Layout Container -->
<div class="db-layout">
    <!-- Sidebar Navigation -->
    <aside class="db-sidebar">
        <nav class="db-sidebar-nav">
            <a href="?to=database&type=inicio" class="db-sidebar-item">
                <i class="fas fa-home"></i>
                <span>Início</span>
            </a>
            <a href="?to=database&type=monstros" class="db-sidebar-item">
                <i class="fas fa-dragon"></i>
                <span>Monstros</span>
            </a>
            <a href="?to=database&type=mapas" class="db-sidebar-item">
                <i class="fas fa-map"></i>
                <span>Mapas</span>
            </a>
            <a href="?to=database&type=equipamentos" class="db-sidebar-item active">
                <i class="fas fa-shield-alt"></i>
                <span>Equipamentos</span>
            </a>
            <a href="?to=database&type=consumiveis" class="db-sidebar-item">
                <i class="fas fa-flask"></i>
                <span>Consumíveis</span>
            </a>
            <a href="?to=database&type=diversos" class="db-sidebar-item">
                <i class="fas fa-box"></i>
                <span>Itens Diversos</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="db-main-content">
        <!-- Item Header -->
        <div class="item-header">
            <div class="item-sprite">
                <img src="<?php echo iconImage($iditem); ?>" alt="<?php echo $nomeitem; ?>">
            </div>
            <div class="item-info">
                <div class="item-id">#<?php echo $iditem; ?></div>
                <div class="item-aegis"><?php echo $aegis; ?></div>
                <h1 class="item-name"><?php echo $nomeitem; ?><?php if ($slots > 0 && $slots != "N/A") echo " [$slots]"; ?></h1>

                <div class="item-badges">
                    <div class="item-badge">
                        <div class="item-badge-label">Tipo</div>
                        <div class="item-badge-value">
                            <i class="fas fa-tag"></i>
                            <?php echo $tipo; ?>
                        </div>
                    </div>
                    <div class="item-badge">
                        <div class="item-badge-label">Peso</div>
                        <div class="item-badge-value">
                            <i class="fas fa-weight-hanging"></i>
                            <?php echo $peso; ?>
                        </div>
                    </div>
                    <?php if ($ataque != "N/A" && $ataque > 0): ?>
                    <div class="item-badge">
                        <div class="item-badge-label">Ataque</div>
                        <div class="item-badge-value">
                            <i class="fas fa-sword" style="color: #f44336;"></i>
                            <?php echo $ataque; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($defesa != "N/A" && $defesa > 0): ?>
                    <div class="item-badge">
                        <div class="item-badge-label">Defesa</div>
                        <div class="item-badge-value">
                            <i class="fas fa-shield-alt" style="color: #2196f3;"></i>
                            <?php echo $defesa; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($slots > 0): ?>
                    <div class="item-badge">
                        <div class="item-badge-label">Slots</div>
                        <div class="item-badge-value">
                            <i class="fas fa-circle"></i>
                            <?php echo $slots; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Informations Section -->
        <h3 class="tab-section-title">
            <i class="fas fa-info-circle"></i>
            Informações
        </h3>

        <div class="item-info-container">
            <div class="item-info-cards-grid">
                <div class="item-info-card">
                    <div class="item-info-card-label">
                        <i class="fas fa-coins" style="color: #ffc107;"></i>
                        Preço
                    </div>
                    <div class="item-info-card-value small"><?php echo is_numeric($preco) ? number_format($preco) . 'z' : $preco; ?></div>
                </div>

                <div class="item-info-card">
                    <div class="item-info-card-label">
                        <i class="fas fa-weight"></i>
                        Peso
                    </div>
                    <div class="item-info-card-value"><?php echo $peso; ?></div>
                </div>

                <div class="item-info-card">
                    <div class="item-info-card-label">
                        <i class="fas fa-hammer"></i>
                        Refinável
                    </div>
                    <div class="item-info-card-value">
                        <img src="<?php echo $refinavel; ?>" style="width: 30px;" alt="Refinável">
                    </div>
                </div>

                <div class="item-info-card">
                    <div class="item-info-card-label">
                        <i class="fas fa-box-open"></i>
                        Dropável
                    </div>
                    <div class="item-info-card-value">
                        <img src="<?php echo $dropar; ?>" style="width: 30px;" alt="Dropável">
                    </div>
                </div>

                <div class="item-info-card">
                    <div class="item-info-card-label">
                        <i class="fas fa-handshake"></i>
                        Negociável
                    </div>
                    <div class="item-info-card-value">
                        <img src="<?php echo $negociar; ?>" style="width: 30px;" alt="Negociável">
                    </div>
                </div>

                <div class="item-info-card">
                    <div class="item-info-card-label">
                        <i class="fas fa-store"></i>
                        Vendável
                    </div>
                    <div class="item-info-card-value">
                        <img src="<?php echo $vendido; ?>" style="width: 30px;" alt="Vendável">
                    </div>
                </div>

                <div class="item-info-card">
                    <div class="item-info-card-label">
                        <i class="fas fa-warehouse"></i>
                        Armazenável
                    </div>
                    <div class="item-info-card-value">
                        <img src="<?php echo $storage; ?>" style="width: 30px;" alt="Armazenável">
                    </div>
                </div>

                <div class="item-info-card">
                    <div class="item-info-card-label">
                        <i class="fas fa-users"></i>
                        Arm. Guild
                    </div>
                    <div class="item-info-card-value">
                        <img src="<?php echo $storageguild; ?>" style="width: 30px;" alt="Storage Guild">
                    </div>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <h3 class="tab-section-title">
            <i class="fas fa-file-alt"></i>
            Descrição
        </h3>

        <div class="item-description-container">
            <div class="item-description-text"><?php echo $textoFormatado; ?></div>
        </div>

        <!-- Obtained From Section -->
        <h3 class="tab-section-title">
            <i class="fas fa-dragon"></i>
            Obtido Em
        </h3>

        <?php if (!empty($itemget)): ?>
        <div class="item-obtained-container">
            <div class="monster-drops-grid">
                <?php foreach ($itemget as $monstro): ?>
                <a href="?to=vermonstro&id=<?php echo $monstro['id']; ?>" class="monster-drop-card">
                    <div class="monster-drop-icon">
                        <img src="<?php echo monsterImageIndex($monstro['id']); ?>" alt="<?php echo $monstro['nome']; ?>">
                    </div>
                    <div class="monster-drop-info">
                        <div class="monster-drop-name"><?php echo $monstro['nome']; ?></div>
                        <div class="monster-drop-rate"><?php echo number_format(($monstro['Taxa de drop'] / 100), 2); ?>%</div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php else: ?>
        <div class="empty-section">
            <i class="fas fa-box-open"></i>
            <p>Este item não é dropado por nenhum monstro.</p>
        </div>
        <?php endif; ?>
    </main>
</div>
