
<style>

/* Estilo da descrição dos itens */
.db-container-view {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.items-emphasis {
  display: flex;
  align-items: flex-start;
  gap: 20px;
  padding: 20px 20px 0 20px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-bottom: none;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.item-img img {
  border-radius: 8px;
}

.items-emphasis h1 {
  font-size: 24px;
  margin: 0;
  color: #333;
}

.items-emphasis pre {
  background-color: #f4f4f4;
  padding: 10px;
  border-radius: 4px;
  white-space: pre-wrap;
  font-size: 14px;
  color: #555;
}

/* Informações adicionais */
.table-info {
  flex-wrap: wrap;
  background: none;
  gap: 20px;
}

.information,
#more-information {
  flex: 1;
  padding: 0 20px 20px 20px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-top: none;
  border-bottom: none;
  border-bottom-left-radius: 8px;
  border-bottom-right-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.information {
  border-bottom-left-radius: 0px;
  border-bottom-right-radius: 0px;
}
.title-out span,
.full-title span {
  font-size: 18px;
  font-weight: bold;
  color: #555;
}

ul.list {
  list-style: none;
  padding: 0;
  margin: 10px 0;
  font-size: 14px;
  color: #333;
  display: grid;
  grid-template-columns: repeat(6, 1fr); /* Divide a lista em 4 colunas */
  gap: 5px; /* Espaço entre os itens */
}

ul.list li:nth-child(odd) {
  font-weight: bold;
}


.flex-check {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  align-items: center;
}

.flex-check li {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 14px;
  color: #333;
}

.flex-check img {
  width: 20px;
  height: 20px;
}

/* Slider e listas */
.slider-result-show {
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
}

.slider-result-show h1 {
  font-size: 20px;
  color: #333;
  margin-bottom: 10px;
}

ul {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  list-style: none;
  padding: 0;
}

li.monstros,
li.itens {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  background-color: transparent;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 10px;
  width: 150px;
}

li.monstros a:hover,
li.itens a:hover{
    text-decoration: none;
}
li.monstros label:hover,
li.itens label:hover{
    cursor: pointer;
}

li.monstros:hover,
li.itens:hover {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}

li.monstros,
li.itens {
  display: flex;
  justify-content: center; /* Alinha horizontalmente */
  align-items: center;    /* Alinha verticalmente */
}

li.monstros img,
li.itens img {
  border-radius: 4px;
  max-width:100px;
}

li.monstros h5,
li.itens h5 {
  font-size: 16px;
  margin: 10px 0 5px;
  color: #333;
}

li.monstros label,
li.itens label {
  font-size: 14px;
  color: #777;
}

/* Responsividade */
@media (max-width: 768px) {
  .items-emphasis {
    flex-direction: column;
    align-items: center;
  }

  .table-info {
    flex-direction: column;
  }

  ul {
    justify-content: center;
  }
        .infoblocks{
            zoom: 0.80;
            width: auto;
            margin: 0;
            margin-top: 125px;
        } 

}
.disabled{
    color: black;
    pointer-events: none;
}

</style>

<div class="infoblocks">



      <a href="?to=database&type=itens">Itens</a> >
      <a href="" class="disabled">(<?php echo$iditem;?>) <?php echo$nomeitem;?></a> 
      <div class="db-container-view">
      <div id="itemDescription" style="background-color:transparent;">
         <article class="items-emphasis" style="padding-bottom:10px">
            <div class="item-img">
               <img alt="<?php echo$nomeitem;?>" src="<?php echo itemImage($iditem); ?>" style="max-width: 150px;"/>
            </div>
            <div>
               <img src="<?php echo iconImage($iditem) ?>" style="width: 25px;"/>
               <h1><?php echo$iditem;?> - <?php echo$nomeitem;?></h1>
               <pre><?php echo$textoFormatado;?></pre>
            </div>
         </article>
         <div class="table-info">
               <div class="information">
                  <div class="title-out"><img src="assets/img/info.png" style="margin-bottom:5px"/> <span>Informações</span></div>
                  <ul class="list">
                     <li>Preço</li>
                     <li><?php echo$preco;?></li>
                     <li>Peso</li>
                     <li><?php echo$peso;?></li>
                     <li>Tipo</li>
                     <li><?php echo $tipo;?></li>
                     <li>Ataque</li>
                     <li><?php echo$ataque;?></li>
                     <li>Defesa</li>
                     <li><?php echo$defesa;?></li>
                     <li>Slot's</li>
                     <li><?php echo$slots;?></li>
                  </ul>
               </div>
               <div id="more-information">
                  <div class="full-title">
                     <span class="orange-label">Pode ser</span>
                  </div>
                  <ul class="flex-check">
                     <li><img src="<?php echo$dropar;?>" /></li>
                     <li>Derrubado no Chão</li>
                     <li><img src="<?php echo$refinavel;?>" /></li>
                     <li>Refinável</li>
                     <li><img src="<?php echo$negociar;?>" /></li>
                     <li>Negociado</li>
                     <li><img src="<?php echo$vendido;?>" /></li>
                     <li>Vendido para NPC</li>
                     <li><img src="<?php echo$storage;?>" /></li>
                     <li>Colocado no Armazém</li>
                     <li><img src="<?php echo$storageguild;?>" /></li>
                     <li>Colocado no Armazém da Guilda</li>
                  </ul>
               </div>
         </div>
      </div>

   <section id="slider-result" class="slider-result-show">
      <div class="title-out"><img src="assets/img/mobs.png" style="margin-bottom:5px"/>  <span>Dropado por: (<?php echo count($itemget); ?>)</span></div>
      <?php if ($itemget): ?>
      <ul>
         <?php foreach ($itemget as $key => $item): ?>
         <li class="monstros show">
            <a href="?to=vermonstro&id=<?php echo $item['id']; ?>">
               <div class="white-bg"><img id="monster" alt="<?php echo $item['nome']; ?>" src="<?php echo monsterImageIndex($item['id']); ?>" /></div>
               
               <h5><?php echo $item['nome']; ?></h5>
               <label>Taxa de Drop: <?php echo min(100, $item['Taxa de drop'] / 100 * ($config['DropNormal'] / 100)); ?>%</label>
            </a>
         </li>
         <?php endforeach; ?>
      </ul>
      <?php endif; ?>
      </section>
   <section id="slider-result" class="slider-result-show">
       
      <div class="title-out"><img src="assets/img/obtido.png" style="margin-bottom:5px"/>  <span>Obtido Por: (<?= !empty($itensDrop) ? count(array_filter($itensDrop, function($info) { return $info['internalType'] === ''; })) : '0'; ?>)</span></div>
         <?php if (!empty($itensDrop)): ?>
      <ul>
         <?php foreach ($itensDrop as $info): ?>
         <?php if ($info['internalType'] === ''): ?>
         <li class="itens">
            <a href="?to=veritem&id=<?php echo $info['sourceId']; ?>">
               <div class="white-bg"><img id="itens" alt="<?php echo $info['sourceName']; ?>" src="<?php echo itemImage($info['sourceId']); ?>" /></div>
               <h5><?php echo $info['sourceName']; ?></h5>
               <label>Taxa de Drop: <?php echo $info['chance'] / 100; ?>%</label>
            </a>
         </li>
         <?php endif; ?>
         <?php endforeach; ?>
         <?php endif; ?>
      </ul>
      </section>
</div>
