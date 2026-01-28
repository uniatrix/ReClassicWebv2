<style type="text/css">

/* Container principal */
.infoblocks {
  padding-bottom: 80px;
}

/* Título */
h6 {
  font-size: 1.25rem;
  color: #333;
  margin-bottom: 1rem;
  text-align: center;
  font-family: 'Pixelify Sans', sans-serif;
}

/* Tabs de navegação */
#filter_ranking {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

#filter_ranking a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 10px 25px;
  background-color: #f5f5f5;
  border: 2px solid var(--primary-color);
  border-radius: 25px;
  color: var(--primary-color);
  font-family: 'Pixelify Sans', sans-serif;
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s ease;
}

#filter_ranking a:hover {
  background-color: var(--primary-color);
  color: white;
}

#filter_ranking a.disabled {
  background-color: var(--primary-color);
  color: white;
  pointer-events: none;
}

/* Container de controles */
.controls-container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
  flex-wrap: wrap;
}

/* Caixa de busca */
.search-box {
  float: none;
  display: flex;
  align-items: center;
  gap: 10px;
}

.search-box form {
  display: flex;
  align-items: center;
  gap: 10px;
}

.search-box input[type="text"] {
  padding: 10px 15px;
  border: 2px solid var(--primary-color);
  border-radius: 25px;
  font-size: 14px;
  width: 200px;
  background-color: white;
}

.search-box input[type="submit"] {
  padding: 10px 20px;
  background: var(--primary-color);
  color: white;
  border: none;
  border-radius: 25px;
  font-family: 'Pixelify Sans', sans-serif;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s ease;
  text-indent: 0;
  width: auto !important;
  height: auto;
  background-image: none;
}

.search-box input[type="submit"]:hover {
  background: var(--secondary-color);
  transform: translateY(-2px);
  background-image: none;
}

/* Botões de ação modernos */
button.filter-button,
button.reset-button {
  padding: 10px 20px;
  border: none;
  border-radius: 25px;
  font-family: 'Pixelify Sans', sans-serif;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s ease;
  background-image: none;
  width: auto;
  height: auto;
  text-indent: 0;
  color: white;
}

button.filter-button {
  background: var(--primary-color);
}

button.filter-button:hover {
  background: var(--secondary-color);
  transform: translateY(-2px);
  background-image: none;
}

button.reset-button {
  background: #6c757d;
}

button.reset-button:hover {
  background: #5a6268;
  transform: translateY(-2px);
  background-image: none;
}

/* Filtro */
.filterdb {
  display: none;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
  margin-bottom: 20px;
  padding: 15px;
  background-color: #f8f9fa;
  border-radius: 10px;
}

.radio-item {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 12px;
  background-color: white;
  border-radius: 8px;
  border-left: 3px solid var(--primary-color);
}

.radio-item input[type="radio"] {
  width: 16px;
  height: 16px;
  accent-color: var(--primary-color);
  cursor: pointer;
  appearance: auto;
  -webkit-appearance: auto;
  background-image: none;
}

.radio-item label {
  margin-top: 0;
  font-size: 14px;
  color: #333;
  cursor: pointer;
}

/* Tabela */
.database {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 1rem;
  color: #333;
  background: white;
}

.database th,
.database td {
  padding: 12px 10px;
  border: 1px solid #e0e0e0;
}

.database th {
  background-color: var(--primary-color);
  color: white;
  font-family: 'Pixelify Sans', sans-serif;
  font-size: 14px;
}

.database tr:hover {
  background-color: rgba(52, 152, 219, 0.1);
}

/* Botão Visualizar */
button.button-view {
  padding: 8px 16px;
  background: var(--primary-color);
  color: white;
  border: none;
  border-radius: 20px;
  font-family: 'Pixelify Sans', sans-serif;
  font-size: 12px;
  cursor: pointer;
  transition: all 0.2s ease;
  background-image: none;
  width: auto;
  height: auto;
  text-indent: 0;
}

button.button-view:hover {
  background: var(--secondary-color);
  transform: translateY(-2px);
  background-image: none;
}

/* Rodapé da tabela / Paginação */
.footer-table {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 1rem;
  gap: 15px;
}

.footer-table a {
  text-decoration: none;
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
  padding: 10px 25px;
  background: var(--primary-color);
  color: white;
  border: none;
  border-radius: 25px;
  font-family: 'Pixelify Sans', sans-serif;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s ease;
  background-image: none;
  width: auto;
  height: auto;
}

button.btn-footer-anterior:hover,
button.btn-footer-proximo:hover {
  background: var(--secondary-color);
  transform: translateY(-2px);
  background-image: none;
}

.footer-table a.disabled button {
  background: #ccc;
  cursor: not-allowed;
}

/* Botão Ir */
button.btn-ir {
  padding: 10px 20px;
  background: var(--primary-color);
  color: white;
  border: none;
  border-radius: 25px;
  font-family: 'Pixelify Sans', sans-serif;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s ease;
  background-image: none;
  width: auto;
  height: auto;
}

button.btn-ir:hover {
  background: var(--secondary-color);
  transform: translateY(-2px);
  background-image: none;
}

#page-form {
  margin-top: 15px;
  padding: 15px;
  background-color: #f8f9fa;
  border-radius: 10px;
}

#page-form label {
  color: #333;
  font-family: 'Pixelify Sans', sans-serif;
}

#page-form input[type="number"] {
  padding: 8px 15px;
  border: 2px solid var(--primary-color);
  border-radius: 20px;
  width: 80px;
  text-align: center;
}

.disabled {
  color: #666;
  pointer-events: none;
}

