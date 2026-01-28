<!-- ==================  VOTE POR PONTOS ================ -->


<style type="text/css">
    


h6 {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"] {
  padding: 5px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #f9f9f9;
}

p.infoblocks {
  font-size: 14px;
  color: #555;
}

/* Tabela */
.vote-sites {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.vote-sites th, 
.vote-sites td {
  border: 1px solid #ddd;
  padding: 10px;
}

.vote-sites th {
  background-color: #e7e7e7;
  color: black;
  text-align: center;
  font-weight: bold;
}

.vote-sites tr:nth-child(even) {
  background-color: #f9f9f9;
}

.vote-sites tr:hover {
  background-color: #f1f1f1;
}

.vote-sites td {
  text-align: center;
  vertical-align: middle;
}

.vote-sites img {
  max-width: 250px;
  height: auto;
  border-radius: 5px;
}

/* Botão */
.button {
  transition: all 0.3s ease;
}

.button:hover {
  transition: all 0.3s ease;
}

/* Estilização para a mensagem de espera */
td p {
  margin: 0;
  font-size: 12px;
  color: red;
  text-shadow: none;
}

/* Responsividade */
@media (max-width: 768px) {
  .vote-sites {
    font-size: 12px;
  }

  .vote-sites img {
    max-width: 100px;
  }

  .button {
    padding: 6px 8px;
    font-size: 12px;
  }
}
button.button-vote {
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

button.button-vote:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/btn_ir_a.png');

}
button.button-vote:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_ir_b.png');

}
button.button-vote:focus {
   transition: none;
   outline: none;
   transform: none;
}

        @media (max-width: 768px) {

        .infoblocks{
            zoom: 0.80;
             margin: 125px 0 0 0;
             width: auto;
        } 
        .vote-sites{
            
             zoom: 0.30; 
        }

    }
</style>
<div class="infoblocks">

  <h6><?php echo $title?></h6>
  <br><br><?php echo RECLASSIC::getMessageSession();?>
  <input type="text" disabled style="width:<?php echo sizeInput($pontos); ?>px;" value="Seus Pontos: <?php echo $pontos; ?>">
  <?php if ($results): ?>
      <table class="vote-sites">
       <tr align="center">
        <th>Site</th>
        <th>Banner</th>
        <th>Quantidade</th>
        <th>Tempo de Espera</th>
        <th style="max-width: 100px;">Ação</th>
    </tr>
    <?php foreach ($results as $key => $row): ?>
       <?php 
       $id_site = $row['site_id'];
       $conta = $_SESSION['conta'];
       $sql_logs = "SELECT `unblock_time` FROM v4p_registros WHERE account_id = '$conta' AND f_site_id = '$id_site'";
       $sth = $conn->query($sql_logs);
       $result_logs = $sth->fetch_assoc();

       ?>
       <tr align="center">
        <td><?php echo htmlspecialchars($row['site_name']); ?></td>
        <td align="center" class="banner-vote">
         <?php if(!empty($row['banner_url'])){?>
             <img src="<?php echo htmlspecialchars($row['banner_url']); ?>" class="banner-vote"/>
         <?php }else{?>
          <?php if(file_exists($row['img_banner'])){?>
           <img src="<?php echo $row['img_banner']; ?>" class="banner-vote"/>
       <?php }else{?>
           <img src="img/noimage.png" class="banner-vote"/>
       <?php }?>
   <?php }?>
</td>
<td><?php echo htmlspecialchars($row['points']); ?></td>
<td><?php echo $row['blocking_time']; ?></td>
<?php if (isset($result_logs['unblock_time']) && $result_logs['unblock_time'] >= date("Y-m-d H:i:s", time())): ?>
<td style="max-width: 100px;">
 <p>Volte em:<br><?php echo isset($result_logs['unblock_time']) ? DateTime::createFromFormat('Y-m-d H:i:s', $result_logs['unblock_time'])->format('d/m/Y H:i:s') : 'N/A'; ?></p>
</td>
<?php else: ?>
    <td style="max-width: 100px;">
     <a href="?to=vote&votar_em=<?php echo htmlspecialchars($row['site_id']); ?>"><button class="button-vote"> Votar</button></a>
 </td>
<?php endif; ?>
</tr>
<?php endforeach; ?>
</table>
<?php else: ?>
  <br><br>
  <p style="text-shadow: none;">Nenhum site disponível para votação <a href="?to=inicio">Voltar ao inicio</a></p>
<?php endif; ?>


</div>