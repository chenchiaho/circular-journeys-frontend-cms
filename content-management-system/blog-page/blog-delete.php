<?php
require '../parts/connect_db.php';

$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

if(empty($post_id)){
    header('Location: blog-admin.php');
    exit;
}

$sql = "DELETE FROM `post` WHERE post_id=$post_id";
$pdo->query($sql);

if(empty($_SERVER['HTTP_REFERER'])){
    $come_from = 'blog-admin.php';
}else{
    $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");