@media (max-width: 768px) {
  .infoblocks {
    width: auto;
    margin: 0;
    margin-top: 0;
    padding: 10px;
    padding-bottom: 100px;
  }

  #filter_ranking {
    flex-wrap: wrap;
  }

  #filter_ranking a {
    flex: 1;
    min-width: 120px;
    padding: 10px 15px;
  }

  .search-box {
    width: 100%;
  }

  .search-box form {
    width: 100%;
    flex-wrap: wrap;
  }

  .search-box input[type="text"] {
    flex: 1;
    width: auto;
  }

  .filterdb {
    grid-template-columns: 1fr;
  }

  .database {
    font-size: 12px;
  }

  .database th,
  .database td {
    padding: 8px 5px;
  }

  .footer-table {
    flex-wrap: wrap;
  }

  button.btn-footer-anterior,
  button.btn-footer-proximo {
    flex: 1;
    min-width: 100px;
  }

  #page-form {
    text-align: center;
  }

  h6 {
    padding: 10px;
    background-color: #f5f5f5;
    border-radius: 8px;
    margin: 0 0 15px 0;
  }
}

</style>

<div class="infoblocks">
    <div id="filter_ranking">
        <a href="?to=comercio&type=vendedores">Vendedores</a>
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
            <td><a href="?to=verloja&type=vendedores&id=<?php echo $vendedor['id']; ?>"  ><button class="button-view">Ver Loja</button></a></td>
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
            <td><a href="?to=verloja&type=compradores&id=<?php echo $comprador['id']; ?>"  ><button class="button-view">Ver Loja</button></a></td>
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
    var filterdb = $('.filterdb');
    var button = $('.filter-button'); // Seletor do botão

    if (filterdb.is(':hidden')) {
        filterdb.css('display', 'grid').hide().slideToggle(300);
        button.css('transform', 'rotate(180deg)'); // Inverte o botão
    } else {
        filterdb.slideToggle(300, function() {
            filterdb.css('display', 'none'); 
        });
        button.css('transform', 'rotate(0deg)'); // Reverte o botão para a posição original
    }
}

function resetFilters() {
    const newUrl = '?to=comercio&type=<?php echo $_GET['type']; ?>&page=1'; 

    window.history.pushState(null, '', newUrl); 

    fetch(newUrl)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');

            // Atualiza o conteúdo da tabela
            const updatedContent = doc.querySelector('.infoblocks'); 
            const currentContent = document.querySelector('.infoblocks');
            if (currentContent && updatedContent) {
                currentContent.innerHTML = updatedContent.innerHTML; 
            }

            // Atualiza o texto de paginação
            const updatedPaginas = doc.getElementById('paginas');
            const currentPaginas = document.getElementById('paginas');
            if (currentPaginas && updatedPaginas) {
                currentPaginas.innerHTML = updatedPaginas.innerHTML;
            }

            // Atualiza os links dos botões de paginação
            const updatedPrevLink = doc.querySelector('.btn-footer-anterior').parentElement;
            const updatedNextLink = doc.querySelector('.btn-footer-proximo').parentElement;

            const currentPrevLink = document.querySelector('.btn-footer-anterior').parentElement;
            const currentNextLink = document.querySelector('.btn-footer-proximo').parentElement;

            if (currentPrevLink && updatedPrevLink) {
                currentPrevLink.href = updatedPrevLink.href;
                currentPrevLink.className = updatedPrevLink.className;
            }

            if (currentNextLink && updatedNextLink) {
                currentNextLink.href = updatedNextLink.href;
                currentNextLink.className = updatedNextLink.className;
            }

            disableResetButton(); // Desativa o botão de reset após resetar os filtros
        })
        .catch(error => console.error('Error:', error));
}

    // Adiciona o evento ao link de reset
    document.getElementById('reset-link').addEventListener('click', function(event) {
        event.preventDefault(); 
        resetFilters(); 
    });


function submitFormFilter(radio) {
    const form = document.getElementById('filterForm');
    const formData = new FormData(form);

    if (radio && radio.name) {
        formData.set(radio.name, radio.value); // Atualiza o valor do filtro
    }

    const params = new URLSearchParams(formData).toString();
    const newUrl = `${window.location.pathname}?${params}`;
    window.history.pushState(null, '', newUrl);

    // Realiza a requisição
    fetch(newUrl)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');

            // Atualiza a tabela
            const updatedContent = doc.querySelector('.database');
            const currentContent = document.querySelector('.database');
            if (currentContent && updatedContent) {
                currentContent.innerHTML = updatedContent.innerHTML;
            }

            // Atualiza o número de páginas
            const updatedPaginas = doc.getElementById('paginas');
            const currentPaginas = document.getElementById('paginas');
            if (currentPaginas && updatedPaginas) {
                currentPaginas.innerHTML = updatedPaginas.innerHTML;
            }


            const updatedPrevLink = doc.querySelector('.btn-footer-anterior').parentElement;
            const updatedNextLink = doc.querySelector('.btn-footer-proximo').parentElement;

            const currentPrevLink = document.querySelector('.btn-footer-anterior').parentElement;
            const currentNextLink = document.querySelector('.btn-footer-proximo').parentElement;

            if (currentPrevLink && updatedPrevLink) {
                currentPrevLink.href = updatedPrevLink.href;
                currentPrevLink.className = updatedPrevLink.className;
            }

            if (currentNextLink && updatedNextLink) {
                currentNextLink.href = updatedNextLink.href;
                currentNextLink.className = updatedNextLink.className;
            }

            enableResetButton();
        })
        .catch(error => console.error('Error:', error));
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