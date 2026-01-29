<?php

$title = 'Pacotes Fundadores';

// Configuracao dos pacotes fundadores
// IDs dos itens baseados no item_db do servidor
$founderPackages = [
    1 => [
        'name' => 'Novico',
        'price' => 49,
        'color' => '#27ae60',
        'icon' => 'fa-seedling',
        'items' => [
            ['id' => 14509, 'name' => 'VIP 15 Dias', 'qty' => 1, 'desc' => 'Acesso VIP por 15 dias'],
            ['id' => 5381, 'name' => 'Nick Colorido Dourado', 'qty' => 1, 'desc' => 'Destaque seu nome no jogo'],
            ['id' => 5325, 'name' => 'Visual Milagre de Asgard', 'qty' => 1, 'desc' => 'EXP de monstros +1%'],
            ['id' => 12212, 'name' => 'Asa de Mosca Ilimitada', 'qty' => 1, 'desc' => 'Teleporte por 30 dias'],
            ['id' => 11517, 'name' => 'Pocao Branca Compacta', 'qty' => 100, 'desc' => 'Restaura HP'],
            ['id' => 505, 'name' => 'Pocao Azul', 'qty' => 100, 'desc' => 'Restaura SP'],
            ['id' => 12319, 'name' => 'Bolinho Divino', 'qty' => 5, 'desc' => 'Recupera HP/SP'],
            ['id' => 14532, 'name' => 'Manual de Combate', 'qty' => 2, 'desc' => 'EXP +50% por 30min'],
            ['id' => 14533, 'name' => 'Grimorio de Combate', 'qty' => 3, 'desc' => 'EXP Job +50%'],
            ['id' => 12210, 'name' => 'Goma de Mascar', 'qty' => 5, 'desc' => 'DROP +100%'],
            ['id' => 7060, 'name' => 'Seguro de Vida', 'qty' => 5, 'desc' => 'Nao perde EXP ao morrer'],
        ],
        'benefits' => [
            '15 Dias de VIP',
            'Nick Colorido Dourado',
            'Visual Milagre de Asgard (+1% EXP)',
            'Asa de Mosca Ilimitada (30 dias)',
            'Itens de inicio exclusivos'
        ]
    ],
    2 => [
        'name' => 'Aventureiro',
        'price' => 149,
        'color' => '#3498db',
        'icon' => 'fa-compass',
        'items' => [
            ['id' => 14510, 'name' => 'VIP 30 Dias', 'qty' => 1, 'desc' => 'Acesso VIP por 30 dias'],
            ['id' => 5381, 'name' => 'Nick Colorido Dourado', 'qty' => 1, 'desc' => 'Destaque seu nome no jogo'],
            ['id' => 14511, 'name' => 'Recompensa Diaria', 'qty' => 1, 'desc' => 'Bonus diario por 30 dias'],
            ['id' => 5325, 'name' => 'Visual Milagre de Asgard', 'qty' => 1, 'desc' => 'EXP de monstros +1%'],
            ['id' => 5381, 'name' => 'Super Oculos Poring+', 'qty' => 1, 'desc' => 'DROP +5%, EXP +5%'],
            ['id' => 2435, 'name' => 'Botas do ArchAngeling', 'qty' => 1, 'desc' => 'Parte do set'],
            ['id' => 12622, 'name' => 'Redea Permanente', 'qty' => 1, 'desc' => 'Montaria permanente'],
            ['id' => 12212, 'name' => 'Asa de Mosca Ilimitada', 'qty' => 1, 'desc' => 'Teleporte por 30 dias'],
            ['id' => 11517, 'name' => 'Pocao Branca Compacta', 'qty' => 100, 'desc' => 'Restaura HP'],
            ['id' => 505, 'name' => 'Pocao Azul', 'qty' => 100, 'desc' => 'Restaura SP'],
            ['id' => 12319, 'name' => 'Bolinho Divino', 'qty' => 5, 'desc' => 'Recupera HP/SP'],
            ['id' => 14533, 'name' => 'Grimorio de Combate', 'qty' => 2, 'desc' => 'EXP Job +50%'],
            ['id' => 14534, 'name' => 'Enciclopedia de Combate', 'qty' => 3, 'desc' => 'EXP Base +50%'],
            ['id' => 12210, 'name' => 'Goma de Mascar', 'qty' => 2, 'desc' => 'DROP +100%'],
            ['id' => 12264, 'name' => 'Chiclete de Bola', 'qty' => 3, 'desc' => 'DROP +200%'],
            ['id' => 7060, 'name' => 'Seguro de Vida', 'qty' => 10, 'desc' => 'Nao perde EXP ao morrer'],
        ],
        'benefits' => [
            '30 Dias de VIP',
            'Nick Colorido Dourado',
            'Recompensa Diaria (30 dias)',
            'Super Oculos Poring+ (+5% DROP/EXP)',
            'Botas do ArchAngeling',
            'Montaria Permanente',
            'Asa de Mosca Ilimitada (30 dias)'
        ]
    ],
    3 => [
        'name' => 'Heroi',
        'price' => 249,
        'color' => '#f39c12',
        'icon' => 'fa-crown',
        'items' => [
            ['id' => 14510, 'name' => 'VIP 30 Dias', 'qty' => 1, 'desc' => 'Acesso VIP por 30 dias'],
            ['id' => 5381, 'name' => 'Nick Colorido Dourado', 'qty' => 1, 'desc' => 'Destaque seu nome no jogo'],
            ['id' => 14511, 'name' => 'Recompensa Diaria', 'qty' => 1, 'desc' => 'Bonus diario por 30 dias'],
            ['id' => 5325, 'name' => 'Visual Milagre de Asgard', 'qty' => 1, 'desc' => 'EXP de monstros +1%'],
            ['id' => 5381, 'name' => 'Super Oculos Poring+', 'qty' => 1, 'desc' => 'DROP +5%, EXP +5%'],
            ['id' => 2435, 'name' => 'Botas do ArchAngeling', 'qty' => 1, 'desc' => 'Todos os atributos +1, Habilita Curar nv.1'],
            ['id' => 12622, 'name' => 'Redea Permanente', 'qty' => 1, 'desc' => 'Montaria permanente'],
            ['id' => 12212, 'name' => 'Asa de Mosca Ilimitada', 'qty' => 1, 'desc' => 'Teleporte por 30 dias'],
            ['id' => 11517, 'name' => 'Pocao Branca Compacta', 'qty' => 100, 'desc' => 'Restaura HP'],
            ['id' => 505, 'name' => 'Pocao Azul', 'qty' => 100, 'desc' => 'Restaura SP'],
            ['id' => 12319, 'name' => 'Bolinho Divino', 'qty' => 10, 'desc' => 'Recupera HP/SP'],
            ['id' => 14534, 'name' => 'Enciclopedia de Combate', 'qty' => 5, 'desc' => 'EXP Base +50%'],
            ['id' => 14535, 'name' => 'Diario da Aventura', 'qty' => 5, 'desc' => 'EXP Base/Job +100%'],
            ['id' => 12210, 'name' => 'Goma de Mascar', 'qty' => 5, 'desc' => 'DROP +100%'],
            ['id' => 12264, 'name' => 'Chiclete de Bola', 'qty' => 5, 'desc' => 'DROP +200%'],
            ['id' => 7060, 'name' => 'Seguro de Vida', 'qty' => 10, 'desc' => 'Nao perde EXP ao morrer'],
        ],
        'benefits' => [
            '30 Dias de VIP',
            'Nick Colorido Dourado',
            'Recompensa Diaria (30 dias)',
            'Super Oculos Poring+ (+5% DROP/EXP)',
            'Botas do ArchAngeling (+1 All Stats)',
            'Montaria Permanente',
            'Asa de Mosca Ilimitada (30 dias)',
            'Itens Premium Exclusivos'
        ]
    ]
];

?>
