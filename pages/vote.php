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

    <!-- Sites de Votação -->
    <?php if ($results): ?>
        <div class="vote-sites-grid">
            <?php foreach ($results as $key => $row): ?>
                <?php
                $id_site = $row['site_id'];
                $conta = $_SESSION['conta'];
                $sql_logs = "SELECT `unblock_time` FROM v4p_registros WHERE account_id = '$conta' AND f_site_id = '$id_site'";
                $sth = $conn->query($sql_logs);
                $result_logs = $sth->fetch_assoc();
                $is_blocked = isset($result_logs['unblock_time']) && $result_logs['unblock_time'] >= date("Y-m-d H:i:s", time());
                ?>

                <div class="vote-site-card <?php echo $is_blocked ? 'blocked' : 'available'; ?>">
                    <div class="site-banner">
                        <?php if(!empty($row['banner_url'])): ?>
                            <img src="<?php echo htmlspecialchars($row['banner_url']); ?>" alt="<?php echo htmlspecialchars($row['site_name']); ?>"/>
                        <?php elseif(file_exists($row['img_banner'])): ?>
                            <img src="<?php echo $row['img_banner']; ?>" alt="<?php echo htmlspecialchars($row['site_name']); ?>"/>
                        <?php else: ?>
                            <div class="site-banner-placeholder">
                                <i class="fas fa-vote-yea"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="site-content">
                        <h3 class="site-name"><?php echo htmlspecialchars($row['site_name']); ?></h3>

                        <div class="site-details">
                            <div class="site-reward">
                                <i class="fas fa-star"></i>
                                <span>+<?php echo htmlspecialchars($row['points']); ?> pontos</span>
                            </div>
                            <div class="site-cooldown-info">
                                <i class="fas fa-clock"></i>
                                <span>Espera: <?php echo $row['blocking_time']; ?></span>
                            </div>
                        </div>

                        <div class="site-action">
                            <?php if ($is_blocked): ?>
                                <div class="vote-cooldown">
                                    <i class="fas fa-hourglass-half"></i>
                                    <div class="cooldown-text">
                                        <span class="cooldown-label">Volte em</span>
                                        <span class="cooldown-time"><?php echo DateTime::createFromFormat('Y-m-d H:i:s', $result_logs['unblock_time'])->format('d/m H:i'); ?></span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="?to=vote&votar_em=<?php echo htmlspecialchars($row['site_id']); ?>" class="btn-vote">
                                    <i class="fas fa-external-link-alt"></i>
                                    <span>Votar</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="vote-empty">
            <i class="fas fa-vote-yea"></i>
            <p>Nenhum site disponível para votação no momento.</p>
            <a href="./" class="btn-back">Voltar ao início</a>
        </div>
    <?php endif; ?>
</div>
