<?php
// require '../admin-required-api.php';
require '../parts/connect_db.php';
header('Content-Type: application/json');

$output = [
  'success' => false,
  'postData' => $_POST,
  'code' => 0,
  'errors' => []
];

if (empty($_POST['name'])) {
  $output['errors']['name'] = '沒有姓名資料';
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
}

// TODO: 欄位資料檢查

$isPass = true; // 是否通過檢查

$name = $_POST['name'] ?? '';
$image = $_POST['image'] ?? '';
$description = $_POST['description'] ?? '';
$created_at = $_POST['created_at'] ?? '';

/*
if (mb_strlen($name) < 2) {
  $output['errors']['name'] = '請填寫正確的姓名';
  $isPass = false;
}
*/
/*
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  $output['errors']['email'] = '請填寫正確的 email';
  $isPass = false;
}
*/
/*
$sql = "INSERT INTO `events_menu`
( `id` ,`name`, `image`, `description`, `created_at`, `modified_at`) 
VALUES (?,?,?,?,NOW(),NOW())";
*/
$sql =  "INSERT INTO `events_menu`(`name`, `image`, `description`, `created_at`) 
        VALUES (?,?,?,NOW())";
$stmt = $pdo->prepare($sql);
/*

if (!empty($_POST['created_at'])) {
  $t = strtotime($_POST['created_at']);
  $created_at = date('Y-m-d H:i:s', $t);
*/
/*
  if ($t !== false) {
    $created_at = date('Y-m-d H:i:s', $t);
  }

}
*/
if (empty($image)) {
  $image = null;
}



if ($isPass) {
  $stmt->execute([
    $name,
    $image,
    $description
  ]);
  $output['success'] = !!$stmt->rowCount();
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
