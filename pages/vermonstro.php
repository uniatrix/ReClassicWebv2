
<style>

/* Container principal */
.infoblocks {
  padding-bottom: 80px;
}

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
  border-bottom-left-radius: 8px;
  border-bottom-right-radius: 8px;
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

  .infoblocks {
    zoom: 0.85;
    width: auto;
    margin: 0;
    margin-top: 0;
    padding-bottom: 100px;
  }
}

.disabled {
    color: #666;
    pointer-events: none;
}
</style>
<div class="infoblocks">

      <div class="db-breadcrumb">
        <a href="?to=database&type=monstros" class="back-arrow">&larr;</a>
        <a href="?to=database&type=monstros">Monstros</a>
        <span class="separator">&rsaquo;</span>
        <span class="current"><?php echo $nomeMonstro; ?></span>
      </div>

      <div class="db-container-view">
      <div id="itemDescription">
         <article class="items-emphasis" style="padding-bottom:10px">
            <div class="item-img">
               <img alt="<?php $nomeMonstro;?>" src="<?php echo monsterImageIndex($idmonstro); ?>" style="max-width: 150px;"/>
            </div>
            <div>
               <h1><?php echo $idmonstro;?> - <?php echo $nomeMonstro;?></h1>
                 <?php if (!empty($mvp_drops)):?>
                 <img src="assets/img/mvp.png" class="icon" width="75px">
                 <?php endif?>
            </div>
         </article>
         <div class="table-info">
            <div>
               <div class="information">
                  <div class="title-out"><img src="assets/img/info.png" style="margin-bottom:5px"/> <span>Informações</span></div>
                  <ul class="list">
                        
                        <li>FOR</li>
                        <li><?php echo $str; ?></li>
                        
                        <li>Nível</li>
                        <li><?php echo $lvl; ?></li>
                        
                        <li>Raça</li>
                        <li><?php echo raceMonster()[$race]; ?></li>
                        
                        <li>AGI</li>
                        <li><?php echo $agi; ?></li>
                        <li>Propriedade</li>
                        <li><?php echo elementMonster()[$element]; ?> <?php echo $element_lvl; ?></li>
                        
                        <li>Tamanho</li>
                        <li><?php echo sizeMonster()[$size]; ?></li>
                        
                        <li>VIT</li>
                        <li><?php echo $vit; ?></li>
                        
                        <li>EXP Base</li>
                        <li><?php echo $expBase; ?></li>
                        
                        <li>EXP de Classe</li>
                        <li><?php echo $expJob; ?></li>
                        
                        
                        
                        <li>INT</li>
                        <li><?php echo $int; ?></li>
                        
                        
                        
                        <li>HP</li>
                        <li><?php echo $hp; ?></li>
                        
                        <li>Defesa</li>
                        <li><?php echo $def; ?></li>
                        
                        <li>DES</li>
                        <li><?php echo $dex; ?></li>
                        <li>Ataque</li>
                        <li><?php echo $atkMin; ?> - <?php echo $atkMax; ?></li>
                        
                        <li>Defesa Mágica</li>
                        <li><?php echo $defM; ?></li>
                        
                        <li>SOR</li>
                        <li><?php echo $luk; ?></li>
                        <li>Alcance</li>
                        <li><?php echo $range; ?></li>


                  </ul>
               </div>
            </div>
         </div>
      </div>

   <section id="slider-result" class="slider-result-show">
      <div class="title-out"> <span><img src="assets/img/drops.png" style="margin-bottom:5px"/> Drops (<?php echo count($mvp_drops) + count($normal_drops); ?>)</span></div>
      <?php if ($normal_drops || $mvp_drops): ?>
      <ul>
         <?php if (!empty($mvp_drops)): ?>
         <?php foreach ($mvp_drops as $dropsMVP): ?>
         <?php foreach ($dropsMVP['items'] as $key => $nomeItemMVP): ?>
         <li class="monstros show">
            <a href="?to=veritem&id=<?php echo $nomeItemMVP['id']; ?>">

               <div class="white-bg"><img id="monster" alt="<?php echo $nomeItemMVP['name_english']; ?>" src="<?php echo itemImage($nomeItemMVP['id']); ?>" /></div>

               <h5><?php echo $nomeItemMVP['name_english']; ?> <font color="red">(MVP)</font></h5>
               <label>Taxa de Drop: <?php echo min(100, $dropsMVP['rate'] / 100 * ($config['DropMVP'] / 100)); ?>%</label> 
            </a>
         </li>
         <?php endforeach; ?>
         <?php endforeach; ?>
         <?php endif; ?>
         <?php if (!empty($normal_drops)): ?>
         <?php foreach ($normal_drops as $dropsNormal): ?>
         <?php foreach ($dropsNormal['items'] as $key => $nomeItemNormal): ?>
         <li class="monstros show">
            <a href="?to=veritem&id=<?php echo $nomeItemNormal['id']; ?>">
               <div class="white-bg"><img id="monster" alt="<?php echo $nomeItemNormal['name_english']; ?>" src="<?php echo itemImage($nomeItemNormal['id']); ?>" /></div>
               <h5><?php echo $nomeItemNormal['name_english']; ?></h5>
               <label>Taxa de Drop: <?php echo min(100, $dropsNormal['rate'] / 100 * ($config['DropNormal'] / 100)); ?>%</label> 
            </a>
         </li>
         <?php endforeach; ?>
         <?php endforeach; ?>
         <?php endif; ?>
      </ul>
      <?php endif; ?>
      </section>
        <?php if (!empty($mapas)): ?>
   <section id="slider-result" class="slider-result-show">
      <div class="title-out"><img src="assets/img/maps.png" style="margin-bottom:5px"/> <span>Nasce Em: (<?php if (!empty($mapas)): echo count($mapas); else: echo '0'; endif; ?>)</span></div>

      <ul>
         <?php foreach ($mapas as $mapa): ?>
         <li class="itens">
            <a href="?to=vermapa&mapa=<?php echo $mapa['mapname']; ?>">
               <div class="white-bg"><img id="itens"  src="<?php echo iconMapa($mapa['mapname'],1); ?>" /></div>
               <h5><?php echo $mapa['mapname']; ?></h5>
               <label>Quantidade: <?php echo $mapa['amount']; ?>un<br> Respawn: <?php echo converterTempo($mapa['respawnTime']); ?></label>
            </a>
         </li>
         <?php endforeach; ?>
      </ul>
      </section>
         <?php endif; ?>
</div>
