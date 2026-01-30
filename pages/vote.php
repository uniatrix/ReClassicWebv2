<!-- ==================  VOTE POR PONTOS - MODERN LAYOUT ================ -->

<div class="vote-page">
    <!-- Header -->
    <div class="vote-header">
        <h1 class="vote-title">Vote e <span class="highlight">Ganhe</span></h1>
        <p class="vote-subtitle">Ajude o servidor e receba recompensas</p>

        <!-- Card de Pontos -->
        <div class="vote-points-card">
            <div class="points-icon">
                <i class="fas fa-coins"></i>
            </div>
            <div class="points-info">
                <span class="points-label">Seus Pontos</span>
                <span class="points-value"><?php echo $pontos; ?></span>
            </div>
        </div>
    </div>

    <?php echo RECLASSIC::getMessageSession(); ?>

    <!-- Instrucoes e Link de Votacao -->
    <div class="vote-info-section">
        <div class="vote-info-card">
            <div class="vote-info-icon">
                <i class="fas fa-vote-yea"></i>
            </div>
            <h2>Como Funciona?</h2>
            <ul class="vote-steps">
                <li>
                    <span class="step-number">1</span>
                    <span class="step-text">Clique no botao abaixo para acessar os sites de votacao</span>
                </li>
                <li>
                    <span class="step-number">2</span>
                    <span class="step-text">Vote em cada site disponivel</span>
                </li>
                <li>
                    <span class="step-number">3</span>
                    <span class="step-text">Seus pontos serao creditados automaticamente</span>
                </li>
                <li>
                    <span class="step-number">4</span>
                    <span class="step-text">Troque seus pontos no NPC "Votos por Pontos" em Prontera</span>
                </li>
            </ul>

            <a href="https://cp.ragnarokreclassic.com.br/?module=voteforpoints" target="_blank" class="btn-vote-main">
                <i class="fas fa-external-link-alt"></i>
                <span>Votar Agora</span>
            </a>

            <p class="vote-note">
                <i class="fas fa-info-circle"></i>
                Voce pode votar a cada 12 horas em cada site.
            </p>
        </div>

        <!-- Onde Trocar -->
        <div class="vote-exchange-card">
            <div class="vote-info-icon">
                <i class="fas fa-gift"></i>
            </div>
            <h2>Onde Trocar?</h2>
            <p>Procure o NPC <strong>"Votos por Pontos"</strong> nas seguintes cidades:</p>
            <div class="npc-locations">
                <div class="npc-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Prontera (59, 62)</span>
                </div>
                <div class="npc-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Morroc Paraiso (20, 21)</span>
                </div>
            </div>
            <p class="vote-tip">
                <i class="fas fa-lightbulb"></i>
                Use o comando <code>@vfp</code> no jogo para abrir o menu de votos!
            </p>
        </div>
    </div>
</div>
