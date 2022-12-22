<?php
require '../parts/connect_db.php';
header('Content-Type: application/json');

$ouput =[
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'errors' => []
];

if(empty($_POST['post_title'])){
    $ouput['errors']['post_title'] = '沒有文章標題';
    echo json_encode($ouput, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "INSERT INTO `post`(`created_date`, `post_title`, `post_content`) 
        VALUES (NOW(),?,?)";
$stmt = $pdo -> prepare($sql);

$stmt -> execute([
    $_POST['post_title'],
    $_POST['post_content'],
]);

$ouput['success'] = !! $stmt->rowCount();

echo json_encode($ouput, JSON_UNESCAPED_UNICODE);
