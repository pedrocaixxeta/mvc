<?php
// ajuste essas configurações conforme seu ambiente
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'recomendacao_db');
define('DB_USER', 'root');
define('DB_PASS', '');

function getPDO(){
    static $pdo = null;
    if ($pdo === null){
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    }
    return $pdo;
}
