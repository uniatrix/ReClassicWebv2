<?php
// Obter contagem de jogadores registrados do banco de dados
$totalPlayers = 0;
try {
    $db = RECLASSIC::getInstance();
    if ($db !== null) {
        $stmt = $db->query("SELECT COUNT(*) as total FROM login");
        if ($stmt) {
            $result = $stmt->fetch_assoc();
            $totalPlayers = $result['total'] ?? 0;
        }
    }
} catch (Exception $e) {
    $totalPlayers = 0;
}
?>

<!-- Hero Section com Countdown -->
<section class="hero-launch">
    <div class="container">
        <div class="hero-launch-content text-center">
            <!-- Titulo Principal -->
            <h1 class="hero-main-title">
                Inaugura em <span class="highlight">Breve</span>
            </h1>

            <!-- SWF Flash Player (Desktop) -->
            <div class="swf-wrapper swf-desktop-only" style="position: relative; width: 100%; max-width: 760px; height: 371px; margin: 0 auto 20px;">
                <div id="swf-placeholder" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; flex-direction: column; justify-content: center; align-items: center; pointer-events: none; gap: 15px;">
                    <div class="loader-spinner"></div>
                    <div class="loading-text">Carregando</div>
                </div>
                <div id="swf-container" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; pointer-events: none; display: none; justify-content: center;"></div>
            </div>

            <!-- SWF First Frame Image (Mobile) -->
            <div class="swf-mobile-image swf-mobile-only">
                <img src="assets/swf-frame.png" alt="ReClassic Preview" onerror="this.style.display='none'">
            </div>

            <!-- Badge de Urgencia -->
            <div class="urgency-badge">
                <span class="badge-pulse"></span>
                <span class="badge-text">FALTA MUITO POUCO!</span>
            </div>

            <!-- Link Pacote Fundador -->
            <p class="founder-promo">
                Ultimos dias! Garanta seu o <a href="?to=pacote-fundador" class="founder-link">Pacote de Fundador</a> ate 01/03 as 19:00.
            </p>

            <!-- Countdown Timer -->
            <div class="countdown-container">
                <div class="countdown-header">01 de Marco de 2026 as 19:00</div>
                <div class="countdown" id="countdown">
                    <div class="countdown-item">
                        <span class="countdown-number" id="days">00</span>
                        <span class="countdown-label">Dias</span>
                    </div>
                    <div class="countdown-separator">:</div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="hours">00</span>
                        <span class="countdown-label">Horas</span>
                    </div>
                    <div class="countdown-separator">:</div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="minutes">00</span>
                        <span class="countdown-label">Min</span>
                    </div>
                    <div class="countdown-separator">:</div>
                    <div class="countdown-item">
                        <span class="countdown-number" id="seconds">00</span>
                        <span class="countdown-label">Seg</span>
                    </div>
                </div>

                <!-- Contador de Jogadores -->
                <div class="players-counter">
                    <span class="counter-label">JOGADORES REGISTRADOS</span>
                    <div class="counter-value">
                        <span class="counter-dot"></span>
                        <span class="counter-number"><?php echo number_format($totalPlayers, 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>

            <!-- Botao de Pre-Registro -->
            <a href="?to=registro" class="btn-preregister">
                FAZER PRE-REGISTRO
            </a>
        </div>
    </div>
</section>

<!-- Timeline de Fases -->
<section class="timeline-section">
    <div class="container">
        <h2 class="section-title-modern text-center">O Caminho do ReClassic Comeca Agora</h2>

        <div class="timeline-wrapper">
            <!-- Linha de Progresso -->
            <div class="timeline-progress">
                <div class="timeline-progress-bar" style="width: 66%;"></div>
            </div>

            <!-- Fases -->
            <div class="timeline-phases">
                <!-- Closed Beta -->
                <div class="timeline-phase completed">
                    <div class="phase-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="phase-card">
                        <span class="phase-date">10/01 -> 17/01</span>
                        <h4 class="phase-title">Closed Beta</h4>
                        <p class="phase-desc">Acesso exclusivo para Fundadores</p>
                        <ul class="phase-list">
                            <li>Ajustes da economia</li>
                            <li>Balanceamento de classes</li>
                            <li>Correcao de bugs</li>
                            <li>Feedback da comunidade</li>
                        </ul>
                        <div class="phase-status completed">
                            <span class="status-dot"></span>
                            O servidor comeca a ser aprimorado.
                        </div>
                    </div>
                </div>

                <!-- Open Beta -->
                <div class="timeline-phase completed">
                    <div class="phase-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="phase-card">
                        <span class="phase-date">17/01 -> 24/01</span>
                        <h4 class="phase-title">Open Beta</h4>
                        <p class="phase-desc">Aberto para todos os jogadores</p>
                        <ul class="phase-list">
                            <li>Ajustes finais de conteudo</li>
                            <li>Preparacao final para o lancamento</li>
                            <li>PvP, PvE e progressao</li>
                            <li>Stress test do servidor</li>
                        </ul>
                        <div class="phase-status completed">
                            <span class="status-dot"></span>
                            O ReClassic se prepara para o mundo.
                        </div>
                    </div>
                </div>

                <!-- Lancamento -->
                <div class="timeline-phase active">
                    <div class="phase-icon active">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="phase-card">
                        <span class="phase-date">01/03 AS 19H</span>
                        <h4 class="phase-title">Lancamento Oficial</h4>
                        <p class="phase-desc">Sem wipes. Sem desculpas.</p>
                        <ul class="phase-list">
                            <li>Conteudo refinado</li>
                            <li>Economia estavel</li>
                            <li>Experiencia definitiva</li>
                            <li>Servidor balanceado</li>
                        </ul>
                        <div class="phase-status active">
                            <span class="status-dot"></span>
                            Aqui comeca a historia oficial.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Informacoes do Servidor -->
<section class="server-info-section">
    <div class="container">
        <h2 class="section-title-modern text-center">Informacoes do Servidor</h2>

        <div class="info-cards-wrapper">
            <!-- Configuracao -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-cog"></i>
                    <h3>Configuracao</h3>
                </div>
                <ul class="info-list">
                    <li><i class="fas fa-chevron-right"></i> Episodio: <strong>Pre-Renovacao</strong></li>
                    <li><i class="fas fa-chevron-right"></i> Rates: <strong>5x/5x/5x</strong></li>
                    <li><i class="fas fa-chevron-right"></i> Nivel Maximo <strong>99/70</strong></li>
                    <li><i class="fas fa-chevron-right"></i> Gepard Shield 3.0</li>
                </ul>
            </div>

            <!-- Vote por Pontos -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fas fa-vote-yea"></i>
                    <h3>Vote por Pontos</h3>
                </div>
                <p class="info-text">Vote no servidor e ganhe pontos para trocar por recompensas no jogo.</p>
                <a href="?to=vote" class="info-btn">VOTAR NO SERVIDOR</a>
            </div>

            <!-- Comunidade -->
            <div class="info-card">
                <div class="info-card-header">
                    <i class="fab fa-discord"></i>
                    <h3>Comunidade</h3>
                </div>
                <p class="info-text">Junte-se a comunidade de jogadores do ReClassic.</p>
                <a href="https://discord.gg/JG6vTMbT58" target="_blank" class="info-btn">ENTRAR NO DISCORD</a>
            </div>
        </div>
    </div>
</section>

<style>
/* ===============================================
   HERO LAUNCH SECTION
   =============================================== */
.hero-launch {
    padding: 30px 0 40px;
    text-align: center;
}

/* SWF Wrapper */
.swf-wrapper {
    margin-bottom: 1rem;
}

.loader-spinner {
    width: 60px;
    height: 60px;
    border: 4px solid rgba(79, 195, 247, 0.1);
    border-top-color: var(--accent-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    box-shadow: 0 0 20px rgba(79, 195, 247, 0.3);
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-text {
    color: var(--accent-color);
    font-size: 0.9rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    animation: pulse 1.5s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 0.6; }
    50% { opacity: 1; }
}

/* SWF Mobile Image */
.swf-mobile-only {
    display: none;
    margin-bottom: 1rem;
}

.swf-mobile-only img {
    max-width: 100%;
    height: auto;
    border-radius: var(--card-radius);
}

@media (max-width: 768px) {
    .swf-desktop-only {
        display: none !important;
    }

    .swf-mobile-only {
        display: block;
    }
}

.hero-main-title {
    font-family: 'Cinzel', serif;
    font-size: 3.5rem;
    font-weight: 700;
    color: var(--text-primary);
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 0.5rem;
}

.hero-main-title .highlight {
    color: var(--accent-color);
    text-shadow: 0 0 30px rgba(79, 195, 247, 0.5);
}

.urgency-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(79, 195, 247, 0.15);
    border: 1px solid var(--accent-color);
    border-radius: 50px;
    padding: 8px 24px;
    margin-bottom: 1rem;
}

.badge-pulse {
    width: 8px;
    height: 8px;
    background: var(--accent-color);
    border-radius: 50%;
    animation: badgePulse 1.5s ease-in-out infinite;
}

@keyframes badgePulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(1.2); }
}

