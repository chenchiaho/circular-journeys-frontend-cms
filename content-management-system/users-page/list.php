<?php
require '../parts/connect_db.php';
$pageName = 'list';
$title = "資料列表";

$sql = "SELECT * FROM users_information ORDER BY id ASC ";
$rows = $pdo->query($sql)->fetchAll();

// 讀取查詢結果
// while ($rows) {
//   echo $rows['id'] . " ";
//   echo $rows['member_id'] . " ";
//   echo $rows['created_at'] . " ";
//   echo $rows['active_status'] . " ";
//   echo $rows['first_name'] . " ";
//   echo $rows['last_name'] . " ";
//   echo $rows['sex'] . " ";
//   echo $rows['password'] . " ";
//   echo $rows['token'] . " ";
//   echo $rows['email'] . " ";
//   echo $rows['telephone'] . " ";
//   echo $rows['country'] . " ";
//   echo $rows['city'] . " ";
//   echo $rows['postal_code'] . " ";
//   echo $rows['address'] . " ";
//   echo $rows['payment_type'] . " ";
//   echo $rows['provider'] . " ";
//   echo $rows['account_no'] . " ";
//   echo $rows['expiry'] . "<br>";
// }
// ;

$pdo = null;

?>

<?php include '../parts/html-head.php' ?>


<body>
  <div class="container">
    <table id="myTable" class="table table-hover table-success display">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">會員編號</th>
          <th scope="col">註冊日期</th>
          <th scope="col">使用狀態</th>
          <th scope="col">姓</th>
          <th scope="col">名</th>
          <th scope="col">性別</th>
          <th scope="col">密碼</th>
          <th scope="col">驗證碼</th>
          <th scope="col">信箱</th>
          <th scope="col">電話</th>
          <th scope="col">國家</th>
          <th scope="col">城市</th>
          <th scope="col">郵遞區號</th>
          <th scope="col">地址</th>
          <th scope="col">付款種類</th>
          <th scope="col">供應商</th>
          <th scope="col">卡號</th>
          <th scope="col">到期日</th>
        </tr>
      </thead>
      <tbody class="table-light">
        <?php foreach ($rows as $r): ?>
        <tr>
          <td><?= $r['id'] ?></td>
          <td><?= $r['member_id'] ?></td>
          <td><?= $r['created_at'] ?></td>
          <td><?= $r['active_status'] ?></td>
          <td><?= $r['first_name'] ?></td>
          <td><?= $r['last_name'] ?></td>
          <td><?= $r['sex'] ?></td>
          <td><?= $r['password'] ?></td>
          <td><?= $r['token'] ?></td>
          <td><?= $r['email'] ?></td>
          <td><?= $r['telephone'] ?></td>
          <td><?= $r['country'] ?></td>
          <td><?= $r['city'] ?></td>
          <td><?= $r['postal_code'] ?></td>
          <td><?= $r['address'] ?></td>
          <td><?= $r['payment_type'] ?></td>
          <td><?= $r['provider'] ?></td>
          <td><?= $r['account_no'] ?></td>
          <td><?= $r['expiry'] ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>

<?php include '../parts/scripts.php' ?>
<?php include '../parts/html-foot.php' ?>