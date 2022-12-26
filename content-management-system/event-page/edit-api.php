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
$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$image = $_POST['image'] ?? '';
$description = $_POST['description'] ?? '';
// $btnradio = $_POST['btnradio'] ?? '';

$sql = "UPDATE `events_menu`SET
 `name`= ?,
 `image`= ?,
 `description`= ?, 
 `modified_at`= NOW()
WHERE `id` = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $image,
    $description,
    $id
]);
$output['success'] = !!$stmt->rowCount();
// if ($btnradio == 1) {
// }




echo json_encode($output, JSON_UNESCAPED_UNICODE);
