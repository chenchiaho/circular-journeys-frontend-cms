<?php
require './admin-required-api.php';
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
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$modified_at = '';
$inventory = $_POST['inventory'] ?? '';
$category = $_POST['category'] ?? '';
$product_img = $_POST['product_img'] ?? '';
// $active_status = $_POST['active_status'] ?? '';



$sql = "UPDATE `products` SET
`name`=?,
`description`=?,
`image`=?,
`price`=?,
`modified_at`= NOW(),
`category_id`=?,
`inventory_id`=?
-- `active_status`=?
WHERE `id`=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $description,
    $product_img,
    $price,
    $category,
    $inventory,
    // $active_status,
    $sid
]);

$output['success'] = !!$stmt->rowCount();



echo json_encode($output, JSON_UNESCAPED_UNICODE);
