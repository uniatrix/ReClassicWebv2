<!-- ========================== DATABASE DE MONSTROS ======================= -->
<style type="text/css">

/* Título */
h6 {
  font-size: 1.25rem;
  color: black;
  margin-bottom: 1rem;
}

/* Caixa de busca */
.search-box {
float: right;
}

#paginas{
   background-color: #ccc;
   padding: 10px;
}
.search-box form {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}


/* Filtro */
.filterdb {
  display: none; /* Define um layout em grade */
  <?php if ($_GET['type'] == 'itens'):?>
  grid-template-columns: repeat(4, 1fr); /* Cria 4 colunas com tamanhos iguais */
  <?php elseif ($_GET['type'] == 'mapas'):?>
  grid-template-columns: repeat(4, 1fr); /* Cria 10 colunas com tamanhos iguais */
  <?php else:?>
  grid-template-columns: repeat(8, 1fr); /* Cria 8 colunas com tamanhos iguais */

  <?php endif?>
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

/* Center the database content */
.infoblocks {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
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
    /* Container sem padding lateral */
    .infoblocks{
       width: 100%;
       margin: 0;
       padding: 0;
       margin-top: 0;
    }

    /* Cabeçalho da database */
    h6 {
        font-size: 1.2rem;
        margin: 0;
        padding: 15px;
        background: white;
        color: #333;
        font-family: 'Pixelify Sans', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 1px solid #e0e0e0;
    }

    /* Barra de filtros e tabs */
    #filter_ranking {
        display: flex;
        background-color: white;
        padding: 10px 15px;
        gap: 10px;
        border-bottom: none;
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
        text-decoration: none;
        transition: all 0.2s ease;
    }

    #filter_ranking a.disabled {
        background-color: var(--primary-color);
        color: white;
    }

    /* Área de busca e filtros */
    .search-box {
        float: none;
        width: 100%;
        margin: 0;
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
        background-color: rgba(255, 255, 255, 0.95);
        color: #333;
        font-weight: 500;
    }

    .search-box input[type="text"]::placeholder {
        color: #999;
    }

    .search-box input[type="submit"] {
        width: 90px !important;
        height: 44px !important;
        flex-shrink: 0;
        background-image: none !important;
        background: linear-gradient(135deg, var(--primary-color) 0%, #2980b9 100%) !important;
        border-radius: 25px;
        text-indent: 0 !important;
        border: none;
        cursor: pointer;
        color: white;
        font-family: 'Pixelify Sans', sans-serif;
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
        transition: all 0.2s ease;
    }

    .search-box input[type="submit"]:active {
        transform: scale(0.95);
        box-shadow: 0 2px 6px rgba(52, 152, 219, 0.5);
    }

    /* Botões de filtro */
    .filter-button, .reset-button {
        width: auto !important;
        height: 40px !important;
        margin: 0 5px 0 0;
        background-image: none !important;
        border: 2px solid var(--primary-color);
        border-radius: 20px;
        padding: 0 20px;
        font-family: 'Pixelify Sans', sans-serif;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-indent: 0 !important;
        transition: all 0.2s ease;
    }

    .filter-button {
        color: var(--accent-color) !important;
        background-color: rgba(52, 152, 219, 0.1) !important;
    }

    .reset-button {
        background: linear-gradient(135deg, var(--primary-color) 0%, #2980b9 100%) !important;
        color: white !important;
        border: none;
    }

    .filter-button:active,
    .reset-button:active {
        transform: scale(0.95);
    }

    /* Área de filtros */
    .filterdb {
        grid-template-columns: 1fr !important;
        gap: 8px !important;
        padding: 15px;
        background-color: white;
        margin: 0;
        border-bottom: 1px solid #e0e0e0;
    }

    .radio-item {
        padding: 12px 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        border-left: 3px solid var(--primary-color);
        transition: all 0.2s ease;
    }

    .radio-item:active {
        background-color: rgba(52, 152, 219, 0.15);
        transform: scale(0.98);
    }

    .radio-item label {
        font-size: 0.95rem;
        margin-top: 0;
        color: #333;
        font-weight: 500;
    }

    .radio-item input[type="radio"]:checked + label {
        color: var(--primary-color);
        font-weight: 700;
    }

    /* ESCONDER TABELA DESKTOP NO MOBILE */
    .database {
        display: none;
    }

    /* CRIAR CARDS PARA MOBILE */
    .database-mobile-cards {
        display: block;
        padding: 10px;
        background-color: white;
    }

    .database-mobile-cards > a {
        transition: transform 0.2s ease;
    }

    .database-mobile-cards > a:active .database-card {
        transform: scale(0.97);
        box-shadow: 0 2px 10px rgba(52, 152, 219, 0.5);
    }

    .database-card {
        background: rgba(255, 255, 255, 0.98);
        border: none;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.2s ease;
        overflow: hidden;
        position: relative;
    }

    .database-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color) 0%, #2980b9 100%);
    }

    .database-card-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
    }

    .database-card-header img {
        width: 80px;
        height: 80px;
        object-fit: contain;
        filter: drop-shadow(0 2px 8px rgba(79, 195, 247, 0.3));
    }

    .database-card-title {
        width: 100%;
        text-align: center;
    }

    .database-card-title strong {
        display: block;
        font-size: 1.3rem;
        color: #333;
        font-family: 'Pixelify Sans', sans-serif;
        text-transform: uppercase;
        margin-bottom: 8px;
        letter-spacing: 1px;
    }

    .database-card-title .card-id {
        display: inline-block;
        font-size: 0.85rem;
        color: #666;
        background-color: rgba(52, 152, 219, 0.15);
        padding: 4px 12px;
        border-radius: 12px;
        font-weight: 600;
    }

    .database-card-body {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin: 15px 0;
        text-align: left;
    }

    .database-card-field {
        font-size: 0.95rem;
        color: #333;
        background-color: rgba(52, 152, 219, 0.08);
        padding: 10px;
        border-radius: 8px;
        border-left: 3px solid var(--primary-color);
    }

    .database-card-field-label {
        font-weight: 700;
        color: var(--primary-color);
        display: block;
        font-size: 0.7rem;
        text-transform: uppercase;
        margin-bottom: 4px;
        letter-spacing: 0.5px;
    }

    .database-card-footer {
        text-align: center;
        margin-top: 15px;
    }

    .database-card-footer .button-view {
        width: 100%;
        min-height: 44px;
        background-size: contain;
    }

    /* Card simplificado para itens */
    .database-card-simple {
        padding: 15px 20px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .database-card-simple:active {
        transform: scale(0.97);
        box-shadow: 0 2px 10px rgba(52, 152, 219, 0.5);
    }

    .database-card-simple .database-card-header {
        margin-bottom: 0;
        flex-direction: row;
        gap: 15px;
        text-align: left;
    }

    .database-card-simple .database-card-header img {
        width: 56px;
        height: 56px;
        flex-shrink: 0;
    }

    .database-card-simple .database-card-title {
        text-align: left;
    }

    .database-card-simple .database-card-title strong {
        color: #333;
        font-size: 1.1rem;
        text-transform: none;
    }

    .database-card-simple .database-card-title p {
        margin: 4px 0 0 0 !important;
        font-size: 0.85rem !important;
        color: #999 !important;
    }

    /* Paginação mobile */
    .footer-table {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin: 0;
        padding: 15px;
        background-color: white;
        border-top: 1px solid #e0e0e0;
    }

    .footer-table a {
        flex: 1;
    }

    .btn-footer-anterior,
    .btn-footer-proximo {
        width: 100% !important;
        min-height: 44px !important;
        background-image: none !important;
        background: linear-gradient(135deg, var(--primary-color) 0%, #2980b9 100%) !important;
        color: white !important;
        border: none;
        border-radius: 25px;
        font-family: 'Pixelify Sans', sans-serif;
        font-size: 0.85rem;
        text-indent: 0 !important;
        font-weight: 700;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        transition: all 0.2s ease;
    }

    .btn-footer-anterior:active,
    .btn-footer-proximo:active {
        transform: scale(0.95);
        box-shadow: 0 2px 6px rgba(52, 152, 219, 0.4);
    }

    .footer-table a.disabled .btn-footer-anterior,
    .footer-table a.disabled .btn-footer-proximo {
        background: #4a5568 !important;
        opacity: 0.5;
        box-shadow: none;
    }

    .footer-table span#paginas {
        font-size: 0.9rem;
        padding: 10px 20px;
        background-color: #f5f5f5;
        border-radius: 25px;
        color: #333;
        font-weight: 700;
        font-family: 'Pixelify Sans', sans-serif;
        border: 2px solid var(--primary-color);
        white-space: nowrap;
    }

    /* Formulário "Ir para página" */
    #page-form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin: 0;
        background-color: white;
        padding: 15px;
        border-top: 1px solid #e0e0e0;
    }

    #page-form label {
        width: 100%;
        text-align: center;
        color: #333;
        font-weight: 600;
        font-family: 'Pixelify Sans', sans-serif;
        font-size: 0.9rem;
    }

    #page-form input[type="number"] {
        width: 100%;
        padding: 12px 15px;
        font-size: 16px;
        border: 2px solid var(--primary-color);
        border-radius: 25px;
        text-align: center;
        font-weight: 600;
        background-color: rgba(255, 255, 255, 0.95);
        color: #333;
    }

    .btn-ir {
        width: 100% !important;
        min-height: 44px !important;
        background-image: none !important;
        background: linear-gradient(135deg, var(--primary-color) 0%, #2980b9 100%) !important;
        color: white !important;
        border: none;
        border-radius: 25px;
        font-family: 'Pixelify Sans', sans-serif;
        font-size: 0.9rem;
        text-indent: 0 !important;
        font-weight: 700;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
    }

    .btn-ir:active {
        transform: scale(0.95);
    }
 }

