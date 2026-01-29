<!-- ========================== MONSTER DETAILS - MODERN LAYOUT ======================= -->
<style type="text/css">
/* Monster Detail Page Styles */
.monster-header {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    padding: 30px;
    margin-bottom: 20px;
    display: flex;
    gap: 30px;
    align-items: flex-start;
}

.monster-sprite {
    flex-shrink: 0;
}

.monster-sprite img {
    max-width: 150px;
    filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.3));
}

.monster-info {
    flex: 1;
}

.monster-id {
    color: #ff9800;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.monster-type {
    color: var(--text-secondary);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.monster-name {
    font-family: 'Cinzel', serif;
    font-size: 2rem;
    color: var(--text-primary);
    margin: 10px 0 20px 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.monster-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.monster-badge {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.monster-badge-label {
    color: var(--text-secondary);
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.monster-badge-value {
    background: rgba(79, 195, 247, 0.15);
    border: 1px solid rgba(79, 195, 247, 0.3);
    padding: 8px 16px;
    border-radius: 8px;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Tabs Navigation */
.monster-tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
    overflow-x: auto;
}

.monster-tab {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    padding: 12px 24px;
    border-radius: 10px;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
    font-weight: 500;
}

.monster-tab:hover {
    border-color: var(--accent-color);
    color: var(--accent-color);
}

.monster-tab.active {
    background: linear-gradient(135deg, #ff9800, #ff6f00);
    border-color: #ff9800;
    color: white;
}

/* Tab Content */
.monster-tab-content {
    display: none;
}

.monster-tab-content.active {
    display: block;
}

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

/* Info Cards Container */
.info-cards-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 30px;
}

/* Info Cards Grid */
.info-cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.info-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 10px;
    padding: 15px;
    text-align: center;
}

.info-card-label {
    color: var(--text-secondary);
    font-size: 0.75rem;
    text-transform: uppercase;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.info-card-label i {
    font-size: 0.9rem;
}

.info-card-value {
    color: var(--text-primary);
    font-size: 1.2rem;
    font-weight: 700;
}

/* Attributes Radar Chart Container */
.attributes-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
}

.attributes-list {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 20px;
    list-style: none;
    padding: 0;
    margin: 0;
}

.attribute-item {
    text-align: center;
}

.attribute-label {
    color: var(--text-secondary);
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.attribute-value {
    background: rgba(79, 195, 247, 0.2);
    border: 1px solid rgba(79, 195, 247, 0.3);
    border-radius: 8px;
    padding: 10px;
    color: var(--accent-color);
    font-size: 1.3rem;
    font-weight: 700;
}

/* Element Grid */
.element-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;
}

.element-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 10px;
    padding: 20px 15px;
    text-align: center;
    transition: all 0.3s ease;
}

.element-card:hover {
    border-color: rgba(79, 195, 247, 0.4);
    transform: translateY(-3px);
}

.element-icon {
    font-size: 1.8rem;
    margin-bottom: 10px;
}

.element-name {
    color: var(--text-secondary);
    font-size: 0.8rem;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.element-value {
    font-size: 1.2rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.element-value.weak {
    color: #4caf50;
}

.element-value.resistant {
    color: #f44336;
}

.element-value.neutral {
    color: var(--text-secondary);
}

.weak-section, .resistant-section {
    margin-bottom: 30px;
}

.weak-section h4, .resistant-section h4 {
    color: var(--text-secondary);
    font-size: 0.9rem;
    text-transform: uppercase;
    margin-bottom: 15px;
}

.element-badges {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.element-badge {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    padding: 8px 16px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
}

.element-badge.weak {
    border-color: rgba(76, 175, 80, 0.5);
    color: #4caf50;
}

.element-badge.resistant {
    border-color: rgba(244, 67, 54, 0.5);
    color: #f44336;
}

/* Location Cards */
.location-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 15px;
}

.location-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 10px;
    padding: 20px;
    display: flex;
    gap: 15px;
    align-items: center;
    transition: all 0.3s ease;
    text-decoration: none;
}

.location-card:hover {
    border-color: rgba(79, 195, 247, 0.4);
    transform: translateX(5px);
}

.location-icon img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
}

.location-info {
    flex: 1;
}

.location-name {
    color: var(--text-primary);
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 8px;
}

.location-count {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #ff9800;
    font-size: 0.9rem;
    margin-bottom: 4px;
}

.location-respawn {
    display: flex;
    align-items: center;
    gap: 6px;
    color: var(--text-secondary);
    font-size: 0.85rem;
}

/* Drop Cards */
.drops-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 15px;
}

.drop-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    transition: all 0.3s ease;
    text-decoration: none;
}

