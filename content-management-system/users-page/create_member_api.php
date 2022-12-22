<?php
require './admin-required.php';
require '../parts/connect_db.php';
$title = "新增資料";
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'errors' => []
];

$active_status = $_POST['active_status'] ?? '';
$member_id = $_POST['member_id'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$birthday = $_POST['birthday'] ?? '';
$sex = $_POST['sex'] ?? '';
$email = $_POST['email'] ?? '';
$password = sha1($_POST['password']) ?? '';
$token = sha1($_POST['password']) ?? '';
$telephone = $_POST['telephone'] ?? '';
$country = $_POST['country'] ?? '';
$city = $_POST['city'] ?? '';
$postal_code = $_POST['postal_code'] ?? '';
$address = $_POST['address'] ?? '';
$payment_type = $_POST['payment_type'] ?? '';
$provider = $_POST['provider'] ?? '';
$account_no = $_POST['account_no'] ?? '';
$expiry = $_POST['expiry'] ?? '';



$sql = "INSERT INTO users_information(
  `active_status`, `member_id`, `first_name`, 
  `last_name`, `birthday`, `sex`,`email`,`password`,
  `token`,`telephone`,`country`,`city`,`postal_code`,
  `address`,`payment_type`,`provider`,`account_no`,
  `expiry`
  ) VALUES (
    ?,?,?,
    ?,?,?,
    ?,?,?,
    ?,?,?,
    ?,?,?,
    ?,?,?
  )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $active_status,
    $member_id,
    $first_name,
    $last_name,
    $birthday,
    $sex,
    $email,
    $password,
    $token,
    $telephone,
    $country,
    $city,
    $postal_code,
    $address,
    $payment_type,
    $provider,
    $account_no,
    $expiry,
]);

$output['success'] = !!$stmt->rowCount();


echo json_encode($output, JSON_UNESCAPED_UNICODE);