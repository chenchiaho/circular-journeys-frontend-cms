<?php
require './admin-required-api.php';
require '../parts/connect_db.php';
header('Content-Type: application/json');


$ext = strtolower(pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION));
$newName = uniqid('image_') . '.' . $ext;
$destination = 'product-images/' . $newName;
move_uploaded_file($_FILES['upload']['tmp_name'], $destination);


$output = [
  'success' => false,
  'postFile' => $_FILES,
  'postData' => $_POST,
  'code' => 0,
  'errors' => []
];


$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$inventory = $_POST['inventory'] ?? '';
$category = $_POST['category'] ?? '';
$product_img = $destination ?? '';
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
  $product_img,
  $price,
  $category,
  $inventory,
  $active_status
]);

$output['success'] = !!$stmt->rowCount();

echo json_encode($output, JSON_UNESCAPED_UNICODE);
