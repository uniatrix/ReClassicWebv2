<?php

include('libs.php');
session_start();
date_default_timezone_set('America/Sao_Paulo');

$config = [
    'KeyDivinePride'    => '',
    'DropNormal'        => 100,                                 // Drop Normal (100 = 100%) 
    'DropMVP'           => 100,                                 // Drop de MVP (100 = 100%)
    'Limit_Players_Rank'=> 10,
];

$conn = RECLASSIC::getInstance();
?>