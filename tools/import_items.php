<?php
/**
 * Script para importar nomes e descrições de itens dos arquivos .lub
 * Com barra de progresso em tempo real
 * CORRIGIDO: Pega apenas identifiedDescriptionName (não duplica com unidentified)
 */

// Se for requisição AJAX para processar
if (isset($_GET['action'])) {
    header('Content-Type: application/json');

    $action = $_GET['action'];

    if ($action === 'count') {
        $total = 0;
        $files = [
            __DIR__ . '/../System/itemInfo_bRO.lub',
            __DIR__ . '/../System/itemInfo_Rev.lub',
        ];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $content = file_get_contents($file);
                $total += preg_match_all('/\[\d+\]\s*=\s*\{/', $content);
            }
        }

        echo json_encode(['total' => $total]);
        exit;
    }

    if ($action === 'import') {
        error_reporting(0);
        ini_set('display_errors', 0);
        ini_set('memory_limit', '512M');
        set_time_limit(600);

        $mysqli = new mysqli('localhost', 'root', '', 'ragdb');
        if ($mysqli->connect_error) {
            echo json_encode(['error' => 'Conexão falhou']);
            exit;
        }
        $mysqli->set_charset("utf8mb4");

        // Criar tabela
        $mysqli->query("
            CREATE TABLE IF NOT EXISTS `itemdesc` (
                `id` int(11) NOT NULL,
                `itemname` varchar(255) DEFAULT NULL,
                `itemdesc` text DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ");
        $mysqli->query("ALTER TABLE `itemdesc` ADD COLUMN IF NOT EXISTS `itemname` varchar(255) DEFAULT NULL AFTER `id`");

        // Limpar se solicitado
        if (isset($_GET['clean'])) {
            $mysqli->query("TRUNCATE TABLE itemdesc");
        }

        $lubFiles = [
            __DIR__ . '/../System/itemInfo_bRO.lub',
            __DIR__ . '/../System/itemInfo_Rev.lub',
        ];

        $allItems = [];

        foreach ($lubFiles as $file) {
            if (!file_exists($file)) continue;

            $handle = fopen($file, 'r');
            if (!$handle) continue;

            $currentId = null;
            $currentName = '';
            $currentDesc = [];
            $inIdentifiedDesc = false;
            $inUnidentifiedDesc = false;
            $braceCount = 0;

            while (($line = fgets($handle)) !== false) {
                $line = mb_convert_encoding($line, 'UTF-8', 'Windows-1252');

                // Detectar início de item: [12345] = {
                if (preg_match('/^\s*\[(\d+)\]\s*=\s*\{/', $line, $match)) {
                    // Salvar item anterior
                    if ($currentId !== null && ($currentName !== '' || !empty($currentDesc))) {
                        $allItems[$currentId] = [
                            'name' => $currentName,
                            'desc' => implode("\n", $currentDesc)
                        ];
                    }
                    // Iniciar novo item
                    $currentId = intval($match[1]);
                    $currentName = '';
                    $currentDesc = [];
                    $inIdentifiedDesc = false;
                    $inUnidentifiedDesc = false;
                    $braceCount = 1;
                    continue;
                }

                if ($currentId === null) continue;

                // Contar chaves
                $braceCount += substr_count($line, '{') - substr_count($line, '}');

                // Se fechou todas as chaves, finaliza o item
                if ($braceCount <= 0) {
                    if ($currentName !== '' || !empty($currentDesc)) {
                        $allItems[$currentId] = [
                            'name' => $currentName,
                            'desc' => implode("\n", $currentDesc)
                        ];
                    }
                    $currentId = null;
                    continue;
                }

                // Extrair identifiedDisplayName (nome identificado)
                if (preg_match('/identifiedDisplayName\s*=\s*"([^"]*)"/', $line, $match)) {
                    $currentName = trim($match[1]);
                }

                // Detectar início do array de descrição NÃO identificada (ignorar)
                if (preg_match('/unidentifiedDescriptionName\s*=\s*\{/', $line)) {
                    $inUnidentifiedDesc = true;
                    continue;
                }

                // Detectar início do array de descrição IDENTIFICADA (usar esta)
                if (preg_match('/identifiedDescriptionName\s*=\s*\{/', $line)) {
                    $inIdentifiedDesc = true;
                    $inUnidentifiedDesc = false;
                    // Pode ter strings na mesma linha
                    if (preg_match_all('/"([^"]*)"/', $line, $matches)) {
                        foreach ($matches[1] as $str) {
                            $str = trim($str);
                            if (!empty($str) && $str !== '_') {
                                $currentDesc[] = $str;
                            }
                        }
                    }
                    continue;
                }

                // Dentro do array de descrição não identificada (ignorar)
                if ($inUnidentifiedDesc) {
                    if (strpos($line, '},') !== false || preg_match('/^\s*\},?\s*$/', $line)) {
                        $inUnidentifiedDesc = false;
                    }
                    continue;
                }

                // Dentro do array de descrição IDENTIFICADA (usar)
                if ($inIdentifiedDesc) {
                    // Fim do array
                    if (strpos($line, '},') !== false || preg_match('/^\s*\},?\s*$/', $line)) {
                        $inIdentifiedDesc = false;
                        continue;
                    }
                    // Extrair strings
                    if (preg_match_all('/"([^"]*)"/', $line, $matches)) {
                        foreach ($matches[1] as $str) {
                            $str = trim($str);
                            // Ignorar strings vazias e separadores
                            if (!empty($str) && $str !== '_' && !preg_match('/^[\s_^]+$/', $str)) {
                                $currentDesc[] = $str;
                            }
                        }
                    }
                }
            }

            // Salvar último item
            if ($currentId !== null && ($currentName !== '' || !empty($currentDesc))) {
                $allItems[$currentId] = [
                    'name' => $currentName,
                    'desc' => implode("\n", $currentDesc)
                ];
            }

            fclose($handle);
        }

        // Inserir no banco
        $stmt = $mysqli->prepare("INSERT INTO itemdesc (id, itemname, itemdesc) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE itemname = VALUES(itemname), itemdesc = VALUES(itemdesc)");

        $inserted = 0;
        $errors = 0;

        foreach ($allItems as $id => $data) {
            $stmt->bind_param("iss", $id, $data['name'], $data['desc']);
            if ($stmt->execute()) {
                $inserted++;
            } else {
                $errors++;
            }
        }

        $stmt->close();

        // Buscar exemplos
        $examples = [];
        $result = $mysqli->query("SELECT id, itemname, LEFT(itemdesc, 80) as itemdesc FROM itemdesc WHERE id IN (501, 502, 503, 504, 505, 523) ORDER BY id");
        while ($row = $result->fetch_assoc()) {
            $examples[] = $row;
        }

        $mysqli->close();

        echo json_encode([
            'success' => true,
            'total' => count($allItems),
            'inserted' => $inserted,
            'errors' => $errors,
            'examples' => $examples
        ]);
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Importar Itens - ReClassic</title>
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
            max-width: 700px;
            margin: 0 auto;
            background: rgba(255,255,255,0.1);
            border-radius: 15px;
            padding: 30px;
            backdrop-filter: blur(10px);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .progress-container {
            background: rgba(0,0,0,0.3);
            border-radius: 25px;
            padding: 5px;
            margin: 20px 0;
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
            font-size: 18px;
            margin: 20px 0;
            min-height: 30px;
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
        .btn:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

        .results { display: none; margin-top: 20px; }
        .results.show { display: block; }

        .stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        .stat {
            text-align: center;
            padding: 15px;
            background: rgba(0,0,0,0.2);
            border-radius: 10px;
            min-width: 100px;
        }
        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #69f0ae;
        }
        .stat-label {
            font-size: 12px;
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
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        th {
            background: rgba(0,0,0,0.3);
            color: #69f0ae;
        }
        tr:hover { background: rgba(255,255,255,0.05); }

        .options {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        .checkbox-label input {
            width: 18px;
            height: 18px;
        }

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
    </style>
</head>
<body>
    <div class="container">
        <h1>Importador de Itens</h1>

        <div class="options">
            <label class="checkbox-label">
                <input type="checkbox" id="cleanFirst" checked>
                Limpar tabela antes de importar
            </label>
        </div>

        <button class="btn btn-primary" id="startBtn" onclick="startImport()">
            Iniciar Importação
        </button>

        <div class="progress-container">
            <div class="progress-bar" id="progressBar">0%</div>
        </div>

        <div class="status" id="status">Clique no botão para iniciar</div>

        <div class="results" id="results">
            <div class="stats">
                <div class="stat">
                    <div class="stat-number" id="statTotal">0</div>
                    <div class="stat-label">Total</div>
                </div>
                <div class="stat">
                    <div class="stat-number" id="statInserted">0</div>
                    <div class="stat-label">Importados</div>
                </div>
                <div class="stat">
                    <div class="stat-number" id="statErrors">0</div>
                    <div class="stat-label">Erros</div>
                </div>
            </div>

            <h3>Exemplos importados:</h3>
            <table>
                <thead>
                    <tr><th>ID</th><th>Nome</th><th>Descrição</th></tr>
                </thead>
                <tbody id="examplesTable"></tbody>
            </table>

            <a href="../index.php?to=veritem&id=501" class="back-link">Testar Red Potion no site</a>
        </div>

        <a href="../index.php?to=inicio" class="back-link">Voltar ao site</a>
    </div>

    <script>
        function startImport() {
            const btn = document.getElementById('startBtn');
            const progressBar = document.getElementById('progressBar');
            const status = document.getElementById('status');
            const results = document.getElementById('results');
            const cleanFirst = document.getElementById('cleanFirst').checked;

            btn.disabled = true;
            btn.innerHTML = '<span class="spinner"></span> Processando...';
            results.classList.remove('show');

            status.textContent = 'Contando itens nos arquivos...';
            progressBar.style.width = '10%';
            progressBar.textContent = '10%';

            fetch('?action=count')
                .then(r => r.json())
                .then(data => {
                    const total = data.total;
                    status.textContent = `Encontrados ${total.toLocaleString()} itens. Importando (apenas descrições identificadas)...`;
                    progressBar.style.width = '30%';
                    progressBar.textContent = '30%';

                    const url = cleanFirst ? '?action=import&clean=1' : '?action=import';

                    let progress = 30;
                    const interval = setInterval(() => {
                        if (progress < 90) {
                            progress += Math.random() * 5;
                            progressBar.style.width = progress + '%';
                            progressBar.textContent = Math.round(progress) + '%';
                        }
                    }, 500);

                    fetch(url)
                        .then(r => r.json())
                        .then(result => {
                            clearInterval(interval);

                            if (result.error) {
                                status.textContent = 'Erro: ' + result.error;
                                progressBar.style.width = '100%';
                                progressBar.style.background = 'linear-gradient(90deg, #ff5858, #f857a6)';
                                progressBar.textContent = 'Erro!';
                            } else {
                                progressBar.style.width = '100%';
                                progressBar.textContent = '100%';
                                status.textContent = 'Importação concluída com sucesso!';

                                document.getElementById('statTotal').textContent = result.total.toLocaleString();
                                document.getElementById('statInserted').textContent = result.inserted.toLocaleString();
                                document.getElementById('statErrors').textContent = result.errors;

                                const tbody = document.getElementById('examplesTable');
                                tbody.innerHTML = '';
                                result.examples.forEach(item => {
                                    const tr = document.createElement('tr');
                                    tr.innerHTML = `<td>${item.id}</td><td>${item.itemname || '-'}</td><td>${item.itemdesc || '-'}...</td>`;
                                    tbody.appendChild(tr);
                                });

                                results.classList.add('show');
                            }

                            btn.disabled = false;
                            btn.innerHTML = 'Importar Novamente';
                        })
                        .catch(err => {
                            clearInterval(interval);
                            status.textContent = 'Erro na requisição: ' + err.message;
                            btn.disabled = false;
                            btn.innerHTML = 'Tentar Novamente';
                        });
                })
                .catch(err => {
                    status.textContent = 'Erro ao contar itens: ' + err.message;
                    btn.disabled = false;
                    btn.innerHTML = 'Tentar Novamente';
                });
        }
    </script>
</body>
</html>
