<?php
// require './admin-required-api.php';
require '../parts/connect_db.php';


date_default_timezone_set("Asia/Taipei");
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'errors' => []
];


$id = $r['id'] ?? '';
$name = $_POST['name'] ?? '';
$image = $_POST['image'] ?? '';
$description = $_POST['description'] ?? '';
$created_at  = $_POST['created_at'] ?? '';

$sql = "UPDATE `events_menu` SET 
`name`=?,
`image`=?,
`description`=?,
`created_at`=?,
`modified_at`= ?
WHERE `id` =?";


$stmt = $pdo->prepare($sql);
$modified_at  = date("Y-m-d H:i:s");

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
