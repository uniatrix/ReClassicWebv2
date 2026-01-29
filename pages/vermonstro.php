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
    height: 16px;
}

.monster-badge-value {
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
    background: linear-gradient(135deg, var(--accent-color), #0288d1);
    border-color: var(--accent-color);
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
    background: rgba(20, 30, 48, 0.6);
    border: 1px solid rgba(79, 195, 247, 0.15);
    border-radius: 10px;
    padding: 18px 15px;
    text-align: left;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.info-card-label {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
}

.info-card-label i {
    font-size: 0.85rem;
    opacity: 0.7;
}

.info-card-value {
    color: var(--text-primary);
    font-size: 1.4rem;
    font-weight: 700;
}

/* Attributes Radar Chart Container */
.attributes-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
}

/* Weakness Container */
.weakness-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
}

/* Location Container */
.location-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
}

/* Drops Container */
.drops-container {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 30px;
}

/* Empty Section Styling */
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

.attributes-radar-wrapper {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    gap: 40px;
    position: relative;
}

.attributes-values {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.attributes-values.left {
    align-items: flex-start;
}

.attributes-values.right {
    align-items: flex-end;
}

#radarChart {
    max-width: 280px;
    max-height: 280px;
    filter: drop-shadow(0 0 20px rgba(79, 195, 247, 0.3));
}

.attr-value-item {
    display: flex;
    flex-direction: column;
    gap: 5px;
    min-width: 200px;
}

.attr-value-item.left {
    text-align: left;
}

.attr-value-item.right {
    text-align: right;
}

