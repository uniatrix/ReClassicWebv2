
<!-- ==================  RANKINGS ================ -->


<style type="text/css">

  /* Container principal */
  .infoblocks {
    padding-bottom: 80px;
  }

  h6 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
    font-family: 'Pixelify Sans', sans-serif;
  }

  p.infoblocks {
    font-size: 14px;
    color: #555;
  }

  /* Tabs de navegação */
  #filter_ranking {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 20px;
    justify-content: center;
  }

  #filter_ranking a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
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

  /* Tabela */
  .ranking {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: white;
  }

  .ranking th,
  .ranking td {
    border: 1px solid #e0e0e0;
    padding: 12px 10px;
  }

  .ranking th {
    background-color: var(--primary-color);
    color: white;
    text-align: center;
    font-weight: bold;
    font-family: 'Pixelify Sans', sans-serif;
    font-size: 14px;
  }

  .ranking tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  .ranking tr:hover {
    background-color: rgba(52, 152, 219, 0.1);
  }

  .ranking td {
    text-align: center;
    vertical-align: middle;
    color: #333;
  }

  .ranking img {
    max-width: 250px;
    height: auto;
    border-radius: 5px;
  }

  /* Estilização para a mensagem de espera */
  td p {
    margin: 0;
    font-size: 12px;
    color: red;
    text-shadow: none;
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
      gap: 8px;
    }

    #filter_ranking a {
      padding: 8px 15px;
      font-size: 12px;
      flex: 1;
      min-width: 80px;
    }

    .ranking {
      font-size: 12px;
    }

    .ranking th,
    .ranking td {
      padding: 8px 5px;
    }

    .ranking th {
      font-size: 11px;
    }

    h6 {
      text-align: center;
      padding: 10px;
      margin: 0 0 15px 0;
      background-color: #f5f5f5;
      border-radius: 8px;
    }
  }
</style>

<div class="infoblocks">

    <div id="filter_ranking">
      <a href="?to=ranking&type=personagens">Personagens</a>
      <a href="?to=ranking&type=guilds">Guildas</a>
      <a href="?to=ranking&type=alquimistas">Alquimistas</a>
      <a href="?to=ranking&type=ferreiros">Ferreiros</a>
    </div>

<?php if($_GET['type'] == 'personagens'):?>


  <h6><?php echo $title?></h6>
  <?php if ($chars): ?>
      <table class="ranking">
          <tr align="center">
            <th align="center">Posição</th>
            <th>Nome</th>
            <th  colspan="2">Classe</th>
            <th>Guild</th>
            <th>Nível Base</th>
            <th>Nível de Classe</th>
            <th>Exp. Base</th>
            <th>Exp. de Classe</th>
          </tr>
         <?php foreach ($chars as $key => $char): ?>
         <tr align="left">
            <?php if($key < 4):   ?>
               <td align="center"><img src='assets/img/top<?php echo $key + 1?>.svg' width='30px'></td>
            <?php else: ?>
               <td align="center"><?php echo $key+1 ?><?php echo (strtolower($char['sex']) == 'f') ?  'ª' :   'º'?></td>
            <?php endif?>
            <td><?php echo $char['char_name'] ?></td>
            <td width="24"><img src="<?php echo iconClass($char['char_class']);?>" /></td>
            <td><?php echo getClasse($char['char_class'])?></td>
            <td><?php echo RECLASSIC::getGuildName($char['guild_id']); ?></td>
            <td><?php echo $char['base_level'] ?></td>
            <td><?php echo $char['job_level'] ?></td>
            <td><?php echo formatarNumero($char['base_exp']) ?></td>
            <td><?php echo formatarNumero($char['job_exp']) ?></td>
         </tr>
         <?php endforeach; ?>
</table>
<?php else: ?>
  <br><br>
  <p style="text-shadow: none;">Nenhum personagem encontrado. <a href="./">Voltar ao início.</a></p>
<?php endif; ?>

