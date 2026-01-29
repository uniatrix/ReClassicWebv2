<div class="account-page">
    <div class="account-hero">
        <h1><span class="text-white">Minha</span> <span class="text-highlight">Conta</span></h1>
        <p>Gerencie sua conta, personagens e configurações de segurança.</p>
    </div>

    <?php echo RECLASSIC::getMessageSession();?>

    <!-- ==================  TROCA DE SENHA ================ -->
    <div id="overlay-TrocarSenha">
        <div class="account-modal">
            <div class="modal-header">
                <h2>Alterar Senha</h2>
                <button class="modal-close" onclick="fecharFormularioTrocarSenha()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="formTrocarSenha">
                <div class="form-group">
                    <label>Senha Atual</label>
                    <input type="password" name="senhaatual" id="senhaatual" placeholder="Digite sua senha atual">
                </div>
                <input type="hidden" name="IDformTrocarSenha" id="IDformTrocarSenha" value="<?php echo rand();?>">
                <div class="form-group">
                    <label>Nova Senha</label>
                    <input type="password" name="senhanova" id="senhanova" placeholder="Digite a nova senha">
                </div>
                <div class="form-group">
                    <label>Confirmar Nova Senha</label>
                    <input type="password" name="confsenhanova" id="confsenhanova" placeholder="Confirme a nova senha">
                </div>
                <div id="message-TrocarSenha"></div>
                <button id="submitTrocarSenha" type="submit" class="btn-account-action">
                    <i class="fas fa-key"></i> Alterar Senha
                </button>
            </form>
        </div>
    </div>

    <!-- ==================  TROCA DE EMAIL ================ -->
    <div id="overlay-TrocarEmail">
        <div class="account-modal">
            <div class="modal-header">
                <h2>Alterar Email</h2>
                <button class="modal-close" onclick="fecharFormularioTrocarEmail()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="formTrocarEmail">
                <div class="form-group">
                    <label>Email Atual</label>
                    <input type="text" name="emailatual" id="emailatual" placeholder="Digite seu email atual">
                </div>
                <input type="hidden" name="IDformTrocarEmail" id="IDformTrocarEmail" value="<?php echo rand();?>">
                <div class="form-group">
                    <label>Novo Email</label>
                    <input type="text" name="emailnovo" id="emailnovo" placeholder="Digite o novo email">
                </div>
                <div class="form-group">
                    <label>Confirmar Novo Email</label>
                    <input type="text" name="confemailnovo" id="confemailnovo" placeholder="Confirme o novo email">
                </div>
                <div id="message-TrocarEmail"></div>
                <button id="submitTrocarEmail" type="submit" class="btn-account-action">
                    <i class="fas fa-envelope"></i> Alterar Email
                </button>
            </form>
        </div>
    </div>

    <!-- ==================  INFO DA CONTA ================ -->
    <div class="account-grid">
        <div class="account-card account-info">
            <div class="card-header">
                <h2><i class="fas fa-user-circle"></i> Informações da Conta</h2>
            </div>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Usuário</span>
                    <span class="info-value"><?php echo $conta_query['userid'];?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Último Login</span>
                    <span class="info-value"><?php echo formatarDataHora($conta_query['lastlogin']);?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Total de Logins</span>
                    <span class="info-value"><?php echo $conta_query['logincount'];?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Último IP</span>
                    <span class="info-value"><?php echo ($conta_query['last_ip'] != "") ? $conta_query['last_ip'] : "0.0.0.0"; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Gênero</span>
                    <span class="info-value"><?php echo ($conta_query['sex'] == "m" || $conta_query['sex'] == "M") ? 'Masculino':'Feminino';?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email</span>
                    <span class="info-value email-value"><?php echo $conta_query['email'];?></span>
                </div>
                <?php if($conta_query['vip_time'] > time()):?>
                <div class="info-item full-width vip-status">
                    <span class="info-label"><i class="fas fa-crown"></i> Tempo VIP Restante</span>
                    <span class="info-value vip-time"><?php echo "$days dias, $hours horas, $minutes minutos";?></span>
                </div>
                <?php endif?>
                <?php if($banTemp && !$banPerm):?>
                <div class="info-item full-width ban-status warning">
                    <span class="info-label"><i class="fas fa-ban"></i> Estado</span>
                    <span class="info-value">Banido até: <?php echo date('d/m/Y H:i:s', $conta_query['unban_time'])?></span>
                </div>
                <?php endif?>
                <?php if($banPerm):?>
                <div class="info-item full-width ban-status danger">
                    <span class="info-label"><i class="fas fa-ban"></i> Estado</span>
                    <span class="info-value">Banido Permanentemente</span>
                </div>
                <?php endif?>
            </div>
        </div>

        <div class="account-card account-actions">
            <div class="card-header">
                <h2><i class="fas fa-cog"></i> Configurações</h2>
            </div>
            <div class="actions-list">
                <button class="action-btn" onclick="mostrarFormularioTrocarSenha()">
                    <i class="fas fa-key"></i>
                    <div class="action-text">
                        <span class="action-title">Alterar Senha</span>
                        <span class="action-desc">Atualize sua senha de acesso</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button class="action-btn" onclick="mostrarFormularioTrocarEmail()">
                    <i class="fas fa-envelope"></i>
                    <div class="action-text">
                        <span class="action-title">Alterar Email</span>
                        <span class="action-desc">Atualize seu email de contato</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- ==================  PERSONAGENS ================ -->
    <div class="account-card characters-section">
        <div class="card-header">
            <h2><i class="fas fa-users"></i> Personagens</h2>
            <?php if($personagens):?>
            <div class="total-zeny">
                <i class="fas fa-coins"></i> Total: <?php echo formatarNumero($zeny);?> Zeny
            </div>
            <?php endif?>
        </div>

        <?php if($personagens):?>
        <div class="characters-grid">
            <?php foreach ($personagens as $key => $personagem):?>
            <div class="character-card <?php echo ($personagem['online'] == 1) ? 'online' : ''; ?>">
                <div class="char-status">
                    <span class="status-dot <?php echo ($personagem['online'] == 1) ? 'online' : 'offline'; ?>"></span>
                    <?php echo ($personagem['online'] == 1) ? "Online" : "Offline" ?>
                </div>
                <div class="char-avatar">
                    <img src="<?php echo iconClass($personagem['class']);?>" alt="Class Icon">
                </div>
                <div class="char-info">
                    <h3 class="char-name"><?php echo $personagem['name'];?></h3>
                    <span class="char-class"><?php echo getClasse($personagem['class']);?></span>
                </div>
                <div class="char-stats">
                    <div class="stat">
                        <span class="stat-label">Base</span>
                        <span class="stat-value"><?php echo $personagem['base_level'];?></span>
                    </div>
                    <div class="stat">
                        <span class="stat-label">Job</span>
                        <span class="stat-value"><?php echo $personagem['job_level'];?></span>
                    </div>
                    <div class="stat">
                        <span class="stat-label">Zeny</span>
                        <span class="stat-value"><?php echo formatarNumero($personagem['zeny']);?></span>
                    </div>
                </div>
                <?php if($personagem['guild_id'] > 0):?>
                <div class="char-guild">
                    <i class="fas fa-shield-alt"></i> <?php echo RECLASSIC::getGuildName($personagem['guild_id']);?>
                </div>
                <?php endif?>
                <div class="char-actions">
                    <?php if ($personagem['online'] == 1):?>
                    <button class="char-btn disabled" disabled title="Personagem online">
                        <i class="fas fa-sync-alt"></i> Visual
                    </button>
                    <button class="char-btn disabled" disabled title="Personagem online">
                        <i class="fas fa-map-marker-alt"></i> Posição
                    </button>
                    <?php else:?>
                    <a href="?to=conta&resetar&type=visual&id=<?php echo $personagem['char_id'];?>" class="char-btn">
                        <i class="fas fa-sync-alt"></i> Visual
                    </a>
                    <a href="?to=conta&resetar&type=posicao&id=<?php echo $personagem['char_id'];?>" class="char-btn">
                        <i class="fas fa-map-marker-alt"></i> Posição
                    </a>
                    <?php endif?>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <?php else:?>
        <div class="no-characters">
            <i class="fas fa-user-slash"></i>
            <h3>Nenhum Personagem Criado</h3>
            <p>Crie seu primeiro personagem no jogo para começar sua aventura!</p>
        </div>
        <?php endif?>
    </div>
