<!-- ==================  RANKINGS - MODERN LAYOUT ================ -->

<div class="ranking-page">
    <!-- Header -->
    <div class="ranking-header">
        <h1 class="ranking-title">Hall da <span class="highlight">Fama</span></h1>
        <p class="ranking-subtitle">Os maiores heróis de Midgard</p>
    </div>

    <!-- Tabs de Navegação -->
    <nav class="ranking-tabs">
        <a href="?to=ranking&type=personagens" class="ranking-tab <?php echo ($_GET['type'] == 'personagens' || empty($_GET['type'])) ? 'active' : ''; ?>">
            <i class="fas fa-user"></i>
            <span>Personagens</span>
        </a>
        <a href="?to=ranking&type=guilds" class="ranking-tab <?php echo $_GET['type'] == 'guilds' ? 'active' : ''; ?>">
            <i class="fas fa-shield-alt"></i>
            <span>Guildas</span>
        </a>
        <a href="?to=ranking&type=alquimistas" class="ranking-tab <?php echo $_GET['type'] == 'alquimistas' ? 'active' : ''; ?>">
            <i class="fas fa-flask"></i>
            <span>Alquimistas</span>
        </a>
        <a href="?to=ranking&type=ferreiros" class="ranking-tab <?php echo $_GET['type'] == 'ferreiros' ? 'active' : ''; ?>">
            <i class="fas fa-hammer"></i>
            <span>Ferreiros</span>
        </a>
    </nav>

    <!-- Conteúdo do Ranking -->
    <div class="ranking-content">