</style>

<div class="infoblocks">
    <div id="filter_ranking"> 
      <a href="?to=database&type=itens">Itens</a> >
      <a href="?to=database&type=monstros">Monstros</a>
      </div>
    <?php if (isset($_GET['type']) && ($_GET['type'] == 'monstros')):?>

      <h6><?php echo $title?> </h6>

      <div class="search-box">
         <form id="buscarItens" method="get" action="">
            <input name="to" type="hidden" value="database" />
            <input name="type" type="hidden" value="monstros" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" placeholder="Buscar ID ou Nome" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>" />
            <input type="submit" class="button-search-db" value="Buscar">
         </form>
      </div>
      <a href="javascript:toggleSearchForm()"><button class="filter-button">Filtros</button></a>
      <a href="?to=database&type=monstros&page=1" id="reset-link">
      <button class="reset-button">Limpar</button>
      </a><br><br>
      <form id="filterForm" method="get" action="">
         <div id="filter" class="filterdb">
            <input name="to" type="hidden" value="database" />
            <input name="type" type="hidden" value="monstros" />
            <input name="page" type="hidden" value="1" />
            <?php foreach (sizeMonster() as $key => $size): ?>
            <?php if ($size !== 'N/A' && $key !== 'N/A'): ?>
            <div class="radio-item">
               <?php if (isset($_GET['filter']) && $key == $_GET['filter']): ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
               <?php else: ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)">
               <?php endif ?>
               <label for="tipo<?php echo $key; ?>" ><?php echo strtolower(sizeMonsterIcon($key))?> <?php echo $size; ?></label>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach (raceMonster() as $key => $race): ?>
            <?php if ($race !== 'N/A' && $key !== 'N/A'): ?>
            <div class="radio-item">
               <?php if (isset($_GET['filter']) && $key == $_GET['filter']): ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
               <?php else: ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)">
               <?php endif ?>
               <label for="tipo<?php echo $key; ?>" ><?php echo strtolower(raceMonsterIcon($key))?> <?php echo $race; ?></label>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach (elementMonster() as $key => $element): ?>
            <?php if ($element !== 'N/A' && $key !== 'N/A'): ?>
            <div class="radio-item">
               <?php if (isset($_GET['filter']) && $key == $_GET['filter']): ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
               <?php else: ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)">
               <?php endif ?>
               <label for="tipo<?php echo $key; ?>" ><?php echo strtolower(elementMonsterIcon($key))?> <?php echo $element; ?></label>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <div class="radio-item">
               <?php if (isset($_GET['filter']) && $key == $_GET['filter']): ?>
               <input id="tipomvp" type="radio" name="filter" value="mvp_exp"onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
               <?php else: ?>
               <input id="tipomvp" type="radio" name="filter" value="mvp_exp"onclick="submitFormFilter(this)">
               <?php endif ?>
               <label for="tipomvp" style="display: flex; align-items: center;"><img src="assets/img/mvp.png" style="width:30px; margin-right: 5px;" /> MVP</label>
            </div>
         </div>
      </form>
      <?php if($monstros):?>
      <table class="database">
         <tr align="left">
            <th align="center">ID</th>
            <th colspan="2"align="center">Nome</th>
            <th>HP</th>
            <th>Tamanho</th>
            <th>Raça</th>
            <th>Elemento</th>
            <th align="center">Ação</th>
         </tr>
         <?php foreach ($paginated_monsters as $monstro): ?>
         <tr align="left">
            <td align="center"><?php echo $monstro['id']; ?></td>
            <td align="center"><img src="<?php echo monsterImageIndex($monstro['id']); ?>" 
               style=""></td>
            <?php if($monstro['mvp_exp']):?>
            <td><?php echo $monstro['name_english']; ?><font color="red"> MVP</font></td>
            <?php else:?>
            <td><?php echo $monstro['name_english']; ?></td>
            <?php endif?>
            <td>❤️ <?php echo formatarNumero($monstro['hp']); ?></td>
            <td><?php echo strtolower(sizeMonsterIcon($monstro['size']))?> <?php echo sizeMonster()[$monstro['size']]; ?></td>
            <td><?php echo strtolower(raceMonsterIcon($monstro['race']))?> <?php echo raceMonster()[$monstro['race']]; ?></td>
            <td><?php echo strtolower(elementMonsterIcon($monstro['element']))?> <?php echo elementMonster()[$monstro['element']]; ?></td>
            <td align="center"><a href="?to=vermonstro&id=<?php echo $monstro['id']; ?>" ><button class="button-view">Visualizar</button></a></td>
         </tr>
         <?php endforeach; ?>
      </table>

      <!-- CARDS MOBILE PARA MONSTROS -->
      <div class="database-mobile-cards">
         <?php foreach ($paginated_monsters as $monstro): ?>
         <a href="?to=vermonstro&id=<?php echo $monstro['id']; ?>" style="text-decoration: none; display: block;">
            <div class="database-card">
               <div class="database-card-header">
                  <img src="<?php echo monsterImageIndex($monstro['id']); ?>" alt="<?php echo $monstro['name_english']; ?>">
                  <div class="database-card-title">
                     <strong>
                        <?php echo $monstro['name_english']; ?>
                        <?php if($monstro['mvp_exp']): ?><span style="color: #ff6b6b; font-weight: 800;"> MVP</span><?php endif; ?>
                     </strong>
                     <span class="card-id">ID: <?php echo $monstro['id']; ?></span>
                  </div>
               </div>
               <div class="database-card-body">
                  <div class="database-card-field">
                     <span class="database-card-field-label">HP</span>
                     ❤️ <?php echo formatarNumero($monstro['hp']); ?>
                  </div>
                  <div class="database-card-field">
                     <span class="database-card-field-label">Tamanho</span>
                     <?php echo strtolower(sizeMonsterIcon($monstro['size']))?> <?php echo sizeMonster()[$monstro['size']]; ?>
                  </div>
                  <div class="database-card-field">
                     <span class="database-card-field-label">Raça</span>
                     <?php echo strtolower(raceMonsterIcon($monstro['race']))?> <?php echo raceMonster()[$monstro['race']]; ?>
                  </div>
                  <div class="database-card-field">
                     <span class="database-card-field-label">Elemento</span>
                     <?php echo strtolower(elementMonsterIcon($monstro['element']))?> <?php echo elementMonster()[$monstro['element']]; ?>
                  </div>
               </div>
            </div>
         </a>
         <?php endforeach; ?>
      </div>

      <div class="footer-table">
         <a href="<?php echo $prev_page_url; ?>" align="center"<?php if ($page <= 1) echo 'class="disabled"'; ?>><button class="btn-footer-anterior " >Anterior</button></a>
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
            <p>Nenhum resultado encontrado. <a href="?to=database&type=monstros&page=1">Voltar a database de monstros.</a></p>
         <?php else:?>
         <br><br>
         <p>Nenhum resultado encontrado<a href="?to=inicio"> Voltar ao Início</a></p>
         <?php endif?>
      <?php endif?>

