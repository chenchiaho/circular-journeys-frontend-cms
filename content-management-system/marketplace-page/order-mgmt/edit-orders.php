<?php
require '../admin-required.php';
require '../../parts/connect_db.php';
$title = "訂單資訊修改";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($id)) {
    header('Location: order-list.php');
    exit;
}

$sql = "SELECT * FROM orders WHERE id=$id";

$r = $pdo->query($sql)->fetch();
if (empty($r)) {
    // 透過編號找不到資料的話
    header('Location: order-list.php');
    exit;
}

?>

<?php include '../../parts/html-head.php' ?>
<?php include '../../parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <br>
                    <br>
                    <br>
                    <h5 class="card-title">訂單資訊修改</h5>
                    <br>
                    <form name="form1" onsubmit="checkForm(event)" novalidate>
                        <input type="hidden" name="id" value="<?= $r['id'] ?>">
                        <div class="mb-3">
                            <label for="order_id" class="form-label">訂單編號</label>
                            <input type="number" class="form-control" id="order_id" name="order_id" value="<?= htmlentities($r['order_id']) ?>" required>
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="member_id" class="form-label">會員編號</label>
                            <input type="text" class="form-control" id="member_id" name="member_id" value="<?= htmlentities($r['member_id']) ?>" </input>
                            <div class="form-text"></div>
                        </div>


                        <div class="mb-3">
                            <label for="product_id" class="form-label">商品編號</label>
                            <input type="number" class="form-control" id="product_id" name="product_id" value="<?= $r['product_id'] ?>">
                            <div class=" form-text">
                            </div>


                            <div class="mb-3">
                                <label for="quantity" class="form-label">數量</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $r['quantity'] ?>">
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
<?php include '../../parts/scripts.php' ?>
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
        fetch('edit-orders-api.php', {
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
<?php include '../../parts/html-foot.php' ?>