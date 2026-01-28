<style>
    /* Tabela de itens */
.comercio {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 1rem;
  color: black;
}

.comercio th, .comercio td {
  padding: 0.5rem;
  border: 1px solid #ddd;
 
}

.comercio th {
  background-color: #e7e7e7;
  color: black;
}

button.btn-copy {
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

button.btn-copy:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/btn_ir_a.png');

}
button.btn-copy:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_ir_b.png');

}
button.btn-copy:focus {
   transition: none;
   outline: none;
   transform: none;
}
    @media (max-width: 768px) {

        .infoblocks{
            zoom: 0.70;
            width: 100%;
            margin: 0;
            margin-top: 125px;
        } 
        <?php if($_GET['type'] == "vendedores"):?>
        .comercio{
            
            width: 100%;
            zoom: 0.30;
        }
        
        <?php endif?>
        h1{
            
            zoom: 0.80;
        }

 }
</style>

<div id="popup" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: #000; color: white; padding: 10px; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);">
  Copiado para área de transferência
</div>

<div class="infoblocks">
    
    <?php if($_GET['type'] == 'vendedores'):?>
    <center>
      <h1><img src="<?php echo iconImage($vending->extended_vending_item); ?>" /> <?php echo $title?> <img src="<?php echo iconImage($vending->extended_vending_item); ?>"/></h1>
<?php echo $mapa?>
      <a href="#"><button class="btn-copy">Copiar</button></a>
    </center><br>
    <?php if($items): ?>
    <table class="comercio">
   <tr align="center">
     <th>ID</th>
     <th colspan="2">Nome</th>
     <th colspan="2">Refino</th>
     <th>Slots</th>
     <th>Slot 1</th>
     <th>Slot 2</th>
     <th>Slot 3</th>
     <th>Slot 4</th>
     <th colspan="2">Preço</th></th>
     <th>Quantidade</th>
   </tr>

   <?php foreach ($items as $item): ?>
   <tr align="center">
      <td><a href="?to=veritem&id=<?php echo $item->nameid; ?>" ><?php echo $item->nameid; ?></a></td>
      <td><img src="<?php echo iconImage($item->nameid); ?>"></td>
      <td align="left"><a href="?to=veritem&id=<?php echo $item->nameid; ?>" ><?php echo $item->item_name; ?></a></td>
      <td><img src="<?php echo iconImage(986); ?>"></td>
      <td><?php echo ($item->refine > 0) ? '+'.$item->refine : $item->refine; ?></td>
      <td><?php echo ($item->slots > 0) ? "[{$item->slots}]" : '[0]'; ?></td>
      <?php if ($item->card0 > 3999): ?>
      <td><a href="?to=veritem&id=<?php echo $item->card0; ?>" ><?php echo RECLASSIC::getInfoItem($item->card0)['name_english']; ?></a></td>
      <?php else: ?>
          <td>N/A</td>
      <?php endif; ?>
      <?php if ($item->card1 > 3999): ?>
      <td><a href="?to=veritem&id=<?php echo $item->card1; ?>" ><?php echo RECLASSIC::getInfoItem($item->card1)['name_english']; ?></a></td>
      <?php else: ?>
          <td>N/A</td>
      <?php endif; ?>
      <?php if ($item->card2 > 3999): ?>
      <td><a href="?to=veritem&id=<?php echo $item->card2; ?>" ><?php echo RECLASSIC::getInfoItem($item->card2)['name_english']; ?></a></td>
      <?php else: ?>
          <td>N/A</td>
      <?php endif; ?>
      <?php if ($item->card3 > 3999): ?>
      <td><a href="?to=veritem&id=<?php echo $item->card3; ?>" ><?php echo RECLASSIC::getInfoItem($item->card3)['name_english']; ?></a></td>
      <?php else: ?>
          <td>N/A</td>
      <?php endif; ?>
      <td><?php echo $item->price; ?></td>

      <td><img src="<?php echo iconImage($vending->extended_vending_item); ?>" /></td>
      <td><?php echo $item->amount; ?></td>
   </tr>
   <?php endforeach; ?>
</table>
   <?php endif; ?>
   
    <?php elseif($_GET['type'] == 'compradores'):?>
    
    <center>
      <h1> <?php echo $title?> </h1>
<?php echo $mapa?>
      <a href="#"><button class="btn-copy">Copiar</button></a>
    </center><br>
    <?php if($items): ?>
    <table class="comercio">
   <tr align="center">
     <th>ID</th>
     <th colspan="2">Nome</th>
     <th>Preço</th>
     <th>Quantidade</th>
   </tr>

   <?php foreach ($items as $item): ?>
   <tr align="center">
      <td><a href="?to=veritem&id=<?php echo $item->nameid; ?>" ><?php echo $item->nameid; ?></a></td>
      <td><img src="<?php echo iconImage($item->nameid); ?>"></td>
      <td align="left"><a href="?to=veritem&id=<?php echo $item->nameid; ?>" ><?php echo $item->item_name; ?></a></td>
      <td><?php echo $item->price; ?></td>
      <td><?php echo $item->amount; ?></td>
   </tr>
   <?php endforeach; ?>
</table>
   <?php endif; ?>
   <?php endif; ?>
</div>

<script>
  document.querySelector('.btn-copy').addEventListener('click', function(event) {
    event.preventDefault();  // Evita o comportamento padrão do link
    <?php if($_GET['type'] == 'vendedores'):?>
    const textToCopy = '/navi <?php echo $vending->map." ".$vending->x."/".$vending->y ?>';
      <?php elseif($_GET['type'] == 'compradores'):?>
    const textToCopy = '/navi <?php echo $store->map." ".$store->x."/".$store->y ?>';
   <?php endif; ?>
    
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