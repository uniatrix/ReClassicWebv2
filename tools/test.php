<?php
echo "PHP funcionando!<br>";
echo "Versao: " . phpversion() . "<br>";

// Testar conexao com banco
$mysqli = new mysqli('localhost', 'root', '', 'ragdb');
if ($mysqli->connect_error) {
    echo "Erro conexao: " . $mysqli->connect_error;
} else {
    echo "Conexao OK!<br>";
}

// Testar arquivo lub
$file = __DIR__ . '/../System/itemInfo_bRO.lub';
if (file_exists($file)) {
    echo "Arquivo itemInfo_bRO.lub encontrado!<br>";
    echo "Tamanho: " . filesize($file) . " bytes<br>";
} else {
    echo "Arquivo NAO encontrado: $file<br>";
}
?>
