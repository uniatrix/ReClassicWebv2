<?php
/**
 * Script para traduzir nomes de itens nos arquivos .yml do rAthena
 * usando os nomes dos arquivos .lub do cliente
 * PRESERVA ENCODING ORIGINAL DOS ARQUIVOS
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit', '512M');
set_time_limit(600);

// Arquivos .lub com os nomes traduzidos
$lubFiles = [
    'C:/Games/Ragnarok ReClassic Project/ReClassic/System/itemInfo_bRO.lub',
    'C:/Games/Ragnarok ReClassic Project/ReClassic/System/itemInfo_Rev.lub',
];

// Arquivos .yml para traduzir
$ymlFiles = [
    'C:/Coding/rAthenaReClassic Local/db/pre-re/item_db_usable.yml',
    'C:/Coding/rAthenaReClassic Local/db/pre-re/item_db_equip.yml',
    'C:/Coding/rAthenaReClassic Local/db/pre-re/item_db_etc.yml',
];

/**
 * Verifica se um nome é válido (não é texto corrompido/Korean mal codificado)
 * Nomes válidos contêm principalmente letras latinas e acentos portugueses
 */
function isValidName($name) {
    if (empty($name)) return false;

    // Caracteres válidos para português em Windows-1252:
    // - Letras ASCII (a-z, A-Z)
    // - Números (0-9)
    // - Espaços e pontuação comum
    // - Acentos portugueses: á à â ã é ê í ó ô õ ú ç (e maiúsculas)
    // Bytes Windows-1252 para acentos: 0xE0-0xFC (à-ü)

    // Conta caracteres "estranhos" que indicam encoding incorreto
    $validChars = 0;
    $totalChars = strlen($name);

    for ($i = 0; $i < $totalChars; $i++) {
        $ord = ord($name[$i]);

        // ASCII imprimível (espaço até ~)
        if ($ord >= 0x20 && $ord <= 0x7E) {
            $validChars++;
        }
        // Acentos portugueses comuns em Windows-1252
        elseif (in_array($ord, [
            0xC0, 0xC1, 0xC2, 0xC3, // À Á Â Ã
            0xC7, // Ç
            0xC9, 0xCA, // É Ê
            0xCD, // Í
            0xD3, 0xD4, 0xD5, // Ó Ô Õ
            0xDA, // Ú
            0xE0, 0xE1, 0xE2, 0xE3, // à á â ã
            0xE7, // ç
            0xE9, 0xEA, // é ê
            0xED, // í
            0xF3, 0xF4, 0xF5, // ó ô õ
            0xFA, // ú
            0xAA, 0xBA, // ª º
        ])) {
            $validChars++;
        }
    }

    // Se menos de 70% dos caracteres são válidos, provavelmente é texto corrompido
    $ratio = $totalChars > 0 ? ($validChars / $totalChars) : 0;
    return $ratio >= 0.7;
}

/**
 * Formata um valor para YAML, adicionando aspas se necessário
 */
function formatYamlValue($value) {
    // Remove caracteres de controle e null bytes
    $value = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $value);

    // Se contém caracteres especiais YAML, precisa de aspas
    if (preg_match('/[:#\[\]{}"\'\|>\*&!%@`]/', $value) ||
        preg_match('/^\s|\s$/', $value) ||
        $value === '' ||
        $value === 'null' ||
        $value === 'true' ||
        $value === 'false') {
        // Escapar aspas duplas e usar aspas duplas
        $value = '"' . str_replace(['\\', '"'], ['\\\\', '\\"'], $value) . '"';
    }
    return $value;
}

/**
 * Remove acentos e caracteres especiais, convertendo para ASCII
 */
