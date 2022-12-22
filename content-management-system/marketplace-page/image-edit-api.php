<?php
require './admin-required-api.php';
require '../parts/connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postFile' => $_FILES,
    'code' => 0,
    'errors' => []
];

$id = intval($_POST['id']);

$sql_image = "SELECT * FROM products WHERE id=$id";
$r = $pdo->query($sql_image)->fetch();

if (!empty($r['image'])) {
    unlink($r['image']);
}

$ext = strtolower(pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION));
$newName = uniqid('image_') . '.' . $ext;
$destination = 'product-images/' . $newName;

move_uploaded_file($_FILES['upload']['tmp_name'], $destination);


// $id = intval($_POST['id']);

$product_img = $destination ?? '';


$sql = "UPDATE `products` SET
    `image`=?,
    `modified_at`= NOW()
    WHERE `id`=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $product_img,
    $id
]);

$output['success'] = !!$stmt->rowCount();

echo json_encode($output, JSON_UNESCAPED_UNICODE);
