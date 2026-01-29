<style type="text/css">

/* ========== DESKTOP STYLES (Original) ========== */

/* Título */
h6 {
  font-size: 1.25rem;
  color: black;
  margin-bottom: 1rem;
  text-align: center;
}

/* Center the commerce content */
.infoblocks {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

#filter_ranking {
  text-align: center;
  margin-bottom: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5px;
}

#filter_ranking a {
  color: #000;
  text-decoration: none;
}

/* Caixa de busca */
.search-box {
  float: right;
}

.search-box form {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.search-box input[type="submit"] {
  border: none;
  appearance: none;
  -webkit-appearance: none;
  background: none;
  background-image: url('assets/btn_search_out.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  cursor: pointer;
  width: 37px !important;
  height: 32px;
  text-indent: -9999px;
  transition: none;
}

.search-box input[type="submit"]:hover {
  background-image: url('assets/btn_search_over.png');
  transition: none;
}

.search-box input[type="submit"]:active {
  background-image: url('assets/btn_search_press.png');
  transition: none;
}

/* Filtro */
.filterdb {
  display: none;
  grid-template-columns: repeat(4, 1fr);
  gap: 0rem;
  margin-bottom: 20px;
}

.radio-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.radio-item input[type="radio"] {
  width: 12px;
  height: 12px;
  appearance: none;
  -webkit-appearance: none;
  background-image: url('assets/btn_radio_off.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  cursor: pointer;
}

.radio-item input[type="radio"]:checked {
  background-image: url('assets/btn_radio_on.png');
  pointer-events: none;
}

.radio-item label {
  margin-top: 10px;
  font-size: 1rem;
  color: black;
  cursor: pointer;
}

button.filter-button {
  appearance: none;
  transition: transform 0.3s ease;
  background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/btn_filter.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  background-position: center;
  color: transparent;
  width: 21px;
  height: 21px;
}

button.filter-button:hover {
  background-image: url('assets/btn_filter_a.png');
}

button.filter-button:active {
  background-image: url('assets/btn_filter_b.png');
}

button.reset-button {
  appearance: none;
  background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/reset-a.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  color: transparent;
  width: 50px;
  height: 21px;
}

button.reset-button:hover {
  background-image: url('assets/reset-b.png');
}

button.reset-button:active {
  background-image: url('assets/reset-c.png');
}

/* Tabela de itens */
.database {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 1rem;
  color: black;
}

.database th, .database td {
  padding: 0.5rem;
  border: 1px solid #ddd;
}

.database th {
  background-color: #e7e7e7;
  color: black;
}

.database tr:hover {
  background-color: #c1c1c1;
}

button.button-view {
  appearance: none;
  background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/btn_view.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  color: transparent;
  width: 42px;
  height: 20px;
}

button.button-view:hover {
  background-image: url('assets/btn_view_a.png');
}

button.button-view:active {
  background-image: url('assets/btn_view_b.png');
}

/* Rodapé da tabela */
.footer-table {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 1rem;
  gap: 1rem;
}

.footer-table a {
  padding: 0.5rem 1rem;
  text-decoration: none;
  border-radius: 5px;
  text-align: center;
}

#paginas {
  background-color: #ccc;
  padding: 10px;
}

button.btn-footer-anterior {
  appearance: none;
  background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/btn_anterior.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  color: black;
  width: 100px;
  height: 20px;
}

button.btn-footer-anterior:hover {
  background-image: url('assets/btn_anterior_a.png');
}

button.btn-footer-anterior:active {
  background-image: url('assets/btn_anterior_b.png');
}

button.btn-footer-proximo {
  appearance: none;
  background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/btn_proximo.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  color: black;
  width: 100px;
  height: 20px;
}

button.btn-footer-proximo:hover {
  background-image: url('assets/btn_proximo_a.png');
}

button.btn-footer-proximo:active {
  background-image: url('assets/btn_proximo_b.png');
}

button.btn-ir {
  appearance: none;
  background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/btn_ir.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  color: black;
  width: 42px;
  height: 20px;
}

button.btn-ir:hover {
  background-image: url('assets/btn_ir_a.png');
}

button.btn-ir:active {
  background-image: url('assets/btn_ir_b.png');
}

.disabled {
  color: black;
  pointer-events: none;
}

/* ========== MOBILE STYLES (Modern) ========== */
@media (max-width: 768px) {
  .infoblocks {
    width: auto;
    margin: 0;
    margin-top: 0;
    padding: 10px;
    padding-bottom: 100px;
  }

  h6 {
    padding: 15px;
    background: white;
    color: #333;
    font-family: 'Pixelify Sans', sans-serif;
    border-bottom: 1px solid #e0e0e0;
    margin: 0 0 15px 0;
  }

  #filter_ranking {
    display: flex;
    background-color: white;
    padding: 10px 15px;
    gap: 10px;
  }

  #filter_ranking a {
    flex: 1;
    text-align: center;
    padding: 12px 15px;
    background-color: #f5f5f5;
    border: 2px solid var(--primary-color);
    border-radius: 25px;
    color: var(--primary-color);
    font-family: 'Pixelify Sans', sans-serif;
    font-size: 0.9rem;
    font-weight: 600;
  }

  #filter_ranking a.disabled {
    background-color: var(--primary-color);
    color: white;
  }

  .search-box {
    float: none;
    width: 100%;
    padding: 15px;
    background-color: white;
  }

  .search-box form {
    display: flex;
    gap: 8px;
  }

  .search-box input[type="text"] {
    flex: 1;
    padding: 12px 15px;
    font-size: 16px;
    border: 2px solid var(--primary-color);
    border-radius: 25px;
    background-color: white;
  }

  .search-box input[type="submit"] {
    width: 90px !important;
    height: 44px !important;
    background-image: none !important;
    background: var(--primary-color) !important;
    border-radius: 25px;
    text-indent: 0 !important;
    color: white;
    font-family: 'Pixelify Sans', sans-serif;
    font-size: 0.9rem;
    font-weight: 700;
  }

  button.filter-button,
  button.reset-button {
    width: auto !important;
    height: 40px !important;
    background-image: none !important;
    border: 2px solid var(--primary-color);
    border-radius: 20px;
    padding: 0 20px;
    font-family: 'Pixelify Sans', sans-serif;
    font-size: 0.85rem;
    font-weight: 600;
    text-indent: 0 !important;
    color: var(--primary-color) !important;
    background-color: white !important;
  }

  button.reset-button {
    background: var(--primary-color) !important;
    color: white !important;
    border: none;
  }

  .filterdb {
    grid-template-columns: 1fr !important;
    gap: 8px !important;
    padding: 15px;
    background-color: white;
  }

  .radio-item {
    padding: 12px 15px;
    background-color: #f8f9fa;
    border-radius: 8px;
    border-left: 3px solid var(--primary-color);
  }

  .radio-item input[type="radio"] {
    width: 16px !important;
    height: 16px !important;
    appearance: auto !important;
    -webkit-appearance: auto !important;
    background-image: none !important;
    accent-color: var(--primary-color);
  }

  .radio-item label {
    margin-top: 0;
    color: #333;
  }

  .database {
    font-size: 12px;
  }

  .database th,
  .database td {
    padding: 8px 5px;
  }

  .database th {
    background-color: var(--primary-color);
    color: white;
  }

  button.button-view {
    width: auto !important;
    height: auto !important;
    padding: 8px 16px;
    background-image: none !important;
    background: var(--primary-color) !important;
    color: white !important;
    border-radius: 20px;
    font-family: 'Pixelify Sans', sans-serif;
    font-size: 12px;
    text-indent: 0 !important;
  }

  .footer-table {
    flex-wrap: wrap;
    padding: 15px;
    background-color: white;
    border-top: 1px solid #e0e0e0;
  }

  #paginas {
    padding: 10px 20px;
    background-color: #f5f5f5;
    border-radius: 25px;
    color: #333;
    font-weight: 600;
    font-family: 'Pixelify Sans', sans-serif;
    border: 2px solid var(--primary-color);
  }

  button.btn-footer-anterior,
  button.btn-footer-proximo {
    width: auto !important;
    height: auto !important;
    min-height: 44px;
    padding: 10px 25px;
    background-image: none !important;
    background: var(--primary-color) !important;
    color: white !important;
    border-radius: 25px;
    font-family: 'Pixelify Sans', sans-serif;
    font-size: 0.85rem;
    text-indent: 0 !important;
    font-weight: 700;
  }

  button.btn-ir {
    width: auto !important;
    height: auto !important;
    min-height: 44px;
    padding: 10px 20px;
    background-image: none !important;
    background: var(--primary-color) !important;
    color: white !important;
    border-radius: 25px;
    font-family: 'Pixelify Sans', sans-serif;
    font-size: 0.9rem;
    text-indent: 0 !important;
    font-weight: 700;
  }

  #page-form {
    padding: 15px;
    background-color: white;
    border-top: 1px solid #e0e0e0;
  }

  #page-form label {
    color: #333;
    font-family: 'Pixelify Sans', sans-serif;
  }

  #page-form input[type="number"] {
    padding: 12px 15px;
    border: 2px solid var(--primary-color);
    border-radius: 25px;
    text-align: center;
  }
}