</div>

<style>
.account-page {
    padding: 40px 20px 150px;
    min-height: 100vh;
    max-width: 1200px;
    margin: 0 auto;
}

.account-hero {
    text-align: center;
    margin-bottom: 40px;
    padding: 20px;
}

.account-hero h1 {
    font-family: 'Cinzel', serif;
    font-size: 2.5rem;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.account-hero .text-white {
    color: #fff;
}

.account-hero .text-highlight {
    color: var(--accent-color);
    text-shadow: 0 0 30px rgba(79, 195, 247, 0.5);
}

.account-hero p {
    color: var(--text-secondary);
    font-size: 1rem;
    max-width: 500px;
    margin: 0 auto;
}

.account-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 25px;
    margin-bottom: 25px;
}

.account-card {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    overflow: hidden;
}

.account-card .card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 25px;
    border-bottom: 1px solid var(--glass-border);
    background: rgba(0, 0, 0, 0.1);
}

.account-card .card-header h2 {
    font-family: 'Cinzel', serif;
    color: #fff;
    font-size: 1.1rem;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.account-card .card-header h2 i {
    color: var(--accent-color);
}

/* Info Grid */
.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1px;
    background: var(--glass-border);
}

.info-item {
    background: rgba(30, 41, 59, 0.5);
    padding: 15px 20px;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.info-item.full-width {
    grid-column: 1 / -1;
}

.info-label {
    font-size: 0.75rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-value {
    font-size: 1rem;
    color: #fff;
    font-weight: 500;
}

.info-value.email-value {
    font-size: 0.9rem;
    word-break: break-all;
}

.vip-status {
    background: rgba(255, 215, 0, 0.1);
}

.vip-status .info-label {
    color: #ffd700;
}

.vip-status .info-label i {
    margin-right: 5px;
}

.vip-time {
    color: #ffd700;
}

.ban-status.warning {
    background: rgba(255, 193, 7, 0.1);
}

.ban-status.warning .info-value {
    color: #ffc107;
}

.ban-status.danger {
    background: rgba(220, 53, 69, 0.1);
}

.ban-status.danger .info-value {
    color: #dc3545;
}

/* Actions */
.actions-list {
    padding: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    background: rgba(30, 41, 59, 0.5);
    border: 1px solid var(--glass-border);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: left;
    width: 100%;
}

.action-btn:hover {
    background: rgba(52, 152, 219, 0.2);
    border-color: var(--primary-color);
    transform: translateX(5px);
}

.action-btn > i:first-child {
    font-size: 1.5rem;
    color: var(--accent-color);
    width: 30px;
    text-align: center;
}

.action-text {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.action-title {
    color: #fff;
    font-weight: 600;
    font-size: 0.95rem;
}

.action-desc {
    color: var(--text-secondary);
    font-size: 0.8rem;
}

.action-btn > i:last-child {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

/* Characters Section */
.characters-section {
    margin-top: 0;
}

.total-zeny {
    background: linear-gradient(135deg, rgba(255, 215, 0, 0.2), rgba(255, 193, 7, 0.1));
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    color: #ffd700;
    font-weight: 600;
}

.total-zeny i {
    margin-right: 5px;
}

.characters-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    padding: 20px;
}

.character-card {
    background: rgba(30, 41, 59, 0.6);
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    padding: 20px;
    position: relative;
    transition: all 0.3s ease;
}

.character-card:hover {
    transform: translateY(-5px);
    border-color: rgba(79, 195, 247, 0.4);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.character-card.online {
    border-color: rgba(46, 204, 113, 0.5);
}

.char-status {
    position: absolute;
    top: 15px;
    right: 15px;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.75rem;
    color: var(--text-secondary);
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
}

.status-dot.online {
    background: #2ecc71;
    box-shadow: 0 0 10px rgba(46, 204, 113, 0.5);
}

.status-dot.offline {
    background: #95a5a6;
}

.char-avatar {
    width: 60px;
    height: 60px;
    margin: 0 auto 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.char-avatar img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.char-info {
    text-align: center;
    margin-bottom: 15px;
}

.char-name {
    color: #fff;
    font-size: 1.1rem;
    margin: 0 0 5px;
    font-weight: 600;
}

.char-class {
    color: var(--accent-color);
    font-size: 0.85rem;
}

.char-stats {
    display: flex;
    justify-content: space-around;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 12px;
}

.char-stats .stat {
    text-align: center;
}

.char-stats .stat-label {
    display: block;
    font-size: 0.7rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    margin-bottom: 3px;
}

.char-stats .stat-value {
    color: #fff;
    font-weight: 600;
    font-size: 0.95rem;
}

.char-guild {
    text-align: center;
    font-size: 0.85rem;
    color: var(--text-secondary);
    margin-bottom: 12px;
    padding: 8px;
    background: rgba(52, 152, 219, 0.1);
    border-radius: 6px;
}

.char-guild i {
    color: var(--primary-color);
    margin-right: 5px;
}

.char-actions {
    display: flex;
    gap: 10px;
}

.char-btn {
    flex: 1;
    padding: 10px;
    background: transparent;
    border: 1px solid var(--glass-border);
    border-radius: 6px;
    color: var(--text-secondary);
    font-size: 0.8rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.char-btn:hover:not(.disabled) {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: #fff;
}

.char-btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* No Characters */
.no-characters {
    text-align: center;
    padding: 60px 20px;
    color: var(--text-secondary);
}

.no-characters i {
    font-size: 4rem;
    color: rgba(79, 195, 247, 0.3);
    margin-bottom: 20px;
}

.no-characters h3 {
    color: #fff;
    margin: 0 0 10px;
    font-size: 1.3rem;
}

.no-characters p {
    margin: 0;
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.8);
}

/* Modal Styles */
#overlay-TrocarSenha,
#overlay-TrocarEmail {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 10000;
    opacity: 0;
    transition: opacity 0.3s ease;
    justify-content: center;
    align-items: center;
}

#overlay-TrocarSenha.active,
#overlay-TrocarEmail.active {
    display: flex;
    opacity: 1;
}

.account-modal {
    background: var(--glass-bg);
    border: 1px solid var(--glass-border);
    border-radius: var(--card-radius);
    width: 100%;
    max-width: 420px;
    margin: 20px;
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 25px;
    border-bottom: 1px solid var(--glass-border);
}

.modal-header h2 {
    color: #fff;
    font-size: 1.2rem;
    margin: 0;
    font-family: 'Cinzel', serif;
}

.modal-close {
    width: 36px;
    height: 36px;
    background: transparent;
    border: 1px solid var(--glass-border);
    border-radius: 8px;
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-close:hover {
    background: rgba(220, 53, 69, 0.2);
    border-color: #dc3545;
    color: #dc3545;
}

.account-modal form {
    padding: 25px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    color: var(--text-secondary);
    font-size: 0.85rem;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.account-modal input[type="password"],
.account-modal input[type="text"] {
    width: 100%;
    padding: 12px 15px;
    background: rgba(30, 41, 59, 0.8);
    border: 1px solid var(--glass-border);
    border-radius: 8px;
    color: #fff;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-sizing: border-box;
    height: auto;
    background-image: none;
}

.account-modal input[type="password"]:focus,
.account-modal input[type="text"]:focus {
    border-color: var(--primary-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}

.btn-account-action {
    width: 100%;
    padding: 14px 20px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border: none;
    border-radius: 8px;
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
}

.btn-account-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
}

#message-TrocarSenha,
#message-TrocarEmail {
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 6px;
    font-size: 0.9rem;
}

/* Responsive */
@media (max-width: 1024px) {
    .account-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .account-hero h1 {
        font-size: 1.8rem;
    }

    .account-page {
        padding: 20px 10px 200px;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }

    .characters-grid {
        grid-template-columns: 1fr;
        padding: 15px;
    }

    .account-card .card-header {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }

    .char-actions {
        flex-direction: column;
    }
}
</style>

<script type="text/javascript">
// ==================  FORMULÁRIO TROCA DE EMAIL ================ //
function mostrarFormularioTrocarEmail() {
    var overlay = document.getElementById("overlay-TrocarEmail");
    overlay.style.display = "flex";
    setTimeout(function() {
        overlay.classList.add("active");
    }, 10);
}

function fecharFormularioTrocarEmail() {
    var overlay = document.getElementById("overlay-TrocarEmail");
    overlay.classList.remove("active");
    setTimeout(function() {
        overlay.style.display = "none";
    }, 300);
}

$(document).ready(function() {
    $('#formTrocarEmail').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitTrocarEmail');
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Alterando...');
        $.ajax({
            type: 'POST',
            url: 'api/trocaremail.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message-TrocarEmail').html(response);
                $btn.prop('disabled', false).html('<i class="fas fa-envelope"></i> Alterar Email');
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição', status, error);
                $btn.prop('disabled', false).html('<i class="fas fa-envelope"></i> Alterar Email');
            }
        });
    });
});