.attr-label {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.7rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.attr-value {
    color: var(--text-primary);
    font-size: 1.8rem;
    font-weight: 700;
}

.attr-bar-container {
    width: 100%;
    height: 6px;
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid rgba(79, 195, 247, 0.15);
    border-radius: 3px;
    overflow: hidden;
    margin-top: 8px;
}

.attr-bar {
    height: 100%;
    background: linear-gradient(90deg, #4fc3f7, #2196f3);
    border-radius: 2px;
    transition: width 0.3s ease;
    box-shadow: 0 0 8px rgba(79, 195, 247, 0.4);
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
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.drop-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 10px;
    padding: 15px;
    transition: all 0.3s ease;
    text-decoration: none;
    color: white;
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    gap: 15px;
}

.drop-card:hover {
    border-color: var(--accent-color);
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(79, 195, 247, 0.2);
}

.drop-icon {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.drop-icon img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.drop-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    text-align: left;
}

.drop-name {
    color: var(--text-primary);
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 5px;
}

.drop-rate {
    color: #ff9800;
    font-weight: 700;
    font-size: 0.85rem;
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

.drop-slots-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(79, 195, 247, 0.15);
    border: 1px solid rgba(79, 195, 247, 0.4);
    color: var(--accent-color);
    font-size: 0.8rem;
    font-weight: 700;
    padding: 2px 6px;
    border-radius: 4px;
    margin-left: 6px;
    font-family: 'Montserrat', sans-serif;
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

    .attributes-radar-wrapper {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    #radarChart {
        max-width: 250px;
        max-height: 250px;
        justify-self: center;
    }

    .attributes-values {
        width: 100%;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .attributes-values.left,
    .attributes-values.right {
        align-items: flex-start;
    }

    .attr-value-item {
        min-width: 150px;
    }

    .attr-value-item.right {
        text-align: left;
    }

    .element-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .monster-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .monster-badges {
        justify-content: center;
    }

    .location-grid,
    .drops-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    /* Monster Header - Mobile */
    .monster-header {
        padding: 20px;
        gap: 15px;
    }

    .monster-sprite img {
        max-width: 100px;
    }

    .monster-name {
        font-size: 1.5rem;
        margin: 10px 0 15px 0;
    }

    .monster-id {
        font-size: 0.9rem;
    }

    /* Monster Badges - 3 column grid */
    .monster-badges {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        width: 100%;
    }

    .monster-badge {
        gap: 4px;
    }

    .monster-badge-label {
        font-size: 0.65rem;
    }

    .monster-badge-value {
        padding: 8px 10px;
        font-size: 0.85rem;
        height: 38px;
        gap: 4px;
    }

    /* Monster Tabs - Icons Only */
    .monster-tabs {
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 8px;
        gap: 8px;
        justify-content: center;
    }

    .monster-tab {
        padding: 14px 18px;
        min-width: 50px;
        min-height: 50px;
        justify-content: center;
        border-radius: 10px;
    }

    .monster-tab span {
        display: none;
    }

    .monster-tab i {
        font-size: 1.2rem;
    }

    .monster-tab.active {
        background: #ff9800;
        border-color: #ff9800;
    }

    /* Tab Section Titles */
    .tab-section-title {
        font-size: 1.1rem;
        margin-bottom: 15px;
    }

    /* Info Cards - 2 columns */
    .info-cards-container {
        padding: 20px;
    }

    .info-cards-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .info-card {
        padding: 14px 12px;
    }

    .info-card-label {
        font-size: 0.65rem;
    }

    .info-card-value {
        font-size: 1.2rem;
    }

    /* Attributes Section - Vertical Layout */
    .attributes-container {
        padding: 20px;
    }

    .attributes-radar-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 25px;
    }

    #radarChart {
        max-width: 220px;
        max-height: 220px;
        order: 1;
    }

    .attributes-values {
        width: 100%;
        flex-direction: column;
        gap: 15px;
        order: 2;
    }

    .attributes-values.left {
        order: 2;
    }

    .attributes-values.right {
        order: 3;
    }

    .attr-value-item {
        min-width: 100%;
    }

    .attr-value-item.left,
    .attr-value-item.right {
        text-align: left;
    }

    .attr-label {
        font-size: 0.65rem;
    }

    .attr-value {
        font-size: 1.4rem;
    }

    .attr-bar-container {
        height: 5px;
        margin-top: 6px;
    }

    /* Weakness Section */
    .weakness-container {
        padding: 20px;
    }

    .element-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .element-card {
        padding: 15px 10px;
    }

    .element-icon {
        font-size: 1.5rem;
        margin-bottom: 8px;
    }

    .element-name {
        font-size: 0.7rem;
    }

    .element-value {
        font-size: 1rem;
    }

    .element-badges {
        gap: 8px;
    }

    .element-badge {
        padding: 6px 12px;
        font-size: 0.8rem;
    }

    /* Location Section */
    .location-container {
        padding: 20px;
    }

    .location-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .location-card {
        padding: 15px;
        gap: 12px;
    }

    .location-icon img {
        width: 50px;
        height: 50px;
    }

    .location-name {
        font-size: 0.9rem;
    }

    .location-count,
    .location-respawn {
        font-size: 0.8rem;
    }

    /* Drops Section */
    .drops-container {
        padding: 20px;
    }

    .drops-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .drop-card {
        padding: 12px;
        gap: 12px;
    }

    .drop-icon {
        width: 35px;
        height: 35px;
    }

    .drop-name {
        font-size: 0.85rem;
    }

    .drop-rate {
        font-size: 0.8rem;
    }

    .mvp-label {
        font-size: 0.65rem;
        padding: 3px 8px;
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
                <i class="fas fa-info-circle"></i>
                <span>Informações</span>
            </div>
            <div class="monster-tab" onclick="showTab('weakness')">
                <i class="fas fa-snowflake"></i>
                <span>Fraquezas</span>
            </div>
            <div class="monster-tab" onclick="showTab('location')">
                <i class="fas fa-map-marker-alt"></i>
                <span>Localização</span>
            </div>
            <div class="monster-tab" onclick="showTab('drops')">
                <i class="fas fa-gift"></i>
                <span>Drops</span>
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
                <div class="attributes-radar-wrapper">
                    <!-- Left Attributes -->
                    <div class="attributes-values left">
                        <div class="attr-value-item left">
                            <div class="attr-label">FORÇA</div>
                            <div class="attr-value"><?php echo $str; ?></div>
                            <div class="attr-bar-container">
                                <div class="attr-bar" style="width: <?php echo min(100, ($str / 255) * 100); ?>%;"></div>
                            </div>
                        </div>
                        <div class="attr-value-item left">
                            <div class="attr-label">AGILIDADE</div>
                            <div class="attr-value"><?php echo $agi; ?></div>
                            <div class="attr-bar-container">
                                <div class="attr-bar" style="width: <?php echo min(100, ($agi / 255) * 100); ?>%;"></div>
                            </div>
                        </div>
                        <div class="attr-value-item left">
                            <div class="attr-label">VITALIDADE</div>
                            <div class="attr-value"><?php echo $vit; ?></div>
                            <div class="attr-bar-container">
                                <div class="attr-bar" style="width: <?php echo min(100, ($vit / 255) * 100); ?>%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Radar Chart -->
                    <canvas id="radarChart" width="600" height="600"></canvas>

                    <!-- Right Attributes -->
                    <div class="attributes-values right">
                        <div class="attr-value-item right">
                            <div class="attr-label">INTELIGÊNCIA</div>
                            <div class="attr-value"><?php echo $int; ?></div>
                            <div class="attr-bar-container">
                                <div class="attr-bar" style="width: <?php echo min(100, ($int / 255) * 100); ?>%;"></div>
                            </div>
                        </div>
                        <div class="attr-value-item right">
                            <div class="attr-label">DESTREZA</div>
                            <div class="attr-value"><?php echo $dex; ?></div>
                            <div class="attr-bar-container">
                                <div class="attr-bar" style="width: <?php echo min(100, ($dex / 255) * 100); ?>%;"></div>
                            </div>
                        </div>
                        <div class="attr-value-item right">
                            <div class="attr-label">SORTE</div>
                            <div class="attr-value"><?php echo $luk; ?></div>
                            <div class="attr-bar-container">
                                <div class="attr-bar" style="width: <?php echo min(100, ($luk / 255) * 100); ?>%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
            // Radar Chart for Monster Attributes
            (function() {
                const canvas = document.getElementById('radarChart');
                if (!canvas) return;

                const ctx = canvas.getContext('2d');
                const centerX = canvas.width / 2;
                const centerY = canvas.height / 2;
                const radius = 200;

                // Stats data
                const stats = {
                    labels: ['FOR', 'AGI', 'VIT', 'INT', 'DES', 'SOR'],
                    values: [<?php echo $str; ?>, <?php echo $agi; ?>, <?php echo $vit; ?>, <?php echo $int; ?>, <?php echo $dex; ?>, <?php echo $luk; ?>]
                };

                // Normalize values to 0-1 range (max stat is 255)
                const normalizedValues = stats.values.map(v => Math.min(v / 255, 1));

                // Clear canvas
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                // Draw background hexagon grid
                ctx.strokeStyle = 'rgba(255, 255, 255, 0.1)';
                ctx.lineWidth = 1;
                for (let i = 5; i > 0; i--) {
                    drawHexagon(ctx, centerX, centerY, (radius / 5) * i, false);
                }

                // Draw axes
                ctx.strokeStyle = 'rgba(255, 255, 255, 0.15)';
                ctx.lineWidth = 1;
                for (let i = 0; i < 6; i++) {
                    const angle = (Math.PI / 3) * i - Math.PI / 2;
                    const x = centerX + Math.cos(angle) * radius;
                    const y = centerY + Math.sin(angle) * radius;

                    ctx.beginPath();
                    ctx.moveTo(centerX, centerY);
                    ctx.lineTo(x, y);
                    ctx.stroke();
                }

                // Draw data polygon with glow
                const points = [];
                for (let i = 0; i < 6; i++) {
                    const angle = (Math.PI / 3) * i - Math.PI / 2;
                    const value = normalizedValues[i];
                    const x = centerX + Math.cos(angle) * radius * value;
                    const y = centerY + Math.sin(angle) * radius * value;
                    points.push({ x, y });
                }

                // Draw glow effect
                ctx.shadowBlur = 20;
                ctx.shadowColor = '#4fc3f7';

                // Fill
                ctx.fillStyle = 'rgba(79, 195, 247, 0.15)';
                ctx.beginPath();
                ctx.moveTo(points[0].x, points[0].y);
                for (let i = 1; i < points.length; i++) {
                    ctx.lineTo(points[i].x, points[i].y);
                }
                ctx.closePath();
                ctx.fill();

                // Stroke with stronger glow
                ctx.shadowBlur = 25;
                ctx.strokeStyle = '#4fc3f7';
                ctx.lineWidth = 2.5;
                ctx.beginPath();
                ctx.moveTo(points[0].x, points[0].y);
                for (let i = 1; i < points.length; i++) {
                    ctx.lineTo(points[i].x, points[i].y);
                }
                ctx.closePath();
                ctx.stroke();

                // Reset shadow
                ctx.shadowBlur = 0;

                // Draw points
                points.forEach(point => {
                    ctx.fillStyle = '#4fc3f7';
                    ctx.beginPath();
                    ctx.arc(point.x, point.y, 4, 0, Math.PI * 2);
                    ctx.fill();
                });

                // Draw labels
                ctx.fillStyle = 'rgba(255, 255, 255, 0.5)';
                ctx.font = '12px Montserrat';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';

                for (let i = 0; i < 6; i++) {
                    const angle = (Math.PI / 3) * i - Math.PI / 2;
                    const labelRadius = radius + 30;
                    const x = centerX + Math.cos(angle) * labelRadius;
                    const y = centerY + Math.sin(angle) * labelRadius;
                    ctx.fillText(stats.labels[i], x, y);
                }

                function drawHexagon(ctx, x, y, r, fill) {
                    ctx.beginPath();
                    for (let i = 0; i < 6; i++) {
                        const angle = (Math.PI / 3) * i - Math.PI / 2;
                        const px = x + Math.cos(angle) * r;
                        const py = y + Math.sin(angle) * r;
                        if (i === 0) {
                            ctx.moveTo(px, py);
                        } else {
                            ctx.lineTo(px, py);
                        }
                    }
                    ctx.closePath();
                    if (fill) {
                        ctx.fill();
                    } else {
                        ctx.stroke();
                    }
                }
            })();
            </script>
        </div>

        <!-- Tab: Fraquezas -->
        <div class="monster-tab-content" id="tab-weakness">
            <h3 class="tab-section-title">
                <i class="fas fa-snowflake"></i>
                Fraquezas e Eficácia
            </h3>

            <div class="weakness-container">
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
        </div>

        <!-- Tab: Localização -->
        <div class="monster-tab-content" id="tab-location">
            <h3 class="tab-section-title">
                <i class="fas fa-map-marker-alt"></i>
                Localização
            </h3>

            <?php if (!empty($mapas)): ?>
            <div class="location-container">
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
            <div class="drops-container">
                <div class="drops-grid">
                <!-- MVP Drops -->
                <?php if (!empty($mvp_drops)): ?>
                    <?php foreach ($mvp_drops as $dropsMVP): ?>
                        <?php foreach ($dropsMVP['items'] as $key => $nomeItemMVP): ?>
                        <a href="?to=veritem&id=<?php echo $nomeItemMVP['id']; ?>" class="drop-card">
                            <div class="drop-icon">
                                <img src="<?php echo iconImage($nomeItemMVP['id']); ?>" alt="<?php echo $nomeItemMVP['name_english']; ?>">
                            </div>
                            <div class="drop-info">
                                <div class="drop-name">
                                    <?php echo $nomeItemMVP['name_english']; ?>
                                    <?php if (isset($nomeItemMVP['slots']) && $nomeItemMVP['slots'] > 0): ?>
                                        <span class="drop-slots-badge">[<?php echo $nomeItemMVP['slots']; ?>]</span>
                                    <?php endif; ?>
                                </div>
                                <div class="drop-rate"><?php echo number_format(min(100, $dropsMVP['rate'] / 100 * ($config['DropMVP'] / 100)), 2); ?>%</div>
                                <div class="mvp-label">MVP</div>
                            </div>
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
                            <div class="drop-info">
                                <div class="drop-name">
                                    <?php echo $nomeItemNormal['name_english']; ?>
                                    <?php if (isset($nomeItemNormal['slots']) && $nomeItemNormal['slots'] > 0): ?>
                                        <span class="drop-slots-badge">[<?php echo $nomeItemNormal['slots']; ?>]</span>
                                    <?php endif; ?>
                                </div>
                                <div class="drop-rate"><?php echo number_format(min(100, $dropsNormal['rate'] / 100 * ($config['DropNormal'] / 100)), 2); ?>%</div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
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
// Cache tab elements for better performance
const tabCache = {
    contents: null,
    buttons: null,
    init: function() {
        if (!this.contents) {
            this.contents = document.querySelectorAll('.monster-tab-content');
            this.buttons = document.querySelectorAll('.monster-tab');
        }
    }
};

function showTab(tabName, clickedButton) {
    tabCache.init();

    // Remove active class from all tabs and buttons
    tabCache.contents.forEach(tab => tab.classList.remove('active'));
    tabCache.buttons.forEach(btn => btn.classList.remove('active'));

    // Show selected tab
    const targetTab = document.getElementById('tab-' + tabName);
    if (targetTab) {
        targetTab.classList.add('active');
    }

    // Set active button - use passed parameter instead of global event
    if (clickedButton) {
        const tabButton = clickedButton.closest('.monster-tab');
        if (tabButton) {
            tabButton.classList.add('active');
        }
    }
}

// Update tab button click handlers to pass the element
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.monster-tab').forEach(button => {
        button.addEventListener('click', function(e) {
            const tabName = this.getAttribute('onclick')?.match(/showTab\('(.+?)'/)?.[1];
            if (tabName) {
                e.preventDefault();
                showTab(tabName, this);
            }
        });
    });
});
</script>
