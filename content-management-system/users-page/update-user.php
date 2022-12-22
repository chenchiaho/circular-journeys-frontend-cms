<?php
require './admin-required.php';
require '../parts/connect_db.php';
$title = "更新資料";
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'errors' => []
];

$id = intval($_POST['id']);
$active_status = $_POST['active_status'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$birthday = $_POST['birthday'] ?? '';
$sex = $_POST['sex'] ?? '';
$email = $_POST['email'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$country = $_POST['country'] ?? '';
$city = $_POST['city'] ?? '';
$address = $_POST['address'] ?? '';
// $active_status = $_POST['active_status'] ?? '';


$sql = "UPDATE `users_information` SET
`active_status`=?,
`first_name`=?,
`last_name`=?,
`birthday`=?,
`sex`=?,
`email`=?,
`telephone`=?,
`country`=?,
`city`=?,
`address`=?
WHERE `id`=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $active_status,
    $first_name,
    $last_name,
    $birthday,
    $sex,
    $email,
    $telephone,
    $country,
    $city,
    $address,
    $id
]);

$output['success'] = !!$stmt->rowCount();


echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>