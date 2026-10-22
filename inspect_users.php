<?php
$env = file_get_contents(__DIR__ . '/.env');
preg_match('/DB_HOST=(.*)/', $env, $h);
preg_match('/DB_PORT=(.*)/', $env, $p);
preg_match('/DB_DATABASE=(.*)/', $env, $d);
preg_match('/DB_USERNAME=(.*)/', $env, $u);
preg_match('/DB_PASSWORD=(.*)/', $env, $w);
$host = trim($h[1]);
$port = trim($p[1]);
$db = trim($d[1]);
$user = trim($u[1]);
$pass = trim($w[1]);
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
$rows = $pdo->query('SELECT id, name, email, avatar, occupation, bank_name, bank_account, bank_account_number, created_at FROM users')->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    echo implode(' | ', $row) . "\n";
}
