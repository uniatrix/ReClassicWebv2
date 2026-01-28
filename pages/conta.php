
<style type="text/css">

    
    
    .button {
  appearance: none;

   background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/btn_template.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  color: black;

  width: 100px;  /* Defina uma largura */
  height: 20px; /* Defina uma altura */
}

.button:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/btn_template_a.png');

}
.button:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_template_b.png');

}
.button:focus {
   transition: none;
   outline: none;
   transform: none;
}

.infoblocks h3, .infoblocks h4 {
  margin: 10px 0;
  font-size: 1.5em;
  color: #333;
  text-align: center;
}

.organize-conta {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: space-between;
}

.info-conta {
  flex: 1 1 60%;
  max-width: 700px;
  overflow-x: auto; /* Habilita rolagem horizontal caso a tabela seja muito larga */
}

.conta-table {
  width: 100%;
  border-collapse: collapse;
  background-color: #fff;
  border: 1px solid #ddd;
}

.conta-table th, .conta-table td {
  padding: 5px;
  border: 1px solid #ddd;
  text-align: center;
  font-size: 0.9em;
}

.conta-table th {
  background-color: #e7e7e7;
  color: black;
  font-weight: bold;
}

.badge-warning {
  color: #856404;
  background-color: #fff3cd;
  padding: 5px;
  border-radius: 4px;
}

.badge-danger {
  color: #721c24;
  background-color: #f8d7da;
  padding: 5px;
  border-radius: 4px;
}

.actions-conta {
  flex: 1 1 35%;
  display: flex;
  flex-direction: column;
  gap: 10px;
  align-items: center;
}

.actions-conta .btn-actions {
 

  text-decoration: none;
  border-radius: 4px;
  text-align: center;
  font-size: 1em;

}

.actions-conta .btn-actions:hover {
  
}

.table-chars {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
  background-color: #fff;
}

.table-chars th, .table-chars td {
  padding: 1px;
  border: 1px solid #ddd;
  text-align: center;
  font-size: 0.9em;
}

.table-chars th {
  background-color: #e7e7e7;
  color: black;
  font-weight: bold;
}

.text-white {
  color: #fff;
}

.disabled {
  pointer-events: none;
  color: #6c757d;
  text-decoration: none;
}

input[disabled] {
  background-color: #e9ecef;
  color: #6c757d;
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.infoblocks2 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f9f9f9;
    padding: 30px 20px;
    width: 400px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.infoblocks2 h1 {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}

.infoblocks2 form {
    position: relative;
}

.infoblocks2 .closeForm {
    position: absolute;
    top: -70px;
    right: -5px;
    cursor: pointer;
    text-decoration: none;
}

.infoblocks2 input[type="password"],input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    outline: none;
    transition: border-color 0.3s;
}

.infoblocks2 input[type="password"]:focus {
    border-color: #007BFF;
    box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.3);
}




.closeForm {
  appearance: none;

   background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/btn_close.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  color: black;

  width: 14px;  /* Defina uma largura */
  height: 14px; /* Defina uma altura */
}

.closeForm:hover {
transition: none;
outline: none;
transform: none;
background:transparent;
  background-image: url('assets/btn_close_a.png');

}
.closeForm:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_close_b.png');

}
.closeForm:focus {
   transition: none;
   outline: none;
   transform: none;
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
    .table-chars {
        zoom: 0.50!important; 
        width: 100%;
    }    
    .infoblocks{
       width: auto;
       margin: 0;
       margin-top: 125px;
    }
    #input-zeny{
        margin: 0 auto;
        display: flex;
    }
    .actions-conta{
        margin: 0;
        padding: 0;
        margin: 0 0 0 70px;
        display: inline-block;
    }
    .infoblocks2{
        
       width: 90%;
    }
 }
</style>

