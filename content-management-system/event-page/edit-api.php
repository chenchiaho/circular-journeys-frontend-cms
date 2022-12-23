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


$sid = intval($_POST['id']);

$name = $_POST['name'] ?? '';
$image = $_POST['image'] ?? '';
$description = $_POST['description'] ?? '';
$modified_at = '';

// $active_status = $_POST['active_status'] ?? '';



$sql = "UPDATE `events_menu` SET
`name`=?,
`image`=?,
`description`=?,
`modified_at`= NOW(),
-- `active_status`=?
WHERE `id`=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $img,
    $description,
    $modified_at,
    // $active_status,
    // $sid
]);

$output['success'] = !!$stmt->rowCount();



echo json_encode($output, JSON_UNESCAPED_UNICODE);
