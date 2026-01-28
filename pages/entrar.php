<style>
    @media (max-width: 768px) {
        .entre {
            display: flex;
            margin: 0 auto;
            justify-content: center;
        }    
        img.entre {
            margin-top: 25px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }  
        img#img-button {
            margin: 0 auto;
            display: block;
        }
        .registration-form .npc {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left; 
        }
    }
</style>


<div class="main-content">
  <div class="registration-form">
    <form method="post" id="formLogin">
   
      <table class="cinza" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: -20px;">
        <tbody class="npc">
          <tr>
            <td height="12"></td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" height="55" align="center">
                <tr >
                  <td width="340" style="margin-top: -10px;">
                    <img class="entre" src="assets/login_title.png">
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
                    <br>
                  </td>
                </tr>
              </table>
              <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td><img src="assets/gray_dot.gif" width="100%" height="1"></td>
                </tr>
              </table>

                <div id="message"></div>

              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: -15px;">
                <tr>
                  <td height="70">
                    <table border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td>
                          <button type="submit" id="submitLogin" class="reg-button">
                            <img src="assets/btn_login.jpg" id="img-button" alt="Login"
                              style="border: 0;">
                          </button>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <br><br>
    </form>
  </div>
</div>

<script>

$(document).ready(function() {
    $('#formLogin').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitLogin');
        $btn.prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: 'api/entrar.php',
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



</script>