<div class="infoblocks">
<!-- ==================  TROCA DE SENHA ================ -->
<div id="overlay-TrocarSenha">
   <div class="infoblocks2">
      <h1>Alteração de Senha</h1>
      <form id="formTrocarSenha">
         <a href="javascript:void(0);" style="float: right;" onclick="fecharFormularioTrocarSenha()"><button class="closeForm"></button></a>
         <center>
            <input type="password" name="senhaatual" id="senhaatual" placeholder="Senha Atual">
            <input type="hidden" name="IDformTrocarSenha" id="IDformTrocarSenha" value="<?php echo rand();?>" >
            <input type="password" name="senhanova" id="senhanova" placeholder="Nova Senha">
            <input type="password" name="confsenhanova" id="confsenhanova" placeholder="Confirmar Nova Senha">
         </center>
         <div id="message-TrocarSenha"></div>
         <button id="submitTrocarSenha" type="submit" class="button">Alterar Senha</button>
      </form>
   </div>
</div>
<!-- ==================  TROCA DE EMAIL ================ -->
<div id="overlay-TrocarEmail">
   <div class="infoblocks2">
      <h1>Alteração de Email</h1>
      <form id="formTrocarEmail">
         <a href="javascript:void(0);" style="float: right;" onclick="fecharFormularioTrocarEmail()" ><button class="closeForm"></button></a>
         <center>
            <input type="text" name="emailatual" id="emailatual" placeholder="Email Atual">
            <input type="hidden" name="IDformTrocarEmail" id="IDformTrocarEmail" value="<?php echo rand();?>" >
            <input type="text" name="emailnovo" id="emailnovo" placeholder="Novo Email">
            <input type="text" name="confemailnovo" id="confemailnovo" placeholder="Confirmar Novo Email">
         </center>
         <div id="message-TrocarEmail"></div>
         <button id="submitTrocarEmail" type="submit" class="button">Alterar Email</button>
      </form>
   </div>
</div>
<!-- ==================  CONTA ================ -->

   <h3>Minha Conta</h3>
   <?php echo RECLASSIC::getMessageSession();?>
   <div class="organize-conta">

      <div class="info-conta">
         <table class="conta-table" style="max-width: 700px;">
            <tr>
               <th align="center">Usuário</th>
               <td align="center"><?php echo $conta_query['userid'];?></td>
               <th align="center">Último Login</th>
               <td align="center"><?php echo formatarDataHora($conta_query['lastlogin']);?></td>
            </tr>
            <tr>
               <th align="center">Logins</th>
               <td align="center"><?php echo $conta_query['logincount'];?></td>
               <th align="center">Último IP</th>
               <td align="center"><?php echo ($conta_query['last_ip'] != "") ? $conta_query['last_ip'] : "0.0.0.0"; ?></td>
            </tr>
            <tr>
               <th align="center">Gênero</th>
               <td align="center"><?php echo ($conta_query['sex'] == "m" || $conta_query['sex'] == "M") ? 'Masculino':'Feminino';?></td>
               <th align="center">Email:</th>
               <td align="center"><?php echo $conta_query['email'];?></td>
            </tr>
             <?php if($conta_query['vip_time'] > time()):?>
            <tr>
               <th align="center" colspan="1">Tempo VIP Restante:</th>
               <td align="center" colspan="3"><?php echo "$days dias, $hours horas, $minutes minutos, $seconds segundos";?></td>
            </tr>
             <?php endif?>
             <?php if($banTemp && !$banPerm):?>
            <tr>
               <th align="center" colspan="1">Estado:</th>
               <td align="center" colspan="3" class="badge-warning">Banido até: <?php echo  date('d/m/Y H:i:s', $conta_query['unban_time'])?></td>
            </tr>
             <?php endif?>
             <?php if($banPerm):?>
            <tr>
               <th align="center" colspan="1"><?php echo $txt['Status']?>:</th>
               <td align="center" colspan="3" class="badge-danger">Banido Permanentemente</td>
            </tr>
             <?php endif?>
         </table>
      </div>
        <div class="actions-conta">
         <a href="javascript:void(0);" class="btn-actions" onclick="mostrarFormularioTrocarSenha()"><button class="button">Alterar Senha</button></a>
         <a href="javascript:void(0);" class="btn-actions" onclick="mostrarFormularioTrocarEmail()"><button class="button">Alterar Email</button></a>
      </div>
   </div>

    <h4 >Personagens</h4>