function removeAccents($string) {
    // Primeiro converte de Windows-1252 para UTF-8
    $utf8 = @iconv('CP1252', 'UTF-8//IGNORE', $string);
    if ($utf8 === false) {
        $utf8 = mb_convert_encoding($string, 'UTF-8', 'Windows-1252');
    }

    // Mapa de caracteres acentuados para seus equivalentes ASCII
    $accents = [
        'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'ä' => 'a',
        'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
        'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
        'ó' => 'o', 'ò' => 'o', 'õ' => 'o', 'ô' => 'o', 'ö' => 'o',
        'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
        'ç' => 'c', 'ñ' => 'n',
        'Á' => 'A', 'À' => 'A', 'Ã' => 'A', 'Â' => 'A', 'Ä' => 'A',
        'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E',
        'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ó' => 'O', 'Ò' => 'O', 'Õ' => 'O', 'Ô' => 'O', 'Ö' => 'O',
        'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U',
        'Ç' => 'C', 'Ñ' => 'N',
        '°' => 'o', // grau
        '–' => '-', '—' => '-', // travessões
        "\xe2\x80\x98" => "'", "\xe2\x80\x99" => "'", // curly single quotes
        "\xe2\x80\x9c" => '"', "\xe2\x80\x9d" => '"', // curly double quotes
    ];

    $result = strtr($utf8, $accents);

    // Remove qualquer caractere não-ASCII restante
    $result = preg_replace('/[^\x20-\x7E]/', '', $result);

    return $result;
}

/**
 * Lê nomes traduzidos dos arquivos .lub
 * Retorna array com nomes em formato original (Windows-1252) e UTF-8 para exibição
 * Usa abordagem linha por linha para maior robustez
 */
function loadNamesFromLub($lubFiles, $convertToUtf8 = false, $removeAccents = false) {
    $names = [];

    foreach ($lubFiles as $file) {
        if (!file_exists($file)) continue;

        // Ler arquivo (está em Windows-1252/CP1252)
        $content = file_get_contents($file);
        if ($content === false) continue;

        $lines = preg_split('/\r?\n/', $content);
        $currentId = null;
        $braceLevel = 0;  // Rastrear nível de aninhamento de chaves

        foreach ($lines as $line) {
            // Contar chaves abertas e fechadas para rastrear nível
            $opens = substr_count($line, '{');
            $closes = substr_count($line, '}');

            // Detectar início de bloco [ID] = {
            if (preg_match('/^\s*\[(\d+)\]\s*=\s*\{/', $line, $match)) {
                $currentId = intval($match[1]);
                $braceLevel = 1;  // Estamos dentro do bloco do item
            }
            // Detectar identifiedDisplayName = "Nome" (não unidentifiedDisplayName)
            elseif ($currentId !== null && preg_match('/\bidentifiedDisplayName\s*=\s*"([^"]*)"/', $line, $match)) {
                $name = $match[1];
                // Validar nome: ignorar nomes vazios ou corrompidos (Korean mal codificado)
                if (!empty($name) && isValidName($name)) {
                    if ($removeAccents) {
                        // Converter para ASCII sem acentos (para arquivos .yml do rAthena)
                        $names[$currentId] = removeAccents($name);
                    } elseif ($convertToUtf8) {
                        // Converter de Windows-1252 para UTF-8 (para exibição na web)
                        $nameUtf8 = @iconv('CP1252', 'UTF-8//TRANSLIT', $name);
                        if ($nameUtf8 === false) {
                            $nameUtf8 = mb_convert_encoding($name, 'UTF-8', 'Windows-1252');
                        }
                        $names[$currentId] = $nameUtf8 ?: $name;
                    } else {
                        // Manter encoding original
                        $names[$currentId] = $name;
                    }
                }
            }
            // Atualizar nível de chaves (para linhas que não iniciam um bloco)
            elseif ($currentId !== null) {
                $braceLevel += $opens - $closes;
                // Se voltamos ao nível 0, fechamos o bloco do item
                if ($braceLevel <= 0) {
                    $currentId = null;
                    $braceLevel = 0;
                }
            }
        }
    }

    return $names;
}

