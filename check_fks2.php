<?php
$env = file_get_contents(__DIR__ . '/.env');
preg_match('/DB_HOST=(.*)/', $env, $h);
preg_match('/DB_PORT=(.*)/', $env, $p);
preg_match('/DB_DATABASE=(.*)/', $env, $d);
preg_match('/DB_USERNAME=(.*)/', $env, $u);
preg_match('/DB_PASSWORD=(.*)/', $env, $w);
$host = trim($h[1]);
$port = trim($p[1]);
$dbname = trim($d[1]);
$user = trim($u[1]);
$pass = trim($w[1]);
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass);
$sql = 'SELECT CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA=? AND TABLE_NAME="product_orders" AND REFERENCED_TABLE_NAME IS NOT NULL';
$stmt = $pdo->prepare($sql);
$stmt->execute([$dbname]);
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo implode(' | ', $row) . "\n";
}