// ==================  FORMULÁRIO TROCA DE SENHA ================ //
function mostrarFormularioTrocarSenha() {
    var overlay = document.getElementById("overlay-TrocarSenha");
    overlay.style.display = "flex";
    setTimeout(function() {
        overlay.classList.add("active");
    }, 10);
}

function fecharFormularioTrocarSenha() {
    var overlay = document.getElementById("overlay-TrocarSenha");
    overlay.classList.remove("active");
    setTimeout(function() {
        overlay.style.display = "none";
        document.getElementById("message-TrocarSenha").textContent = "";
    }, 300);
}

$(document).ready(function() {
    $('#formTrocarSenha').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submitTrocarSenha');
        $btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Alterando...');
        $.ajax({
            type: 'POST',
            url: 'api/trocarsenha.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#message-TrocarSenha').html(response);
                $btn.prop('disabled', false).html('<i class="fas fa-key"></i> Alterar Senha');
            },
            error: function(xhr, status, error) {
                console.error('Erro na requisição', status, error);
                $btn.prop('disabled', false).html('<i class="fas fa-key"></i> Alterar Senha');
            }
        });
    });
});

// Fechar modal ao clicar fora
document.getElementById('overlay-TrocarSenha').addEventListener('click', function(e) {
    if (e.target === this) {
        fecharFormularioTrocarSenha();
    }
});

document.getElementById('overlay-TrocarEmail').addEventListener('click', function(e) {
    if (e.target === this) {
        fecharFormularioTrocarEmail();
    }
});
</script>
