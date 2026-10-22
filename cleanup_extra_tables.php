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
$extra = ['cache', 'cache_locks', 'sessions', 'jobs', 'job_batches'];
foreach ($extra as $table) {
    $pdo->exec("DROP TABLE IF EXISTS `$table`");
    echo "dropped $table\n";
}
