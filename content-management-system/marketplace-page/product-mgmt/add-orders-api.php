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


$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$inventory = $_POST['inventory'] ?? '';
$category = $_POST['category'] ?? '';
$product_img = $_POST['product_img'] ?? '';
$active_status = $_POST['active_status'] ?? '';


$sql = "INSERT INTO `products`(
  `name`, `description`, `image`, `price`, `created_at`, `modified_at`, `category_id`, `inventory_id`, `active_status`
  ) VALUES (
    ?,?,?,?,NOW(),NOW(),
    ?,?,? 
  )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $description,
    $price,
    $inventory,
    $category,
    $product_img,
    $active_status
]);

$output['success'] = !!$stmt->rowCount();

echo json_encode($output, JSON_UNESCAPED_UNICODE);
