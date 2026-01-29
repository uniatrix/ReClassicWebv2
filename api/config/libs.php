<?php
include('jobs.php');
include('castlenames.php');
class RECLASSIC {
    private $host;
    private $user;
    private $senha;
    private $bd;

    private $mysqli;
    private $PortMap;
    private $PortChar;
    private $PortLogin;

    private static $instance = null;

    private function __construct() {
        // Update these database connection settings
        // LOCAL DEVELOPMENT (comment out for production)
        $this->host         = 'localhost';                 // Local MySQL server
        $this->user         = 'root';                      // MySQL root user
        $this->senha        = '';                          // No password for local root
        $this->bd           = 'ragdb';                     // Local database name

        // PRODUCTION (uncomment for InfinityFree hosting)
        // $this->host         = 'sql313.infinityfree.com';
        // $this->user         = 'if0_38596119';
        // $this->senha        = 'KrqOYxCErskmzZ';
        // $this->bd           = 'if0_38596119_ragdb';
        
        // Keep these game server ports unchanged
        $this->PortMap      = 5121;    // Porta do Map-Server (Padrão = 5121)
        $this->PortChar     = 6121;    // Porta do Char-Server (Padrão = 6121)
        $this->PortLogin    = 6900;    // Porta do Login-Server (Padrão = 6900)

        try {                                                   
            $this->mysqli = new mysqli($this->host, $this->user, $this->senha, $this->bd);
        } catch (Exception $e) {
            define("__ERROR__", true);
            include "fatalerror.php";
            exit();
        }

        $this->mysqli->set_charset("utf8mb4");
    }

    public function __destruct() {
        if ($this->mysqli) {
            $this->mysqli->close();
        }
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->mysqli;
    }
    public static function HostDB() {
        return self::$instance->host;
    }

    public static function PortMap() {
        return self::$instance->PortMap;
    }
    public static function PortChar() {
        return self::$instance->PortChar;
    }
    public static function PortLogin() {
        return self::$instance->PortLogin;
    }