.drop-card:hover {
    border-color: rgba(79, 195, 247, 0.4);
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.drop-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.drop-icon img {
    max-width: 100%;
    max-height: 100%;
}

.drop-name {
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 8px;
    min-height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.drop-rate {
    color: #ff9800;
    font-weight: 700;
    font-size: 0.95rem;
    margin-bottom: 5px;
}

.drop-multiplier {
    background: rgba(255, 152, 0, 0.2);
    border: 1px solid rgba(255, 152, 0, 0.3);
    border-radius: 12px;
    padding: 3px 10px;
    color: #ff9800;
    font-size: 0.75rem;
    display: inline-block;
}

.mvp-label {
    background: linear-gradient(135deg, #f44336, #e91e63);
    color: white;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 700;
    display: inline-block;
    margin-top: 5px;
}

/* Empty State */
.empty-section {
    text-align: center;
    padding: 60px 20px;
    color: var(--text-secondary);
}

.empty-section i {
    font-size: 3rem;
    opacity: 0.5;
    margin-bottom: 15px;
}

/* Mobile Responsiveness */
@media (max-width: 992px) {
    .info-cards-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .attributes-list {
        grid-template-columns: repeat(3, 1fr);
    }

    .element-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .monster-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .location-grid,
    .drops-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .monster-tabs {
        gap: 5px;
    }

    .monster-tab {
        padding: 10px 16px;
        font-size: 0.85rem;
    }

    .info-cards-grid {
        grid-template-columns: 1fr;
    }

    .attributes-list {
        grid-template-columns: repeat(2, 1fr);
    }

    .element-grid {
        grid-template-columns: 1fr;
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
            <a href="?to=database&type=monstros" class="db-sidebar-item active">
                <i class="fas fa-dragon"></i>
                <span>Monstros</span>
            </a>
            <a href="?to=database&type=mapas" class="db-sidebar-item">
                <i class="fas fa-map"></i>
                <span>Mapas</span>
            </a>
            <a href="?to=database&type=equipamentos" class="db-sidebar-item">
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
        <!-- Monster Header -->
        <div class="monster-header">
            <div class="monster-sprite">
                <img src="<?php echo monsterImageIndex($idmonstro); ?>" alt="<?php echo $nomeMonstro; ?>">
            </div>
            <div class="monster-info">
                <div class="monster-id">#<?php echo $idmonstro; ?></div>
                <h1 class="monster-name"><?php echo $nomeMonstro; ?></h1>

                <div class="monster-badges">
                    <div class="monster-badge">
                        <div class="monster-badge-label">Nível</div>
                        <div class="monster-badge-value">
                            <i class="fas fa-chevron-up"></i>
                            <?php echo $lvl; ?>
                        </div>
                    </div>
                    <div class="monster-badge">
                        <div class="monster-badge-label">HP</div>
                        <div class="monster-badge-value">
                            <i class="fas fa-heart" style="color: #f44336;"></i>
                            <?php echo formatarNumero($hp); ?>
                        </div>
                    </div>
                    <div class="monster-badge">
                        <div class="monster-badge-label">Tamanho</div>
                        <div class="monster-badge-value">
                            <?php echo strtolower(sizeMonsterIcon($size)); ?>
                            <?php echo sizeMonster()[$size]; ?>
                        </div>
                    </div>
                    <div class="monster-badge">
                        <div class="monster-badge-label">Raça</div>
                        <div class="monster-badge-value">
                            <?php echo strtolower(raceMonsterIcon($race)); ?>
                            <?php echo raceMonster()[$race]; ?>
                        </div>
                    </div>
                    <div class="monster-badge">
                        <div class="monster-badge-label">Propriedade</div>
                        <div class="monster-badge-value">
                            <?php echo strtolower(elementMonsterIcon($element)); ?>
                            <?php echo elementMonster()[$element]; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="monster-tabs">
            <div class="monster-tab active" onclick="showTab('info')">
                Informações
            </div>
            <div class="monster-tab" onclick="showTab('weakness')">
                Fraquezas
            </div>
            <div class="monster-tab" onclick="showTab('location')">
                Localização
            </div>
            <div class="monster-tab" onclick="showTab('drops')">
                Drops
            </div>
        </div>

        <!-- Tab: Informações -->
        <div class="monster-tab-content active" id="tab-info">
            <h3 class="tab-section-title">
                <i class="fas fa-info-circle"></i>
                Informações
            </h3>

            <div class="info-cards-container">
                <div class="info-cards-grid">
                <div class="info-card">
                    <div class="info-card-label">
                        <i class="fas fa-sword" style="color: #f44336;"></i>
                        Ataque
                    </div>
                    <div class="info-card-value"><?php echo $atkMin; ?> - <?php echo $atkMax; ?></div>
                </div>

                <div class="info-card">
                    <div class="info-card-label">
                        <i class="fas fa-shield-alt" style="color: #2196f3;"></i>
                        Defesa
                    </div>
                    <div class="info-card-value"><?php echo $def; ?></div>
                </div>

                <div class="info-card">
                    <div class="info-card-label">
                        <i class="fas fa-magic" style="color: #9c27b0;"></i>
                        Def. Mágica
                    </div>
                    <div class="info-card-value"><?php echo $defM; ?></div>
                </div>

                <div class="info-card">
                    <div class="info-card-label">
                        <i class="fas fa-running" style="color: #ff9800;"></i>
                        Velocidade
                    </div>
                    <div class="info-card-value"><?php echo $walkSpeed ?? 200; ?></div>
                </div>

                <div class="info-card">
                    <div class="info-card-label">
                        <i class="fas fa-crosshairs" style="color: #ff5722;"></i>
                        HIT 100%
                    </div>
                    <div class="info-card-value"><?php echo $hit ?? 'N/A'; ?></div>
                </div>

                <div class="info-card">
                    <div class="info-card-label">
                        <i class="fas fa-wind" style="color: #00bcd4;"></i>
                        Esquiva 95%
                    </div>
                    <div class="info-card-value"><?php echo $flee ?? 'N/A'; ?></div>
                </div>

                <div class="info-card">
                    <div class="info-card-label">
                        <i class="fas fa-star" style="color: #ffc107;"></i>
                        Base EXP (5x)
                    </div>
                    <div class="info-card-value"><?php echo formatarNumero($expBase * 5); ?></div>
                </div>

                <div class="info-card">
                    <div class="info-card-label">
                        <i class="fas fa-star-half-alt" style="color: #ff9800;"></i>
                        Job EXP (5x)
                    </div>
                    <div class="info-card-value"><?php echo formatarNumero($expJob * 5); ?></div>
                </div>
                </div>
            </div>

            <h3 class="tab-section-title">
                <i class="fas fa-chart-bar"></i>
                Atributos
            </h3>

            <div class="attributes-container">
                <ul class="attributes-list">
                    <li class="attribute-item">
                        <div class="attribute-label">Força</div>
                        <div class="attribute-value"><?php echo $str; ?></div>
                    </li>
                    <li class="attribute-item">
                        <div class="attribute-label">Agilidade</div>
                        <div class="attribute-value"><?php echo $agi; ?></div>
                    </li>
                    <li class="attribute-item">
                        <div class="attribute-label">Vitalidade</div>
                        <div class="attribute-value"><?php echo $vit; ?></div>
                    </li>
                    <li class="attribute-item">
                        <div class="attribute-label">Inteligência</div>
                        <div class="attribute-value"><?php echo $int; ?></div>
                    </li>
                    <li class="attribute-item">
                        <div class="attribute-label">Destreza</div>
                        <div class="attribute-value"><?php echo $dex; ?></div>
                    </li>
                    <li class="attribute-item">
                        <div class="attribute-label">Sorte</div>
                        <div class="attribute-value"><?php echo $luk; ?></div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tab: Fraquezas -->
        <div class="monster-tab-content" id="tab-weakness">
            <h3 class="tab-section-title">
                <i class="fas fa-snowflake"></i>
                Fraquezas e Eficácia
            </h3>

            <?php
            // Element resistances (placeholder - you'll need to add actual data)
            $elementResist = [
                'Neutro' => 100,
                'Água' => 100,
                'Terra' => 50,
                'Fogo' => 150,
                'Vento' => 50,
                'Veneno' => 125,
                'Sagrado' => 100,
                'Sombrio' => 100,
                'Fantasma' => 100,
                'Maldito' => 100
            ];

            $weak = [];
            $resistant = [];
            foreach ($elementResist as $elem => $resist) {
                if ($resist > 100) $weak[] = ['name' => $elem, 'value' => $resist];
                if ($resist < 100) $resistant[] = ['name' => $elem, 'value' => $resist];
            }
            ?>

            <?php if (!empty($weak)): ?>
            <div class="weak-section">
                <h4>Monstro é Fraco Contra:</h4>
                <div class="element-badges">
                    <?php foreach ($weak as $w): ?>
                    <div class="element-badge weak">
                        <i class="fas fa-fire"></i>
                        <?php echo $w['name']; ?>
                        <?php echo $w['value']; ?>%
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($resistant)): ?>
            <div class="resistant-section">
                <h4>Monstro é Resistente a:</h4>
                <div class="element-badges">
                    <?php foreach ($resistant as $r): ?>
                    <div class="element-badge resistant">
                        <i class="fas fa-mountain"></i>
                        <?php echo $r['name']; ?>
                        <?php echo $r['value']; ?>%
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="element-grid" style="margin-top: 30px;">
                <?php foreach ($elementResist as $elem => $resist): ?>
                <div class="element-card">
                    <div class="element-icon">
                        <?php if ($elem == 'Neutro'): ?>⚪<?php endif; ?>
                        <?php if ($elem == 'Água'): ?>💧<?php endif; ?>
                        <?php if ($elem == 'Terra'): ?>⛰️<?php endif; ?>
                        <?php if ($elem == 'Fogo'): ?>🔥<?php endif; ?>
                        <?php if ($elem == 'Vento'): ?>💨<?php endif; ?>
                        <?php if ($elem == 'Veneno'): ?>☠️<?php endif; ?>
                        <?php if ($elem == 'Sagrado'): ?>✨<?php endif; ?>
                        <?php if ($elem == 'Sombrio'): ?>🌑<?php endif; ?>
                        <?php if ($elem == 'Fantasma'): ?>👻<?php endif; ?>
                        <?php if ($elem == 'Maldito'): ?>💀<?php endif; ?>
                    </div>
                    <div class="element-name"><?php echo $elem; ?></div>
                    <div class="element-value <?php echo $resist > 100 ? 'weak' : ($resist < 100 ? 'resistant' : 'neutral'); ?>">
                        <?php echo $resist; ?>%
                        <?php if ($resist > 100): ?><i class="fas fa-arrow-up"></i><?php endif; ?>
                        <?php if ($resist < 100): ?><i class="fas fa-arrow-down"></i><?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Tab: Localização -->
        <div class="monster-tab-content" id="tab-location">
            <h3 class="tab-section-title">
                <i class="fas fa-map-marker-alt"></i>
                Localização
            </h3>

            <?php if (!empty($mapas)): ?>
            <div class="location-grid">
                <?php foreach ($mapas as $mapa): ?>
                <a href="?to=vermapa&mapa=<?php echo $mapa['mapname']; ?>" class="location-card">
                    <div class="location-icon">
                        <img src="<?php echo iconMapa($mapa['mapname'], 1); ?>" alt="<?php echo $mapa['mapname']; ?>">
                    </div>
                    <div class="location-info">
                        <div class="location-name"><?php echo $mapa['mapname']; ?></div>
                        <div class="location-count">
                            <i class="fas fa-dragon"></i>
                            <?php echo $mapa['num']; ?>
                        </div>
                        <div class="location-respawn">
                            <i class="fas fa-clock"></i>
                            <?php
                            $respawn = isset($mapa['mobtime']) && $mapa['mobtime'] > 0
                                ? gmdate("i\m ~ i\m s\s", $mapa['mobtime']/1000)
                                : 'Instantâneo';
                            echo $respawn;
                            ?>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="empty-section">
                <i class="fas fa-map-marked-alt"></i>
                <p>Nenhuma localização encontrada para este monstro.</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Tab: Drops -->
        <div class="monster-tab-content" id="tab-drops">
            <h3 class="tab-section-title">
                <i class="fas fa-gift"></i>
                Drops
            </h3>

            <?php if ($normal_drops || $mvp_drops): ?>
            <div class="drops-grid">
                <!-- MVP Drops -->
                <?php if (!empty($mvp_drops)): ?>
                    <?php foreach ($mvp_drops as $dropsMVP): ?>
                        <?php foreach ($dropsMVP['items'] as $key => $nomeItemMVP): ?>
                        <a href="?to=veritem&id=<?php echo $nomeItemMVP['id']; ?>" class="drop-card">
                            <div class="drop-icon">
                                <img src="<?php echo iconImage($nomeItemMVP['id']); ?>" alt="<?php echo $nomeItemMVP['name_english']; ?>">
                            </div>
                            <div class="drop-name"><?php echo $nomeItemMVP['name_english']; ?></div>
                            <div class="drop-rate"><?php echo number_format(min(100, $dropsMVP['rate'] / 100 * ($config['DropMVP'] / 100)), 2); ?>%</div>
                            <div class="drop-multiplier">5x</div>
                            <div class="mvp-label">MVP</div>
                        </a>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Normal Drops -->
                <?php if (!empty($normal_drops)): ?>
                    <?php foreach ($normal_drops as $dropsNormal): ?>
                        <?php foreach ($dropsNormal['items'] as $key => $nomeItemNormal): ?>
                        <a href="?to=veritem&id=<?php echo $nomeItemNormal['id']; ?>" class="drop-card">
                            <div class="drop-icon">
                                <img src="<?php echo iconImage($nomeItemNormal['id']); ?>" alt="<?php echo $nomeItemNormal['name_english']; ?>">
                            </div>
                            <div class="drop-name"><?php echo $nomeItemNormal['name_english']; ?></div>
                            <div class="drop-rate"><?php echo number_format(min(100, $dropsNormal['rate'] / 100 * ($config['DropNormal'] / 100)), 2); ?>%</div>
                            <div class="drop-multiplier">5x</div>
                        </a>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div class="empty-section">
                <i class="fas fa-box-open"></i>
                <p>Este monstro não possui drops.</p>
            </div>
            <?php endif; ?>
        </div>
    </main>
</div>

<script type="text/javascript">
function showTab(tabName) {
    // Hide all tabs
    document.querySelectorAll('.monster-tab-content').forEach(tab => {
        tab.classList.remove('active');
    });

    // Remove active from all tab buttons
    document.querySelectorAll('.monster-tab').forEach(btn => {
        btn.classList.remove('active');
    });

    // Show selected tab
    document.getElementById('tab-' + tabName).classList.add('active');

    // Set active button
    event.target.closest('.monster-tab').classList.add('active');
}
</script>
