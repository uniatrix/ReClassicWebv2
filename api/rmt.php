<?php

$title = 'Marketplace RMT';

$pagina = isset($_GET["page"]) ? (int) $_GET["page"] : 1;

if ($pagina < 1) {
    header("Location: ?to=rmt&page=1");
    exit();
}

// Configuracoes de paginacao
$items_per_page = 20;
$offset = ($pagina - 1) * $items_per_page;

// Contar total de itens disponiveis
$sql_count = "SELECT COUNT(*) as total FROM `pix_transactions`
              WHERE `status` = 'waiting_buyer' AND (`buyer_aid` = 0 OR `buyer_aid` IS NULL)";
$result_count = $conn->query($sql_count);
$total_items = $result_count ? $result_count->fetch_assoc()['total'] : 0;
$total_pages = ceil($total_items / $items_per_page);

// Redirecionar se pagina invalida
if ($pagina > $total_pages && $total_items > 0) {
    header("Location: ?to=rmt&page=" . $total_pages);
    exit();
}

// Buscar itens com paginacao
$sql = "SELECT
            pt.id,
            pt.seller_aid,
            pt.seller_char_name,
            pt.item_id,
            pt.item_name,
            pt.item_refine,
            pt.item_card1,
            pt.item_card2,
            pt.item_card3,
            pt.item_card4,
            pt.item_amount,
            pt.price_brl,
            pt.timestamp
        FROM `pix_transactions` pt
        WHERE pt.`status` = 'waiting_buyer'
        AND (pt.`buyer_aid` = 0 OR pt.`buyer_aid` IS NULL)
        ORDER BY pt.timestamp DESC
        LIMIT ? OFFSET ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $items_per_page, $offset);
$stmt->execute();
$result = $stmt->get_result();
$items_rmt = $result->fetch_all(MYSQLI_ASSOC);

// Helper para buscar nomes das cartas
function getCardNames($card1, $card2, $card3, $card4) {
    $cards = [];
    $card_ids = [$card1, $card2, $card3, $card4];

    foreach ($card_ids as $card) {
        // Ignorar valores especiais (254, 255 sao usados para encantamentos)
        if ($card > 0 && $card != 254 && $card != 255 && $card < 65535) {
            $item_info = RECLASSIC::getInfoItem($card);
            if ($item_info && isset($item_info['name_english'])) {
                // Remover " Card" do final se existir
                $card_name = str_replace(' Card', '', $item_info['name_english']);
                $cards[] = $card_name;
            }
        }
    }
    return $cards;
}

// URLs de paginacao
$prev_page_url = $pagina > 1 ? "?to=rmt&page=" . ($pagina - 1) : null;
$next_page_url = $pagina < $total_pages ? "?to=rmt&page=" . ($pagina + 1) : null;

?>
