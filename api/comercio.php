<?php



$pagina = (int) $_GET["page"];

if ($_GET['type'] == 'vendedores') {
    
    $title = 'Lojas de Venda';
    
    if (empty($pagina) || !isset($pagina)) {
        header("Location: ?to=comercio&type=vendedores&page=1");
        exit();
    }
    if (isset($_GET["busca"]) || !empty($_GET["busca"])) {
    
    
       
        $busca = $_GET["busca"];
    
    
        $busca = $conn->real_escape_string($busca);
    
        $sql_vendings = "
        SELECT `char`.name as char_name, `vendings`.id, `vendings`.char_id, `vendings`.extended_vending_item, 
        `vendings`.sex, `vendings`.map, `vendings`.x, `vendings`.y, 
        `vendings`.title, autotrade 
        FROM vendings 
        LEFT JOIN `char` ON vendings.char_id = `char`.char_id
        ";
    
        $sth_vendings = $conn->query($sql_vendings);
        $result_vendedores = $sth_vendings->fetch_all(MYSQLI_ASSOC);
    
        $vendedores = [];
    
        foreach ($result_vendedores as $mercador) {
            $char_id = $mercador["char_id"];
    
            $sql_cart_inventory = "
            SELECT cart_inventory.nameid 
            FROM cart_inventory 
            WHERE cart_inventory.char_id = ?
            ";
            $sth_cart = $conn->prepare($sql_cart_inventory);
            $sth_cart->bind_param("i", $char_id);
            $sth_cart->execute();
            $result_cart = $sth_cart->get_result();
            $nameids = $result_cart->fetch_all(MYSQLI_ASSOC);
    
            if (!empty($nameids)) {
                $nameids_list = implode(",", array_column($nameids, "nameid"));
    
    
                    $sql_item_search = "
                    SELECT id, name_english 
                    FROM (
                        SELECT id, name_english FROM item_db WHERE id IN ($nameids_list)
                        UNION 
                        SELECT id, name_english FROM item_db2 WHERE id IN ($nameids_list)
                        ) AS combined_items
                    WHERE id LIKE CONCAT('%', ?, '%') OR name_english LIKE CONCAT('%', ?, '%')
                    ";
    
                
                $sth_item_search = $conn->prepare($sql_item_search);
                $sth_item_search->bind_param("ss", $busca, $busca);
                $sth_item_search->execute();
                $result_item_search = $sth_item_search->get_result();
                $items_found = $result_item_search->fetch_all(MYSQLI_ASSOC);
    
    
                if (!empty($items_found)) {
                    $vendedores[] = $mercador;
                }
            }
        }
    
        $vendedores_per_page = 10;
        $page = isset($pagina) ? (int) $pagina : 1;
        $total_vendedores = count($vendedores);
        $total_pages = ceil($total_vendedores / $vendedores_per_page);
        $start_index = ($page - 1) * $vendedores_per_page;
        $end_index = min(
            $start_index + $vendedores_per_page - 1,
            $total_vendedores - 1
        );
    
        $paginated_vendedores = array_slice(
            $vendedores,
            $start_index,
            $vendedores_per_page
        );
        $current_url = $_SERVER["REQUEST_URI"];
        $query_params = $_GET;
        $query_params["page"] = $page + 1;
        $updated_query_string_next = http_build_query($query_params);
        $next_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_next;
        $query_params["page"] = $page - 1;
        $updated_query_string_prev = http_build_query($query_params);
        $prev_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_prev;
    
        if ($pagina > $total_pages && !empty($vendedores)) {
            header("Location: ?to=error");
            exit();
        }
    } elseif (isset($_GET["filter"]) || !empty($_GET["filter"])) {
        $pagina = (int) $_GET["page"];
    
        $filter = $_GET["filter"];
        $sql_vendings = "
        SELECT `char`.name as char_name, `vendings`.id, `vendings`.char_id, `vendings`.extended_vending_item, 
        `vendings`.sex, `vendings`.map, `vendings`.x, `vendings`.y, 
        `vendings`.title, autotrade 
        FROM vendings 
        LEFT JOIN `char` ON vendings.char_id = `char`.char_id
        ";
    
        $sth_vendings = $conn->query($sql_vendings);
        $result_vendedores = $sth_vendings->fetch_all(MYSQLI_ASSOC);
    
        $vendedores = [];
    
        foreach ($result_vendedores as $mercador) {
            $char_id = $mercador["char_id"];
    
            $sql_cart_inventory = "
            SELECT cart_inventory.nameid 
            FROM cart_inventory 
            WHERE cart_inventory.char_id = $char_id
            ";
            $sth_cart = $conn->query($sql_cart_inventory);
            $nameids = $sth_cart->fetch_all(MYSQLI_ASSOC);
    
            if (!empty($nameids)) {
                $nameids_list = implode(",", array_column($nameids, "nameid"));
    
                
                $sql_item_type = "
                SELECT type 
                FROM item_db
                WHERE id IN ($nameids_list)
                UNION
                SELECT type 
                FROM item_db2
                WHERE id IN ($nameids_list)          ";
            
                $sth_item_type = $conn->query($sql_item_type);
                $types = $sth_item_type->fetch_all(MYSQLI_ASSOC);
    
                foreach ($types as $type) {
                    if ($type["type"] == $filter) {
                        $vendedores[] = $mercador;
                        break;
                    }
                }
            }
        }
        $vendedores_per_page = 10;
        $page = isset($pagina) ? (int) $pagina : 1;
        $total_vendedores = count($vendedores);
        $total_pages = ceil($total_vendedores / $vendedores_per_page);
        $start_index = ($page - 1) * $vendedores_per_page;
        $end_index = min(
            $start_index + $vendedores_per_page - 1,
            $total_vendedores - 1
        );
    
        $paginated_vendedores = array_slice(
            $vendedores,
            $start_index,
            $vendedores_per_page
        );
        $current_url = $_SERVER["REQUEST_URI"];
        $query_params = $_GET;
        $query_params["page"] = $page + 1;
        $updated_query_string_next = http_build_query($query_params);
        $next_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_next;
        $query_params["page"] = $page - 1;
        $updated_query_string_prev = http_build_query($query_params);
        $prev_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_prev;
    
        if ($pagina > $total_pages && !empty($vendedores)) {
            header("Location: ?to=error");
            exit();
        }
    } else {

    
        $sql =
        "SELECT `char`.name as char_name, `vendings`.id, `vendings`.char_id, `vendings`.extended_vending_item, `vendings`.sex, `vendings`.map, `vendings`.x, `vendings`.y, `vendings`.title, autotrade ";
        $sql .= "FROM vendings ";
        $sql .= "LEFT JOIN `char` on vendings.char_id = `char`.char_id ";
    
        $sth = $conn->prepare($sql);
        $sth->execute();
        $result = $sth->get_result();
        $vendedores = $result->fetch_all(MYSQLI_ASSOC);
    
        $vendedores_per_page = 10;
        $page = isset($pagina) ? (int) $pagina : 1;
        $total_vendedores = count($vendedores);
        $total_pages = ceil($total_vendedores / $vendedores_per_page);
        $start_index = ($page - 1) * $vendedores_per_page;
        $end_index = min(
            $start_index + $vendedores_per_page - 1,
            $total_vendedores - 1
        );
    
        $paginated_vendedores = array_slice(
            $vendedores,
            $start_index,
            $vendedores_per_page
        );
        $current_url = $_SERVER["REQUEST_URI"];
        $query_params = $_GET;
        $query_params["page"] = $page + 1;
        $updated_query_string_next = http_build_query($query_params);
        $next_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_next;
        $query_params["page"] = $page - 1;
        $updated_query_string_prev = http_build_query($query_params);
        $prev_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_prev;
    
        if ($pagina > $total_pages && !empty($vendedores)) {
            header("Location: ?to=error");
            exit();
        }
    }

}elseif ($_GET['type'] == 'compradores') {
    
    
    
    $title = 'Lojas de Compras';
    if (empty($pagina) || !isset($pagina)) {
        header("Location: ?to=comercio&type=compradores&page=1");
        exit();
    }
    if (isset($_GET["busca"]) || !empty($_GET["busca"])) {
    
    
       
        $busca = $_GET["busca"];
    
    
        $busca = $conn->real_escape_string($busca);
    
        $sql_buyingstores = "
        SELECT `char`.name as char_name, `buyingstores`.id, `buyingstores`.char_id, 
        `buyingstores`.sex, `buyingstores`.map, `buyingstores`.x, `buyingstores`.y, 
        `buyingstores`.title, autotrade 
        FROM buyingstores 
        LEFT JOIN `char` ON buyingstores.char_id = `char`.char_id
        ";
    
        $sth_buyingstores = $conn->query($sql_buyingstores);
        $result_compradores = $sth_buyingstores->fetch_all(MYSQLI_ASSOC);
    
        $compradores = [];
    
        foreach ($result_compradores as $comprador) {
            $char_id = $comprador["char_id"];
    
            $sql_cart_inventory = "
            SELECT cart_inventory.nameid 
            FROM cart_inventory 
            WHERE cart_inventory.char_id = ?
            ";
            $sth_cart = $conn->prepare($sql_cart_inventory);
            $sth_cart->bind_param("i", $char_id);
            $sth_cart->execute();
            $result_cart = $sth_cart->get_result();
            $nameids = $result_cart->fetch_all(MYSQLI_ASSOC);
    
            if (!empty($nameids)) {
                $nameids_list = implode(",", array_column($nameids, "nameid"));
    
    
                    $sql_item_search = "
                    SELECT id, name_english 
                    FROM (
                        SELECT id, name_english FROM item_db WHERE id IN ($nameids_list)
                        UNION 
                        SELECT id, name_english FROM item_db2 WHERE id IN ($nameids_list)
                        ) AS combined_items
                    WHERE id LIKE CONCAT('%', ?, '%') OR name_english LIKE CONCAT('%', ?, '%')
                    ";
    
                
                $sth_item_search = $conn->prepare($sql_item_search);
                $sth_item_search->bind_param("ss", $busca, $busca);
                $sth_item_search->execute();
                $result_item_search = $sth_item_search->get_result();
                $items_found = $result_item_search->fetch_all(MYSQLI_ASSOC);
    
    
                if (!empty($items_found)) {
                    $compradores[] = $comprador;
                }
            }
        }
    
        $compradores_per_page = 10;
        $page = isset($pagina) ? (int) $pagina : 1;
        $total_compradores = count($compradores);
        $total_pages = ceil($total_compradores / $compradores_per_page);
        $start_index = ($page - 1) * $compradores_per_page;
        $end_index = min(
            $start_index + $compradores_per_page - 1,
            $total_compradores - 1
        );
    
        $paginated_compradores = array_slice(
            $compradores,
            $start_index,
            $compradores_per_page
        );
        $current_url = $_SERVER["REQUEST_URI"];
        $query_params = $_GET;
        $query_params["page"] = $page + 1;
        $updated_query_string_next = http_build_query($query_params);
        $next_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_next;
        $query_params["page"] = $page - 1;
        $updated_query_string_prev = http_build_query($query_params);
        $prev_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_prev;
    
        if ($pagina > $total_pages && !empty($compradores)) {
            header("Location: ?to=error");
            exit();
        }
    } elseif (isset($_GET["filter"]) || !empty($_GET["filter"])) {
        $pagina = (int) $_GET["page"];
    
        $filter = $_GET["filter"];
        $sql_buyingstores = "
        SELECT `char`.name as char_name, `buyingstores`.id, `buyingstores`.char_id, 
        `buyingstores`.sex, `buyingstores`.map, `buyingstores`.x, `buyingstores`.y, 
        `buyingstores`.title, autotrade 
        FROM buyingstores 
        LEFT JOIN `char` ON buyingstores.char_id = `char`.char_id
        ";
    
        $sth_buyingstores = $conn->query($sql_buyingstores);
        $result_compradores = $sth_buyingstores->fetch_all(MYSQLI_ASSOC);
    
        $compradores = [];
    
        foreach ($result_compradores as $comprador) {
            $char_id = $comprador["char_id"];
    
            $sql_cart_inventory = "
            SELECT cart_inventory.nameid 
            FROM cart_inventory 
            WHERE cart_inventory.char_id = $char_id
            ";
            $sth_cart = $conn->query($sql_cart_inventory);
            $nameids = $sth_cart->fetch_all(MYSQLI_ASSOC);
    
            if (!empty($nameids)) {
                $nameids_list = implode(",", array_column($nameids, "nameid"));
    
                
                $sql_item_type = "
                SELECT type 
                FROM item_db
                WHERE id IN ($nameids_list)
                UNION
                SELECT type 
                FROM item_db2
                WHERE id IN ($nameids_list)          ";
            
                $sth_item_type = $conn->query($sql_item_type);
                $types = $sth_item_type->fetch_all(MYSQLI_ASSOC);
    
                foreach ($types as $type) {
                    if ($type["type"] == $filter) {
                        $compradores[] = $comprador;
                        break;
                    }
                }
            }
        }
        $compradores_per_page = 10;
        $page = isset($pagina) ? (int) $pagina : 1;
        $total_compradores = count($compradores);
        $total_pages = ceil($total_compradores / $compradores_per_page);
        $start_index = ($page - 1) * $compradores_per_page;
        $end_index = min(
            $start_index + $compradores_per_page - 1,
            $total_compradores - 1
        );
    
        $paginated_compradores = array_slice(
            $compradores,
            $start_index,
            $compradores_per_page
        );
        $current_url = $_SERVER["REQUEST_URI"];
        $query_params = $_GET;
        $query_params["page"] = $page + 1;
        $updated_query_string_next = http_build_query($query_params);
        $next_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_next;
        $query_params["page"] = $page - 1;
        $updated_query_string_prev = http_build_query($query_params);
        $prev_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_prev;
    
        if ($pagina > $total_pages && !empty($compradores)) {
            header("Location: ?to=error");
            exit();
        }
    } else {

    
        $sql =
        "SELECT `char`.name as char_name, `buyingstores`.id, `buyingstores`.char_id, `buyingstores`.sex, `buyingstores`.map, `buyingstores`.x, `buyingstores`.y, `buyingstores`.title, autotrade ";
        $sql .= "FROM buyingstores ";
        $sql .= "LEFT JOIN `char` on buyingstores.char_id = `char`.char_id ";
    
        $sth = $conn->prepare($sql);
        $sth->execute();
        $result = $sth->get_result();
        $compradores = $result->fetch_all(MYSQLI_ASSOC);
    
        $compradores_per_page = 10;
        $page = isset($pagina) ? (int) $pagina : 1;
        $total_compradores = count($compradores);
        $total_pages = ceil($total_compradores / $compradores_per_page);
        $start_index = ($page - 1) * $compradores_per_page;
        $end_index = min(
            $start_index + $compradores_per_page - 1,
            $total_compradores - 1
        );
    
        $paginated_compradores = array_slice(
            $compradores,
            $start_index,
            $compradores_per_page
        );
        $current_url = $_SERVER["REQUEST_URI"];
        $query_params = $_GET;
        $query_params["page"] = $page + 1;
        $updated_query_string_next = http_build_query($query_params);
        $next_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_next;
        $query_params["page"] = $page - 1;
        $updated_query_string_prev = http_build_query($query_params);
        $prev_page_url =
        strtok($current_url, "?") . "?" . $updated_query_string_prev;
    
        if ($pagina > $total_pages && !empty($compradores)) {
            header("Location: ?to=error");
            exit();
        }
    }

}else{
    header("Location: ?to=error");
    exit();
}
?>