<?php

$db_host = 'localhost';
$db_name = 'circular_journeys';

$db_user = 'root';
$db_pass = '';

//data source name
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";

//PHP Data Objects
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);

if (!isset($_SESSION)) {
    session_start();
}