<!-- ========================== DATABASE DE ITENS ======================= -->
<?php elseif (isset($_GET['type']) && ($_GET['type'] == 'itens')):?>

      <h6><?php echo $title?> </h6>

      <div class="search-box">
         <form id="buscarItens" method="get" action="">
            <input name="to" type="hidden" value="database" />
            <input name="type" type="hidden" value="itens" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" placeholder="Buscar ID ou Nome" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>" />
            <input type="submit" class="button-search-db" value="Buscar">
         </form>
      </div>
      <a href="javascript:toggleSearchForm()"><button class="filter-button">Filtros</button></a>
      <a href="?to=database&type=itens&page=1" id="reset-link">
      <button class="reset-button">Limpar</button>
      </a><br><br>
      <form id="filterForm" method="get" action="">
         <div id="filter" class="filterdb">
            <input name="to" type="hidden" value="database" />
            <input name="type" type="hidden" value="itens" />
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
      <?php if($itens):?>
      <table class="database">
         <tr align="left">
            <th align="center">ID</th>
            <th colspan="2"align="center">Nome</th>
            <th>Tipo</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Peso</th>
            <th align="center">Ação</th>
         </tr>
         <?php foreach ($paginated_items as $item): ?>
         <tr align="left">
            <td align="center"><?php echo $item['id']; ?></td>
            <td width="24"><img src="<?php echo iconImage($item['id']); ?>" /></td>
            <td align="left"><?php echo $item['name_english']; ?></td>
            <td><?php echo itemTypeIcon($item['type']) ?> <?php echo itemType()[$item['type']]; ?></td>
            <?php if ($item['type'] == 'weapon' || $item['type'] == 'ammo'): ?>
            <td><?php echo itemSubTypeIcon($item['type'],$item['subtype'])?> <?php echo itemSubType($item['type'])[$item['subtype']]; ?></td>
            <?php elseif(($item['type'] == 'card') && strtolower($item['subtype']) == 'enchant'): ?>
            <td><?php echo itemSubTypeIcon('card', 'enchant')?> Encantamento</td>
            <?php elseif(($item['type'] == 'card')  && strtolower($item['subtype']) != 'enchant'): ?>
            <td><img src="<?php echo iconImage($item['id']); ?>"width="24px" /> Carta</td>
            <?php else: ?>
            <td><?php echo itemSubTypeIcon($item['type'],$item['subtype'])?><?php echo itemSubType($item['type'])[$item['subtype']]; ?></td>
            <?php endif ?>
            <td><span style="font-size: 24px;">💸</span> <?php echo $item['price_buy']; ?></td>
            <td><span style="font-size: 24px;">⚖️</span> <?php echo $item['weight']; ?></td>
            <td align="center"><a href="?to=veritem&id=<?php echo $item['id']; ?>" ><button class="button-view">Visualizar</button></a></td>
         </tr>
         <?php endforeach; ?>
      </table>

      <!-- CARDS MOBILE PARA ITENS -->
      <div class="database-mobile-cards">
         <?php foreach ($paginated_items as $item): ?>
         <a href="?to=veritem&id=<?php echo $item['id']; ?>" style="text-decoration: none; display: block;">
            <div class="database-card database-card-simple">
               <div class="database-card-header">
                  <img src="<?php echo iconImage($item['id']); ?>" alt="<?php echo $item['name_english']; ?>">
                  <div class="database-card-title">
                     <strong><?php echo $item['name_english']; ?></strong>
                     <p style="margin: 8px 0 0 0; font-size: 0.9rem; color: #666;">
                        <?php echo itemType()[$item['type']]; ?>
                     </p>
                  </div>
               </div>
            </div>
         </a>
         <?php endforeach; ?>
      </div>

      <div class="footer-table">
         <a href="<?php echo $prev_page_url; ?>" align="center"<?php if ($page <= 1) echo 'class="disabled"'; ?>><button class="btn-footer-anterior " >Anterior</button></a>
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
            <p>Nenhum resultado encontrado. <a href="?to=database&type=monstros&page=1">Voltar a database de monstros.</a></p>
         <?php else:?>
         <br><br>
         <p>Nenhum resultado encontrado<a href="?to=inicio"> Voltar ao Início</a></p>
         <?php endif?>
      <?php endif?>
