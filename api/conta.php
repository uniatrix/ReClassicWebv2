<?php
$title = 'Minha Conta';

RECLASSIC::LoginRequired();

$user = $_SESSION["user"];
$account_id = $_SESSION["conta"];


// ==================  DADOS CONTA  ================ 

try{
	$sql = "SELECT * FROM `char` WHERE account_id = $account_id";
	$result = $conn->query($sql);
	$personagens = array();

	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {
	        $personagens[] = $row;
	    }
	}

	$sql = "SELECT SUM(zeny) as total_zeny FROM `char` WHERE account_id = $account_id";
	$result = $conn->query($sql);
	$zeny_query = $result->fetch_assoc();

	$zeny = $zeny_query['total_zeny'];

	$sql = "SELECT * FROM `login` WHERE account_id = $account_id";
	$result = $conn->query($sql);
	$conta_query = $result->fetch_assoc();


    if($conta_query['vip_time'] > 1){

    	$timestamp = $conta_query['vip_time'];


    	// Data atual
    	$currentDateTime = new DateTime();

    	// Data a partir do timestamp
    	$timestampDateTime = new DateTime("@$timestamp");
    	$timestampDateTime->setTimezone(new DateTimeZone('UTC'));

    	// Calcula a diferença entre as duas datas
    	$interval = $currentDateTime->diff($timestampDateTime);

    	// Converte a diferença em dias, horas, minutos e segundos
    	$days = $interval->days;
    	$hours = $interval->h;
    	$minutes = $interval->i;
    	$seconds = $interval->s;
    }

}catch (Exception $e) {
    define('__ERROR__', true);
    include('fatalerror.php');
    exit;
}


// ==================  FIM DADOS CONTA  ================ 

// ==================  RESETS  ================ 

if (isset($_GET['resetar'])) {
    $type = isset($_GET['type']) ? $_GET['type'] : '';
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    $sql = "SELECT online, sex, name FROM `char` WHERE char_id = $id";
    $result = $conn->query($sql);
    $online_query = $result->fetch_assoc();

    if(!RECLASSIC::getChar($id)){
    	header("Location: ?to=conta");
        RECLASSIC::defineMessageSession("<p class='error'>Houve um erro ao realizar essa ação.</p>");
        exit();
    }

	if($online_query['online'] != 0){
    	header("Location: ?to=conta");
        RECLASSIC::defineMessageSession("<p class='error'>Você não pode realizar essa ação pois o personagem está online.</p>");
        exit();
    }
	


    if ($type === "visual" || $type === "posicao") {
        if (!empty($id)) {
      
            $id = intval($id);

            if ($type === "visual") {
                RECLASSIC::resetarVisual($id);
                RECLASSIC::defineMessageSession("<p class='success-message'>O visual do personagem {$online_query['name']} foi Resetado.</p>");
            } else if ($type === "posicao") {
                RECLASSIC::resetPosicao($id);
                RECLASSIC::defineMessageSession("<p class='success-message'>A Posição do personagem {$online_query['name']} foi Resetada</p>");
  
                
            }

            header("Location: ?to=conta");
            exit();
        } else {
            header("Location: ?to=conta");
            RECLASSIC::defineMessageSession("<p class='error'>Houve um erro ao realizar essa ação.</p>");
            exit();
        }
    } else {
            header("Location: ?to=conta");
            RECLASSIC::defineMessageSession("<p class='error'>Houve um erro ao realizar essa ação.</p>");
            exit();
    }
} 

// ==================  FIM RESETS  ================ 
    $banTemp = '';
    $banPerm = '';
    if ($conta_query['state'] == 0) {
        if ($conta_query['unban_time'] > time()) {
            $banTemp = TRUE;
        }
    } elseif ($conta_query['state'] == 5) {
        $banPerm = TRUE;
    }
?> 