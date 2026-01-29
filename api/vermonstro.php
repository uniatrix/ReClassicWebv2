<?php

if (!isset($_GET["id"]) && empty($_GET["id"]) || !is_numeric($_GET["id"])) {
  header("Location: ?to=error");
    exit(); 
} 
    

 $idmonstro = $_GET["id"];
    $idmonstro = (int) $idmonstro; 

    $tables = [
        'mob_db' => ['mvpdrop1_', 'mvpdrop2_', 'mvpdrop3_', 'drop1_', 'drop2_', 'drop3_', 'drop4_', 'drop5_', 'drop6_', 'drop7_', 'drop8_', 'drop9_', 'drop10_'],
        'mob_db2' => ['mvpdrop1_', 'mvpdrop2_', 'mvpdrop3_', 'drop1_', 'drop2_', 'drop3_', 'drop4_', 'drop5_', 'drop6_', 'drop7_', 'drop8_', 'drop9_', 'drop10_']
    ];

    $sqlParts = [];

    foreach ($tables as $table => $columns) {
        foreach ($columns as $column) {
            $dropType = (strpos($column, 'mvpdrop') === 0) ? 'mvp' : 'normal';
            $itemColumn = $column . 'item';
            $rateColumn = $column . 'rate';
            
            $sqlParts[] = "SELECT '$dropType' AS drop_type, id, $itemColumn AS item, $rateColumn AS rate FROM $table WHERE id = $idmonstro";
        }
    }


    $sql = implode(" UNION ALL\n", $sqlParts) . " ORDER BY id";



$resultado = $conn->query($sql);

$mvp_drops = [];
$normal_drops = [];

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        if (!empty($linha["item"]) && !empty($linha["rate"])) {
            if ($linha["drop_type"] == "mvp") {
                $mvp_drops[] = $linha;
            } else {
                $normal_drops[] = $linha;
            }
        }
    }
} else {
        header("Location: ?to=error");
        exit(); 
}

foreach ($normal_drops as $key => $drops) {
    $item = $drops["item"];


        $sql = "(SELECT name_english, id, slots FROM item_db WHERE name_aegis = ?)
            UNION
            (SELECT name_english, id, slots FROM item_db2 WHERE name_aegis = ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $item, $item);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $nomeItem, $idItem, $slots);
    $nomesItem = [];
    while (mysqli_stmt_fetch($stmt)) {
        $nomesItem[] = [
            "name_english" => $nomeItem,
            "id" => $idItem,
            "slots" => $slots,
        ];
    }
    mysqli_stmt_close($stmt);

    $normal_drops[$key]["items"] = $nomesItem;
}

foreach ($mvp_drops as $key => $dropsMVP) {
    $item = $dropsMVP["item"];


        $sql = "(SELECT name_english, id, slots FROM item_db WHERE name_aegis = ?)
            UNION
            (SELECT name_english, id, slots FROM item_db2 WHERE name_aegis = ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $item, $item);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $nomeItemMVP, $idItemMVP, $slotsMVP);
    $nomesItemMVP = [];
    while (mysqli_stmt_fetch($stmt)) {
        $nomesItemMVP[] = [
            "name_english" => $nomeItemMVP,
            "id" => $idItemMVP,
            "slots" => $slotsMVP,
        ];
    }
    mysqli_stmt_close($stmt);

    $mvp_drops[$key]["items"] = $nomesItemMVP;
}

$ch = curl_init();

$url =
    "https://www.divine-pride.net/api/database/Monster/" .$idmonstro ."?apiKey=" .$config["KeyDivinePride"] ."";

