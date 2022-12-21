<?php
require '../admin-required-api.php';
require '../../parts/connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'errors' => []
];


$sid = intval($_POST['id']);

$order_id = $_POST['order_id'] ?? '';
$member_id = $_POST['member_id'] ?? '';
$product_id = $_POST['product_id'] ?? '';
$quantity = $_POST['quantity'] ?? '';

$sql = "UPDATE `orders` SET
`order_id`=?,
`member_id`=?,
`product_id`=?,
`modified_at`= NOW(),
`quantity`=?
WHERE `id`=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $order_id,
    $member_id,
    $product_id,
    $quantity,
    $sid
]);

$output['success'] = !!$stmt->rowCount();



echo json_encode($output, JSON_UNESCAPED_UNICODE);
