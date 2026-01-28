<?php

if((!isset($_GET['type']) || empty($_GET['type'])) 
|| ($_GET['type'] != 'guilds' && $_GET['type'] != 'personagens' && $_GET['type'] != 'ferreiros' && $_GET['type'] != 'alquimistas')){
          header("Location: ?to=error");
        exit;
}

if($_GET['type'] == 'guilds'){

    $title = 'Ranking de Guildas';

    try {
        $castleNames = Castles();
        $ids = implode(',', array_fill(0, count($castleNames), '?'));
        $bind = array_values($castleNames); 

        $col  = "g.guild_id, g.name, g.guild_lv, g.average_lv, g.emblem_id as emblem, ";
        $col .= "GREATEST(g.exp, (SELECT SUM(exp) FROM ".RECLASSIC::getDBName().".guild_member WHERE guild_member.guild_id = g.guild_id)) AS exp, ";
        $col .= "(SELECT COUNT(char_id) FROM ".RECLASSIC::getDBName().".`char` WHERE `char`.guild_id = g.guild_id) AS members, ";
        $col .= "(SELECT COUNT(castle_id) FROM ".RECLASSIC::getDBName().".guild_castle WHERE guild_castle.guild_id = g.guild_id AND castle_id IN ($ids)) AS castles";

        $sql  = "SELECT $col FROM ".RECLASSIC::getDBName().".guild AS g ";
        $sql .= "LEFT JOIN ".RECLASSIC::getDBName().".`char` AS ch ON ch.char_id = g.char_id ";
        $sql .= "LEFT JOIN ".RECLASSIC::getDBName().".login ON login.account_id = ch.account_id ";

        $groups = [
            0 => 0,
            1 => 1,
            2 => 5,
        ];
        if (!empty($groups)) {
            $group_ids = implode(', ', array_fill(0, count($groups), '?'));
            $sql .= "WHERE login.group_id IN ($group_ids) ";
            $bind = array_merge($bind, array_values($groups)); 
        }

        $sql .= "ORDER BY g.guild_lv DESC, castles DESC, exp DESC, (g.average_lv + members) DESC, ";
        $sql .= "g.average_lv DESC, members DESC, g.max_member DESC, g.next_exp ASC ";
        $sql .= "LIMIT ".$config['Limit_Players_Rank'];

        $sth = $conn->prepare($sql);

        if ($sth === false) {
            throw new Exception("Erro ao preparar a consulta: " . $conn->error);
        }

        $types = str_repeat('i', count($bind));
        $sth->bind_param($types, ...$bind);

        $sth->execute();
        $result = $sth->get_result();
        $chars = $result->fetch_all(MYSQLI_ASSOC); 

        

    } catch (Exception $e) {
        define('__ERROR__', true);
        include('fatalerror.php');
        exit;
    }

}elseif($_GET['type'] == 'personagens'){

    $title = 'Ranking de Personagens';

 try {
        $classes = Jobs();
        $bind    = array();

        $col  = "ch.char_id, ch.sex, ch.name AS char_name, ch.class AS char_class, ch.base_level, ch.base_exp, ch.job_level, ch.job_exp, ";
        $col .= "ch.guild_id, guild.name AS guild_name, guild.emblem_id as emblem ";

        $sql  = "SELECT $col FROM ".RECLASSIC::getDBName().".`char` AS ch ";
        $sql .= "LEFT JOIN ".RECLASSIC::getDBName().".guild ON guild.guild_id = ch.guild_id ";
        $sql .= "LEFT JOIN ".RECLASSIC::getDBName().".login ON login.account_id = ch.account_id ";
        $sql .= "WHERE 1=1 ";

        $groups = [
            0 => 0,
            1 => 1,
            2 => 5,
        ];
        if (!empty($groups)) {
            $ids   = implode(', ', array_fill(0, count($groups), '?'));
            $sql  .= "AND login.group_id IN ($ids) ";
            $bind  = array_merge($bind, $groups);
        }

        $sql .= "ORDER BY ch.base_level DESC, ch.job_level DESC, ch.base_exp DESC, ch.job_exp DESC, ch.char_id ASC ";
        $sql .= "LIMIT ".$config['Limit_Players_Rank'];

        $sth = $conn->prepare($sql);
        
        if ($sth === false) {
            throw new Exception("Erro ao preparar a consulta: " . $conn->error);
        }

        $types = str_repeat('i', count($bind));

        if (!empty($bind)) {
            $sth->bind_param($types, ...$bind);
        }

        $sth->execute();
        $result = $sth->get_result();
        $chars = $result->fetch_all(MYSQLI_ASSOC); 
        

    } catch (Exception $e) {
        define('__ERROR__', true);
        include('fatalerror.php');
        exit;
    }

}elseif($_GET['type'] == 'alquimistas'){
    
    $title = 'Ranking de Alquimistas';
    $alchemistJobs = JobsAlchemist(); 
    $bind = []; 
    
    $columns = [
        'ch.char_id',
        'ch.sex',
        'ch.name AS char_name',
        'ch.fame',
        'ch.class AS char_class',
        'ch.base_level',
        'ch.job_level',
        'ch.guild_id',
        'guild.name AS guild_name',
        'guild.emblem_id AS emblem'
    ];
    
    $sql = sprintf(
        "SELECT %s FROM %s.`char` AS ch
         LEFT JOIN %s.guild ON guild.guild_id = ch.guild_id
         LEFT JOIN %s.login ON login.account_id = ch.account_id ",
        implode(', ', $columns),
        RECLASSIC::getDBName(),
        RECLASSIC::getDBName(),
        RECLASSIC::getDBName()
    );
    
    $placeholders = implode(',', array_fill(0, count($alchemistJobs), '?'));
    $bind = array_keys($alchemistJobs);
    $sql .= "WHERE fame > 0 AND ch.class IN ($placeholders) ";
    $sql .= "ORDER BY ch.fame DESC, ch.base_level DESC, ch.base_exp DESC, 
             ch.job_level DESC, ch.job_exp DESC, ch.char_id ASC ";
    $sql .= "LIMIT ?";
    
    $sth = $conn->prepare($sql);
    
    $types = str_repeat('i', count($bind)) . 'i'; 
    $bind[] = (int) $config['Limit_Players_Rank']; 
    $sth->bind_param($types, ...$bind);
    $sth->execute();
    $result = $sth->get_result();
    $chars = $result->fetch_all(MYSQLI_ASSOC); 
}elseif($_GET['type'] == 'ferreiros'){
    $title = 'Ranking de Ferreiros';
    $blacksmithJobs = JobsBlacksmith();
    $bind = [];
    
    $columns = [
        'ch.char_id',
        'ch.sex',
        'ch.name AS char_name',
        'ch.fame',
        'ch.class AS char_class',
        'ch.base_level',
        'ch.job_level',
        'ch.guild_id',
        'guild.name AS guild_name',
        'guild.emblem_id AS emblem'
    ];
    
    $sql = sprintf(
        "SELECT %s FROM %s.`char` AS ch
         LEFT JOIN %s.guild ON guild.guild_id = ch.guild_id
         LEFT JOIN %s.login ON login.account_id = ch.account_id ",
        implode(', ', $columns),
        RECLASSIC::getDBName(),
        RECLASSIC::getDBName(),
        RECLASSIC::getDBName()
    );
    
    $placeholders = implode(',', array_fill(0, count($blacksmithJobs), '?'));
    $bind = array_keys($blacksmithJobs);
    
    $sql .= "WHERE fame > 0 AND ch.class IN ($placeholders) ";
    $sql .= "ORDER BY ch.fame DESC, ch.base_level DESC, ch.base_exp DESC, ch.job_level DESC, ch.job_exp DESC, ch.char_id ASC ";
    $sql .= "LIMIT ?";
    
    $stmt = $conn->prepare($sql);
    
    $types = str_repeat('i', count($bind)) . 'i';
    $bind[] = (int) $config['Limit_Players_Rank'];
    
    $stmt->bind_param($types, ...$bind);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $chars = $result->fetch_all(MYSQLI_ASSOC);
}

?>



