<?php
require './admin-required.php';
require '../parts/connect_db.php';

$sid = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($sid)) {
    header('Location: list.php');
    exit;
}

$sql = "DELETE FROM `products` WHERE id=$sid";
$pdo->query($sql);

if (empty($_SERVER['HTTP_REFERER'])) {
    $come_from = 'list.php';
} else {
    $come_from = $_SERVER['HTTP_REFERER']; // 從哪裡來, 回哪裡去
}

header("Location: $come_from");
