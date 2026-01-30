<div class="shop-container">
    <!-- Tabs Navigation -->
    <div class="shop-tabs">
        <a href="?to=comercio&type=vendedores" class="shop-tab <?php echo ($_GET['type'] == 'vendedores') ? 'active' : ''; ?>">
            <i class="fas fa-store"></i> Vendedores
        </a>
        <a href="?to=comercio&type=compradores" class="shop-tab <?php echo ($_GET['type'] == 'compradores') ? 'active' : ''; ?>">
            <i class="fas fa-shopping-cart"></i> Compradores
        </a>
    </div>

    <?php if($_GET['type'] == 'vendedores'):?>
    <!-- Vendedores Section -->
    <div class="shop-search-container">
        <form id="buscarItens" method="get" action="" class="shop-search-form">
            <input name="to" type="hidden" value="comercio" />
            <input name="type" type="hidden" value="vendedores" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" class="shop-search-input" placeholder="Buscar por ID ou Nome do Item" value="<?php if(isset($_GET['busca'])) echo htmlspecialchars($_GET['busca']);?>" />
            <button type="submit" class="shop-search-btn">
                <i class="fas fa-search"></i> Buscar
            </button>
            <button type="button" class="shop-action-btn" onclick="toggleFilters()">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <?php if(isset($_GET['busca']) || isset($_GET['filter'])): ?>
            <a href="?to=comercio&type=vendedores&page=1" class="shop-action-btn">
                <i class="fas fa-times"></i> Limpar
            </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Filters -->
    <form id="filterForm" method="get" action="">
        <div id="shopFilters" class="shop-filters">
            <input name="to" type="hidden" value="comercio" />
            <input name="type" type="hidden" value="vendedores" />
            <input name="page" type="hidden" value="1" />
            <?php foreach (itemType() as $key => $type): ?>
            <div class="shop-filter-item">
                <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo $key; ?>"
                       onclick="submitFormFilter(this)" <?php echo (isset($_GET['filter']) && $_GET['filter'] == $key) ? 'checked' : ''; ?>>
                <label for="tipo<?php echo $key; ?>"><?php echo itemTypeIcon($key) ?> <?php echo $type; ?></label>
            </div>
            <?php endforeach; ?>
        </div>
    </form>

    <?php if($vendedores):?>
    <!-- Shop List -->
    <div class="shop-list">
        <?php foreach ($paginated_vendedores as $vendedor): ?>
        <a href="?to=verloja&type=vendedores&id=<?php echo $vendedor['id']; ?>" class="shop-row">
            <span class="shop-row-name"><?php echo htmlspecialchars($vendedor['char_name']); ?></span>
            <span class="shop-row-title"><?php echo htmlspecialchars($vendedor['title']); ?></span>
            <span class="shop-row-location">
                <i class="fas fa-map-marker-alt"></i>
                <?php echo $vendedor['map']; ?> (<?php echo $vendedor['x']; ?>, <?php echo $vendedor['y']; ?>)
            </span>
            <span class="shop-view-btn">Ver Loja</span>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="shop-pagination">
        <a href="<?php echo $prev_page_url; ?>" class="shop-page-btn <?php if ($page <= 1) echo 'disabled'; ?>">
            <i class="fas fa-chevron-left"></i> Anterior
        </a>
        <span class="shop-page-info"><?php echo $page . ' / ' . $total_pages; ?></span>
        <a href="<?php echo $next_page_url; ?>" class="shop-page-btn <?php if ($page >= $total_pages) echo 'disabled'; ?>">
            Proxima <i class="fas fa-chevron-right"></i>
        </a>
    </div>

    <!-- Go to Page -->
    <div class="shop-pagination" style="margin-top: 10px;">
        <form id="page-form" onsubmit="goToPage(event)" style="display: flex; align-items: center; gap: 10px;">
            <label for="page-number" style="color: var(--text-secondary);">Ir para pagina:</label>
            <input type="number" id="page-number" name="page" class="shop-page-input" min="1" max="<?php echo $total_pages; ?>">
            <button type="submit" class="shop-search-btn">
                <i class="fas fa-arrow-right"></i> Ir
            </button>
        </form>
    </div>

    <?php else:?>
    <!-- Empty State -->
    <div class="shop-empty">
        <i class="fas fa-store-slash fa-4x"></i>
        <?php if(isset($_GET['busca']) || isset($_GET['filter'])):?>
        <h3>Nenhum vendedor encontrado</h3>
        <p>Tente buscar por outro termo ou <a href="?to=comercio&type=vendedores&page=1">limpar os filtros</a>.</p>
        <?php else:?>
        <h3>Nenhum vendedor online</h3>
        <p>No momento nao ha vendedores com lojas abertas.</p>
        <?php endif?>
    </div>
    <?php endif?>

    <?php elseif($_GET['type'] == 'compradores'):?>
    <!-- Compradores Section -->
    <div class="shop-search-container">
        <form id="buscarItens" method="get" action="" class="shop-search-form">
            <input name="to" type="hidden" value="comercio" />
            <input name="type" type="hidden" value="compradores" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" class="shop-search-input" placeholder="Buscar por ID ou Nome do Item" value="<?php if(isset($_GET['busca'])) echo htmlspecialchars($_GET['busca']);?>" />
            <button type="submit" class="shop-search-btn">
                <i class="fas fa-search"></i> Buscar
            </button>
            <button type="button" class="shop-action-btn" onclick="toggleFilters()">
                <i class="fas fa-filter"></i> Filtros
            </button>
            <?php if(isset($_GET['busca']) || isset($_GET['filter'])): ?>
            <a href="?to=comercio&type=compradores&page=1" class="shop-action-btn">
                <i class="fas fa-times"></i> Limpar
            </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Filters -->
    <form id="filterForm" method="get" action="">
        <div id="shopFilters" class="shop-filters">
            <input name="to" type="hidden" value="comercio" />
            <input name="type" type="hidden" value="compradores" />
            <input name="page" type="hidden" value="1" />
            <?php foreach (itemType() as $key => $type): ?>
            <div class="shop-filter-item">
                <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo $key; ?>"
                       onclick="submitFormFilter(this)" <?php echo (isset($_GET['filter']) && $_GET['filter'] == $key) ? 'checked' : ''; ?>>
                <label for="tipo<?php echo $key; ?>"><?php echo itemTypeIcon($key) ?> <?php echo $type; ?></label>
            </div>
            <?php endforeach; ?>
        </div>
    </form>

    <?php if($compradores):?>
    <!-- Shop List -->
    <div class="shop-list">
        <?php foreach ($paginated_compradores as $comprador): ?>
        <a href="?to=verloja&type=compradores&id=<?php echo $comprador['id']; ?>" class="shop-row">
            <span class="shop-row-name"><?php echo htmlspecialchars($comprador['char_name']); ?></span>
            <span class="shop-row-title"><?php echo htmlspecialchars($comprador['title']); ?></span>
            <span class="shop-row-location">
                <i class="fas fa-map-marker-alt"></i>
                <?php echo $comprador['map']; ?> (<?php echo $comprador['x']; ?>, <?php echo $comprador['y']; ?>)
            </span>
            <span class="shop-view-btn">Ver Loja</span>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="shop-pagination">
        <a href="<?php echo $prev_page_url; ?>" class="shop-page-btn <?php if ($page <= 1) echo 'disabled'; ?>">
            <i class="fas fa-chevron-left"></i> Anterior
        </a>
        <span class="shop-page-info"><?php echo $page . ' / ' . $total_pages; ?></span>
        <a href="<?php echo $next_page_url; ?>" class="shop-page-btn <?php if ($page >= $total_pages) echo 'disabled'; ?>">
            Proxima <i class="fas fa-chevron-right"></i>
        </a>
    </div>

    <!-- Go to Page -->
    <div class="shop-pagination" style="margin-top: 10px;">
        <form id="page-form" onsubmit="goToPage(event)" style="display: flex; align-items: center; gap: 10px;">
            <label for="page-number" style="color: var(--text-secondary);">Ir para pagina:</label>
            <input type="number" id="page-number" name="page" class="shop-page-input" min="1" max="<?php echo $total_pages; ?>">
            <button type="submit" class="shop-search-btn">
                <i class="fas fa-arrow-right"></i> Ir
            </button>
        </form>
    </div>

    <?php else:?>
    <!-- Empty State -->
    <div class="shop-empty">
        <i class="fas fa-store-slash fa-4x"></i>
        <?php if(isset($_GET['busca']) || isset($_GET['filter'])):?>
        <h3>Nenhum comprador encontrado</h3>
        <p>Tente buscar por outro termo ou <a href="?to=comercio&type=compradores&page=1">limpar os filtros</a>.</p>
        <?php else:?>
        <h3>Nenhum comprador online</h3>
        <p>No momento nao ha compradores com lojas abertas.</p>
        <?php endif?>
    </div>
    <?php endif?>

    <?php endif?>