// Processar requisição AJAX
if (isset($_GET['action'])) {
    header('Content-Type: application/json');

    // Debug: verificar ID específico
    if ($_GET['action'] === 'debug') {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 2103;

        // Carregar nomes SEM validação para ver o que está no arquivo
        $allNames = [];
        foreach ($lubFiles as $file) {
            if (!file_exists($file)) continue;
            $content = file_get_contents($file);
            if ($content === false) continue;
            $lines = preg_split('/\r?\n/', $content);
            $currentId = null;
            $braceLevel = 0;
            foreach ($lines as $line) {
                $opens = substr_count($line, '{');
                $closes = substr_count($line, '}');

                if (preg_match('/^\s*\[(\d+)\]\s*=\s*\{/', $line, $match)) {
                    $currentId = intval($match[1]);
                    $braceLevel = 1;
                }
                elseif ($currentId !== null && preg_match('/\bidentifiedDisplayName\s*=\s*"([^"]*)"/', $line, $match)) {
                    $name = $match[1];
                    if (!empty($name)) {
                        $nameUtf8 = @iconv('CP1252', 'UTF-8//TRANSLIT', $name) ?: $name;
                        $allNames[$currentId] = [
                            'raw' => $name,
                            'utf8' => $nameUtf8,
                            'valid' => isValidName($name)
                        ];
                    }
                }
                elseif ($currentId !== null) {
                    $braceLevel += $opens - $closes;
                    if ($braceLevel <= 0) {
                        $currentId = null;
                        $braceLevel = 0;
                    }
                }
            }
        }

        // Nomes filtrados (válidos apenas)
        $validNames = loadNamesFromLub($lubFiles, true);

        $result = [
            'id' => $id,
            'found_raw' => isset($allNames[$id]),
            'found_valid' => isset($validNames[$id]),
            'raw_data' => $allNames[$id] ?? 'NOT FOUND IN LUB FILES',
            'valid_name' => $validNames[$id] ?? 'NOT FOUND (invalid or missing)',
            'total_raw' => count($allNames),
            'total_valid' => count($validNames),
        ];

        // Mostrar itens próximos
        $nearby = [];
        for ($i = $id - 5; $i <= $id + 5; $i++) {
            if (isset($allNames[$i])) {
                $nearby[$i] = $allNames[$i];
            }
        }
        $result['nearby_ids'] = $nearby;

        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    if ($_GET['action'] === 'load_names') {
        // Para exibição na web, converter para UTF-8
        $names = loadNamesFromLub($lubFiles, true);

        // Amostra para exibição - inclui usables e equips
        $sample = [];
        $i = 0;
        foreach ($names as $id => $name) {
            if ($id >= 501 && $id <= 530) {
                $sample[$id] = $name;
                $i++;
                if ($i >= 10) break;
            }
        }

        echo json_encode([
            'success' => true,
            'count' => count($names),
            'sample' => $sample
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }

    if ($_GET['action'] === 'translate') {
        $createBackup = isset($_GET['backup']) && $_GET['backup'] === '1';

        // Mapear nomes de arquivos
        $fileMap = [
            'usable' => 'C:/Coding/rAthenaReClassic Local/db/pre-re/item_db_usable.yml',
            'equip' => 'C:/Coding/rAthenaReClassic Local/db/pre-re/item_db_equip.yml',
            'etc' => 'C:/Coding/rAthenaReClassic Local/db/pre-re/item_db_etc.yml',
        ];

        // Filtrar arquivos selecionados
        $selectedFiles = isset($_GET['files']) ? explode(',', $_GET['files']) : ['usable', 'equip', 'etc'];
        $filesToProcess = [];
        foreach ($selectedFiles as $key) {
            $key = trim($key);
            if (isset($fileMap[$key])) {
                $filesToProcess[] = $fileMap[$key];
            }
        }

        // Carregar nomes traduzidos - manter encoding Windows-1252 original
        $names = loadNamesFromLub($lubFiles, false); // Manter Windows-1252

        $results = [];
        $totalTranslated = 0;
        $totalItems = 0;

        // Processar cada arquivo .yml selecionado
        foreach ($filesToProcess as $ymlFile) {
            if (!file_exists($ymlFile)) {
                $results[] = [
                    'file' => basename($ymlFile),
                    'status' => 'not_found',
                    'translated' => 0
                ];
                continue;
            }

            // Criar backup se solicitado
            if ($createBackup) {
                $backupFile = $ymlFile . '.backup_' . date('Y-m-d_H-i-s');
                copy($ymlFile, $backupFile);
            }

            // Ler arquivo .yml
            $content = file_get_contents($ymlFile);
            if ($content === false) continue;

            $translated = 0;

            // Detectar quebra de linha
            $eol = "\n";
            if (strpos($content, "\r\n") !== false) {
                $eol = "\r\n";
            }

            // Dividir em linhas
            $lines = explode($eol, $content);
            $newLines = [];
            $currentId = null;
            $lineCount = count($lines);

            $currentIndent = '';  // Para armazenar a indentação atual

            for ($j = 0; $j < $lineCount; $j++) {
                $line = $lines[$j];
                $newLines[] = $line;

                // Detectar linha de ID (aceita 2 ou 4 espaços de indentação)
                if (preg_match('/^(\s+)- Id: (\d+)/', $line, $match)) {
                    $currentIndent = $match[1];  // Captura a indentação (ex: "  " ou "    ")
                    $currentId = intval($match[2]);
                    $totalItems++;
                }
                // Detectar linha de Name - adicionar LocalName após ela
                elseif ($currentId !== null && preg_match('/^(\s+)Name: (.+)$/', $line, $match)) {
                    $nameIndent = $match[1];
                    $currentName = $match[2];

                    // Verificar se próxima linha já é LocalName
                    $nextLine = isset($lines[$j + 1]) ? $lines[$j + 1] : '';
                    $hasLocalName = preg_match('/^\s+LocalName:/', $nextLine);

                    if (isset($names[$currentId]) && !empty($names[$currentId])) {
                        $localName = trim($names[$currentId]);

                        // Só adiciona se o nome traduzido for diferente do nome atual
                        if ($localName !== $currentName && !empty($localName)) {
                            // Formatar valor para YAML
                            $formattedName = formatYamlValue($localName);

                            if ($hasLocalName) {
                                // Atualizar LocalName existente
                                $j++; // Pular a próxima linha (LocalName antigo)
                                $newLines[] = $nameIndent . 'LocalName: ' . $formattedName;
                            } else {
                                // Inserir nova linha LocalName com mesma indentação do Name
                                $newLines[] = $nameIndent . 'LocalName: ' . $formattedName;
                            }
                            $translated++;
                            $totalTranslated++;
                        }
                    }
                    $currentId = null; // Reset após processar Name
                }
                // Se encontrar outro - Id: antes de Name, reset
                elseif (preg_match('/^\s+- Id: /', $line)) {
                    $currentId = null;
                }
            }

            // Reconstruir conteúdo com as mesmas quebras de linha
            $newContent = implode($eol, $newLines);

            // Só salvar se houve traduções
            if ($translated > 0) {
                file_put_contents($ymlFile, $newContent);
            }

            $results[] = [
                'file' => basename($ymlFile),
                'status' => 'ok',
                'translated' => $translated
            ];
        }

        echo json_encode([
            'success' => true,
            'totalNames' => count($names),
            'totalItems' => $totalItems,
            'totalTranslated' => $totalTranslated,
            'results' => $results
        ]);
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Traduzir YML - ReClassic</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            min-height: 100vh;
            color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255,255,255,0.1);
            border-radius: 15px;
            padding: 30px;
            backdrop-filter: blur(10px);
        }
        h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #fff;
        }
        .subtitle {
            text-align: center;
            color: #aaa;
            margin-bottom: 30px;
        }
        .info-box {
            background: rgba(0,0,0,0.2);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .info-box h3 {
            margin-top: 0;
            color: #69f0ae;
        }
        .info-box ul {
            margin: 0;
            padding-left: 20px;
        }
        .info-box li {
            margin: 5px 0;
            color: #ccc;
        }
        .progress-container {
            background: rgba(0,0,0,0.3);
            border-radius: 25px;
            padding: 5px;
            margin: 20px 0;
            display: none;
        }
        .progress-bar {
            height: 30px;
            border-radius: 20px;
            background: linear-gradient(90deg, #00c853, #69f0ae);
            width: 0%;
            transition: width 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #1a1a2e;
            font-size: 14px;
        }
        .status {
            text-align: center;
            font-size: 16px;
            margin: 20px 0;
            min-height: 24px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin: 10px 0;
            transition: all 0.3s;
        }
        .btn-primary {
            background: linear-gradient(90deg, #667eea, #764ba2);
            color: white;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 5px 20px rgba(102,126,234,0.4); }
        .btn-warning {
            background: linear-gradient(90deg, #f5af19, #f12711);
            color: white;
        }
        .btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

        .options {
            margin-bottom: 20px;
        }
        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            margin: 10px 0;
        }
        .checkbox-label input {
            width: 18px;
            height: 18px;
        }

        .results { display: none; margin-top: 20px; }
        .results.show { display: block; }

        .stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            flex-wrap: wrap;
            gap: 10px;
        }
        .stat {
            text-align: center;
            padding: 15px;
            background: rgba(0,0,0,0.2);
            border-radius: 10px;
            min-width: 120px;
        }
        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #69f0ae;
        }
        .stat-label {
            font-size: 11px;
            color: #aaa;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        th {
            background: rgba(0,0,0,0.3);
            color: #69f0ae;
        }
        tr:hover { background: rgba(255,255,255,0.05); }
        .status-ok { color: #69f0ae; }
        .status-error { color: #ff5858; }

        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #69f0ae;
            text-decoration: none;
        }
        .back-link:hover { text-decoration: underline; }

        .warning {
            background: rgba(255,87,34,0.2);
            border: 1px solid #ff5722;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .warning strong { color: #ff9800; }

        .sample-table {
            font-size: 12px;
            margin-top: 15px;
        }
        .sample-table td { padding: 5px 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tradutor de Arquivos YML</h1>
        <p class="subtitle">Adiciona nomes localizados (LocalName) nos arquivos do rAthena usando itemInfo</p>

        <div class="info-box">
            <h3>Como funciona:</h3>
            <ul>
                <li>Adiciona o campo <strong>LocalName</strong> para cada item que tem tradução</li>
                <li>O campo <strong>Name</strong> original é mantido intacto</li>
                <li>A função <code>getitemname()</code> usará LocalName automaticamente se existir</li>
            </ul>
        </div>

        <div class="warning">
            <strong>Aviso:</strong> Este script modifica diretamente os arquivos .yml do servidor.
            Recomendamos sempre manter a opção de backup ativada.
        </div>

        <div class="info-box">
            <h3>Arquivos de origem (nomes traduzidos):</h3>
            <ul>
                <li>itemInfo_bRO.lub</li>
                <li>itemInfo_Rev.lub</li>
            </ul>
        </div>

        <div class="info-box">
            <h3>Selecione os arquivos para traduzir:</h3>
            <div class="options">
                <label class="checkbox-label">
                    <input type="checkbox" id="file_usable" value="usable" checked>
                    item_db_usable.yml (Consumíveis)
                </label>
                <label class="checkbox-label">
                    <input type="checkbox" id="file_equip" value="equip" checked>
                    item_db_equip.yml (Equipamentos)
                </label>
                <label class="checkbox-label">
                    <input type="checkbox" id="file_etc" value="etc" checked>
                    item_db_etc.yml (Diversos)
                </label>
            </div>
        </div>

        <div class="options">
            <label class="checkbox-label">
                <input type="checkbox" id="createBackup" checked>
                Criar backup dos arquivos antes de modificar
            </label>
        </div>

        <button class="btn btn-primary" id="checkBtn" onclick="checkNames()">
            1. Verificar Nomes Disponíveis
        </button>

        <button class="btn btn-warning" id="translateBtn" onclick="startTranslation()" disabled>
            2. Iniciar Tradução
        </button>

        <div class="progress-container" id="progressContainer">
            <div class="progress-bar" id="progressBar">0%</div>
        </div>

        <div class="status" id="status"></div>

        <div id="sampleContainer"></div>

        <div class="results" id="results">
            <div class="stats">
                <div class="stat">
                    <div class="stat-number" id="statNames">0</div>
                    <div class="stat-label">Nomes Carregados</div>
                </div>
                <div class="stat">
                    <div class="stat-number" id="statItems">0</div>
                    <div class="stat-label">Itens nos YML</div>
                </div>
                <div class="stat">
                    <div class="stat-number" id="statTranslated">0</div>
                    <div class="stat-label">Traduzidos</div>
                </div>
            </div>

            <h3>Resultado por arquivo:</h3>
            <table>
                <thead>
                    <tr><th>Arquivo</th><th>Status</th><th>Traduzidos</th></tr>
                </thead>
                <tbody id="resultsTable"></tbody>
            </table>
        </div>

        <a href="import_items.php" class="back-link">Voltar ao Importador de Itens</a>
    </div>

    <script>
        let namesLoaded = false;

        function checkNames() {
            const btn = document.getElementById('checkBtn');
            const status = document.getElementById('status');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            const sampleContainer = document.getElementById('sampleContainer');

            btn.disabled = true;
            btn.innerHTML = '<span class="spinner"></span> Carregando...';
            progressContainer.style.display = 'block';
            progressBar.style.width = '50%';
            progressBar.textContent = '50%';
            status.textContent = 'Lendo arquivos .lub...';

            fetch('?action=load_names')
                .then(r => r.json())
                .then(data => {
                    progressBar.style.width = '100%';
                    progressBar.textContent = '100%';

                    if (data.success) {
                        status.innerHTML = `Encontrados <strong>${data.count.toLocaleString()}</strong> nomes traduzidos`;
                        document.getElementById('translateBtn').disabled = false;
                        namesLoaded = true;

                        // Mostrar amostra
                        if (data.sample && Object.keys(data.sample).length > 0) {
                            let html = '<div class="info-box"><h3>Amostra de nomes:</h3><table class="sample-table">';
                            for (const [id, name] of Object.entries(data.sample)) {
                                html += `<tr><td><strong>${id}</strong></td><td>${name}</td></tr>`;
                            }
                            html += '</table></div>';
                            sampleContainer.innerHTML = html;
                        }
                    } else {
                        status.textContent = 'Erro ao carregar nomes';
                    }

                    btn.disabled = false;
                    btn.innerHTML = '1. Verificar Nomes Disponíveis';
                    setTimeout(() => { progressContainer.style.display = 'none'; }, 1000);
                })
                .catch(err => {
                    status.textContent = 'Erro: ' + err.message;
                    btn.disabled = false;
                    btn.innerHTML = '1. Verificar Nomes Disponíveis';
                    progressContainer.style.display = 'none';
                });
        }

        function startTranslation() {
            if (!namesLoaded) {
                alert('Primeiro verifique os nomes disponíveis!');
                return;
            }

            // Coletar arquivos selecionados
            const selectedFiles = [];
            if (document.getElementById('file_usable').checked) selectedFiles.push('usable');
            if (document.getElementById('file_equip').checked) selectedFiles.push('equip');
            if (document.getElementById('file_etc').checked) selectedFiles.push('etc');

            if (selectedFiles.length === 0) {
                alert('Selecione pelo menos um arquivo para traduzir!');
                return;
            }

            if (!confirm('Isso vai modificar os arquivos .yml do servidor. Deseja continuar?')) {
                return;
            }

            const btn = document.getElementById('translateBtn');
            const status = document.getElementById('status');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');
            const results = document.getElementById('results');
            const createBackup = document.getElementById('createBackup').checked;

            btn.disabled = true;
            btn.innerHTML = '<span class="spinner"></span> Traduzindo...';
            progressContainer.style.display = 'block';
            results.classList.remove('show');

            let progress = 0;
            const interval = setInterval(() => {
                if (progress < 90) {
                    progress += Math.random() * 15;
                    progressBar.style.width = progress + '%';
                    progressBar.textContent = Math.round(progress) + '%';
                }
            }, 300);

            status.textContent = 'Processando arquivos .yml...';

            let url = '?action=translate&files=' + selectedFiles.join(',');
            if (createBackup) url += '&backup=1';

            fetch(url)
                .then(r => r.json())
                .then(data => {
                    clearInterval(interval);
                    progressBar.style.width = '100%';
                    progressBar.textContent = '100%';

                    if (data.success) {
                        status.innerHTML = `Tradução concluída! <strong>${data.totalTranslated}</strong> itens traduzidos.`;

                        document.getElementById('statNames').textContent = data.totalNames.toLocaleString();
                        document.getElementById('statItems').textContent = data.totalItems.toLocaleString();
                        document.getElementById('statTranslated').textContent = data.totalTranslated.toLocaleString();

                        const tbody = document.getElementById('resultsTable');
                        tbody.innerHTML = '';
                        data.results.forEach(r => {
                            const tr = document.createElement('tr');
                            const statusClass = r.status === 'ok' ? 'status-ok' : 'status-error';
                            const statusText = r.status === 'ok' ? 'OK' : 'Não encontrado';
                            tr.innerHTML = `<td>${r.file}</td><td class="${statusClass}">${statusText}</td><td>${r.translated}</td>`;
                            tbody.appendChild(tr);
                        });

                        results.classList.add('show');
                    } else {
                        status.textContent = 'Erro na tradução';
                    }

                    btn.disabled = false;
                    btn.innerHTML = '2. Iniciar Tradução';
                    setTimeout(() => { progressContainer.style.display = 'none'; }, 1000);
                })
                .catch(err => {
                    clearInterval(interval);
                    status.textContent = 'Erro: ' + err.message;
                    btn.disabled = false;
                    btn.innerHTML = '2. Iniciar Tradução';
                    progressContainer.style.display = 'none';
                });
        }
    </script>
</body>
</html>