    public static function getDBName() {
        return self::$instance->bd;
    }
    public static function getDBHostName() {
        return self::$instance->host;
    }
    public static function getDBUser() {
        return self::$instance->user;
    }
    public static function getDBSenha() {
        return self::$instance->senha;
    }
  public static function ContasCriadas() {
        
        $sql = "SELECT COUNT(*) AS total FROM login";
        $result = self::getInstance()->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
  public static function GuildasCriadas() {
        $sql = "SELECT COUNT(*) AS total FROM guild";
        $result = self::getInstance()->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }    
    public static function TotalOnline() {
        $sql = "SELECT COUNT(*) AS total FROM `char` WHERE online = 1";
        $result = self::getInstance()->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    private static function ResultStatus($ip, $port) {
        return @fsockopen($ip, $port, $errno, $errstr, 1) !== false;
    }


    public static function getGuildName($guildID){
        $sql = "SELECT name FROM guild WHERE guild_id = ?";
        $stmt = self::getInstance()->prepare($sql);
        $stmt->bind_param("i", $guildID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['name'] ?? 'N/A';
        }
        return 'N/A';
    }

    public static function getAccountinfo($accountID){
        $sql = "SELECT * FROM login WHERE account_id = ?";
        $stmt = self::getInstance()->prepare($sql);
        $stmt->bind_param("i", $accountID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

public static function getMapName($idmapa) {
    global $config;
 

    // Construção da URL
    $url = "https://www.divine-pride.net/api/database/map/" . $idmapa . "?apiKey=" . $config["KeyDivinePride"];

    // Configuração dos headers
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

    // Inicialização do cURL
    $ch = curl_init();

    if (!$ch) {
        return 'Erro ao inicializar cURL';
    }

    // Configuração do cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execução da solicitação
    $jsonData = curl_exec($ch);


    // Fechamento do handle cURL
    curl_close($ch);

    // Decodificação do JSON
    $data = json_decode($jsonData, true);

    // Verificação da resposta
    if (!isset($data["name"])) {
        return 'Desconhecido';
    } else {
        return $data["name"] ?? 'Nome não encontrado';
    }
}


    public static function getChar($charID)
    {
        
        $mysqli = self::getInstance();

      
        $charID = $mysqli->real_escape_string($charID);

       
        $sql = "SELECT * FROM `char` WHERE char_id = '$charID' LIMIT 1";

       
        $result = $mysqli->query($sql);
        if($result){
            $char = $result->fetch_assoc(); 
            $result->free(); 
            return $char;
        }else{
            return false;
        }    
        
       
    }



    public static function defineMessageSession($message)
    {
        $_SESSION['message'] = $message;
        return $message; 
    }

    public static function getMessageSession()
    {
        
        $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
        
       
        $_SESSION['message'] = '';
        
        return $message;
    }


    public static function resetarVisual($charID)
    {
        
        $pdo = self::getInstance();
        $sql = "UPDATE inventory SET equip = 0 WHERE char_id = ?";
        $sth = $pdo->prepare($sql);

        if (!$sth->execute([$charID])) {
            return false;
        }

        $sql = "UPDATE `char` SET 
                    hair = 0, hair_color = 0, clothes_color = 0, 
                    weapon = 0, shield = 0, 
                    head_top = 0, head_mid = 0, head_bottom = 0 
                WHERE char_id = ?";
        $sth = $pdo->prepare($sql);

        if (!$sth->execute([$charID])) {
            return false;
        }
        return true;
    }
    public static function resetPosicao($charID)
    {
        $pdo = self::getInstance();
        $sql = "UPDATE `char` AS ch SET 
                    ch.last_map = ch.save_map, 
                    ch.last_x = ch.save_x, 
                    ch.last_y = ch.save_y 
                WHERE ch.char_id = ?";
        $sth = $pdo->prepare($sql);


        if ($sth->execute([$charID])) {
            return true;
        } else {
            return false;
        }
    }

    public static function LoginRequired() {
          if (!isset($_SESSION['conta']) || empty($_SESSION["conta"])) {
            
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

            
            header("Location: ?to=entrar");
            exit();
        }
    }

    public static function adminRequired() {
  
        if (isset($_SESSION["grupo"]) && !empty($_SESSION["grupo"]) && $_SESSION["grupo"] == 99) {
            return true;
           
        } else{
            header("Location: ?to=error");
            exit; 
        }
    }

    public static function checkAdmin() {

        if (isset($_SESSION["grupo"]) && $_SESSION["grupo"] == 99) {
            return true;

        }else{

            return false;
        }
    }

    public static function getCashBalance($account_id) {
        $sql = "SELECT `value` FROM `acc_reg_num`
                WHERE `account_id` = ? AND `key` = '#CASHPOINTS' AND `index` = 0";
        $stmt = self::getInstance()->prepare($sql);
        $stmt->bind_param("i", $account_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return (int) $result->fetch_assoc()['value'];
        }
        return 0;
    }

    public static function formatCashToBRL($cash_points) {
        return 'R$ ' . number_format($cash_points / 1000, 2, ',', '.');
    }


    public static function getInfoItem($itemID) {
        $sql = "SELECT * FROM item_db WHERE id = ?
                UNION
                SELECT * FROM item_db2 WHERE id = ?
                LIMIT 1";
        $stmt = self::getInstance()->prepare($sql);
        $stmt->bind_param("ii", $itemID, $itemID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public static function getMobInfom($mobid) {
        $sql = "SELECT * FROM mob_db WHERE id = ?
                UNION
                SELECT * FROM mob_db2 WHERE id = ?
                LIMIT 1";
        $stmt = self::getInstance()->prepare($sql);
        $stmt->bind_param("ii", $mobid, $mobid);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    /**
     * Busca o nome traduzido de um item na tabela itemdesc
     */
    public static function getItemName($itemId, $fallbackName = '') {
        $sql = "SELECT itemname FROM itemdesc WHERE id = ?";
        $stmt = self::getInstance()->prepare($sql);
        $stmt->bind_param("i", $itemId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (!empty($row['itemname'])) {
                return $row['itemname'];
            }
        }
        return $fallbackName;
    }

    /**
     * Busca nomes traduzidos para múltiplos itens de uma vez (mais eficiente)
     */
    public static function getItemNames($itemIds) {
        if (empty($itemIds)) return [];

        $placeholders = implode(',', array_fill(0, count($itemIds), '?'));
        $sql = "SELECT id, itemname FROM itemdesc WHERE id IN ($placeholders)";

        $stmt = self::getInstance()->prepare($sql);
        $types = str_repeat('i', count($itemIds));
        $stmt->bind_param($types, ...$itemIds);
        $stmt->execute();
        $result = $stmt->get_result();

        $names = [];
        while ($row = $result->fetch_assoc()) {
            $names[$row['id']] = $row['itemname'];
        }
        return $names;
    }

}// fecha a classe RECLASSIC


function getRandOption($id1)
{
    global $config; 
    $option = $config['RandomOptions'][$id1]; 

    if ($option) {
        return $option;
    } else {
        return false;
    }
}

function itemRandOption($id, $value)
{
    $option = getRandOption($id);
    if ($option) {
        return sprintf($option, $value);
    }
    return false; 
}


function sizeInput($valor) {
    return 145 + (int)log10($valor) * 11;
}

function formatarNumero($numero)
{
    return number_format($numero, 0, '.', '.');
}

function formatarDataHora($dataHora) {
    if (empty($dataHora)) {
        return 'Nunca';
    }
    $date = new DateTime($dataHora);
    return $date->format('d/m/Y H:i:s');
}

function iconClass($idClass)
{
    
    $link = "https://static.divine-pride.net/images/jobs/icon_jobs_$idClass.png";
        return $link; 

}
function iconMapa($mapName, $id)
{
    $localPngPath = sprintf("img/mapas/%d.png", $mapName);
    if (file_exists($localPngPath)) {
        return preg_replace('&/{2,}&', '/', $localPngPath);
    }else{
        if ($id == 1) {
            $remote_link = "https://www.divine-pride.net/img/map/medium/$mapName";
            return $remote_link;
        } elseif ($id == 2) {
            $remote_link = "https://www.divine-pride.net/img/map/original/$mapName";
            return $remote_link;
        } else {
            return $localBmpPath = "img/noimage.png";
        }
    }
}
function npcImage($itemID)
{
    
    $link = "https://static.divine-pride.net/images/mobs/png/$itemID.png";
        return $link; 

}

function sizeMonster() {
  
    return [
        'Small'  => 'Pequeno',
        'Medium' => 'Médio',
        'Large'  => 'Grande'
    ];  
}

function raceMonster() {

    return [
        'Angel'        => 'Anjo',
        'Formless'     => 'Amorfo',
        'Brute'        => 'Bruto',
        'Demon'        => 'Demônio',
        'Dragon'       => 'Dragão',
        'Demihuman'    => 'Humanóide',
        'Insect'       => 'Inseto',
        'Undead'       => 'Morto-vivo',
        'Fish'         => 'Peixe',
        'Plant'        => 'Planta',
    ];
}


function elementMonster() {
    return [
        'Water'  => 'Água',
        'Ghost'  => 'Fantasma',
        'Fire'   => 'Fogo',
        'Undead' => 'Maldito',
        'Neutral' => 'Neutro',
        'Holy'   => 'Sagrado',
        'Dark'   => 'Sombrio',
        'Earth'  => 'Terra',
        'Wind'   => 'Vento',
        'Poison' => 'Veneno'
    ];
}

function itemType() {

    return [
        'weapon'        => 'Arma',
        'armor'         => 'Armadura',
        'petarmor'      => 'Equip. Pet',
        'card'          => 'Slot\'s',
        'cash'          => 'Cash',
        'delayconsume'  => 'Consumível',
        'healing'       => 'Cura',
        'ammo'          => 'Munição',
        'petegg'        => 'Ovo de Pet',
        'etc'           => 'Outros',
        'shadowgear'    => 'Sombra de Equip',
        'usable'        => 'Utilizável'
    ];
  
}
function itemSubType($type) {
    global $lang;  

    switch ($type) {
        case 'weapon':
                return [
                    '1haxe'         => 'Machado de Uma Mão',
                    '1hspear'       => 'Lança de Uma Mão',
                    '1hsword'       => 'Espada de Uma Mão',
                    '2haxe'         => 'Machado de Duas Mãos',
                    '2hspear'       => 'Lança de Duas Mãos',
                    '2hstaff'       => 'Cajado de Duas Mãos',
                    '2hsword'       => 'Espada de Duas Mãos',
                    'book'          => 'Livro',
                    'bow'           => 'Arco',
                    'dagger'        => 'Adaga',
                    'gatling'       => 'Metralhadora Gatling',
                    'grenade'       => 'Lança-Granadas',
                    'huuma'         => 'Shuriken Huuma',
                    'katar'         => 'Katar',
                    'knuckle'       => 'Punho',
                    'mace'          => 'Maça',
                    'musical'       => 'Instrumento Musical',
                    'revolver'      => 'Revólver',
                    'rifle'         => 'Rifle',
                    'shotgun'       => 'Espingarda',
                    'staff'         => 'Cajado',
                    'whip'          => 'Chicote'
                ];

        case 'ammo':
            
                return [
                    'arrow'         => 'Flecha',
                    'bullet'        => 'Projétil',
                    'dagger'        => 'Adaga Arremessável',
                    'cannonball'    => 'Bala de Canhão',
                    'grenade'       => 'Granada',
                    'kunai'         => 'Kunai',
                    'shell'         => 'Concha',
                    'shuriken'      => 'Shuriken',
                    'throwweapon'   => 'Arremessável'
                ];

        case 'card':
            
                return [
                    'unknown'       => 'N/A',
                    'enchant'       => 'Encantamento'
                ];

        default:
            return ['unknown' => 'N/A'];
    }
}function itemImage($itemID)
{
    $localPngPath = sprintf("assets/img/item/collection/%d.png", $itemID);
    $localBmpPath = sprintf("assets/img/item/collection/%d.bmp", $itemID);


    if (file_exists($localPngPath)) {
        return preg_replace('&/{2,}&', '/', $localPngPath);
    } elseif (file_exists($localBmpPath)) {
        return preg_replace('&/{2,}&', '/', $localBmpPath);
    } else {
        $remote_link = "https://static.divine-pride.net/images/items/collection/$itemID.png";
        return $remote_link;
    }
}
function mapType() {

    return [
        
        'city'        => 'Cidade',
        'field'       => 'Campo',
        'dungeon'     => 'Caverna',
        'other'       => 'Outro',
        'pvp'         => 'PvP',
        'guild'       => 'Guild',
        'training'    => 'Treinamento',
    ];
}

function monsterImageIndex($monsterID)
{
    $localGifPath = sprintf("assets/img/monsters/%d.gif", $monsterID);
    $localPngPath = sprintf("assets/img/monsters/%d.png", $monsterID);

    if (file_exists($localGifPath)) {
        return preg_replace('&/{2,}&', '/', "$localGifPath");
    } elseif (file_exists($localPngPath)) {
        return preg_replace('&/{2,}&', '/', "$localPngPath");
    } else {
        $remotePngLink = "https://static.divine-pride.net/images/mobs/png/$monsterID.png";
        return $remotePngLink;
    }
}

function iconImage($itemID)
{
    // Use document root relative paths for web display
    $webPngPath = "assets/img/item/icons/$itemID.png";
    $webBmpPath = "assets/img/item/icons/$itemID.bmp";

    // Use absolute paths for file existence check
    $localPngPath = __DIR__ . "/../../assets/img/item/icons/$itemID.png";
    $localBmpPath = __DIR__ . "/../../assets/img/item/icons/$itemID.bmp";

    if (file_exists($localPngPath)) {
        return $webPngPath;
    } elseif (file_exists($localBmpPath)) {
        return $webBmpPath;
    } else {
        $remote_link = "https://static.divine-pride.net/images/items/item/$itemID.png";
        return $remote_link;
    }
}


function converterCores($texto) 
{
    $padrao = '/\^([0-9a-fA-F]{6})/';
    $texto = preg_replace_callback($padrao, function($matches) {
        $cor = $matches[1];
        if($cor == '777777') $cor = '000000';
        if($cor == 'ffffff') $cor = '000000';
        if($cor == '0000ff') $cor = '0000FF';
        if($cor == 'ff0000') $cor = 'ff5e6e';
        if($cor == '00688B') $cor = '00ff00';
        if($cor == 'FA4E09') $cor = 'ffeb2b';
        if($cor == '7CFAFF') $cor = 'ff0000';
        if($cor == 'ffeb2b') $cor = 'cdbd23';
        $corHTML = '#' . $cor;
        return "<span style=\"color: $corHTML;\">"; 
    }, $texto);
    $texto = str_replace('^000000', '</span>', $texto);
    return $texto;
}

function converterTempo($tempo) {
 
    
    $segundos = $tempo / 1000;
    $horas = floor($segundos / 3600);
    $segundos %= 3600;
    $minutos = floor($segundos / 60);
    $segundos %= 60;

    $formatado = "";
   
        if ($horas > 0) {
            $formatado .= $horas . ' ' . ($horas == 1 ? 'hora' : 'horas') . ' ';
        }
        if ($minutos > 0) {
            $formatado .= $minutos . ' ' . ($minutos == 1 ? 'min' : 'mins') . ' ';
        }
        if ($segundos > 0) {
            $formatado .= $segundos . ' ' . ($segundos == 1 ? 'seg' : 'segs');
        }
  

    return trim($formatado);
}



/////// icons database
	
function itemTypeIcon($key) {
    return '<img src="assets/img/icones/tipoitem/'.$key.'.png" style="width:30px; margin-right: 5px;">';
}
function itemSubTypeIcon($type, $subtybe) {
	if($type == 'ammo' || $type == 'weapon'){
	    return '<img src="assets/img/icones/categoriaitem/'.$type.'/'.$subtybe.'.png" style="width:24px; margin-right: 5px;">';
	}else{
	    return '<img src="assets/img/icones/categoriaitem/'.$subtybe.'.png" style="width:24px; margin-right: 5px;">';
	}
}
function raceMonsterIcon($key) {
	return '<img src="assets/img/icones/racas/'.$key.'.png" width="30px">';
}
function sizeMonsterIcon($key) {
	return '<img src="assets/img/icones/tamanhos/'.$key.'.png" width="30px">';
}
function elementMonsterIcon($key) {
	return '<img src="assets/img/icones/elementos/'.$key.'.png" width="30px">';
}
function mapTypeIcon($key) {
    return '<img src="assets/img/icones/tipomapa/'.$key.'.png" style="width:30px; margin-right: 5px;">';
}