.badge-text {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--accent-color);
    letter-spacing: 2px;
}

.founder-promo {
    color: var(--text-secondary);
    font-size: 1rem;
    margin-bottom: 2rem;
}

.founder-link {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 600;
    padding: 4px 12px;
    background: rgba(79, 195, 247, 0.1);
    border-radius: 4px;
    transition: all 0.3s ease;
}

.founder-link:hover {
    background: rgba(79, 195, 247, 0.2);
    color: #fff;
}

/* Countdown Container */
.countdown-container {
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.9) 100%);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(79, 195, 247, 0.2);
    border-radius: 20px;
    padding: 2.5rem;
    max-width: 700px;
    margin: 0 auto 2rem;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.05);
}

/* Animated glow border */
.countdown-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--accent-color), transparent);
    animation: glowPulse 3s ease-in-out infinite;
}

@keyframes glowPulse {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 1; }
}

.countdown-header {
    font-family: 'Cinzel', serif;
    font-size: 1.1rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 1.5rem;
}

.countdown {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
}

.countdown-item {
    text-align: center;
    min-width: 80px;
    padding: 10px;
    background: rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    border: 1px solid rgba(79, 195, 247, 0.1);
}

.countdown-number {
    font-family: 'Montserrat', sans-serif;
    font-size: 3.5rem;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1;
    display: block;
    text-shadow: 0 0 30px rgba(79, 195, 247, 0.3);
}

