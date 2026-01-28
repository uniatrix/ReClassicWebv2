<style type="text/css">

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
  min-height: calc(100vh - 400px); /* Ensure content takes enough space to push footer down */
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

/* Container for search and filter buttons */
.controls-container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  margin-bottom: 20px;
}

/* Adjust search box position */
.search-box {
  float: none;
  display: inline-block;
}

/* Caixa de busca */
.search-box form {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}


/* Filtro */
.filterdb {
  display: none; /* Define um layout em grade */
  grid-template-columns: repeat(4, 1fr); 
  gap: 0rem; /* Espaçamento entre os itens */
  margin-bottom: 20px; /* Espaçamento inferior */
}

.search-box input[type="submit"] {
  border: none;
  appearance: none;
  -webkit-appearance: none;
  background: none; /* Remove qualquer fundo */
  background-image: url('assets/btn_search_out.png'); /* Defina a imagem */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  cursor: pointer;
  width: 37px !important;
  height: 32px;
  text-indent: -9999px; /* Move o texto para fora da tela */
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

.radio-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

button.reset-disabled{
   background-color: transparent;
  appearance: none;
  -webkit-appearance: none;
  background-image: url('assets/reset-b.png');
  background-repeat: no-repeat;
  pointer-events: none;
  border: none;
  padding: 0;
  text-indent: -9999px;
  width: 50px;  /* Defina uma largura */
  height: 21px; /* Defina uma altura */
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
  width: 21px;  /* Defina uma largura */
  height: 21px; /* Defina uma altura */
}

button.filter-button:hover {
transition: none;
outline: none;
transform: none; transition: transform 0.3s ease;
  background-image: url('assets/btn_filter_a.png');

}
button.filter-button:active {
   transition: none;
   outline: none;
   transform: none; transition: transform 0.3s ease;
  background-image: url('assets/btn_filter_b.png');

}
button.filter-button:focus {
   transition: none;
   outline: none;
   transform: none; transition: transform 0.3s ease;
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

  width: 50px;  /* Defina uma largura */
  height: 21px; /* Defina uma altura */
}
button.reset-button:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/reset-b.png');

}
button.reset-button:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/reset-c.png');

}
button.reset-button:focus {
   transition: none;
   outline: none;
   transform: none;
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

  width: 42px;  /* Defina uma largura */
  height: 20px; /* Defina uma altura */
}

button.btn-ir:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/btn_ir_a.png');

}
button.btn-ir:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_ir_b.png');

}
button.btn-ir:focus {
   transition: none;
   outline: none;
   transform: none;
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

  width: 100px;  /* Defina uma largura */
  height: 20px; /* Defina uma altura */
}

button.btn-footer-anterior:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/btn_anterior_a.png');

}
button.btn-footer-anterior:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_anterior_b.png');

}
button.btn-footer-anterior:focus {
   transition: none;
   outline: none;
   transform: none;
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

  width: 100px;  /* Defina uma largura */
  height: 20px; /* Defina uma altura */
}

button.btn-footer-proximo:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/btn_proximo_a.png');

}
button.btn-footer-proximo:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_proximo_b.png');

}
button.btn-footer-proximo:focus {
   transition: none;
   outline: none;
   transform: none;
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
  width: 12px; 
  height: 12px; 
  appearance: none; 
  -webkit-appearance: none; 
  background-image: url('assets/btn_radio_on.png'); 
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  pointer-events: none; 
}


.radio-item input[type="radio"]:checked + label {
  pointer-events: none; 
}

.radio-item label {
   margin-top: 10px;
  font-size: 1rem;
  color: black;
  cursor: pointer;
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

  width: 42px;  /* Defina uma largura */
  height: 20px; /* Defina uma altura */
}

button.button-view:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/btn_view_a.png');

}
button.button-view:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_view_b.png');

}
button.button-view:focus {
   transition: none;
   outline: none;
   transform: none;
}
.footer-table a.disable {
  pointer-events: none;
  opacity: 0.6;
}

/* Ir para página */

.disabled {
    color: black;
    pointer-events:none;
}
@media (max-width: 768px) {

    .btn-footer-anterior {
        width: 100%; 
    }
    .btn-footer-proximo {
        width: 100%; 
    }
    .btn-filter{
        width: 49.1%;
    }
    .database, #filterForm,.footer-table span#paginas {
        zoom: 0.30; 
    }    
    .infoblocks{
       width: auto;
       margin: 0;
       margin-top: 125px;
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
      <a href="javascript:toggleSearchForm()"><button class="filter-button"></button></a>
      <a href="?to=comercio&type=vendedores&page=1" id="reset-link">
      <button class="reset-button"></button>
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
         <a href="<?php echo $prev_page_url; ?>" align="center"<?php if ($page <= 1) echo 'class="disabled"'; ?>><button class="btn-footer-anterior" >Anterior</button></a>
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
      <a href="javascript:toggleSearchForm()"><button class="filter-button"></button></a>
      <a href="?to=comercio&type=compradores&page=1" id="reset-link">
      <button class="reset-button"></button>
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
         <a href="<?php echo $prev_page_url; ?>" align="center"<?php if ($page <= 1) echo 'class="disabled"'; ?>><button class="btn-footer-anterior" >Anterior</button></a>
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