$headers = [
    "Content-Type: application/json",
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    "Accept-Language: pt,pt;q=0.9,en-US;q=0.8,en;q=0.7,ko;q=0.6",
    "Cache-Control: max-age=0",
    "Priority: u=0, i",
    'Sec-Ch-Ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    "Sec-Ch-Ua-Mobile: ?1",
    'Sec-Ch-Ua-Platform: "Android"',
    "Sec-Fetch-Dest: document",
    "Sec-Fetch-Mode: navigate",
    "Sec-Fetch-Site: none",
    "Sec-Fetch-User: ?1",
    "Upgrade-Insecure-Requests: 1",
    "User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36",
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$jsonData = curl_exec($ch);
curl_close($ch);
$curlDivinePride = json_decode($jsonData, true);


if(isset($curlDivinePride["spawn"])) $mapas = $curlDivinePride["spawn"];


    $sql = "(SELECT *
                FROM mob_db WHERE id = ?)
                UNION
                (SELECT *
                FROM mob_db2 WHERE id = ?)";


$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ii", $idmonstro, $idmonstro);

    $stmt->execute();

    $resultado = $stmt->get_result();

        while ($linha = $resultado->fetch_assoc()) {
            $hp = ($linha["hp"] != "") ? formatarNumero($linha["hp"]) : "0";
            $atkMin = ($linha["attack"] != "") ? formatarNumero($linha["attack"]) : "0";
            $atkMax = ($linha["attack2"] != "") ? formatarNumero($linha["attack2"]) : "0";
            $range = ($linha["attack_range"] != "") ? $linha["attack_range"] : "0";
            $defM = ($linha["magic_defense"] != "") ? $linha["magic_defense"] : "0";
            $str = ($linha["str"] != "") ? $linha["str"] : "0";
            $agi = ($linha["agi"] != "") ? $linha["agi"] : "0";
            $vit = ($linha["vit"] != "") ? $linha["vit"] : "0";
            $int = ($linha["int"] != "") ? $linha["int"] : "0";
            $dex = ($linha["dex"] != "") ? $linha["dex"] : "0";
            $luk = ($linha["luk"] != "") ? $linha["luk"] : "0";
            $expBase = ($linha["base_exp"] != "") ? formatarNumero($linha["base_exp"]) : "0";
            $expJob = ($linha["job_exp"] != "") ? formatarNumero($linha["job_exp"]) : "0";
            $lvl = ($linha["level"] != "") ? $linha["level"] : "0";
            $def = ($linha["defense"] != "") ? $linha["defense"] : "0";
            $race = ($linha["race"] != "") ? $linha["race"] : "unknown";
            $size = ($linha["size"] != "") ? $linha["size"] : "unknown";
            $element = ($linha["element"] != "") ? $linha["element"] : "unknown";
            $element_lvl = ($linha["element_level"] != "") ? $linha["element_level"] : "0";
            $nomeMonstro = ($linha["name_english"] != "") ? $linha["name_english"] : "unknown";
        }
} else {
    if (!(isset($curlDivinePride["reason"]) && $curlDivinePride["reason"] == "Monster not found")) {
        
        $hp = formatarNumero($curlDivinePride["stats"]["health"]);
        $sp = $curlDivinePride["stats"]["sp"];
        $atkMin = formatarNumero($curlDivinePride["stats"]["attack"]["minimum"]);
        $atkMax = formatarNumero($curlDivinePride["stats"]["attack"]["maximum"]);
        $range = $curlDivinePride["stats"]["attackRange"];
        $flee = $curlDivinePride["stats"]["flee"];
        $defMtk = $curlDivinePride["stats"]["magicDefense"];
        $hit = $curlDivinePride["stats"]["hit"];
        $str = $curlDivinePride["stats"]["str"];
        $agi = $curlDivinePride["stats"]["agi"];
        $vit = $curlDivinePride["stats"]["vit"];
        $int = $curlDivinePride["stats"]["int"];
        $dex = $curlDivinePride["stats"]["dex"];
        $luk = $curlDivinePride["stats"]["luk"];
        $expBase = formatarNumero($curlDivinePride["stats"]["baseExperience"]);
        $expJob = formatarNumero($curlDivinePride["stats"]["jobExperience"]);
        $lvl = $curlDivinePride["stats"]["level"];
        $def = $curlDivinePride["stats"]["defense"];
        $nomeMonstro = $curlDivinePride["name"];
    }else{
        header("Location: ?to=error");
        exit(); 
    }
}


$title =  $nomeMonstro;
?>
