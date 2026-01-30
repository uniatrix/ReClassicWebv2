<!-- ==================  MAP DETAIL - MODERN LAYOUT ================ -->

<!-- Toast Notification -->
<div id="map-toast" class="map-toast">
    <i class="fas fa-check-circle"></i>
    <span>Copiado para área de transferência!</span>
</div>

<div class="map-page">
    <!-- Breadcrumb -->
    <div class="map-breadcrumb">
        <a href="?to=database&type=mapas" class="breadcrumb-back">
            <i class="fas fa-arrow-left"></i>
        </a>
        <a href="?to=database&type=mapas">Mapas</a>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <span class="current"><?php echo $data['name']; ?></span>
    </div>

    <!-- Map Header -->
    <div class="map-header">
        <div class="map-preview">
            <img src="<?php echo iconMapa($idmapa, 2); ?>" alt="<?php echo $data['name']; ?>">
        </div>
        <div class="map-info">
            <h1 class="map-title"><?php echo $data['mapname']; ?></h1>
            <p class="map-subtitle"><?php echo $data['name']; ?></p>
            <div class="map-mini-preview">
                <img src="<?php echo iconMapa($idmapa, 1); ?>" alt="Minimap">
            </div>
        </div>
    </div>

    <!-- Monsters Section -->
    <?php if ($mobs): ?>
    <section class="map-section">
        <div class="section-header">
            <i class="fas fa-dragon"></i>
            <h2>Monstros (<?php echo count($mobs); ?>)</h2>
        </div>

        <div class="map-grid">
            <?php foreach ($mobs as $mob): ?>
                <?php
                $monsterId = $mob['monsterId'];
                $sql = "(SELECT * FROM mob_db WHERE id = '$monsterId')
                        UNION
                        (SELECT * FROM mob_db2 WHERE id = '$monsterId')";
                $result = mysqli_query($conn, $sql);
                $ismvp = '';
                $nomeMob = '';
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ismvp = $row['mvp_exp'];
                        $nomeMob = $row['name_english'];
                    }
                }
                ?>
                <a href="?to=vermonstro&id=<?php echo $mob['monsterId']; ?>" class="map-card monster-card <?php echo ($ismvp) ? 'mvp' : ''; ?>">
                    <div class="card-image">
                        <img src="<?php echo monsterImageIndex($mob['monsterId']); ?>" alt="<?php echo $nomeMob; ?>">
                    </div>
                    <div class="card-info">
                        <h3 class="card-name">
                            <?php echo $nomeMob; ?>
                            <?php if ($ismvp): ?>
                                <span class="mvp-badge">MVP</span>
                            <?php endif; ?>
                        </h3>
                        <div class="card-details">
                            <span><i class="fas fa-layer-group"></i> <?php echo $mob['amount']; ?>x</span>
                            <span><i class="fas fa-clock"></i> <?php echo converterTempo($mob['respawnTime']); ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- NPCs Section -->
    <?php if (!empty($npcs)): ?>
    <section class="map-section">
        <div class="section-header">
            <i class="fas fa-user-tie"></i>
            <h2>NPCs (<?php echo count($npcs); ?>)</h2>
        </div>

        <div class="map-grid">
            <?php foreach ($npcs as $key => $npc): ?>
                <div class="map-card npc-card" data-navi="/navi <?php echo $npc['mapname'] . ' ' . $npc['x'] . '/' . $npc['y']; ?>" onclick="copyNavi(this)">
                    <div class="card-image">
                        <img src="<?php echo npcImage($npc['job']); ?>" alt="<?php echo $npc['name']; ?>">
                    </div>
                    <div class="card-info">
                        <h3 class="card-name"><?php echo $npc['name']; ?></h3>
                        <div class="card-details">
                            <span><i class="fas fa-map-marker-alt"></i> <?php echo $npc['mapname']; ?></span>
                            <span><i class="fas fa-crosshairs"></i> <?php echo $npc['x'] . ', ' . $npc['y']; ?></span>
                        </div>
                    </div>
                    <div class="card-copy-hint">
                        <i class="fas fa-copy"></i> Clique para copiar /navi
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>
</div>

<script>
function copyNavi(element) {
    const textToCopy = element.dataset.navi;

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(textToCopy).then(() => {
            showMapToast();
        }).catch(() => {
            fallbackCopy(textToCopy);
        });
    } else {
        fallbackCopy(textToCopy);
    }
}

function fallbackCopy(text) {
    const tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999);
    document.execCommand('copy');
    document.body.removeChild(tempInput);
    showMapToast();
}

function showMapToast() {
    const toast = document.getElementById('map-toast');
    if (toast) {
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 2500);
    }
}
</script>