<!-- ========================== DATABASE DE MAPAS ======================= -->
<?php elseif (isset($_GET['type']) && ($_GET['type'] == 'mapas')):?>

      <h6><?php echo $title?> </h6>

      <div class="search-box">
         <form id="buscarItens" method="get" action="">
            <input name="to" type="hidden" value="database" />
            <input name="type" type="hidden" value="mapas" />
            <input name="page" type="hidden" value="1" />
            <input name="busca" type="text" placeholder="Buscar ID ou Nome" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>" />
            <input type="submit" class="button-search-db" value="Buscar">
         </form>
      </div>
      <a href="javascript:toggleSearchForm()"><button class="filter-button">Filtros</button></a>
      <a href="?to=database&type=mapas&page=1" id="reset-link">
      <button class="reset-button">Limpar</button>
      </a><br><br>
      <form id="filterForm" method="get" action="">
         <div id="filter" class="filterdb">
            <input name="to" type="hidden" value="database" />
            <input name="type" type="hidden" value="mapas" />
            <input name="page" type="hidden" value="1" />
            <?php foreach (mapType() as $key => $type): ?>                
            <div class="radio-item">
               <?php if (isset($_GET['filter']) && $key == $_GET['filter']): ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)" <?php echo isset($_GET['filter']) && $_GET['filter'] == $key ? 'checked' : ''; ?>>
               <?php else: ?>
               <input id="tipo<?php echo $key; ?>" type="radio" name="filter" value="<?php echo$key; ?>"onclick="submitFormFilter(this)">
               <?php endif ?>
               <label for="tipo<?php echo $key; ?>"><?php echo mapTypeIcon($key) ?> <?php echo $type; ?></label>
            </div>
            <?php endforeach; ?>
         </div>
      </form>
      <?php if($mapas):?>
      <table class="database">
         <tr align="left">
            <th align="center" colspan="2">Mapa</th>
            <th align="center" >Nome</th>
            <th align="center" >Tipo</th>
            <th align="center">Ação</th>
         </tr>
         <?php foreach ($paginated_maps as $map): ?>
         <tr align="left">
            <td width="24"><img src="<?php echo iconMapa($map['map'], 1) ?>"></td>
            <td align="center"style="width:100px"><?php echo $map['map']; ?></td>
            <td width="24"style="width:50%"><?php echo ($map['map_name']) ?: RECLASSIC::getMapName($map['map']); ?></td>
            <td align="left"><?php echo mapTypeIcon($map['type']) ?> <?php echo mapType()[$map['type']]?></td>
            <td align="center"><a href="?to=vermapa&mapa=<?php echo $map['map']; ?>" ><button class="button-view">Visualizar</button></a></td>
         </tr>
         <?php endforeach; ?>
      </table>

      <!-- CARDS MOBILE PARA MAPAS -->
      <div class="database-mobile-cards">
         <?php foreach ($paginated_maps as $map): ?>
         <a href="?to=vermapa&mapa=<?php echo $map['map']; ?>" style="text-decoration: none; display: block;">
            <div class="database-card">
               <div class="database-card-header">
                  <img src="<?php echo iconMapa($map['map'], 1) ?>" alt="<?php echo $map['map']; ?>">
                  <div class="database-card-title">
                     <strong><?php echo ($map['map_name']) ?: RECLASSIC::getMapName($map['map']); ?></strong>
                     <span class="card-id"><?php echo $map['map']; ?></span>
                  </div>
               </div>
               <div class="database-card-body">
                  <div class="database-card-field" style="grid-column: 1 / -1; text-align: center;">
                     <span class="database-card-field-label">Tipo</span>
                     <?php echo mapTypeIcon($map['type']) ?> <?php echo mapType()[$map['type']]?>
                  </div>
               </div>
            </div>
         </a>
         <?php endforeach; ?>
      </div>

      <div class="footer-table">
         <a href="<?php echo $prev_page_url; ?>" align="center"<?php if ($page <= 1) echo 'class="disabled"'; ?>><button class="btn-footer-anterior " >Anterior</button></a>
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
            <p>Nenhum resultado encontrado. <a href="?to=database&type=mapas&page=1">Voltar a database de mapas.</a></p>
         <?php else:?>
         <br><br>
         <p>Nenhum resultado encontrado<a href="?to=inicio"> Voltar ao Início</a></p>
         <?php endif?>
      <?php endif?>
<?php else:?>
<?php 
   header("Location: ?to=error");   
   exit();
   ?>
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
    const newUrl = '?to=database&type=<?php echo $_GET['type']; ?>&page=1'; 

    window.history.pushState(null, '', newUrl); 

    fetch(newUrl)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');

            // Atualiza o conteúdo da tabela
            const updatedContent = doc.querySelector('.database'); 
            const currentContent = document.querySelector('.database');
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
// Inicializa o comportamento ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    applyActiveLink(); // Aplica a classe 'disabled' ao link ativo com base na URL atual
    applyFilterEvents(); // Adiciona os eventos de clique
});
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

