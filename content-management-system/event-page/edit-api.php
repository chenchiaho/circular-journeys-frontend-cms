<?php
// require './admin-required-api.php';
require '../parts/connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'errors' => []
];



$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$image = $_POST['image'] ?? '';
$description = $_POST['description'] ?? '';
$created_at = $_POST['created_at'] ?? '';
$modified_at = $_POST['modified_at'] ?? '';


$sql = "UPDATE `events_menu` SET 
`name`=?,
`image`=?,
`description`=?,
`created_at`=?,
`modified_at`=? 
WHERE `id` =?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $image,
    $description,
    $created_at,
    $modified_at,
    $id
]);

$output['success'] = !!$stmt->rowCount();



echo json_encode($output, JSON_UNESCAPED_UNICODE);
