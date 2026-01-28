        </div>
    </div>
    
    <!-- Modern Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <img src="assets/logo.png" alt="ReClassic Logo" class="mb-4" style="max-width: 150px;">
                    <p class="text-light-50">Reviva a nostalgia do Ragnarok Online clássico com melhorias modernas. Junte-se à nossa comunidade e comece sua aventura hoje!</p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="https://discord.gg/JG6vTMbT58" class="text-decoration-none" aria-label="Discord">
                            <i class="fab fa-discord fa-2x text-light"></i>
                        </a>
                        <a href="#" class="text-decoration-none" aria-label="Facebook">
                            <i class="fab fa-facebook fa-2x text-light"></i>
                        </a>
                        <a href="#" class="text-decoration-none" aria-label="Twitter">
                            <i class="fab fa-twitter fa-2x text-light"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="text-accent mb-4">Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="?to=inicio" class="text-decoration-none text-light-50">Início</a></li>
                        <li class="mb-2"><a href="?to=entrar" class="text-decoration-none text-light-50">Login</a></li>
                        <li class="mb-2"><a href="?to=registro" class="text-decoration-none text-light-50">Registrar</a></li>
                        <li class="mb-2"><a href="?to=vote" class="text-decoration-none text-light-50">Votar</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="text-accent mb-4">Recursos</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="?to=comercio&type=vendedores" class="text-decoration-none text-light-50">Mercadores</a></li>
                        <li class="mb-2"><a href="?to=database&type=itens" class="text-decoration-none text-light-50">Database</a></li>
                        <li class="mb-2"><a href="?to=ranking&type=personagens" class="text-decoration-none text-light-50">Rankings</a></li>
                        <li class="mb-2"><a href="wiki/index.php/P%C3%A1gina_principal" class="text-decoration-none text-light-50">Wiki</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h5 class="text-accent mb-4">Download</h5>
                    <p class="text-light-50">Comece a jogar ReClassic Ragnarok Online</p>
                    <a href="https://drive.google.com/file/d/1ROEqhrWH4mnp40ULfnM0wul84jp6knn4/view?usp=sharing" target="_blank" class="btn btn-custom mt-2">
                        <i class="fas fa-download me-2"></i>Baixar Cliente do Jogo
                    </a>
                </div>
            </div>
            <hr class="mt-5 mb-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0 text-light-50">© <?php echo date("Y") ?> ReClassic Ragnarok Online. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-light-50">Ragnarok Online é uma marca registrada da Gravity Co., Ltd.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts with updated Bootstrap 5 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/@ruffle-rs/ruffle"></script>
    <script>
        window.addEventListener('load', () => {
            console.log("HTML loaded. Attempting to load SWF.");
            const container = document.getElementById('swf-container');
            const placeholder = document.getElementById('swf-placeholder');

            if (window.RufflePlayer) {
                const ruffle = window.RufflePlayer.newest();
                const player = ruffle.createPlayer();

                // Adjust the player size based on screen width
                if (window.innerWidth <= 968) {
                    player.style.width = '738px';  // 20% smaller
                    player.style.height = '347px';  // 20% smaller
                } else {
                    player.style.width = '760px';
                    player.style.height = '371px';
                }

                // Hide the container until fully loaded
                container.style.display = 'none';

                // Clear any loading message
                container.innerHTML = '';
                container.appendChild(player);

                // Player configuration
                const config = {
                    autoplay: "on",
                    unmuteOverlay: "hidden",
                    wmode: "transparent",
                };

                // Load the SWF
                player.load({
                    url: 'assets/movie.swf',
                    ...config
                }).then(() => {
                    console.log("SWF loaded successfully");
                    placeholder.style.display = 'none'; // Hide the placeholder
                    container.style.display = 'block'; // Show the container after loading
                }).catch((error) => {
                    console.error("Error loading SWF:", error);
                    placeholder.style.display = 'none'; // Hide the placeholder
                    container.innerHTML = '<p>Erro ao carregar SWF. Verifique o console para detalhes.</p>';
                    container.style.display = 'block'; // Show the container, even in case of an error
                });
            } else {
                console.error("RufflePlayer is not available.");
                placeholder.style.display = 'none'; // Hide the placeholder
                container.innerHTML = '<p>Ruffle Player não pôde ser carregado. Verifique sua configuração.</p>';
                container.style.display = 'block'; // Show the container, even in case of an error
            }
        });
    </script>

    <!-- Mobile Footer Navigation Bar -->
    <nav class="mobile-footer-nav" id="mobileFooterNav">
        <div class="mobile-footer-nav-container">
            <!-- Menu Button -->
            <a href="javascript:void(0);" class="mobile-nav-item" id="mobileMenuToggle">
                <i class="fas fa-bars"></i>
                <span>Menu</span>
            </a>

            <!-- Lojas Button -->
            <a href="?to=comercio&type=vendedores" class="mobile-nav-item">
                <i class="fas fa-store"></i>
                <span>Lojas</span>
            </a>

            <!-- RMT Button (Center - Prominent) -->
            <a href="?to=rmt" class="mobile-nav-item mobile-nav-balance">
                <div class="mobile-nav-balance-icon">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <span>RMT</span>
            </a>

            <!-- Account Button -->
            <?php if(isset($_SESSION["conta"]) && !empty($_SESSION["conta"])): ?>
                <a href="?to=conta" class="mobile-nav-item">
                    <i class="fas fa-user"></i>
                    <span>Conta</span>
                </a>
            <?php else: ?>
                <a href="?to=entrar" class="mobile-nav-item">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Entrar</span>
                </a>
            <?php endif; ?>

            <!-- Discord Button -->
            <a href="https://discord.gg/JG6vTMbT58" target="_blank" class="mobile-nav-item">
                <i class="fab fa-discord"></i>
                <span>Discord</span>
            </a>
        </div>
    </nav>

    <!-- Mobile Sliding Drawer Menu -->
    <div class="mobile-drawer-overlay" id="mobileDrawerOverlay"></div>
    <div class="mobile-drawer" id="mobileDrawer">
        <div class="mobile-drawer-header">
            <img src="assets/logo.png" alt="ReClassic Logo" class="mobile-drawer-logo">
            <button class="mobile-drawer-close" id="mobileDrawerClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="mobile-drawer-content">
            <a href="?to=inicio" class="mobile-drawer-item">
                <i class="fas fa-home"></i>
                <span>Inicio</span>
            </a>
            <a href="?to=database&type=itens" class="mobile-drawer-item">
                <i class="fas fa-database"></i>
                <span>Database</span>
            </a>
            <a href="?to=comercio&type=vendedores" class="mobile-drawer-item">
                <i class="fas fa-store"></i>
                <span>Mercadores</span>
            </a>
            <a href="?to=ranking&type=personagens" class="mobile-drawer-item">
                <i class="fas fa-trophy"></i>
                <span>Ranking</span>
            </a>
            <a href="wiki/index.php/P%C3%A1gina_principal" class="mobile-drawer-item">
                <i class="fas fa-book"></i>
                <span>Wiki</span>
            </a>
            <a href="?to=vote" class="mobile-drawer-item">
                <i class="fas fa-vote-yea"></i>
                <span>Votar</span>
            </a>

            <div class="mobile-drawer-divider"></div>

            <?php if(isset($_SESSION["conta"]) && !empty($_SESSION["conta"])): ?>
                <a href="?to=conta" class="mobile-drawer-item">
                    <i class="fas fa-user"></i>
                    <span>Minha Conta</span>
                </a>
                <a href="api/sair.php" class="mobile-drawer-item mobile-drawer-item-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </a>
            <?php else: ?>
                <a href="?to=entrar" class="mobile-drawer-item">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
                <a href="?to=registro" class="mobile-drawer-item">
                    <i class="fas fa-user-plus"></i>
                    <span>Criar Conta</span>
                </a>
            <?php endif; ?>

            <div class="mobile-drawer-divider"></div>

            <a href="https://drive.google.com/file/d/1ROEqhrWH4mnp40ULfnM0wul84jp6knn4/view?usp=sharing" target="_blank" class="mobile-drawer-item mobile-drawer-item-primary">
                <i class="fas fa-download"></i>
                <span>Download</span>
            </a>
        </div>
    </div>

    <!-- Mobile Drawer JavaScript -->
    <script>
    $(document).ready(function() {
        const $menuToggle = $('#mobileMenuToggle');
        const $drawer = $('#mobileDrawer');
        const $overlay = $('#mobileDrawerOverlay');
        const $closeBtn = $('#mobileDrawerClose');

        // Open drawer
        $menuToggle.on('click', function(e) {
            e.preventDefault();
            $drawer.addClass('active');
            $overlay.addClass('active');
            $('body').css('overflow', 'hidden');
        });

        // Close drawer function
        function closeDrawer() {
            $drawer.removeClass('active');
            $overlay.removeClass('active');
            $('body').css('overflow', '');
        }

        // Close on close button click
        $closeBtn.on('click', closeDrawer);

        // Close on overlay click
        $overlay.on('click', closeDrawer);

        // Close on escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $drawer.hasClass('active')) {
                closeDrawer();
            }
        });

        // Close drawer when clicking a link inside
        $('.mobile-drawer-item').on('click', function() {
            closeDrawer();
        });

        // Handle swipe to close (touch devices)
        let touchStartX = 0;
        let touchEndX = 0;

        const drawerEl = $drawer[0];
        if (drawerEl) {
            drawerEl.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            drawerEl.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                if (touchStartX - touchEndX > 50) {
                    closeDrawer();
                }
            }, { passive: true });
        }
    });
    </script>
</body>

</html>