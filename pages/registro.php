<style type="text/css">
   input[type="checkbox"] {
    width: 12px; 
    height: 12px; 
    appearance: none; 
    -webkit-appearance: none; 
    background-image: url('assets/checkbox_off.png'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    cursor: pointer;
  }

   input[type="checkbox"]:checked {
    width: 12px; 
    height: 12px; 
    appearance: none; 
    -webkit-appearance: none; 
    background-image: url('assets/checkbox_on.png'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>

<style>
    @media (max-width: 768px) {
        .registrese {
            display: flex;
            margin: 0 auto;
            justify-content: center;
            transform: none;
        }
        img.registrese {
            margin-top: 25px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        } 
        .arial8 {
            margin: 0 auto;
            text-align: center;
            display: block;
        }
        .registration-form .npc {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left; 
        }
        #img-register-gray {
            margin: 0 auto;
        }
    }
</style>
<div id="successImage" class="success-popup" style="display: none; position: relative;">
  <!-- Main Background Image -->
  <img src="assets/register_bg.png" alt="Success Image" style="display: block; margin: 0 auto;">

  <!-- X Button SVG (Top Right) -->
  <a href="#" onclick="closeRegistrationPopup();"
    style="position: absolute; top: 3px; right: 5px; z-index: 1001; text-decoration: none;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000" width="20px" height="20px">
      <path
        d="M19.7 5.3c.4.4.4 1 0 1.4L13.4 13l6.3 6.3c.4.4.4 1 0 1.4-.4.4-1 .4-1.4 0L12 14.4l-6.3 6.3c-.4.4-1 .4-1.4 0-.4-.4-.4-1 0-1.4L10.6 13 4.3 6.7c-.4-.4-.4-1 0-1.4.4-.4 1-.4 1.4 0L12 11.6l6.3-6.3c.4-.4 1-.4 1.4 0z" />
    </svg>
  </a>

  <!-- Download Button -->
  <a href="https://drive.google.com/file/d/1ROEqhrWH4mnp40ULfnM0wul84jp6knn4/view?usp=drive_link" target="_blank"
    style="position: absolute; top: 60%; right: 30%; transform: translate(50%, -50%); z-index: 1001;">
    <img src="assets/DownloadRegistro.png" alt="Download Button"
      style="width: 154px; height: 28px;">
  </a>

  <!-- Discord Button -->
  <a href="https://discord.gg/JG6vTMbT58" target="_blank"
    style="position: absolute; top: 72%; right: 30%; transform: translate(50%, -50%); z-index: 1001;">
    <img src="assets/DiscordRegistro.png" alt="Discord Button"
      style="width: 154px; height: 28px;">
  </a>
</div>


<div class="main-content">
  <div class="registration-form" id="DisableRegisterForm">
    <form id="formRegistro">
   
      <table class="cinza" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: -20px;">
        <tbody class="npc">
          <tr>
            <td height="12"></td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" height="55">
                <tr>
                  <td width="340" style="margin-top: -10px;">
                    <img class="registrese" src="assets/register_title.png">
                    <br>
                    <font color="#000000"><span class="arial8">Ragnarok ReClassic é gratuito e exclusivo para
                        PC.</span>
                    </font>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" id="img-register-gray">
                <tr>
                  <td width="6"><img src="assets/t_left.gif" width="6" height="117"></td>
                  <td background="assets/t__t_bg.gif">
                    <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td width="120">
                          <div align="center"><img src="assets/regist_npc.gif" width="100"
                              height="100"></div>
                        </td>
                        <td class="hidethis">
                          <table width="98%" style="font-size: 9pt;" border="0" cellspacing="0" cellpadding="0"
                            text-align="justify">
                            <tr>
                              <td>
                                <font color="#FF0000">*</font>
                              </td>
                              <td>
                                <font color="#FF0000">Todos as informações preenchidas no formulário devem ser
                                  verdadeiras.</font>
                              </td>
                            </tr>
                            <tr>
                              <td width="10" valign="baseline">
                                <font color="#FF0000">*</font>
                              </td>
                              <td>
                                <font color="#FF0000"> Enviar informações falsas pode resultar em suspensão
                                  permanente.
                                </font>
                              </td>
                            </tr>
                            <tr>
                              <td valign="baseline">
                                <font color="#FF0000">*</font>
                              </td>
                              <td>
                                <font color="#FF0000"> Proprietários de múltiplas contas podem ser bloqueados devido a
                                  infrações de outras contas associadas.</font>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td width="6"><img src="assets/t_right.gif" width="6" height="117"></td>
                </tr>
              </table>
              <br>
              <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><img src="assets/gray_dot.gif" width="100%" height="1"></td>
                </tr>
              </table>

              <table width="90%" border="0" cellspacing="5" cellpadding="0" align="center">
                <tr>
                  <td width="120" class="arial9_b" valign="baseline">
                    <font color="#003366">Usuário *</font>
                  </td>
                  <td>
                    <input type="text" name="UserID" id="UserID" class="input" style="ime-mode:inactive" maxlength="20">
                    <font color="#FF0000"></font>
                    <br>
                  </td>
                </tr>
              </table>
              <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><img src="assets/gray_dot.gif" width="100%" height="1"></td>
                </tr>
              </table>
              <table width="90%" border="0" cellspacing="5" cellpadding="0" align="center">
                <tr>
                  <td width="120" class="arial9_b" valign="baseline">
                    <font color="#003366">Senha *</font>
                  </td>
                  <td>
                    <input type="password" name="UserPW" id="UserPW" class="input" value="" maxlength="12">
                    <font color="#FF0000"></font>
                    <br>
                    <input type="password" name="ReUserPW" id="ReUserPW" class="input" value="" maxlength="12"
                      style="margin-top: 5px;" >
                    <br>
                  </td>
                </tr>
              </table>
              <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><img src="assets/gray_dot.gif" width="100%" height="1"></td>
                </tr>
              </table>
              <table width="90%" border="0" cellspacing="5" cellpadding="0" align="center">
                <tr>
                  <td width="120" class="arial9_b">
                    <font color="#003366">Nome completo *</font>
                  </td>
                  <td>
                    <input type="text" name="FullName" id="FullName" class="input" value="" maxlength="50" size="30">
                    <br>
                  </td>
                </tr>
              </table>
              <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><img src="assets/gray_dot.gif" width="100%" height="1"></td>
                </tr>
              </table>
              <table width="90%" border="0" cellspacing="5" cellpadding="0" align="center">
                <tr>
                  <td width="120" class="arial9_b" valign="baseline">
                    <font color="#003366">E-mail *</font>
                  </td>
                  <td>
                    <input type="email" name="Email" id="Email" class="input" size="30" value="" maxlength="35">
                    <br>
                  </td>
                </tr>
              </table>
              <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><img src="assets/gray_dot.gif" width="100%" height="1"></td>
                </tr>
              </table>
              <table width="90%" border="0" cellspacing="5" cellpadding="0" align="center">
                <tr>
                  <td width="120" class="arial9_b" valign="baseline">
                    <font color="#003366">Sexo *</font>
                  </td>
                  <td>
                    <select name="sex" id="sex">
                      <option selected disabled>Gênero</option>
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                    </select>
                    <br>
                  </td>
                </tr>
              </table>
              <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><img src="assets/gray_dot.gif" width="100%" height="1"></td>
                </tr>
              </table>

              <!-- Update the checkbox section -->
              <div style="text-align: center; margin: 15px 0; padding: 10px; background-color: rgba(255, 255, 255, 0.1); border-radius: 5px;">
                <input type="checkbox" id="termsCheckbox" name="termsCheckbox" required>
                <label for="termsCheckbox" style="cursor: pointer; font-size: 12px;"><font color="#003366" style="font-weight: 600;">Li e aceito os</font> <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal" style="color: #4a90e2; text-decoration: none; font-weight: 600;">termos de uso e serviço</a></label>
                <br>
                <div id="message"></div>
              </div>

              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: -15px;">
                <tr>
                  <td height="70">
                    <table border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td>
                          <button type="submit" class="reg-button" id="submitRegistro" >
                            <img src="assets/reg-button.webp" alt="Registrar"
                              style="border: 0;">
                          </button>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <div style="text-align: center; margin-top: 30px; padding: 15px; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                <p style="color: #003366; margin-bottom: 10px; font-weight: bold; font-size: 14px;">Já possui conta?</p>
                <a href="?to=entrar" style="text-decoration: none; display: inline-block; transition: transform 0.2s;">
                  <img src="assets/btn_login.jpg" alt="Login" style="border: 0; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <br><br>
    </form>
  </div>
</div>

<!-- Add modal component after the registration form -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="termsModalLabel">Termos de Uso e Serviço</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
        <h4>Regras de Conduta</h4>
        <p>As punições serão aplicadas a critério da equipe do Ragnarok ReClassic e serão analisadas caso a caso.</p>
        <p>A equipe reserva o direito de punir a violação das regras com ou sem aviso prévio. Isso inclui comportamentos que, mesmo não descritos explicitamente, sejam considerados inadequados ou prejudiciais ao ambiente do jogo.</p>
        <p>Caso discorde de uma decisão, é possível recorrer abrindo um ticket de suporte.</p>

        <h5>1. OFENSAS</h5>
        <h6>1.1 Linguagem e Comportamento Inadequados</h6>
        <ul>
          <li>1.1.1 - Proibido o uso de violência verbal para ameaçar, insultar, zombar ou ridicularizar outros jogadores.</li>
          <li>1.1.2 - Proibido o uso de linguagem ofensiva, obscena, sexualmente explícita, odiosa ou ilegal, bem como qualquer comportamento rude que prejudique a experiência de outros jogadores.</li>
          <li>1.1.3 - Proibido atormentar, perseguir, ameaçar ou causar aflição a outros jogadores.</li>
          <li>1.1.4 - Proibido divulgar ou expor informações pessoais de outros jogadores, como nome, endereço, telefone, e-mail, etc.</li>
        </ul>
        <p><em>Punição: Advertência → Suspensão de 3 a 7 dias → Suspensão de 30 dias → Banimento permanente.</em></p>

        <h6>1.2 Comportamento Discriminatório e/ou Violento</h6>
        <ul>
          <li>1.2.1 - Proibido qualquer forma de discriminação ou discurso de ódio com base em etnia, religião, política, orientação sexual, condição social ou qualquer outra característica.</li>
          <li>1.2.2 - Proibido fazer apologia a atos criminosos, violência, tortura, tráfico, crimes sexuais ou qualquer comportamento extremo da vida real.</li>
        </ul>
        <p><em>Punição: Suspensão de 7 dias → Suspensão de 30 dias → Banimento permanente.</em></p>

        <h6>1.3 Racismo</h6>
        <ul>
          <li>1.3.1 - Proibido qualquer tipo de racismo, xenofobia ou discursos de ódio relacionados à etnia.</li>
          <li>1.3.2 - Proibido a criação de grupos, clãs ou guildas baseadas em ideologias racistas.</li>
        </ul>
        <p><em>Punição: Suspensão de 7 dias → Banimento permanente.</em></p>

        <h5>2. DESRESPEITO À EQUIPE</h5>
        <ul>
          <li>2.1 - Jogadores devem seguir as instruções da equipe quando contatados. Administradores são identificados por nicks amarelos e vestimentas diferenciadas.</li>
          <li>2.2 - Proibido insultar, ofender ou desrespeitar um Administrador. Comentários irônicos ou abusivos contra a equipe não serão tolerados.</li>
          <li>2.3 - Comentários negativos ou ataques direcionados à Administração são infrações deste código de conduta.</li>
        </ul>
        <p><em>Punição: Advertência → Suspensão de 7 dias → Suspensão de 30 dias → Banimento permanente.</em></p>

        <h5>3. MÁ CONDUTA</h5>
        <p>3.1 - Proibido qualquer comportamento que comprometa a jogabilidade de outros jogadores.</p>
        <p>Exemplos de práticas proibidas:</p>
        <ul>
          <li>Criar lojas sobrepondo outras lojas.</li>
          <li>Criar portais em locais estratégicos para prejudicar outros jogadores.</li>
          <li>Uso abusivo da habilidade Barreira de Gelo para atrapalhar o jogo.</li>
          <li>Uso de macros para farm semi-automático/automático.</li>
        </ul>
        <p><em>Punição: Advertência → Suspensão de 3 a 7 dias → Suspensão de 30 dias.</em></p>

        <h5>4. NOMES INAPROPRIADOS PARA PERSONAGENS, PETS OU HOMÚNCULOS</h5>
        <ul>
          <li>4.1 - Proibido nomes ofensivos, obscenos ou que façam apologia a drogas, ódio, racismo, sexismo ou qualquer discurso discriminatório.</li>
          <li>4.2 - Nomes impróprios podem ser alterados pela equipe e pets/homúnculos deletados se necessário.</li>
        </ul>
        <p><em>Punição: Renomeação forçada → Suspensão de 3 dias (em caso de reincidência).</em></p>

        <h5>5. REPRESENTAÇÃO</h5>
        <ul>
          <li>5.1 - Proibido se passar por amigos, parentes ou Administradores.</li>
          <li>5.2 - Proibido se passar por outro jogador.</li>
          <li>5.3 - Proibido compartilhar informações da conta. O titular é responsável por todas as ações feitas na conta.</li>
        </ul>
        <p><em>Punição: Advertência → Suspensão de 7 dias → Banimento permanente.</em></p>

        <h5>6. ANÚNCIOS IRREGULARES</h5>
        <ul>
          <li>6.1 - Proibido fazer marketing, propaganda ou promoção comercial dentro do jogo.</li>
          <li>6.2 - Proibido negociar itens, Zenys, personagens ou contas entre servidores ou jogos diferentes.</li>
          <li>6.3 - Proibido divulgar softwares, hacks, sites irregulares ou serviços não autorizados.</li>
          <li>6.4 - Proibido qualquer discussão ou título de chat/loja relacionado a modificações do client, bots ou hacks.</li>
          <li>6.5 - Proibido anúncios de vendas ou trocas por dinheiro real dentro do jogo e Discord oficial.</li>
          <li>6.6 - Proibida a venda de cash via RMT (Real Money Trading), sendo permitida exclusivamente para itens e equipamentos.</li>
        </ul>
        <p><em>Punição: Advertência → Suspensão de 7 dias → Suspensão de 30 dias → Banimento permanente.</em></p>

        <h5>7. ATIVIDADE IRREGULAR</h5>
        <ul>
          <li>7.1 - PROIBIDO O USO DE BOT E QUALQUER FORMA DE AUTOMAÇÃO. O USO DE BOT RESULTA EM BANIMENTO PERMANENTE.</li>
          <li>7.2 - Proibido usar ou se beneficiar de programas irregulares (BOTs, hacks, exploits).</li>
          <li>7.3 - Proibido explorar bugs do jogo para obter vantagens indevidas.</li>
          <li>7.4 - Proibido se associar a jogadores que usam programas ilegais. Caso uma denúncia seja comprovada, todos os envolvidos serão punidos.</li>
        </ul>
        <p><em>Punição para BOTs e automação: Banimento permanente sem aviso prévio.</em></p>
        <p><em>Punição para uso de hacks, exploits e bugs: Suspensão de 30 dias → Banimento permanente.</em></p>
        <p><em>Punição para associação com jogadores que utilizam programas ilegais: Remoção de todos os itens suspeitos. Suspensão de 7 a 30 dias → Banimento permanente.</em></p>

        <p>O Servidor Ragnarok ReClassic se reserva o direito de aplicar punições conforme a gravidade da infração, podendo alterar regras e punições a qualquer momento para manter um ambiente saudável e justo para todos os jogadores.</p>
        <p>Se tiver dúvidas ou precisar recorrer de uma punição, abra um ticket de suporte.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Add modal styles -->
<style>
.modal-body {
  max-height: 70vh;
  overflow-y: auto;
}

.modal-body h4, .modal-body h5, .modal-body h6 {
  color: #333;
  margin-top: 1.5rem;
  margin-bottom: 1rem;
}

.modal-body ul {
  padding-left: 1.5rem;
  margin-bottom: 1rem;
}

.modal-body li {
  margin-bottom: 0.5rem;
}

.modal-body p {
  margin-bottom: 1rem;
}

.modal-body em {
  color: #dc3545;
  font-style: normal;
}

.modal-dialog {
  margin: 1.75rem auto;
}

@media (max-width: 768px) {
  .modal-dialog {
    margin: 1rem;
    max-width: calc(100% - 2rem);
  }
}
</style>

<script>

$(document).ready(function() {
    $('#formRegistro').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitRegistro');
        $btn.prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: 'api/registro.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message').html(response);   
                $btn.prop('disabled', false);  // Reabilita o botão
            },
            error: function(xhr, status, error) {
                
                console.error('Erro na requisição', status, error);
            }
        });
    });
});


  function showRegistrationPopup() {

    document.getElementById("DisableRegisterForm").style.display = "none";
    var successMessage = document.getElementById("message");
    if (successMessage) {
      successMessage.style.display = "block";
    }

    var successImage = document.getElementById("successImage");
    if (successImage) {
      successImage.style.display = "block";
      setTimeout(function () {
        successImage.classList.add("show");
      }, 10);
    }
  }

  function closeRegistrationPopup() {
    document.getElementById("successImage").style.display = "none";
    window.location.href = "?to=entrar"; 
  }

</script>


