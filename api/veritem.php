<?php
if (!isset($_GET["id"]) && empty($_GET["id"]) || !is_numeric($_GET["id"])) {
  header("Location: ?to=error");
    exit(); 
} 

$iditem = intval($_GET["id"]);
    $sql = "
        SELECT * 
        FROM item_db 
        WHERE id = ?
        UNION
        SELECT * 
        FROM item_db2 
        WHERE id = ?
    ";


$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $iditem, $iditem);  
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $nomeitem = $linha["name_english"];
        $peso = $linha["weight"];
        $aegis = $linha["name_aegis"];
        $preco = $linha["price_buy"];
        $tipo = $linha["type"];
        $ataque = $linha["attack"];
        $defesa = $linha["defense"];
        $slots = $linha["slots"];
        $vendido = $linha["trade_nosell"];
        $dropar = $linha["trade_nodrop"];
        $negociar = $linha["trade_notrade"];
        $storage = $linha["trade_nostorage"];
        $storageguild = $linha["trade_noguildstorage"];
        $refinavel = $linha["refineable"];
    }


  
    $preco = $preco ?? "N/A";
    $peso = $peso ?? "N/A";
    $tipo = itemType()[strtolower($tipo)] ?? "N/A";
    $ataque = $ataque ?? "N/A";
    $defesa = $defesa ?? "N/A";
    $slots = $slots ?? "N/A";

    $dropar =
        $dropar === null
            ? "assets/img/POSITIVE.png"
            : "assets/img/NEGATIVE.png";
    $refinavel =
        $refinavel === null
            ? "assets/img/NEGATIVE.png"
            : "assets/img/POSITIVE.png";
    $negociar =
        $negociar === null
            ? "assets/img/POSITIVE.png"
            : "assets/img/NEGATIVE.png";
    $storage =
        $storage === null
            ? "assets/img/POSITIVE.png"
            : "assets/img/NEGATIVE.png";
    $storageguild =
        $storageguild === null
            ? "assets/img/POSITIVE.png"
            : "assets/img/NEGATIVE.png";
    $vendido =
        $vendido === null
            ? "assets/img/POSITIVE.png"
            : "assets/img/NEGATIVE.png";

 
        // Buscar monstros que dropam este item (otimizado com WHERE)
        $sql = "
            SELECT id, name_english,
                   drop1_item, drop1_rate,
                   drop2_item, drop2_rate,
                   drop3_item, drop3_rate,
                   drop4_item, drop4_rate,
                   drop5_item, drop5_rate,
                   drop6_item, drop6_rate,
                   drop7_item, drop7_rate,
                   drop8_item, drop8_rate,
                   drop9_item, drop9_rate,
                   drop10_item, drop10_rate
            FROM mob_db
            WHERE drop1_item = ? OR drop2_item = ? OR drop3_item = ? OR drop4_item = ? OR drop5_item = ?
               OR drop6_item = ? OR drop7_item = ? OR drop8_item = ? OR drop9_item = ? OR drop10_item = ?
            UNION
            SELECT id, name_english,
                   drop1_item, drop1_rate,
                   drop2_item, drop2_rate,
                   drop3_item, drop3_rate,
                   drop4_item, drop4_rate,
                   drop5_item, drop5_rate,
                   drop6_item, drop6_rate,
                   drop7_item, drop7_rate,
                   drop8_item, drop8_rate,
                   drop9_item, drop9_rate,
                   drop10_item, drop10_rate
            FROM mob_db2
            WHERE drop1_item = ? OR drop2_item = ? OR drop3_item = ? OR drop4_item = ? OR drop5_item = ?
               OR drop6_item = ? OR drop7_item = ? OR drop8_item = ? OR drop9_item = ? OR drop10_item = ?
        ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssssssss",
        $aegis, $aegis, $aegis, $aegis, $aegis, $aegis, $aegis, $aegis, $aegis, $aegis,
        $aegis, $aegis, $aegis, $aegis, $aegis, $aegis, $aegis, $aegis, $aegis, $aegis
    );
    $stmt->execute();
    $resultado = $stmt->get_result();

    $itemget = [];

    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            // Verificar cada slot de drop e adicionar à lista
            for ($i = 1; $i <= 10; $i++) {
                $drop_item_column = "drop" . $i . "_item";
                $drop_rate_column = "drop" . $i . "_rate";

                if ($linha[$drop_item_column] == $aegis && $linha[$drop_rate_column] > 0) {
                    $itemget[] = [
                        "Item" => $linha[$drop_item_column],
                        "Taxa de drop" => $linha[$drop_rate_column],
                        "nome" => $linha["name_english"],
                        "id" => $linha["id"],
                    ];
                    break; // Evita duplicatas se o mesmo mob dropa o mesmo item em slots diferentes
                }
            }
        }
    }



    // Buscar nome traduzido e descrição da tabela itemdesc
    $sql = "SELECT itemname, itemdesc FROM itemdesc WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $iditem);
    $stmt->execute();

    $resultado = $stmt->get_result();

    // Se não houver resultados no banco local, tenta a API Divine Pride
    $ch = curl_init();
    $url = "https://www.divine-pride.net/api/database/Item/" . $iditem . "?apiKey=" . $config["KeyDivinePride"];

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

    $data = json_decode($jsonData, true);

    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        // Usar nome traduzido se existir, senão mantém o nome em inglês
        if (!empty($linha["itemname"])) {
            $nomeitem = $linha["itemname"];
        }
        $descrip = $linha["itemdesc"] ?? '';
    }

    // Se não tiver descrição no banco, tenta a API
    if (empty($descrip)) {
        if (isset($data["description"]) && !empty($data["description"])) {
            $descrip = $data["description"];
        } else {
            $descrip = 'Sem Descrição';
        }
    }

    $textoFormatado = converterCores($descrip);
    $itensDrop = "";
    $itensDrop = isset($data["itemSummonInfoContainedIn"])
        ? $data["itemSummonInfoContainedIn"]
        : "";

    $title = $nomeitem;
} else {
  header("Location: ?to=error");
    exit(); 
}
?>