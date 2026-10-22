<?php
$env = file_get_contents(__DIR__ . '/.env');
preg_match('/DB_HOST=(.*)/', $env, $host);
preg_match('/DB_PORT=(.*)/', $env, $port);
preg_match('/DB_DATABASE=(.*)/', $env, $database);
preg_match('/DB_USERNAME=(.*)/', $env, $username);
preg_match('/DB_PASSWORD=(.*)/', $env, $password);
$host = trim($host[1]);
$port = trim($port[1]);
$database = trim($database[1]);
$username = trim($username[1]);
$password = trim($password[1]);
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4", $username, $password);
$tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
echo 'tables: ' . implode(', ', $tables) . "\n";
foreach ($tables as $t) {
    echo "--- $t ---\n";
    $columns = $pdo->query("SHOW COLUMNS FROM `$t`")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($columns as $c) {
        echo $c['Field'] . ' ' . $c['Type'] . ' ' . ($c['Null'] == 'NO' ? 'NOT NULL' : 'NULL') . ' ' . ($c['Key'] ? $c['Key'] . ' ' : '') . ' ' . ($c['Extra'] ? $c['Extra'] : '') . "\n";
    }
}