.countdown-label {
    font-size: 0.75rem;
    color: var(--accent-color);
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-top: 8px;
    display: block;
    opacity: 0.8;
}

.countdown-separator {
    font-size: 3rem;
    color: var(--accent-color);
    font-weight: 300;
    margin-bottom: 20px;
    opacity: 0.5;
}

/* Players Counter */
.players-counter {
    border-top: 1px solid rgba(79, 195, 247, 0.15);
    padding-top: 1.5rem;
    margin-top: 0.5rem;
}

.counter-label {
    font-size: 0.75rem;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 2px;
    display: block;
    margin-bottom: 0.5rem;
}

.counter-value {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.counter-dot {
    width: 10px;
    height: 10px;
    background: #22c55e;
    border-radius: 50%;
    animation: counterPulse 2s ease-in-out infinite;
}

@keyframes counterPulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.5); }
    50% { box-shadow: 0 0 0 8px rgba(34, 197, 94, 0); }
}

.counter-number {
    font-family: 'Cinzel', serif;
    font-size: 2rem;
    font-weight: 700;
    color: var(--accent-color);
}

/* Pre-register Button */
.btn-preregister {
    display: inline-block;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 2px;
    padding: 18px 50px;
    border-radius: var(--header-radius);
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 8px 30px rgba(52, 152, 219, 0.4);
}

.btn-preregister:hover {
    background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
    transform: translateY(-3px);
    box-shadow: 0 12px 40px rgba(79, 195, 247, 0.5);
    color: white;
}

/* ===============================================
   TIMELINE SECTION
   =============================================== */
.timeline-section {
    padding: 60px 0;
}

.section-title-modern {
    font-family: 'Cinzel', serif;
    font-size: 2rem;
    color: var(--text-primary);
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 3rem;
}

.timeline-wrapper {
    position: relative;
    max-width: 1100px;
    margin: 0 auto;
}

.timeline-progress {
    position: absolute;
    top: 35px;
    left: 10%;
    right: 10%;
    height: 4px;
    background: var(--dark-border);
    border-radius: 2px;
    z-index: 0;
}

.timeline-progress-bar {
    height: 100%;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    border-radius: 2px;
    transition: width 0.5s ease;
}

.timeline-phases {
    display: flex;
    justify-content: space-between;
    position: relative;
    z-index: 1;
}

.timeline-phase {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 320px;
}

