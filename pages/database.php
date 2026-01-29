<!-- ========================== DATABASE - MODERN LAYOUT ======================= -->
<style type="text/css">
/* Legacy styles for filter panel - keeping minimal inline CSS */
.filterdb {
    display: none;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 8px;
    margin-bottom: 20px;
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 20px;
}

.radio-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.radio-item:hover {
    background: rgba(79, 195, 247, 0.1);
}

.radio-item input[type="radio"] {
    appearance: none;
    -webkit-appearance: none;
    width: 16px;
    height: 16px;
    border: 2px solid var(--glass-border);
    border-radius: 50%;
    background: transparent;
    cursor: pointer;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.radio-item input[type="radio"]:checked {
    border-color: #ff9800;
    background: #ff9800;
}

.radio-item label {
    color: var(--text-secondary);
    font-size: 0.85rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* Legacy table styles for desktop fallback */
.database {
    display: none;
}

.database-mobile-cards {
    display: none;
}

/* Hide old navigation */
#filter_ranking {
    display: none;
}

/* Action buttons styling */
.db-action-btn {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: 8px;
    padding: 10px 16px;
    color: var(--text-secondary);
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    text-decoration: none;
}

.db-action-btn:hover {
    border-color: var(--accent-color);
    color: var(--accent-color);
    background: rgba(79, 195, 247, 0.1);
}

.db-action-btn.active {
    border-color: #ff9800;
    color: #ff9800;
    background: rgba(255, 152, 0, 0.1);
}

.db-actions {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

/* MVP badge */
.mvp-badge {
    color: #ff6b6b;
    font-weight: 700;
    font-size: 0.75rem;
    background: rgba(255, 107, 107, 0.2);
    padding: 2px 8px;
    border-radius: 4px;
    margin-left: 8px;
}
</style>

<?php
// Determine current type
$currentType = isset($_GET['type']) ? $_GET['type'] : 'inicio';
?>

<!-- Database Layout Container -->
<div class="db-layout">
    <!-- Sidebar Navigation -->
    <aside class="db-sidebar">
        <nav class="db-sidebar-nav">
            <a href="?to=database&type=inicio"
               class="db-sidebar-item <?php echo ($currentType == 'inicio' || !isset($_GET['type'])) ? 'active' : ''; ?>">
                <i class="fas fa-home"></i>
                <span>Início</span>
            </a>
            <a href="?to=database&type=monstros"
               class="db-sidebar-item <?php echo ($currentType == 'monstros') ? 'active' : ''; ?>">
                <i class="fas fa-dragon"></i>
                <span>Monstros</span>
            </a>
            <a href="?to=database&type=mapas"
               class="db-sidebar-item <?php echo ($currentType == 'mapas') ? 'active' : ''; ?>">
                <i class="fas fa-map"></i>
                <span>Mapas</span>
            </a>
            <a href="?to=database&type=equipamentos"
               class="db-sidebar-item <?php echo ($currentType == 'equipamentos') ? 'active' : ''; ?>">
                <i class="fas fa-shield-alt"></i>
                <span>Equipamentos</span>
            </a>
            <a href="?to=database&type=consumiveis"
               class="db-sidebar-item <?php echo ($currentType == 'consumiveis') ? 'active' : ''; ?>">
                <i class="fas fa-flask"></i>
                <span>Consumíveis</span>
            </a>
            <a href="?to=database&type=diversos"
               class="db-sidebar-item <?php echo ($currentType == 'diversos') ? 'active' : ''; ?>">
                <i class="fas fa-box"></i>
                <span>Itens Diversos</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="db-main-content">

<?php if ($currentType == 'inicio' || !isset($_GET['type'])): ?>
<!-- ========================== DATABASE HOME PAGE ======================= -->
        <div class="db-header">
            <h1 class="db-title">Database</h1>
        </div>

        <div class="db-home-grid">
            <a href="?to=database&type=monstros" class="db-home-card">
                <div class="db-home-card-header">
                    <div class="db-home-card-icon">
                        <i class="fas fa-dragon"></i>
                    </div>
                    <h3 class="db-home-card-title">Monstros</h3>
                </div>
                <p class="db-home-card-desc">Encontre informações detalhadas sobre todos os monstros de Midgard, incluindo HP, Elemento, Raça e Drops.</p>
                <div class="db-home-card-footer">
                    <span class="db-home-card-count">1.000+ MONSTROS</span>
                    <span class="db-home-card-link">Acessar <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>

            <a href="?to=database&type=mapas" class="db-home-card">
                <div class="db-home-card-header">
                    <div class="db-home-card-icon">
                        <i class="fas fa-map"></i>
                    </div>
                    <h3 class="db-home-card-title">Mapas</h3>
                </div>
                <p class="db-home-card-desc">Explore o mundo de Midgard. Veja informações detalhadas de cada mapa e os monstros que o habitam.</p>
                <div class="db-home-card-footer">
                    <span class="db-home-card-count">300+ MAPAS</span>
                    <span class="db-home-card-link">Acessar <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>

            <a href="?to=database&type=equipamentos" class="db-home-card">
                <div class="db-home-card-header">
                    <div class="db-home-card-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="db-home-card-title">Equipamentos</h3>
                </div>
                <p class="db-home-card-desc">Explore a vasta biblioteca de armas, armaduras e acessórios. Veja atributos, slots e quem pode equipar.</p>
                <div class="db-home-card-footer">
                    <span class="db-home-card-count">2.000+ ITENS</span>
                    <span class="db-home-card-link">Acessar <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>

            <a href="?to=database&type=consumiveis" class="db-home-card">
                <div class="db-home-card-header">
                    <div class="db-home-card-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3 class="db-home-card-title">Consumíveis</h3>
                </div>
                <p class="db-home-card-desc">Procure por poções, comidas e itens de suporte para otimizar suas aventuras e batalhas.</p>
                <div class="db-home-card-footer">
                    <span class="db-home-card-count">1500+ ITENS</span>
                    <span class="db-home-card-link">Acessar <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>

            <a href="?to=database&type=diversos" class="db-home-card">
                <div class="db-home-card-header">
                    <div class="db-home-card-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <h3 class="db-home-card-title">Itens Diversos</h3>
                </div>
                <p class="db-home-card-desc">Cartas, munições e ingredientes de criação. Tudo o que você precisa para evoluir seu personagem.</p>
                <div class="db-home-card-footer">
                    <span class="db-home-card-count">2.000+ ITENS</span>
                    <span class="db-home-card-link">Acessar <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>
        </div>

<?php elseif ($currentType == 'monstros'): ?>
<!-- ========================== MONSTROS LIST ======================= -->
        <div class="db-header">
            <h1 class="db-title">Monstros</h1>
            <div class="db-search-box">
                <form class="db-search-form" method="get" action="">
                    <input type="hidden" name="to" value="database">
                    <input type="hidden" name="type" value="monstros">
                    <input type="text" name="busca" class="db-search-input" placeholder="Nome ou ID do Monstro"
                           value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>">
                    <button type="submit" class="db-search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Pagination Top -->
        <?php if($monstros): ?>
        <div class="db-pagination">
            <a href="<?php echo $prev_page_url; ?>" class="db-page-arrow <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-left"></i>
            </a>
            <span class="db-page-info"><?php echo $page; ?> / <?php echo $total_pages; ?></span>
            <a href="<?php echo $next_page_url; ?>" class="db-page-arrow <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="db-actions">
            <button class="db-action-btn" onclick="toggleFilters()" id="filterToggleBtn">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <?php if(isset($_GET['busca']) || isset($_GET['filter'])): ?>
            <a href="?to=database&type=monstros&page=1" class="db-action-btn">
                <i class="fas fa-times"></i> Limpar
            </a>
            <?php endif; ?>
        </div>

        <!-- Filter Panel -->
        <form id="filterForm" method="get" action="">
            <div id="filter" class="filterdb">
                <input name="to" type="hidden" value="database">
                <input name="type" type="hidden" value="monstros">
                <input name="page" type="hidden" value="1">

                <?php foreach (sizeMonster() as $key => $size): ?>
                <?php if ($size !== 'N/A' && $key !== 'N/A'): ?>
                <div class="radio-item">
                    <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo $key; ?>"
                           onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
                    <label for="tipo<?php echo $key; ?>"><?php echo strtolower(sizeMonsterIcon($key))?> <?php echo $size; ?></label>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>

                <?php foreach (raceMonster() as $key => $race): ?>
                <?php if ($race !== 'N/A' && $key !== 'N/A'): ?>
                <div class="radio-item">
                    <input id="tiporace<?php echo $key; ?>" type="radio" name="filter" value="<?php echo $key; ?>"
                           onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
                    <label for="tiporace<?php echo $key; ?>"><?php echo strtolower(raceMonsterIcon($key))?> <?php echo $race; ?></label>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>

                <?php foreach (elementMonster() as $key => $element): ?>
                <?php if ($element !== 'N/A' && $key !== 'N/A'): ?>
                <div class="radio-item">
                    <input id="tipoelem<?php echo $key; ?>" type="radio" name="filter" value="<?php echo $key; ?>"
                           onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
                    <label for="tipoelem<?php echo $key; ?>"><?php echo strtolower(elementMonsterIcon($key))?> <?php echo $element; ?></label>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>

                <div class="radio-item">
                    <input id="tipomvp" type="radio" name="filter" value="mvp_exp"
                           onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == 'mvp_exp' ? 'checked' : ''; ?>>
                    <label for="tipomvp"><img src="assets/img/mvp.png" style="width:20px;" /> MVP</label>
                </div>
            </div>
        </form>

        <!-- Monster List -->
        <?php if($monstros): ?>
        <div class="db-list">
            <?php foreach ($paginated_monsters as $monstro): ?>
            <a href="?to=vermonstro&id=<?php echo $monstro['id']; ?>" class="db-list-row">
                <div class="db-row-sprite">
                    <img src="<?php echo monsterImageIndex($monstro['id']); ?>" alt="<?php echo $monstro['name_english']; ?>">
                </div>
                <span class="db-row-id">#<?php echo $monstro['id']; ?></span>
                <span class="db-row-name">
                    <?php echo $monstro['name_english']; ?>
                    <?php if($monstro['mvp_exp']): ?><span class="mvp-badge">MVP</span><?php endif; ?>
                </span>
                <span class="db-row-badge">Lv. <?php echo $monstro['level'] ?? '1'; ?></span>
                <span class="db-row-stat">
                    <i class="fas fa-heart" style="color: #ff6b6b;"></i>
                    <?php echo formatarNumero($monstro['hp']); ?>
                </span>
                <span class="db-row-stat">
                    <?php echo strtolower(elementMonsterIcon($monstro['element'])); ?>
                    <?php echo elementMonster()[$monstro['element']]; ?>
                </span>
                <span class="db-row-stat">
                    <?php echo strtolower(raceMonsterIcon($monstro['race'])); ?>
                    <?php echo raceMonster()[$monstro['race']]; ?>
                </span>
                <i class="fas fa-chevron-right db-row-arrow"></i>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- Pagination Bottom -->
        <div class="db-pagination" style="margin-top: 20px;">
            <a href="<?php echo $prev_page_url; ?>" class="db-page-arrow <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-left"></i>
            </a>
            <span class="db-page-info"><?php echo $page; ?> / <?php echo $total_pages; ?></span>
            <a href="<?php echo $next_page_url; ?>" class="db-page-arrow <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <?php else: ?>
        <div class="db-empty-state">
            <i class="fas fa-search"></i>
            <p>Nenhum monstro encontrado.</p>
            <a href="?to=database&type=monstros">Limpar filtros</a>
        </div>
        <?php endif; ?>

<?php elseif ($currentType == 'mapas'): ?>
<!-- ========================== MAPAS LIST ======================= -->
        <div class="db-header">
            <h1 class="db-title">Mapas</h1>
            <div class="db-search-box">
                <form class="db-search-form" method="get" action="">
                    <input type="hidden" name="to" value="database">
                    <input type="hidden" name="type" value="mapas">
                    <input type="text" name="busca" class="db-search-input" placeholder="Nome ou ID do Mapa"
                           value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>">
                    <button type="submit" class="db-search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Pagination Top -->
        <?php if($mapas): ?>
        <div class="db-pagination">
            <a href="<?php echo $prev_page_url; ?>" class="db-page-arrow <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-left"></i>
            </a>
            <span class="db-page-info"><?php echo $page; ?> / <?php echo $total_pages; ?></span>
            <a href="<?php echo $next_page_url; ?>" class="db-page-arrow <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="db-actions">
            <button class="db-action-btn" onclick="toggleFilters()" id="filterToggleBtn">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <?php if(isset($_GET['busca']) || isset($_GET['filter'])): ?>
            <a href="?to=database&type=mapas&page=1" class="db-action-btn">
                <i class="fas fa-times"></i> Limpar
            </a>
            <?php endif; ?>
        </div>

        <!-- Filter Panel -->
        <form id="filterForm" method="get" action="">
            <div id="filter" class="filterdb">
                <input name="to" type="hidden" value="database">
                <input name="type" type="hidden" value="mapas">
                <input name="page" type="hidden" value="1">

                <?php foreach (mapType() as $key => $type): ?>
                <div class="radio-item">
                    <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo $key; ?>"
                           onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
                    <label for="tipo<?php echo $key; ?>"><?php echo mapTypeIcon($key) ?> <?php echo $type; ?></label>
                </div>
                <?php endforeach; ?>
            </div>
        </form>

        <!-- Map List -->
        <?php if($mapas): ?>
        <div class="db-list">
            <?php foreach ($paginated_maps as $map): ?>
            <a href="?to=vermapa&mapa=<?php echo $map['map']; ?>" class="db-list-row">
                <div class="db-row-sprite">
                    <img src="<?php echo iconMapa($map['map'], 1) ?>" alt="<?php echo $map['map']; ?>">
                </div>
                <span class="db-row-id"><?php echo $map['map']; ?></span>
                <span class="db-row-name"><?php echo ($map['map_name']) ?: RECLASSIC::getMapName($map['map']); ?></span>
                <span class="db-row-badge"><?php echo mapType()[$map['type']] ?></span>
                <i class="fas fa-chevron-right db-row-arrow"></i>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- Pagination Bottom -->
        <div class="db-pagination" style="margin-top: 20px;">
            <a href="<?php echo $prev_page_url; ?>" class="db-page-arrow <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-left"></i>
            </a>
            <span class="db-page-info"><?php echo $page; ?> / <?php echo $total_pages; ?></span>
            <a href="<?php echo $next_page_url; ?>" class="db-page-arrow <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <?php else: ?>
        <div class="db-empty-state">
            <i class="fas fa-search"></i>
            <p>Nenhum mapa encontrado.</p>
            <a href="?to=database&type=mapas">Limpar filtros</a>
        </div>
        <?php endif; ?>

<?php elseif ($currentType == 'itens' || $currentType == 'equipamentos' || $currentType == 'consumiveis' || $currentType == 'diversos'): ?>
<!-- ========================== ITENS LIST ======================= -->
<?php
$pageTitle = 'Itens';
$pageIcon = 'fa-box';
if ($currentType == 'equipamentos') {
    $pageTitle = 'Equipamentos';
    $pageIcon = 'fa-shield-alt';
} elseif ($currentType == 'consumiveis') {
    $pageTitle = 'Consumíveis';
    $pageIcon = 'fa-flask';
} elseif ($currentType == 'diversos') {
    $pageTitle = 'Itens Diversos';
    $pageIcon = 'fa-box';
}
?>
        <div class="db-header">
            <h1 class="db-title"><?php echo $pageTitle; ?></h1>
            <div class="db-search-box">
                <form class="db-search-form" method="get" action="">
                    <input type="hidden" name="to" value="database">
                    <input type="hidden" name="type" value="<?php echo $currentType; ?>">
                    <input type="text" name="busca" class="db-search-input" placeholder="Nome ou ID do Item"
                           value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>">
                    <button type="submit" class="db-search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Pagination Top -->
        <?php if($itens): ?>
        <div class="db-pagination">
            <a href="<?php echo $prev_page_url; ?>" class="db-page-arrow <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-left"></i>
            </a>
            <span class="db-page-info"><?php echo $page; ?> / <?php echo $total_pages; ?></span>
            <a href="<?php echo $next_page_url; ?>" class="db-page-arrow <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <?php endif; ?>

        <!-- Action Buttons -->
        <div class="db-actions">
            <button class="db-action-btn" onclick="toggleFilters()" id="filterToggleBtn">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <?php if(isset($_GET['busca']) || isset($_GET['filter'])): ?>
            <a href="?to=database&type=<?php echo $currentType; ?>&page=1" class="db-action-btn">
                <i class="fas fa-times"></i> Limpar
            </a>
            <?php endif; ?>
        </div>

        <!-- Filter Panel -->
        <form id="filterForm" method="get" action="">
            <div id="filter" class="filterdb">
                <input name="to" type="hidden" value="database">
                <input name="type" type="hidden" value="<?php echo $currentType; ?>">
                <input name="page" type="hidden" value="1">

                <?php foreach (itemType() as $key => $type): ?>
                <div class="radio-item">
                    <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo $key; ?>"
                           onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
                    <label for="tipo<?php echo $key; ?>"><?php echo itemTypeIcon($key) ?> <?php echo $type; ?></label>
                </div>
                <?php endforeach; ?>
            </div>
        </form>

        <!-- Item List -->
        <?php if($itens): ?>
        <div class="db-list">
            <?php foreach ($paginated_items as $item): ?>
            <a href="?to=veritem&id=<?php echo $item['id']; ?>" class="db-list-row">
                <div class="db-row-sprite">
                    <img src="<?php echo iconImage($item['id']); ?>" alt="<?php echo $item['name_english']; ?>">
                </div>
                <span class="db-row-id">#<?php echo $item['id']; ?></span>
                <span class="db-row-name"><?php echo $item['name_english']; ?></span>
                <span class="db-row-badge"><?php echo itemType()[$item['type']]; ?></span>
                <span class="db-row-stat">
                    <i class="fas fa-coins" style="color: #ffd700;"></i>
                    <?php echo formatarNumero($item['price_buy']); ?>
                </span>
                <span class="db-row-stat">
                    <i class="fas fa-weight-hanging" style="color: #9e9e9e;"></i>
                    <?php echo $item['weight']; ?>
                </span>
                <i class="fas fa-chevron-right db-row-arrow"></i>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- Pagination Bottom -->
        <div class="db-pagination" style="margin-top: 20px;">
            <a href="<?php echo $prev_page_url; ?>" class="db-page-arrow <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-left"></i>
            </a>
            <span class="db-page-info"><?php echo $page; ?> / <?php echo $total_pages; ?></span>
            <a href="<?php echo $next_page_url; ?>" class="db-page-arrow <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <?php else: ?>
        <div class="db-empty-state">
            <i class="fas fa-search"></i>
            <p>Nenhum item encontrado.</p>
            <a href="?to=database&type=<?php echo $currentType; ?>">Limpar filtros</a>
        </div>
        <?php endif; ?>

<?php else: ?>
<!-- Redirect to home if invalid type -->
<?php
    header("Location: ?to=database&type=inicio");
    exit();
?>
<?php endif; ?>

    </main>
</div>

<script type="text/javascript">
// Toggle filter panel
function toggleFilters() {
    var filterdb = document.getElementById('filter');
    var button = document.getElementById('filterToggleBtn');

    if (filterdb.style.display === 'none' || filterdb.style.display === '') {
        filterdb.style.display = 'grid';
        button.classList.add('active');
    } else {
        filterdb.style.display = 'none';
        button.classList.remove('active');
    }
}

// Submit filter form
function submitFormFilter(radio) {
    const form = document.getElementById('filterForm');
    form.submit();
}

// Go to specific page
function goToPage(event) {
    event.preventDefault();
    const pageNumber = document.getElementById('page-number').value;
    if (pageNumber) {
        const currentUrl = new URL(window.location.href);
        const searchParams = new URLSearchParams(currentUrl.search);
        searchParams.set('page', pageNumber);
        currentUrl.search = searchParams.toString();
        window.location.href = currentUrl.toString();
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    // Check if there's an active filter and show the filter panel
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('filter')) {
        const filterPanel = document.getElementById('filter');
        const filterBtn = document.getElementById('filterToggleBtn');
        if (filterPanel) {
            filterPanel.style.display = 'grid';
        }
        if (filterBtn) {
            filterBtn.classList.add('active');
        }
    }
});
</script>
