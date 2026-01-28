<!-- Estatísticas e Características do Servidor -->
<section class="container my-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h2 class="section-title">Características do Servidor</h2>
            <p class="section-subtitle text-light-50 mt-3">Experimente o Ragnarok Online com recursos e melhorias únicas</p>
        </div>

        <!-- Server Stats -->
        <div class="col-12">
            <div class="card-body p-2">
                <div class="row g-4">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="stat-item">
                            <div class="stat-number">1500+</div>
                            <div class="stat-label">Jogadores Ativos</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="stat-item">
                            <div class="stat-number">99.9%</div>
                            <div class="stat-label">Uptime</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 mx-auto">
                        <div class="stat-item">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Suporte</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Server Features -->
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mt-5">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper">
                        <i class="fas fa-balance-scale feature-icon mb-3 logo-pulse"></i>
                    </div>
                    <h4 class="card-title">Gameplay Balanceado</h4>
                    <p class="card-text text-light">Classes e habilidades cuidadosamente balanceadas para uma experiência justa e divertida para todos os jogadores.</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mt-5">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper">
                        <i class="fas fa-gem feature-icon mb-3 logo-pulse"></i>
                    </div>
                    <h4 class="card-title">Itens Exclusivos</h4>
                    <p class="card-text text-light">Descubra equipamentos e itens exclusivos disponíveis apenas em nosso servidor.</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4 mt-5">
            <div class="card h-100">
                <div class="card-body text-center p-4">
                    <div class="icon-wrapper">
                        <i class="fas fa-map-marked-alt feature-icon mb-3 logo-pulse"></i>
                    </div>
                    <h4 class="card-title">Dungeons Reimaginadas</h4>
                    <p class="card-text text-light">Explore dungeons de episódios futuros com recompensas especiais.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Chamada para Ação -->
<section class="container my-5">
    <div class="adventure-card pixel-container">
        <div class="adventure-bg"></div>
        <div class="adventure-content p-md-5 p-4 text-center">
            <h2 class="adventure-title mb-4">Pronto para Iniciar sua Aventura?</h2>
            <p class="adventure-text mb-4">Crie sua conta agora e mergulhe no mundo de Ragnarok ReClassic!</p>
            <div class="d-flex justify-content-center gap-4 flex-wrap">
                <a href="?to=registro" class="btn-adventure pulse-btn mb-2 mb-md-0">
                    <span class="btn-text">Criar Conta</span>
                </a>
                <a href="https://drive.google.com/file/d/1ROEqhrWH4mnp40ULfnM0wul84jp6knn4/view?usp=sharing" target="_blank" class="btn-adventure pulse-btn">
                    <span class="btn-text">Baixar Jogo</span>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
    }
    
    .section-title {
        font-family: 'Silkscreen', cursive;
        color: var(--accent-color);
        text-shadow: 3px 3px 0 rgba(0,0,0,0.5);
        margin-bottom: 1rem;
    }
    
    .section-subtitle {
        font-family: 'Pixelify Sans', sans-serif;
        font-size: 1.2rem;
        letter-spacing: 0.5px;
    }
    
    /* Icon wrapper styles */
    .icon-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 0.5rem;
    }
    
    .icon-wrapper:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 60px;
        height: 60px;
        background: radial-gradient(circle, rgba(81, 200, 250, 0.4) 0%, rgba(81, 200, 250, 0) 70%);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        z-index: 0;
        opacity: 0.7;
        animation: iconGlow 4s cubic-bezier(0.215, 0.610, 0.355, 1.000) infinite;
    }
    
    .feature-icon {
        position: relative;
        z-index: 1;
        font-size: 2rem;
        color: var(--accent-color);
    }
    
    @keyframes iconGlow {
        0% {
            opacity: 0.4;
            transform: translate(-50%, -50%) scale(0.8);
        }
        50% {
            opacity: 0.8;
            transform: translate(-50%, -50%) scale(1.2);
        }
        100% {
            opacity: 0.4;
            transform: translate(-50%, -50%) scale(0.8);
        }
    }
    
    /* Adventure Call-to-Action Section */
    .adventure-card {
        position: relative;
        overflow: hidden;
        padding: 0;
        border-width: 4px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }
    
    .adventure-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('assets/pronterabg.jpeg') center center/cover no-repeat;
        z-index: 0;
        overflow: hidden;
    }
    
    .adventure-bg:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(30, 77, 138, 0.8), rgba(12, 45, 82, 0.9));
        opacity: 0.85;
        animation: pulseOverlay 8s ease-in-out infinite;
    }
    
    .adventure-bg:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, transparent 0%, rgba(0,0,0,0.5) 100%);
    }
    
    .adventure-content {
        position: relative;
        z-index: 1;
    }
    
    .adventure-title {
        font-family: 'Silkscreen', cursive;
        color: #51c8fa;
        font-size: 2.2rem;
        text-shadow: 3px 3px 0 rgba(0,0,0,0.5),
                     5px 5px 10px rgba(81, 200, 250, 0.3);
        transform: translateY(0);
        animation: floatText 3s ease-in-out infinite;
    }
    
    .adventure-text {
        color: #ffffff;
        font-size: 1.2rem;
        font-family: 'Pixelify Sans', sans-serif;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        max-width: 800px;
        margin: 0 auto 2rem;
    }
    
    .btn-adventure {
        display: inline-block;
        background: linear-gradient(to bottom, #51c8fa, #2980b9);
        color: white;
        font-family: 'Silkscreen', cursive;
        padding: 0.8rem 2rem;
        border: 3px solid #1a5380;
        position: relative;
        transition: all 0.3s;
        text-shadow: 2px 2px 0 rgba(0,0,0,0.3);
        text-decoration: none;
        min-width: 180px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        transform: translateY(0);
    }
    
    .btn-adventure:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(255,255,255,0.2), transparent);
        pointer-events: none;
    }
    
    .btn-adventure:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        color: white;
        background: linear-gradient(to bottom, #71d8ff, #3a90c9);
    }
    
    .btn-adventure:active {
        transform: translateY(1px);
    }
    
    .pulse-btn {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(81, 200, 250, 0.5);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(81, 200, 250, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(81, 200, 250, 0);
        }
    }
    
    @keyframes floatText {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }
    
    @keyframes pulseOverlay {
        0%, 100% {
            opacity: 0.85;
        }
        50% {
            opacity: 0.75;
        }
    }
    
    /* Responsive improvements */
    @media (max-width: 768px) {
        .card {
            margin-bottom: 20px;
        }
        
        .stat-number {
            font-size: 1.8rem;
        }
        
        .stat-label {
            font-size: 0.9rem;
        }
        
        .card-title {
            font-size: 1.4rem;
        }
        
        .card-text {
            font-size: 0.9rem;
        }
        
        .btn-custom {
            width: 100%;
            margin-bottom: 10px;
        }
        
        .adventure-title {
            font-size: 1.8rem;
        }
        
        .adventure-text {
            font-size: 1rem;
        }
        
        .btn-adventure {
            min-width: 160px;
            padding: 0.7rem 1.5rem;
        }
    }
    
    @media (max-width: 576px) {
        .stat-item {
            padding: 15px 10px;
        }
        
        .game-stats {
            padding: 15px !important;
        }
        
        .card-body {
            padding: 1.25rem !important;
        }
        
        .container {
            padding-left: 20px;
            padding-right: 20px;
        }
    }
    
    @media (min-width: 992px) {
        .card {
            min-height: 280px;
        }
    }
</style> 