.phase-icon {
    width: 70px;
    height: 70px;
    background: var(--dark-surface);
    border: 3px solid var(--dark-border);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.phase-icon i {
    font-size: 1.5rem;
    color: var(--text-secondary);
}

.timeline-phase.completed .phase-icon {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.timeline-phase.completed .phase-icon i {
    color: white;
}

.timeline-phase.active .phase-icon {
    background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
    border-color: var(--accent-color);
    box-shadow: 0 0 30px rgba(79, 195, 247, 0.5);
    animation: phaseGlow 2s ease-in-out infinite;
}

.timeline-phase.active .phase-icon i {
    color: white;
}

@keyframes phaseGlow {
    0%, 100% { box-shadow: 0 0 20px rgba(79, 195, 247, 0.4); }
    50% { box-shadow: 0 0 40px rgba(79, 195, 247, 0.6); }
}

.phase-card {
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.6) 0%, rgba(15, 23, 42, 0.8) 100%);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(79, 195, 247, 0.15);
    border-radius: 16px;
    padding: 1.8rem;
    text-align: center;
    width: 100%;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.phase-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.timeline-phase.completed .phase-card::before {
    opacity: 0.5;
    background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
}

.timeline-phase.active .phase-card::before {
    opacity: 1;
    background: linear-gradient(90deg, transparent, var(--accent-color), transparent);
    animation: glowPulse 2s ease-in-out infinite;
}

.timeline-phase.active .phase-card {
    border-color: rgba(79, 195, 247, 0.3);
    box-shadow: 0 8px 40px rgba(79, 195, 247, 0.15);
}

.phase-card:hover {
    transform: translateY(-5px);
    border-color: rgba(79, 195, 247, 0.3);
}

.phase-date {
    display: inline-block;
    font-size: 0.8rem;
    color: var(--accent-color);
    font-weight: 600;
    margin-bottom: 0.5rem;
    padding: 4px 12px;
    background: rgba(79, 195, 247, 0.1);
    border-radius: 20px;
}

.phase-title {
    font-family: 'Cinzel', serif;
    font-size: 1.25rem;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.phase-desc {
    color: var(--text-secondary);
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.phase-list {
    list-style: none;
    padding: 0;
    margin: 0 0 1rem 0;
    text-align: left;
}

.phase-list li {
    color: var(--text-secondary);
    font-size: 0.85rem;
    padding: 4px 0;
    padding-left: 15px;
    position: relative;
}

.phase-list li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 6px;
    height: 6px;
    background: var(--primary-color);
    border-radius: 50%;
}

.phase-status {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 0.8rem;
    padding-top: 1rem;
    border-top: 1px solid var(--glass-border);
}

.phase-status.completed {
    color: var(--primary-color);
}

.phase-status.active {
    color: #22c55e;
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: currentColor;
}

/* ===============================================
   SERVER INFO SECTION
   =============================================== */
.server-info-section {
    padding: 60px 0 100px;
}

@media (max-width: 768px) {
    .server-info-section {
        padding-bottom: 40px; /* Body already has padding-bottom for mobile nav */
    }
}

.info-cards-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    max-width: 1100px;
    margin: 0 auto;
}

.info-card {
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.6) 0%, rgba(15, 23, 42, 0.8) 100%);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(79, 195, 247, 0.15);
    border-radius: 16px;
    padding: 2rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

/* Glassmorphism shine effect */
.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05), transparent);
    transition: left 0.6s ease;
    pointer-events: none;
}

/* Top glow line */
.info-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--accent-color), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.info-card:hover {
    border-color: rgba(79, 195, 247, 0.4);
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4), 0 0 40px rgba(79, 195, 247, 0.1);
}

.info-card:hover::before {
    left: 100%;
}

.info-card:hover::after {
    opacity: 1;
}

.info-card-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 1.5rem;
}

.info-card-header i {
    font-size: 1.8rem;
    color: var(--accent-color);
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(79, 195, 247, 0.1);
    border-radius: 12px;
    border: 1px solid rgba(79, 195, 247, 0.2);
    transition: all 0.3s ease;
}

.info-card:hover .info-card-header i {
    background: rgba(79, 195, 247, 0.2);
    transform: scale(1.1);
    box-shadow: 0 0 20px rgba(79, 195, 247, 0.3);
}

.info-card-header h3 {
    font-family: 'Cinzel', serif;
    font-size: 1.2rem;
    color: var(--text-primary);
    margin: 0;
    letter-spacing: 0.5px;
}

.info-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-secondary);
    font-size: 0.95rem;
    padding: 12px 0;
    border-bottom: 1px solid rgba(79, 195, 247, 0.1);
    transition: all 0.3s ease;
}

.info-list li:hover {
    color: var(--text-primary);
    padding-left: 5px;
}