</div>

<script type="text/javascript">
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

function toggleFilters() {
    const filters = document.getElementById('shopFilters');
    const button = document.querySelector('.shop-action-btn');

    if (!filters) return;

    if (filters.classList.contains('active')) {
        filters.classList.remove('active');
        if (button) button.classList.remove('active');
    } else {
        filters.classList.add('active');
        if (button) button.classList.add('active');
    }
}

let filterDebounceTimer = null;
function submitFormFilter(radio) {
    if (filterDebounceTimer) {
        clearTimeout(filterDebounceTimer);
    }

    filterDebounceTimer = setTimeout(function() {
        const form = document.getElementById('filterForm');
        const formData = new FormData(form);

        if (radio && radio.name) {
            formData.set(radio.name, radio.value);
        }

        const params = new URLSearchParams(formData).toString();
        const newUrl = `${window.location.pathname}?${params}`;
        window.location.href = newUrl;
    }, 300);
}

// Show filters if a filter is active
document.addEventListener('DOMContentLoaded', () => {
    <?php if(isset($_GET['filter'])): ?>
    const filters = document.getElementById('shopFilters');
    const button = document.querySelector('.shop-action-btn');
    if (filters) {
        filters.classList.add('active');
        if (button) button.classList.add('active');
    }
    <?php endif; ?>
});
</script>