<?php elseif($_GET['type'] == 'guilds'):?>


  <h6><?php echo $title?></h6>
  <?php if ($chars): ?>
      <table class="ranking">
          <tr align="center">
            <th align="center">Posição</th>
            <th>Nome</th>
            <th>Nível</th>
            <th>Membros</th>
            <th>Castelos</th>
            <th>Nível</th>
            <th>Experiência</th>
          </tr>
         <?php foreach ($chars as $key => $guild): ?>
         <tr align="left">
            <?php if($key < 4):   ?>
               <td align="center"><img src='assets/img/top<?php echo $key + 1?>.svg' width='30px'></td>
            <?php else: ?>
               <td align="center"><?php echo $key+1 ?>º</td>
            <?php endif?>
            <td><?php echo $guild['name'] ?></td>
            <td><?php echo $guild['guild_lv']?></td>
            <td><?php echo $guild['castles'] ?></td>
            <td><?php echo $guild['members'] ?></td>
            <td><?php echo $guild['average_lv'] ?></td>
            <td><?php echo formatarNumero($guild['exp']); ?></td>
         </tr>
         <?php endforeach; ?>
</table>
<?php else: ?>
  <br><br>
  <p style="text-shadow: none;">Nenhuma guilda encontrado. <a href="./">Voltar ao início.</a></p>
<?php endif; ?>

<?php elseif($_GET['type'] == 'alquimistas'):?>

  
  <h6><?php echo $title?></h6>
  <?php if ($chars): ?>
      <table class="ranking">
          <tr align="center">
            <th align="center">Posição</th>
            <th>Nome</th>
            <th colspan="2">Classe</th>
		    <th>Pontos de Fama</th>
            <th>Nível Base</th>
            <th>Nível de Classe</th>
            <th>Guild</th>
          </tr>
         <?php foreach ($chars as $key => $char): ?>
         <tr align="left">
            <?php if($key < 4):   ?>
               <td align="center"><img src='assets/img/top<?php echo $key + 1?>.svg' width='30px'></td>
            <?php else: ?>
               <td align="center"><?php echo $key+1 ?><?php echo (strtolower($char['sex']) == 'f') ?  'ª' :   'º'?></td>
            <?php endif?>
            <td><?php echo $char['char_name'] ?></td>
            <td width="24"><img src="<?php echo iconClass($char['char_class']);?>" /></td>
            <td><?php echo getClasse($char['char_class'])?></td>
            <td><?php echo formatarNumero($char['fame']) ?></td>
            <td><?php echo $char['base_level'] ?></td>
            <td><?php echo $char['job_level'] ?></td>
            <td><?php echo RECLASSIC::getGuildName($char['guild_id']); ?></td>
         </tr>
         <?php endforeach; ?>
</table>
<?php else: ?>
  <br><br>
  <p style="text-shadow: none;">Nenhum alquimista encontrado. <a href="./">Voltar ao início.</a></p>
<?php endif; ?>

<?php elseif($_GET['type'] == 'ferreiros'):?>


  <h6><?php echo $title?></h6>
  <?php if ($chars): ?>
      <table class="ranking">
          <tr align="center">
            <th align="center">Posição</th>
            <th>Nome</th>
            <th colspan="2">Classe</th>
		    <th>Pontos de Fama</th>
            <th>Nível Base</th>
            <th>Nível de Classe</th>
            <th>Guild</th>
          </tr>
         <?php foreach ($chars as $key => $char): ?>
         <tr align="left">
            <?php if($key < 4):   ?>
               <td align="center"><img src='assets/img/top<?php echo $key + 1?>.svg' width='30px'></td>
            <?php else: ?>
               <td align="center"><?php echo $key+1 ?><?php echo (strtolower($char['sex']) == 'f') ?  'ª' :   'º'?></td>
            <?php endif?>
            <td><?php echo $char['char_name'] ?></td>
            
            <td width="24"><img src="<?php echo iconClass($char['char_class']);?>" /></td>
            <td><?php echo getClasse($char['char_class'])?></td>
            <td><?php echo formatarNumero($char['fame']) ?></td>
            <td><?php echo $char['base_level'] ?></td>
            <td><?php echo $char['job_level'] ?></td>
            <td><?php echo RECLASSIC::getGuildName($char['guild_id']); ?></td>
         </tr>
         <?php endforeach; ?>
</table>
<?php else: ?>
  <br><br>
  <p style="text-shadow: none;">Nenhum ferreiro encontrado. <a href="./">Voltar ao início.</a></p>
<?php endif; ?>

<?php endif?>

</div>



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