.info-list li:last-child {
    border-bottom: none;
}

.info-list li i {
    color: var(--accent-color);
    font-size: 0.6rem;
    opacity: 0.7;
}

.info-list li strong {
    color: var(--accent-color);
    font-weight: 600;
}

.info-text {
    color: var(--text-secondary);
    font-size: 0.95rem;
    margin-bottom: 1.5rem;
    line-height: 1.7;
}

.info-btn {
    display: inline-block;
    width: 100%;
    text-align: center;
    background: linear-gradient(135deg, rgba(79, 195, 247, 0.1) 0%, rgba(52, 152, 219, 0.1) 100%);
    border: 1px solid rgba(79, 195, 247, 0.3);
    color: var(--accent-color);
    font-family: 'Montserrat', sans-serif;
    font-size: 0.85rem;
    font-weight: 600;
    letter-spacing: 1px;
    padding: 14px 20px;
    border-radius: 10px;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.info-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s ease;
}

.info-btn:hover {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
}

.info-btn:hover::before {
    left: 100%;
}

/* ===============================================
   RESPONSIVE
   =============================================== */
@media (max-width: 992px) {
    .hero-main-title {
        font-size: 2.5rem;
    }

    .timeline-phases {
        flex-direction: column;
        gap: 2rem;
    }

    .timeline-phase {
        max-width: 100%;
    }

    .timeline-progress {
        display: none;
    }

    .info-cards-wrapper {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .info-card {
        padding: 1.5rem;
    }

    .info-card-header i {
        width: 45px;
        height: 45px;
        font-size: 1.5rem;
    }
}

@media (max-width: 768px) {
    .hero-main-title {
        font-size: 2rem;
        letter-spacing: 1px;
    }

    .countdown-number {
        font-size: 2.5rem;
    }

    .countdown-item {
        min-width: 60px;
    }

    .countdown-separator {
        font-size: 2rem;
    }

    .btn-preregister {
        padding: 15px 40px;
        font-size: 0.9rem;
    }

    .section-title-modern {
        font-size: 1.5rem;
    }
}

@media (max-width: 576px) {
    .hero-main-title {
        font-size: 1.6rem;
    }

    .countdown-container {
        padding: 1.5rem 1rem;
    }

    .countdown-number {
        font-size: 2rem;
    }

    .countdown-item {
        min-width: 50px;
    }

    .countdown-separator {
        font-size: 1.5rem;
        margin: 0 2px;
    }

    .counter-number {
        font-size: 1.5rem;
    }
}
</style>

<script>
// Countdown Timer - Optimized
(function() {
    const launchDate = new Date('March 1, 2026 19:00:00').getTime();

    // Cache DOM elements
    const countdownEl = document.getElementById('countdown');
    const daysEl = document.getElementById('days');
    const hoursEl = document.getElementById('hours');
    const minutesEl = document.getElementById('minutes');
    const secondsEl = document.getElementById('seconds');

    let intervalId = null;
    let isPageVisible = !document.hidden;

    function updateCountdown() {
        const now = Date.now();
        const distance = launchDate - now;

        if (distance < 0) {
            clearInterval(intervalId);
            countdownEl.innerHTML = '<p style="color: var(--accent-color); font-size: 1.5rem;">O SERVIDOR ESTA NO AR!</p>';
            return;
        }

        const days = Math.floor(distance / 86400000);
        const hours = Math.floor((distance % 86400000) / 3600000);
        const minutes = Math.floor((distance % 3600000) / 60000);
        const seconds = Math.floor((distance % 60000) / 1000);

        // Use textContent assignment (faster than padStart for simple cases)
        daysEl.textContent = (days < 10 ? '0' : '') + days;
        hoursEl.textContent = (hours < 10 ? '0' : '') + hours;
        minutesEl.textContent = (minutes < 10 ? '0' : '') + minutes;
        secondsEl.textContent = (seconds < 10 ? '0' : '') + seconds;
    }

    // Pause countdown when page is hidden
    document.addEventListener('visibilitychange', function() {
        isPageVisible = !document.hidden;

        if (isPageVisible && !intervalId) {
            updateCountdown();
            intervalId = setInterval(updateCountdown, 1000);
        } else if (!isPageVisible && intervalId) {
            clearInterval(intervalId);
            intervalId = null;
        }
    });

    // Start countdown
    updateCountdown();
    intervalId = setInterval(updateCountdown, 1000);
})();
</script>