<?php if($personagens):?>
<table class="table-chars">
    <tr>
        <th align="center">Slot</th>
        <th>Nome</th>
        <th colspan="2">Classe</th>
        <th>BaseLVL</th>
        <th>JobLVL</th>
        <th>Zeny</th>
        <th>Guild</th>
        <th>Online</th>
        <th align="center">Visual</th>
        <th align="center">Posição</th>
    </tr>

    <?php foreach ($personagens as $key => $personagem):?>
    <tr align="left">
        <td align="center"><?php echo $personagem['char_num']+1;?></td>
        <td align="left"><?php echo $personagem['name'];?></td>
        <td width="24"><img src="<?php echo iconClass($personagem['class']);?>" /></td>
        <td><?php echo getClasse($personagem['class']);?></td>
        <td><?php echo $personagem['base_level'];?></td>
        <td><?php echo $personagem['job_level'];?></td>
        <td><?php echo formatarNumero($personagem['zeny']);?></td>
        <td><?php echo RECLASSIC::getGuildName($personagem['guild_id']);?></td>
        <td><?php echo ($personagem['online'] == 1) ? "Sim": "Não" ?></td>
      <?php if ($personagem['online'] == 1):?>
        <td align="center"><a href="?to=conta&resetar&type=visual&id=<?php echo $personagem['char_id'];?>" class="disabled" ><button class="button">Resetar</button></a></td>
        <td align="center"><a href="?to=conta&resetar&type=posicao&id=<?php echo $personagem['char_id'];?>" class="disabled" ><button class="button">Resetar</button></a></td>
      <?php else:?>
        <td align="center"><a href="?to=conta&resetar&type=visual&id=<?php echo $personagem['char_id'];?>"  ><button class="button">Resetar</button></a></td>
        <td align="center"><a href="?to=conta&resetar&type=posicao&id=<?php echo $personagem['char_id'];?>"  ><button class="button">Resetar</button></a></td>
      <?php endif?>
    </tr>
      <?php endforeach?>
</table>



<input type="text" name="" id="input-zeny" value="Total de Zeny: <?php echo formatarNumero($zeny);?>" disabled style="width:<?php echo sizeInput($zeny);?>px;">
<?php else:?>
<h6>Nenhum Personagem Criado</h6>
<?php endif?>

</div>


<script type="text/javascript">
   
// ==================  FORMULÁRIO TROCA DE EMAIL ================ //
function mostrarFormularioTrocarEmail() {
      document.getElementById("overlay-TrocarEmail").style.display = "block";
      var overlay = document.getElementById("overlay-TrocarEmail");
      overlay.style.display = "block"; 
      setTimeout(function() {
        overlay.classList.add("active"); 
    }, 100);
}


function fecharFormularioTrocarEmail() {

  var overlay = document.getElementById("overlay-TrocarEmail");
  overlay.style.display = "none";
  overlay.classList.remove("active");
}

$(document).ready(function() {
    $('#formTrocarEmail').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitTrocarEmail');
        $btn.prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: 'api/trocaremail.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message-TrocarEmail').html(response);   
                $btn.prop('disabled', false);  // Reabilita o botão
            },
            error: function(xhr, status, error) {
                
                console.error('Erro na requisição', status, error);
            }
        });
    });
});

// ==================  FORMULÁRIO TROCA DE SENHA================ //

function mostrarFormularioTrocarSenha() {
      document.getElementById("overlay-TrocarSenha").style.display = "block";
      var overlay = document.getElementById("overlay-TrocarSenha");
      overlay.style.display = "block"; 
      setTimeout(function() {
        overlay.classList.add("active"); 
    }, 100);
}


function fecharFormularioTrocarSenha() {
  var overlay = document.getElementById("overlay-TrocarSenha");
  overlay.style.display = "none";
  overlay.classList.remove("active");
  var messageElement = document.getElementById("message-TrocarSenha");
  messageElement.textContent = "";  
}

$(document).ready(function() {
    $('#formTrocarSenha').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitTrocarSenha');
        $btn.prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: 'api/trocarsenha.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message-TrocarSenha').html(response);   
                $btn.prop('disabled', false);  
            },
            error: function(xhr, status, error) {
                
                console.error('Erro na requisição', status, error);
            }
        });
    });
});




  
</script>