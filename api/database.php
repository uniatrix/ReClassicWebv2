<?php
error_reporting(1);

$pagina = (int)$_GET["page"];

if (isset($_GET["type"]) && $_GET["type"] == "monstros") {
    $title = 'Lista de Monstros';
    if (empty($pagina) || !isset($pagina)) {
        header("Location: ?to=database&type=monstros&page=1");
        exit();
    }
    
    if (isset($_GET["busca"]) && !empty($_GET["busca"])) {
        $busca = $_GET["busca"];
        try {

            $sql = "SELECT * FROM mob_db WHERE name_english LIKE ? OR id LIKE ? ";
            $sql .= "UNION ALL ";
            $sql .= "SELECT * FROM mob_db2 WHERE name_english LIKE ? OR id LIKE ? ";

            $sql .= "ORDER BY id";
    
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $busca . "%";
            $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
            $stmt->execute();
            $sth = $stmt->get_result();
            $monstros = $sth->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }
    } elseif (isset($_GET["filter"]) && !empty($_GET["filter"])) {
        if ($_GET["filter"] == "mvp_exp") {
            try {
                
                $sql = "SELECT * FROM mob_db WHERE mvp_exp > 1 ";
                $sql .= "UNION ALL ";
                $sql .= "SELECT * FROM mob_db2 WHERE mvp_exp > 1 ";
                $sql .= "ORDER BY id";
    
                $sth = $conn->query($sql);
                $monstros = $sth->fetch_all(MYSQLI_ASSOC);
            } catch (Exception $e) {
                define("__ERROR__", true);
                include "fatalerror.php";
                exit();
            }
        } else {
            $filter = $_GET["filter"];
            try {
               
                $sql = "SELECT * FROM mob_db WHERE size LIKE ? OR race LIKE ? OR element LIKE ? ";
                $sql .= "UNION ALL ";
                $sql .= "SELECT * FROM mob_db2 WHERE size LIKE ? OR race LIKE ? OR element LIKE ? ";


                $sql .= "ORDER BY id";
    
                $stmt = $conn->prepare($sql);
                $filterTerm = "%" . $filter . "%";
                $stmt->bind_param("ssssss", $filterTerm, $filterTerm, $filterTerm, $filterTerm, $filterTerm, $filterTerm);
                $stmt->execute();
                $sth = $stmt->get_result();
                $monstros = $sth->fetch_all(MYSQLI_ASSOC);
            } catch (Exception $e) {
                define("__ERROR__", true);
                include "fatalerror.php";
                exit();
            }
        }
    } else {
        try {
            
            $sql = "SELECT * FROM mob_db ";
            $sql .= "UNION ALL ";
            $sql .= "SELECT * FROM mob_db2 ";
            $sql .= "ORDER BY id";
    
            $sth = $conn->query($sql);
            $monstros = $sth->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }

    }

    $monstros_por_pagina = 10;
    $page = isset($pagina) ? (int) $pagina : 1;
    $total_monstros = count($monstros);
    $total_pages = ceil($total_monstros / $monstros_por_pagina);
    $start_index = ($page - 1) * $monstros_por_pagina;
    $end_index = min(
        $start_index + $monstros_por_pagina - 1,
        $total_monstros - 1
    );
    $paginated_monsters = array_slice(
        $monstros,
        $start_index,
        $monstros_por_pagina
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


    if (($pagina > $total_pages) && !empty($monstros)) {
        header("Location: ?to=error&id=404");
        exit();
    }
} elseif (isset($_GET["type"]) && $_GET["type"] == "itens") {
    $title = 'Lista de Itens';
    
    if (empty($pagina) || !isset($pagina)) {
        header("Location: ?to=database&type=itens&page=1");
        exit();
    }
    
    if (isset($_GET["busca"]) && !empty($_GET["busca"])) {
        $busca = $_GET["busca"];
    
        try {

            $sql = "SELECT * FROM item_db WHERE name_english LIKE ? OR id LIKE ? ";
            $sql .= "UNION ALL ";
            $sql .= "SELECT * FROM item_db2 WHERE name_english LIKE ? OR id LIKE ? ";

            $sql .= "ORDER BY id";
    
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $busca . "%";
            $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
            $stmt->execute();
            $resultado = $stmt->get_result();
    
            if ($resultado->num_rows > 0) {
                $itens = [];
                while ($row = $resultado->fetch_assoc()) {
                    $item = [
                        "id" => !empty($row["id"]) ? $row["id"] : "unknown",
                        "name_english" => !empty($row["name_english"]) ? $row["name_english"] : "unknown",
                        "type" => !empty($row["type"]) ? strtolower($row["type"]) : "unknown",
                        "subtype" => !empty($row["subtype"]) ? strtolower($row["subtype"]) : "unknown",
                        "price_buy" => !empty($row["price_buy"]) ? $row["price_buy"] : "N/A",
                        "weight" => !empty($row["weight"]) ? $row["weight"] : "N/A",
                    ];
                    $itens[] = $item;
                }
            } else {
                $itens = [];
            }
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }
    } elseif (isset($_GET["filter"]) && !empty($_GET["filter"])) {
        $filtro = $_GET["filter"];
    
        try {

            $sql = "SELECT * FROM item_db WHERE type LIKE ? ";
            $sql .= "UNION ALL ";
            $sql .= "SELECT * FROM item_db2 WHERE type LIKE ? ";

            $sql .= "ORDER BY id";
    
            $stmt = $conn->prepare($sql);
            $filterTerm = "%" . $filtro . "%";
            $stmt->bind_param("ss", $filterTerm, $filterTerm);
            $stmt->execute();
            $resultado = $stmt->get_result();
    
            if ($resultado->num_rows > 0) {
                $itens = [];
                while ($row = $resultado->fetch_assoc()) {
                    $item = [
                        "id" => !empty($row["id"]) ? $row["id"] : "unknown",
                        "name_english" => !empty($row["name_english"]) ? $row["name_english"] : "unknown",
                        "type" => !empty($row["type"]) ? strtolower($row["type"]) : "unknown",
                        "subtype" => !empty($row["subtype"]) ? strtolower($row["subtype"]) : "unknown",
                        "price_buy" => !empty($row["price_buy"]) ? $row["price_buy"] : "N/A",
                        "weight" => !empty($row["weight"]) ? $row["weight"] : "N/A",
                    ];
                    $itens[] = $item;
                }
            } else {
                $itens = [];
            }
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }
    } else {
        try {

            $sql = "SELECT * FROM item_db ";
            $sql .= "UNION ALL ";
            $sql .= "SELECT * FROM item_db2 ";

            $sql .= "ORDER BY id";
    
            $resultado = mysqli_query($conn, $sql);
    
            if ($resultado->num_rows > 0) {
                $itens = [];
                while ($row = $resultado->fetch_assoc()) {
                    $item = [
                        "id" => !empty($row["id"]) ? $row["id"] : "unknown",
                        "name_english" => !empty($row["name_english"]) ? $row["name_english"] : "unknown",
                        "type" => !empty($row["type"]) ? strtolower($row["type"]) : "unknown",
                        "subtype" => !empty($row["subtype"]) ? strtolower($row["subtype"]) : "unknown",
                        "price_buy" => !empty($row["price_buy"]) ? $row["price_buy"] : "N/A",
                        "weight" => !empty($row["weight"]) ? $row["weight"] : "N/A",
                    ];
                    $itens[] = $item;
                }
            } else {
                $itens = [];
            }
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }

    }

    $items_per_page = 10;
    $page = isset($pagina) ? (int) $pagina : 1;
    $total_items = count($itens);
    $total_pages = ceil($total_items / $items_per_page);
    $start_index = ($page - 1) * $items_per_page;
    $end_index = min($start_index + $items_per_page - 1, $total_items - 1);
    $paginated_items = array_slice($itens, $start_index, $items_per_page);
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

    if (($pagina > $total_pages) && !empty($itens)) {
        header("Location: ?to=error&id=404");
        exit();
    }
} elseif (isset($_GET["type"]) && $_GET["type"] == "mapas") {
    $title = 'Lista de Mapas';
    

    if (empty($pagina) || !isset($pagina)) {
        header("Location: ?to=database&type=mapas&page=1");
        exit();
    }
    

    if (isset($_GET["busca"]) && !empty($_GET["busca"])) {
        $busca = filter_var($_GET["busca"], FILTER_SANITIZE_STRING); 
    
        try {
            $sql = "SELECT * FROM map_db WHERE map LIKE ? OR map_name LIKE ?";
            $sql .= " ORDER BY map REGEXP '^[A-Za-z]' DESC, map ASC";
            
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $busca . "%";
            $stmt->bind_param("ss", $searchTerm, $searchTerm); 
            $stmt->execute();
            $resultado = $stmt->get_result();
            $mapas = $resultado->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }
    } elseif (isset($_GET["filter"]) && !empty($_GET["filter"])) {
        $filtro = filter_var($_GET["filter"], FILTER_SANITIZE_STRING); 
    
        try {
            $sql = "SELECT * FROM map_db WHERE type LIKE ?";
            $sql .= " ORDER BY map REGEXP '^[A-Za-z]' DESC, map ASC";
            
            $stmt = $conn->prepare($sql);
            $filterTerm = "%" . $filtro . "%";
            $stmt->bind_param("s", $filterTerm); 
            $stmt->execute();
            $resultado = $stmt->get_result();
            $mapas = $resultado->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }
    } else {
        try {
            $sql = "SELECT * FROM map_db ";
            $sql .= "ORDER BY map REGEXP '^[A-Za-z]' DESC, map ASC";
            
            $resultado = $conn->query($sql);
            $mapas = $resultado->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }

    }

    $maps_per_page = 10;
    $page = isset($pagina) ? (int) $pagina : 1;
    $total_maps = count($mapas);
    $total_pages = ceil($total_maps / $maps_per_page);
    $start_index = ($page - 1) * $maps_per_page;
    $end_index = min($start_index + $maps_per_page - 1, $total_maps - 1);
    $paginated_maps = array_slice($mapas, $start_index, $maps_per_page);
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

    if (($pagina > $total_pages) && !empty($mapas)) {
        header("Location: ?to=error&id=404");
        exit();
    }
} else {
    header("Location: ?to=error");
    exit();
}

?>
