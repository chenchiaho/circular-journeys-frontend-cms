<?php
require './admin-required.php';
require '../parts/connect_db.php';
$title = "商品資訊修改";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($id)) {
    header('Location: list.php');
    exit;
}

$sql = "SELECT * FROM products WHERE id=$id";

$r = $pdo->query($sql)->fetch();
if (empty($r)) {
    // 透過編號找不到資料的話
    header('Location: list.php');
    exit;
}

?>

<?php include '../parts/html-head.php' ?>
<?php include '../parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <br>
                    <br>
                    <br>
                    <h5 class="card-title">商品資訊修改</h5>
                    <br>
                    <form name="form1" onsubmit="checkForm(event)" novalidate>
                        <input type="hidden" name="id" value="<?= $r['id'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">商品名稱</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlentities($r['name']) ?>" required>
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">商品敘述</label>
                            <textarea class="form-control" id="description" name="description" cols="20" rows="2"><?= htmlentities($r['description']) ?></textarea>
                            <div class="form-text"></div>
                        </div>


                        <div class="mb-3">
                            <label for="price" class="form-label">價格</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?= $r['price'] ?>">
                            <div class=" form-text">
                            </div>


                            <div class="mb-3">
                                <label for="inventory" class="form-label">庫存</label>
                                <input type="number" class="form-control" id="inventory" name="inventory" value="<?= $r['inventory_id'] ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">商品分類</label>
                                <input type="text" class="form-control" name="category" id="category" value="<?= htmlentities($r['category_id']) ?>"> </input>
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="product_img" class="form-label">商品圖</label>
                                <input type="text" class="form-control" name="product_img" id="product_img" value="<?= htmlentities($r['image']) ?>"></input>
                                <div class="form-text"></div>
                            </div>


                            <div class="mb-3">
                                <h5>是否上架?</h5>
                                <label for="published" class="form-label">是</label>
                                <input type="radio" id="published" name="active_status" value="1">

                                <label for="not_published" class="form-label">否</label>
                                <input type="radio" id="not_published" name="active_status" value="0">
                                <div class="form-text"></div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">確認修改</button>
                    </form>

                </div>
            </div>

        </div>
    </div>



</div>
<?php include '../parts/scripts.php' ?>
<script>
    const checkForm = (e) => {
        e.preventDefault(); // 不要讓原來的表單送出

        // 所有輸入欄回復原來的外觀
        const inputs = document.querySelectorAll('input.form-control');
        inputs.forEach((el) => {
            el.style.border = '1px solid #CCCCCC';
            el.nextElementSibling.innerHTML = '';
        });


        // TODO: 欄位資料檢查

        const fd = new FormData(document.form1);
        fetch('edit-api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    alert('修改成功');
                } else {
                    for (let k in obj.errors) {
                        const el = document.querySelector('#' + k);
                        if (el) {
                            el.style.border = '2px solid red';
                            el.nextElementSibling.innerHTML = obj.errors[k];
                        }
                    }
                    alert('資料沒有修改');
                }
            })
    };
</script>
<?php include '../parts/html-foot.php' ?>