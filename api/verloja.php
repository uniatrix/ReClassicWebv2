<?php 



if ($_GET['type'] == 'vendedores') {
    
   $id = $_GET["id"];

    if (empty($id) || !is_numeric($id)) {
        header("Location: ?to=error");
        exit();
    }
    
    $sql = "SELECT `char`.name as char_name, `vendings`.id, `vendings`.account_id, `vendings`.extended_vending_item, 
    `vendings`.sex, `vendings`.map, `vendings`.x, `vendings`.y, `vendings`.title, autotrade 
    FROM vendings 
    LEFT JOIN `char` ON vendings.char_id = `char`.char_id 
    WHERE vendings.id = ?";
    $sth = $conn->prepare($sql);
    $sth->bind_param("i", $id);
    $sth->execute();
    $result = $sth->get_result();
    $vending = $result->fetch_object();
    
    
    if (!$vending) {
        header("Location: ?to=error");
        exit();
    }
    
    $title = "Loja de vendas de: $vending->char_name";
    $mapa = "Mapa: {$vending->map},{$vending->x},{$vending->y}";
    
    
        $sql_temp = "
        CREATE TEMPORARY TABLE ".RECLASSIC::getDBName().".items AS
        SELECT * FROM ".RECLASSIC::getDBName().".item_db
        UNION ALL
        SELECT * FROM ".RECLASSIC::getDBName().".item_db2
        ";
    
    
    $conn->query($sql_temp);
    
    $sql_items = "SELECT `vending_items`.cartinventory_id, `vending_items`.amount, `vending_items`.price, 
    `cart_inventory`.nameid, `cart_inventory`.refine, `cart_inventory`.card0, `cart_inventory`.card1, 
    `cart_inventory`.card2, `cart_inventory`.card3, `c`.name as char_name, 
    `cart_inventory`.option_id0, `cart_inventory`.option_val0, 
    `cart_inventory`.option_id1, `cart_inventory`.option_val1, 
    `cart_inventory`.option_id2, `cart_inventory`.option_val2, 
    `cart_inventory`.option_id3, `cart_inventory`.option_val3, 
    `cart_inventory`.option_id4, `cart_inventory`.option_val4, 
    items.name_english as item_name, items.slots, items.type 
    FROM vending_items 
    LEFT JOIN `cart_inventory` ON `vending_items`.cartinventory_id = `cart_inventory`.id 
    LEFT JOIN items ON `cart_inventory`.nameid = items.id 
    LEFT JOIN ".RECLASSIC::getDBName().".`char` AS c ON c.char_id = IF(cart_inventory.card0 IN (254, 255), 
      IF(cart_inventory.card2 < 0, cart_inventory.card2 + 65536, cart_inventory.card2) 
      | (cart_inventory.card3 << 16), NULL) 
    WHERE vending_id = ?";
    $sth_items = $conn->prepare($sql_items);
    $sth_items->bind_param("i", $id);
    $sth_items->execute();
    
    $result_items = $sth_items->get_result(); 
    
    $items = [];
    while ($item = $result_items->fetch_object()) {
        $items[] = $item;  
    }
    
    
    
    $cards = array();
    if ($items) {
        $cardIDs = array();
    
        foreach ($items as $item) {
            $item->cardsOver = -$item->slots;
            
            if ($item->card0) {
                $cardIDs[] = $item->card0;
                $item->cardsOver++;
            }
            if ($item->card1) {
                $cardIDs[] = $item->card1;
                $item->cardsOver++;
            }
            if ($item->card2) {
                $cardIDs[] = $item->card2;
                $item->cardsOver++;
            }
            if ($item->card3) {
                $cardIDs[] = $item->card3;
                $item->cardsOver++;
            }
            
            if ($item->card0 == 254 || $item->card0 == 255 || $item->card0 == -256 || $item->cardsOver < 0) {
                $item->cardsOver = 0;
            }
            
        }
    
        if ($cardIDs) {
            $ids = implode(",", array_fill(0, count($cardIDs), "?"));
            $sql_cards = "SELECT id, name_english FROM ".RECLASSIC::getDBName().".items WHERE id IN ($ids)";
            $sth_card = $conn->prepare($sql_cards);
            $types = str_repeat("i", count($cardIDs));
            $sth_card->bind_param($types, ...$cardIDs);
            $sth_card->execute();
            $result_card = $sth_card->get_result();
    
            $cards = [];
            while ($card = $result_card->fetch_object()) {
                $cards[$card->id] = $card->name_english;
            }
        }
    } 
}elseif($_GET['type'] == 'compradores'){
    $id = $_GET["id"];

    if (empty($id) || !is_numeric($id)) {
        header("Location: ?to=error");
        exit();
    }


    // Get the current Vendor values.
    $sql = "SELECT `char`.name as char_name, `buyingstores`.id, `buyingstores`.sex, `buyingstores`.map, `buyingstores`.x, `buyingstores`.y, `buyingstores`.title, autotrade ";
    $sql .= "FROM buyingstores ";
    $sql .= "LEFT JOIN `char` on buyingstores.char_id = `char`.char_id where id=?";
        $sth = $conn->prepare($sql);
        $sth->bind_param("i", $id);
        $sth->execute();
        $result = $sth->get_result();
        $store = $result->fetch_object();
        
        
        if (!$store) {
            header("Location: ?to=error");
            exit();
        }
    if ($store) {
    
        $title = "Loja de compras de $store->char_name";
        $mapa = "Mapa: {$store->map},{$store->x},{$store->y}";
    
    // Create the itemdb temp table to retrieve names.
    
        $sql_temp = "
            CREATE TEMPORARY TABLE ".RECLASSIC::getDBName().".items AS
            SELECT * FROM ".RECLASSIC::getDBName().".item_db
            UNION ALL
            SELECT * FROM ".RECLASSIC::getDBName().".item_db2
            ";
        
        
        $conn->query($sql_temp);
    
    // Get the buyer's items.
    // Get the current buyer values.
    	$sql = "SELECT `buyingstore_items`.`buyingstore_id`, `buyingstore_items`.`index`, `buyingstore_items`.`amount`, `buyingstore_items`.`price`";
    	$sql .= ",`buyingstore_items`.`item_id` as nameid";
    	$sql .= ",`items`.`name_english` as item_name, `items`.`slots`, `items`.`type` ";
    	$sql .= "FROM buyingstore_items ";
    	$sql .= "LEFT JOIN items on `buyingstore_items`.item_id = items.id ";
    	$sql .= "WHERE `buyingstore_id` = ? ";
    	$sql .= "ORDER BY `index` ";
        $sth_items = $conn->prepare($sql);
        $sth_items->bind_param("i", $store->id);
        $sth_items->execute();
        
        $result_items = $sth_items->get_result(); 
        
        $items = [];
        while ($item = $result_items->fetch_object()) {
            $items[] = $item;  
        }
    }
}