</style>

<div class="infoblocks">
    <div id="filter_ranking">
        <a href="?to=comercio&type=vendedores">Vendedores</a> >
        <a href="?to=comercio&type=compradores">Compradores</a>
    </div>
    <?php if($_GET['type'] == 'vendedores'):?>
        <h6><?php echo $title?> </h6>

      <div class="search-box">
         <form id="buscarItens" method="get" action="">
            <input name="to" type="hidden" value="comercio" />
            <input name="type" type="hidden" value="vendedores" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" placeholder="Buscar ID ou Nome" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>" />
            <input type="submit" class="button-search-db" >
         </form>
      </div>
      <a href="javascript:toggleSearchForm()"><button class="filter-button">Filtros</button></a>
      <a href="?to=comercio&type=vendedores&page=1" id="reset-link">
      <button class="reset-button">Limpar</button>
      </a><br><br>
      <form id="filterForm" method="get" action="">
         <div id="filter" class="filterdb">
            <input name="to" type="hidden" value="comercio" />
            <input name="type" type="hidden" value="vendedores" />
            <input name="page" type="hidden" value="1" />
            <?php foreach (itemType() as $key => $type): ?>                
            <div class="radio-item">
               <?php if (isset($_GET['filter']) && $key == $_GET['filter']): ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
               <?php else: ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)">
               <?php endif ?>
               <label for="tipo<?php echo $key; ?>"><?php echo itemTypeIcon($key) ?> <?php echo $type; ?></label>
            </div>
            <?php endforeach; ?>
         </div>
      </form>     
      <?php if($vendedores):?>
      <table class="database">
         <tr  align="center">
            <th>Nome do Vendedor</th>
            <th>Moeda</th>
            <th>Nome da Loja</th>
            <th>Mapa</th>
            <th>Coordenada X</th>
            <th>Coordenada Y</th>
            <th>Gênero</th>
            <th>Ação</th>
         </tr>

         <?php foreach ($paginated_vendedores as $vendedor): ?>
         <tr align="center">
            <td><?php echo $vendedor['char_name']; ?></td>

            <td><img src="<?php echo iconImage($vendedor['extended_vending_item']); ?>"></td>
            <td><?php echo $vendedor['title']; ?></td>
            <td><?php echo $vendedor['map']; ?></td>
            <td><?php echo $vendedor['x']; ?></td>
            <td><?php echo $vendedor['y']; ?></td>
            <td><?php echo $vendedor['sex']; ?></td>
            <td><a href="?to=verloja&type=vendedores&id=<?php echo $vendedor['id']; ?>"  ><button class="button-view">Ver</button></a></td>
         </tr>
         <?php endforeach; ?>
      </table>
      <div class="footer-table">
         <a href="<?php echo $prev_page_url; ?>" align="center"<?php if ($page <= 1) echo 'class="disabled"'; ?>><button class="btn-footer-anterior">Anterior</button></a>
         <span id="paginas"><?php echo $page . ' de ' . $total_pages; ?></span>
         <a  href="<?php echo $next_page_url; ?>" align="center"<?php if ($page == $total_pages) echo 'class="disabled"'; ?>><button class="btn-footer-proximo">Próximo</button></a>
      </div>
   <br>
         <form id="page-form" onsubmit="goToPage(event)" style="justify-content: center;display: flex;">
            <label for="page-number" style=" margin-right: 10px;">Ir Para: </label>
            <input type="number" id="page-number" name="page"  min="1"max="<?php echo $total_pages; ?>">
            <button  type="submit" style=" margin-left: 10px;" class="btn-ir">Ir</button>
         </form>

      <?php else:?>
         <?php if(isset($_GET['busca']) || isset($_GET['filter'])):?>
           <br><br>
            <p>Nenhum vendedor encontrado. <a href="?to=comercio&type=vendedores&page=1">Voltar a lista de vendedores.</a></p>
         <?php else:?>
         <br><br>
         <p>Nenhum resultado encontrado.<a href="./"> Voltar ao Início</a></p>
         <?php endif?>
         <?php endif?>
    <?php elseif($_GET['type'] == 'compradores'):?>
 

        <h6><?php echo $title?> </h6>
        
      <div class="search-box">
         <form id="buscarItens" method="get" action="">
            <input name="to" type="hidden" value="comercio" />
            <input name="type" type="hidden" value="compradores" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" placeholder="Buscar ID ou Nome" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>" />
            <input type="submit" class="button-search-db" >
         </form>
      </div>
      <a href="javascript:toggleSearchForm()"><button class="filter-button">Filtros</button></a>
      <a href="?to=comercio&type=compradores&page=1" id="reset-link">
      <button class="reset-button">Limpar</button>
      </a><br><br>
      <form id="filterForm" method="get" action="">
         <div id="filter" class="filterdb">
            <input name="to" type="hidden" value="comercio" />
            <input name="type" type="hidden" value="compradores" />
            <input name="page" type="hidden" value="1" />
            <?php foreach (itemType() as $key => $type): ?>                
            <div class="radio-item">
               <?php if (isset($_GET['filter']) && $key == $_GET['filter']): ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
               <?php else: ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)">
               <?php endif ?>
               <label for="tipo<?php echo $key; ?>"><?php echo itemTypeIcon($key) ?> <?php echo $type; ?></label>
            </div>
            <?php endforeach; ?>
         </div>
      </form>     
      <?php if($compradores):?>
      <table class="database">
         <tr  align="center">
            <th>Nome do Comprador</th>
            <!--<th>Moeda</th>-->
            <th>Nome da Loja</th>
            <th>Mapa</th>
            <th>Coordenada X</th>
            <th>Coordenada Y</th>
            <th>Gênero</th>
            <th>Ação</th>
         </tr>

         <?php foreach ($paginated_compradores as $comprador): ?>
         <tr align="center">
            <td><?php echo $comprador['char_name']; ?></td>
            <!--<td><img src="<?php echo iconImage($comprador['extended_vending_item']); ?>"></td>-->
            <td><?php echo $comprador['title']; ?></td>
            <td><?php echo $comprador['map']; ?></td>
            <td><?php echo $comprador['x']; ?></td>
            <td><?php echo $comprador['y']; ?></td>
            <td><?php echo $comprador['sex']; ?></td>
            <td><a href="?to=verloja&type=compradores&id=<?php echo $comprador['id']; ?>"  ><button class="button-view">Ver</button></a></td>
         </tr>
         <?php endforeach; ?>
      </table>
      <div class="footer-table">
         <a href="<?php echo $prev_page_url; ?>" align="center"<?php if ($page <= 1) echo 'class="disabled"'; ?>><button class="btn-footer-anterior">Anterior</button></a>
         <span id="paginas"><?php echo $page . ' de ' . $total_pages; ?></span>
         <a  href="<?php echo $next_page_url; ?>" align="center"<?php if ($page == $total_pages) echo 'class="disabled"'; ?>><button class="btn-footer-proximo">Próximo</button></a>
      </div>
   <br>
         <form id="page-form" onsubmit="goToPage(event)" style="justify-content: center;display: flex;">
            <label for="page-number" style=" margin-right: 10px;">Ir Para: </label>
            <input type="number" id="page-number" name="page"  min="1"max="<?php echo $total_pages; ?>">
            <button  type="submit" style=" margin-left: 10px;" class="btn-ir">Ir</button>
         </form>

      <?php else:?>
         <?php if(isset($_GET['busca']) || isset($_GET['filter'])):?>
           <br><br>
            <p>Nenhum comprador encontrado. <a href="?to=comercio&type=compradores&page=1">Voltar a lista de compradores.</a></p>
         <?php else:?>
         <br><br>
         <p>Nenhum resultado encontrado.<a href="./"> Voltar ao Início</a></p>
         <?php endif?>
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


