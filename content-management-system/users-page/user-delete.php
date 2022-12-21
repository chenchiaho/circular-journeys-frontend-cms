<?php
require './admin-required.php';
require '../parts/connect_db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($id)) {
  header('Location: user-list.php');
  exit;
}

$sql = "DELETE FROM `users_information` WHERE id=$id";
$pdo->query($sql);

if (empty($_SERVER['HTTP_REFERER'])) {
  $come_from = 'user-list.php';
} else {
  $come_from = $_SERVER['HTTP_REFERER']; // 從哪裡來, 回哪裡去
}

header("Location: $come_from");
