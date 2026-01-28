<?php
$title = 'Vote por Pontos';


RECLASSIC::LoginRequired();
try {
    
	$sql = "SELECT site_id, site_name, address, points, blocking_time, banner_url, img_banner FROM v4p_sites";
	$sth = $conn->query($sql);
	if ($sth->num_rows > 0) {
		$results = array();
		while ($vp = $sth->fetch_assoc()) {
			$results[] = $vp;
		}
	} else {
		$results = false;
	}

	$conta = filter_var($_SESSION['conta'], FILTER_SANITIZE_NUMBER_INT);
	$stmt = $conn->prepare("SELECT points FROM v4p_pontos WHERE account_id = ?");
	$stmt->bind_param("i", $conta);
	$stmt->execute();
	$result_voters = $stmt->get_result()->fetch_assoc();

	$pontos = ($result_voters !== null && isset($result_voters['points'])) ? $result_voters['points'] : "0";


} catch (Exception $e) {
	define("__ERROR__", true);
	include "fatalerror.php";
	exit();
}

if (isset($_GET['votar_em']) && !empty($_GET['votar_em'])) {

    $id = intval($_GET['votar_em']);
    $conta = $_SESSION['conta'];
    $ip = $_SERVER['REMOTE_ADDR'];
/*	$xforward= $_SERVER["HTTP_X_FORWARDED_FOR"];
	if (!empty($xforward)) {
        header('Location: ?to=error&id=401'); 
        exit;
	}
*/

    
    
    $sql_ip = "SELECT `rtid`, `ip_address`, `unblock_time`, `f_site_id` FROM v4p_registros WHERE ip_address = ? AND f_site_id =?";
    $sth_ip = $conn->prepare($sql_ip);
    $sth_ip->bind_param('si', $ip, $id);
    $sth_ip->execute();
    $result_ip = $sth_ip->get_result()->fetch_assoc();


    
    if ($ip === $result_ip['ip_address'] && $result_ip['unblock_time'] > date("Y-m-d H:i:s") && $id == $result_ip['f_site_id']) {
	     RECLASSIC::defineMessageSession("<p class='error'>Fraude Detectada</p>");
	     header('Location: ?to=vote');
	     exit;
    }
    


    $sql_sites = "SELECT blocking_time, points, address FROM v4p_sites WHERE site_id = ?";
    $sth_sites = $conn->prepare($sql_sites);
    $sth_sites->bind_param('i', $id);
    $sth_sites->execute();
    $result_sites = $sth_sites->get_result()->fetch_assoc();

    if(!$result_sites) {
        header('Location: ?to=error');
        exit;
    }


    $tempoAdicionar = $result_sites['blocking_time'];

    $horaAtual = new DateTime();
    list($hours, $minutes, $seconds) = explode(':', $tempoAdicionar);
    $intervalo = new DateInterval("PT{$hours}H{$minutes}M{$seconds}S");
    $horaAtual->add($intervalo);
    $blocking_time = $horaAtual->format('Y-m-d H:i:s');

    $pontos_sites = $result_sites['points'];

    if (isset($result_ip['unblock_time']) && $result_ip['unblock_time'] > date("Y-m-d H:i:s")) {
        header('Location: ?to=error&id=401'); 
        exit;
    }

    if (!isset($result_ip['unblock_time'])) {
        $sql1 = "INSERT INTO v4p_registros (f_site_id, unblock_time, account_id, ip_address) VALUES (?, ?, ?, ?)";
        $sth_logs_insert = $conn->prepare($sql1);
        $sth_logs_insert->bind_param('isis', $id, $blocking_time, $conta, $ip);
        $sth_logs_insert->execute();
    } else {
        $sql1 = "UPDATE v4p_registros SET unblock_time = ? WHERE account_id = ? AND f_site_id = ?";
        $sth_logs_update = $conn->prepare($sql1);
        $sth_logs_update->bind_param('sii', $blocking_time, $conta, $id);
        $sth_logs_update->execute();
    }

    if (!isset($result_voters['points'])) {
        $sql = "INSERT INTO v4p_pontos (account_id, points) VALUES (?, ?)";
        $sth_points = $conn->prepare($sql);
        $sth_points->bind_param('ii', $conta, $pontos_sites);
        $sth_points->execute();
    } else {
        $sql2 = "UPDATE v4p_pontos SET points = points + ? WHERE account_id = ?";
        $sth_points_update = $conn->prepare($sql2);
        $sth_points_update->bind_param('ii', $pontos_sites, $conta);
        $sth_points_update->execute();
    }

	$site = str_replace(["http://", "https://", "www."], "", $result_sites['address']);
	header("Location: https://www." . $site);
    exit;
}

?> 