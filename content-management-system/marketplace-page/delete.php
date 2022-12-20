<?php
require './admin-required.php';
require './parts/connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

if (empty($sid)) {
    header('Location: list.php');
    exit;
}

$sql = "DELETE FROM `address_book` WHERE sid=$sid";
$pdo->query($sql);

if (empty($_SERVER['HTTP_REFERER'])) {
    $come_from = 'list.php';
} else {
    $come_from = $_SERVER['HTTP_REFERER']; // 從哪裡來, 回哪裡去
}

header("Location: $come_from");