function toggleSearchForm() {
    const filterdb = document.querySelector('.filterdb');
    const button = document.querySelector('.filter-button');

    if (!filterdb || !button) return;

    const isHidden = filterdb.style.display === 'none' || !filterdb.style.display || getComputedStyle(filterdb).display === 'none';

    if (isHidden) {
        filterdb.style.display = 'grid';
        filterdb.style.maxHeight = '0';
        filterdb.style.opacity = '0';
        filterdb.style.transition = 'max-height 0.3s ease, opacity 0.3s ease';

        requestAnimationFrame(() => {
            filterdb.style.maxHeight = '1000px';
            filterdb.style.opacity = '1';
        });

        button.style.transition = 'transform 0.3s ease';
        button.style.transform = 'rotate(180deg)';
    } else {
        filterdb.style.maxHeight = '0';
        filterdb.style.opacity = '0';

        setTimeout(() => {
            filterdb.style.display = 'none';
        }, 300);

        button.style.transform = 'rotate(0deg)';
    }
}

function resetFilters() {
    const newUrl = '?to=comercio&type=<?php echo $_GET['type']; ?>&page=1';

    window.history.pushState(null, '', newUrl);

    // Cache selectors
    const currentContent = document.querySelector('.infoblocks');
    const currentPaginas = document.getElementById('paginas');
    const currentPrevLink = document.querySelector('.btn-footer-anterior')?.parentElement;
    const currentNextLink = document.querySelector('.btn-footer-proximo')?.parentElement;

    fetch(newUrl)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');

            // Batch DOM updates using requestAnimationFrame
            requestAnimationFrame(() => {
                const updatedContent = doc.querySelector('.infoblocks');
                if (currentContent && updatedContent) {
                    currentContent.innerHTML = updatedContent.innerHTML;
                }

                const updatedPaginas = doc.getElementById('paginas');
                if (currentPaginas && updatedPaginas) {
                    currentPaginas.innerHTML = updatedPaginas.innerHTML;
                }

                const updatedPrevLink = doc.querySelector('.btn-footer-anterior')?.parentElement;
                const updatedNextLink = doc.querySelector('.btn-footer-proximo')?.parentElement;

                if (currentPrevLink && updatedPrevLink) {
                    currentPrevLink.href = updatedPrevLink.href;
                    currentPrevLink.className = updatedPrevLink.className;
                }

                if (currentNextLink && updatedNextLink) {
                    currentNextLink.href = updatedNextLink.href;
                    currentNextLink.className = updatedNextLink.className;
                }

                disableResetButton();
            });
        })
        .catch(error => console.error('Error:', error));
}

    // Adiciona o evento ao link de reset
    document.getElementById('reset-link').addEventListener('click', function(event) {
        event.preventDefault(); 
        resetFilters(); 
    });