<?php if($_GET['type'] == 'personagens' || empty($_GET['type'])): ?>

        <?php if ($chars): ?>
            <div class="ranking-list">
                <?php foreach ($chars as $key => $char): ?>
                <div class="ranking-item <?php echo $key == 0 ? 'gold' : ($key == 1 ? 'silver' : ($key == 2 ? 'bronze' : '')); ?>">
                    <div class="ranking-position">
                        <?php if($key < 3): ?>
                            <i class="fas fa-crown"></i>
                        <?php endif; ?>
                        <span class="position-number"><?php echo $key + 1; ?><?php echo (strtolower($char['sex']) == 'f') ? 'ª' : 'º'; ?></span>
                    </div>
                    <div class="ranking-avatar">
                        <img src="<?php echo iconClass($char['char_class']); ?>" alt="<?php echo getClasse($char['char_class']); ?>">
                    </div>
                    <div class="ranking-info">
                        <h3 class="ranking-name"><?php echo htmlspecialchars($char['char_name']); ?></h3>
                        <span class="ranking-class"><?php echo getClasse($char['char_class']); ?></span>
                        <?php if($char['guild_id']): ?>
                            <span class="ranking-guild"><i class="fas fa-shield-alt"></i> <?php echo RECLASSIC::getGuildName($char['guild_id']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="ranking-stats">
                        <div class="stat-item">
                            <span class="stat-label">Base</span>
                            <span class="stat-value"><?php echo $char['base_level']; ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Job</span>
                            <span class="stat-value"><?php echo $char['job_level']; ?></span>
                        </div>
                        <div class="stat-item exp">
                            <span class="stat-label">Exp Base</span>
                            <span class="stat-value"><?php echo formatarNumero($char['base_exp']); ?></span>
                        </div>
                        <div class="stat-item exp">
                            <span class="stat-label">Exp Job</span>
                            <span class="stat-value"><?php echo formatarNumero($char['job_exp']); ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="ranking-empty">
                <i class="fas fa-users-slash"></i>
                <p>Nenhum personagem encontrado.</p>
                <a href="./" class="btn-back">Voltar ao início</a>
            </div>
        <?php endif; ?>

<?php elseif($_GET['type'] == 'guilds'): ?>

        <?php if ($chars): ?>
            <div class="ranking-list">
                <?php foreach ($chars as $key => $guild): ?>
                <div class="ranking-item <?php echo $key == 0 ? 'gold' : ($key == 1 ? 'silver' : ($key == 2 ? 'bronze' : '')); ?>">
                    <div class="ranking-position">
                        <?php if($key < 3): ?>
                            <i class="fas fa-crown"></i>
                        <?php endif; ?>
                        <span class="position-number"><?php echo $key + 1; ?>º</span>
                    </div>
                    <div class="ranking-avatar guild-avatar">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="ranking-info">
                        <h3 class="ranking-name"><?php echo htmlspecialchars($guild['name']); ?></h3>
                        <span class="ranking-class">Nível <?php echo $guild['guild_lv']; ?></span>
                        <span class="ranking-guild"><i class="fas fa-users"></i> <?php echo $guild['members']; ?> membros</span>
                    </div>
                    <div class="ranking-stats">
                        <div class="stat-item">
                            <span class="stat-label">Castelos</span>
                            <span class="stat-value"><?php echo $guild['castles']; ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Média Lv</span>
                            <span class="stat-value"><?php echo $guild['average_lv']; ?></span>
                        </div>
                        <div class="stat-item exp">
                            <span class="stat-label">Experiência</span>
                            <span class="stat-value"><?php echo formatarNumero($guild['exp']); ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="ranking-empty">
                <i class="fas fa-shield-alt"></i>
                <p>Nenhuma guilda encontrada.</p>
                <a href="./" class="btn-back">Voltar ao início</a>
            </div>
        <?php endif; ?>

<?php elseif($_GET['type'] == 'alquimistas'): ?>

        <?php if ($chars): ?>
            <div class="ranking-list">
                <?php foreach ($chars as $key => $char): ?>
                <div class="ranking-item <?php echo $key == 0 ? 'gold' : ($key == 1 ? 'silver' : ($key == 2 ? 'bronze' : '')); ?>">
                    <div class="ranking-position">
                        <?php if($key < 3): ?>
                            <i class="fas fa-crown"></i>
                        <?php endif; ?>
                        <span class="position-number"><?php echo $key + 1; ?><?php echo (strtolower($char['sex']) == 'f') ? 'ª' : 'º'; ?></span>
                    </div>
                    <div class="ranking-avatar">
                        <img src="<?php echo iconClass($char['char_class']); ?>" alt="<?php echo getClasse($char['char_class']); ?>">
                    </div>
                    <div class="ranking-info">
                        <h3 class="ranking-name"><?php echo htmlspecialchars($char['char_name']); ?></h3>
                        <span class="ranking-class"><?php echo getClasse($char['char_class']); ?></span>
                        <?php if($char['guild_id']): ?>
                            <span class="ranking-guild"><i class="fas fa-shield-alt"></i> <?php echo RECLASSIC::getGuildName($char['guild_id']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="ranking-stats">
                        <div class="stat-item highlight-stat">
                            <span class="stat-label">Fama</span>
                            <span class="stat-value"><?php echo formatarNumero($char['fame']); ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Base</span>
                            <span class="stat-value"><?php echo $char['base_level']; ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Job</span>
                            <span class="stat-value"><?php echo $char['job_level']; ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="ranking-empty">
                <i class="fas fa-flask"></i>
                <p>Nenhum alquimista encontrado.</p>
                <a href="./" class="btn-back">Voltar ao início</a>
            </div>
        <?php endif; ?>

<?php elseif($_GET['type'] == 'ferreiros'): ?>

        <?php if ($chars): ?>
            <div class="ranking-list">
                <?php foreach ($chars as $key => $char): ?>
                <div class="ranking-item <?php echo $key == 0 ? 'gold' : ($key == 1 ? 'silver' : ($key == 2 ? 'bronze' : '')); ?>">
                    <div class="ranking-position">
                        <?php if($key < 3): ?>
                            <i class="fas fa-crown"></i>
                        <?php endif; ?>
                        <span class="position-number"><?php echo $key + 1; ?><?php echo (strtolower($char['sex']) == 'f') ? 'ª' : 'º'; ?></span>
                    </div>
                    <div class="ranking-avatar">
                        <img src="<?php echo iconClass($char['char_class']); ?>" alt="<?php echo getClasse($char['char_class']); ?>">
                    </div>
                    <div class="ranking-info">
                        <h3 class="ranking-name"><?php echo htmlspecialchars($char['char_name']); ?></h3>
                        <span class="ranking-class"><?php echo getClasse($char['char_class']); ?></span>
                        <?php if($char['guild_id']): ?>
                            <span class="ranking-guild"><i class="fas fa-shield-alt"></i> <?php echo RECLASSIC::getGuildName($char['guild_id']); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="ranking-stats">
                        <div class="stat-item highlight-stat">
                            <span class="stat-label">Fama</span>
                            <span class="stat-value"><?php echo formatarNumero($char['fame']); ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Base</span>
                            <span class="stat-value"><?php echo $char['base_level']; ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Job</span>
                            <span class="stat-value"><?php echo $char['job_level']; ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="ranking-empty">
                <i class="fas fa-hammer"></i>
                <p>Nenhum ferreiro encontrado.</p>
                <a href="./" class="btn-back">Voltar ao início</a>
            </div>
        <?php endif; ?>

<?php endif; ?>

    </div>
</div>

<script>
// Função para navegação AJAX dos rankings
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.ranking-tab');

    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.href;

            // Atualiza URL no navegador
            window.history.pushState(null, '', url);

            // Requisição AJAX
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, 'text/html');
                    const newContent = doc.querySelector('.ranking-page');
                    const currentContent = document.querySelector('.ranking-page');

                    if (currentContent && newContent) {
                        currentContent.innerHTML = newContent.innerHTML;
                        // Reaplica eventos aos novos tabs
                        initTabs();
                    }
                })
                .catch(error => console.error('Erro:', error));
        });
    });

    function initTabs() {
        const newTabs = document.querySelectorAll('.ranking-tab');
        newTabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.href;
                window.history.pushState(null, '', url);

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');
                        const newContent = doc.querySelector('.ranking-page');
                        const currentContent = document.querySelector('.ranking-page');

                        if (currentContent && newContent) {
                            currentContent.innerHTML = newContent.innerHTML;
                            initTabs();
                        }
                    })
                    .catch(error => console.error('Erro:', error));
            });
        });
    }
});
</script>
