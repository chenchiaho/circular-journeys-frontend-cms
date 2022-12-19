<?php

require '../parts/connect_db.php';

$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 0, 20";

$rows = $pdo->query($sql)->fetchAll();

?>

<?php include '../parts/html-head.php' ?>
<?php include '../parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Desc</th>
                        <th scope="col">img</th>
                        <th scope="col">price</th>
                        <th scope="col">created</th>
                        <th scope="col">created</th>
                        <th scope="col">deleted</th>
                        <th scope="col">cate_id</th>
                        <th scope="col">inve_id</th>
                        <th scope="col">status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($rows as $r) : ?>
                        <tr>
                            <td><?= $r['id'] ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['description'] ?></td>
                            <td><?= $r['image'] ?></td>
                            <td><?= $r['price'] ?></td>
                            <td><?= $r['created_at'] ?></td>
                            <td><?= $r['deleted_at'] ?></td>
                            <td><?= $r['category_id'] ?></td>
                            <td><?= $r['inventory_id'] ?></td>
                            <td><?= $r['active_status'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>

        </div>
    </div>
</div>
<?php include '../parts/scripts.php' ?>
<?php include '../parts/html-foot.php' ?>









<?php
session_start();
if (isset($_SESSION['admin'])) {
    include './list-admin.php';
} else {
    include './list-no-admin.php';
}