// Debounce helper function
let filterDebounceTimer = null;
function submitFormFilter(radio) {
    // Clear previous timer
    if (filterDebounceTimer) {
        clearTimeout(filterDebounceTimer);
    }

    // Debounce for 300ms
    filterDebounceTimer = setTimeout(function() {
        const form = document.getElementById('filterForm');
        const formData = new FormData(form);

        if (radio && radio.name) {
            formData.set(radio.name, radio.value);
        }

        const params = new URLSearchParams(formData).toString();
        const newUrl = `${window.location.pathname}?${params}`;
        window.history.pushState(null, '', newUrl);

        // Cache selectors
        const currentDatabase = document.querySelector('.database');
        const currentPaginas = document.getElementById('paginas');
        const currentPrevLink = document.querySelector('.btn-footer-anterior')?.parentElement;
        const currentNextLink = document.querySelector('.btn-footer-proximo')?.parentElement;

        fetch(newUrl)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, 'text/html');

                // Batch DOM updates using requestAnimationFrame
                requestAnimationFrame(() => {
                    const updatedContent = doc.querySelector('.database');
                    if (currentDatabase && updatedContent) {
                        currentDatabase.innerHTML = updatedContent.innerHTML;
                    }

                    const updatedPaginas = doc.getElementById('paginas');
                    if (currentPaginas && updatedPaginas) {
                        currentPaginas.innerHTML = updatedPaginas.innerHTML;
                    }

                    const updatedPrevLink = doc.querySelector('.btn-footer-anterior')?.parentElement;
                    const updatedNextLink = doc.querySelector('.btn-footer-proximo')?.parentElement;

                    if (currentPrevLink && updatedPrevLink) {
                        currentPrevLink.href = updatedPrevLink.href;
                        currentPrevLink.className = updatedPrevLink.className;
                    }

                    if (currentNextLink && updatedNextLink) {
                        currentNextLink.href = updatedNextLink.href;
                        currentNextLink.className = updatedNextLink.className;
                    }

                    enableResetButton();
                });
            })
            .catch(error => console.error('Error:', error));
    }, 300);
}


    
    function disableResetButton() {
        const resetLink = document.getElementById('reset-link');
        if (resetLink) {
            resetLink.classList.add('disabled');
        }
    }
    function enableResetButton() {
        const resetLink = document.getElementById('reset-link');
        if (resetLink) {
            resetLink.classList.remove('disabled');
        }
    }
    

