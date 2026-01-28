
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
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
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
      grid-template-columns: repeat(4, 1fr); /* Divide a lista em 4 colunas */
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

      #id_mapa_media {
        display: none;
      }
    }

    .disabled {
        color: #666;
        pointer-events: none;
    }
</style>
<div id="popup" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: #000; color: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);">
  Copiado para área de transferência
</div>
<div class="infoblocks">

      <div class="db-breadcrumb">
        <a href="?to=database&type=mapas" class="back-arrow">&larr;</a>
        <a href="?to=database&type=mapas">Mapas</a>
        <span class="separator">&rsaquo;</span>
        <span class="current"><?php echo $data['name']; ?></span>
      </div>

      <div class="db-container-view">
      <div id="itemDescription">
         <article class="items-emphasis">
            <div class="item-img">
               <img alt="<?php echo $data['name'];?>" src="<?php echo iconMapa($idmapa,2)?>" style="max-width: 150px;"/>
            </div>
            <div>
               <h1><?php echo $data['mapname'];?> - <?php echo $data['name'];?></h1>
                 <img src="<?php echo iconMapa($idmapa,1)?>" class="icon" width="75px" id="id_mapa_media">
            </div>
         </article>
      </div>

      <?php if ($mobs): ?>
   <section id="slider-result" class="slider-result-show">
      
      <div class="title-out"><img src="assets/img/mobs.png" style="margin-bottom:5px"/>  <span>Monstros (<?php echo count($mobs)?>)</span></div>

      <ul>
         <?php foreach ($mobs as $mob): ?>
         <?php 
            $monsterId = $mob['monsterId'];
                $sql = "(SELECT * FROM mob_db WHERE id = '$monsterId')
                        UNION
                        (SELECT * FROM mob_db2 WHERE id = '$monsterId')";
            
                $result = mysqli_query($conn, $sql);
            
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ismvp = $row['mvp_exp'];
                        $nomeMob = $row['name_english'];
                    }   
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            
            ?>
         <li class="monstros show">
            <a href="?to=vermonstro&id=<?php echo $mob['monsterId']; ?>">

               <div class="white-bg"><img id="monster" alt="" src="<?php echo monsterImageIndex($mob['monsterId']); ?>" /></div>
               <h5><?php echo (isset($nomeMob)) ? $nomeMob : '' ; ?> 
               <?php if (isset($ismvp) && $ismvp != ""): ?>
               <font color="red">(MVP)</font>
               <?php endif ?></h5>
               <label>Quantidade: <?php echo $mob['amount']; ?>un<br> Respawn: <?php echo converterTempo($mob['respawnTime']); ?></label>
            </a>
         </li>
         <?php endforeach; ?>
      </ul>
      </section>
      <?php endif; ?>
        <?php if (!empty($npcs)): ?>
   <section id="slider-result" class="slider-result-show">
         
      <div class="title-out"> <span>NPC's (<?php echo count($npcs); ?>)</span></div>

      <ul>
         <?php foreach ($npcs as $key => $npc): ?>
         <li class="itens">
            <a href="javascript:void(0);" class="btn-<?php echo $key; ?>copy">
               <div class="white-bg"><img id="itens" alt="Caixa de Presente" src="<?php echo npcImage($npc['job']); ?>" /></div>
               <h5><?php echo $npc['name']; ?></h5>
               <label><?php echo $npc['mapname']; ?><br> <?php echo ''.$npc['x'].','.$npc['y'].''; ?></label>
            </a>
         </li>
         <script>
              document.querySelector('.btn-<?php echo $key; ?>copy').addEventListener('click', function(event) {
                event.preventDefault();  // Evita o comportamento padrão do link
            
                const textToCopy = '/navi <?php echo $npc['mapname']." ".$npc['x']."/".$npc['y'] ?>';
            
                
                // Cria um campo de input temporário
                const tempInput = document.createElement('input');
                tempInput.value = textToCopy;
                document.body.appendChild(tempInput);
                
                // Seleciona o texto no input
                tempInput.select();
                tempInput.setSelectionRange(0, 99999);  // Para dispositivos móveis
                
                // Copia o texto para a área de transferência
                document.execCommand('copy');
                
                // Remove o campo temporário
                document.body.removeChild(tempInput);
                
                // Exibe o popup
                const popup = document.getElementById('popup');
                popup.style.display = 'block';
                
                // Esconde o popup após 2 segundos
                setTimeout(function() {
                  popup.style.display = 'none';
                }, 2000);
              });
        </script>
         <?php endforeach; ?>
      </ul>
      </section>
         <?php endif; ?>
</div>