</script>

<script>
// Função para obter o valor de um parâmetro da URL
function getUrlParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

// Função para aplicar a classe 'disabled' ao link ativo
function applyActiveLink() {
    const type = getUrlParam('type'); // Obtém o parâmetro 'type' da URL
    document.querySelectorAll('#filter_ranking a').forEach(link => {
        const linkType = new URL(link.href).searchParams.get('type'); // Obtém o 'type' de cada link
        if (linkType === type) {
            link.classList.add('disabled'); // Adiciona a classe 'disabled' ao link ativo
        } else {
            link.classList.remove('disabled'); // Remove a classe dos outros links
        }
    });
}

// Função para enviar a requisição e atualizar a classe 'infoblocks'
function submitFilter(link) {
    const newUrl = link.href;

    // Atualiza o histórico da URL no navegador
    window.history.pushState(null, '', newUrl);

    // Realiza a requisição para o servidor
    fetch(newUrl)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');

            // Atualiza a classe infoblocks
            const updatedContent = doc.querySelector('.infoblocks');
            const currentContent = document.querySelector('.infoblocks');
            if (currentContent && updatedContent) {
                currentContent.innerHTML = updatedContent.innerHTML;

                // Atualiza os links ativos
                applyActiveLink();
                applyFilterEvents();
            }
        })
        .catch(error => console.error('Erro ao buscar o conteúdo:', error));
}

// Adiciona eventos de clique aos links do filtro
function applyFilterEvents() {
    document.querySelectorAll('#filter_ranking a').forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault(); // Evita o comportamento padrão do link
            submitFilter(link); // Chama a função para atualização dinâmica
        });
    });
}
function applyFilterEvents() {
    // Adiciona o evento de clique aos links do filtro
    const filterLinks = document.querySelectorAll('#filter_ranking a');
    filterLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault(); // Evita o comportamento padrão do link
            submitFilter(link); // Chama a função de atualização
        });
    });
}

// Inicializa o comportamento ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    applyActiveLink(); // Aplica a classe 'disabled' ao link ativo com base na URL atual
    applyFilterEvents(); // Adiciona os eventos de clique
});

</script>