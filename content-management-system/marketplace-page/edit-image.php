<?php
require './admin-required.php';
require '../parts/connect_db.php';
$title = "圖片修改";

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
                    <h5 class="card-title">圖片修改</h5>
                    <br>
                    <form name="form1" onsubmit="checkForm(event)" novalidate>
                        <input type="hidden" name="id" value="<?= $r['id'] ?>">


                        <div>

                            <label for="upload">上傳圖片</label>
                            <input class="form-control" type="file" id="upload" name="upload">


                        </div>
                        <br>
                        <button type="submit" name="submit" value="Upload Image" class="btn btn-primary">確認更新</button>


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
        // const inputs = document.querySelectorAll('input.form-control');
        // inputs.forEach((el) => {
        //     el.style.border = '1px solid #CCCCCC';
        //     el.nextElementSibling.innerHTML = '';
        // });


        // TODO: 欄位資料檢查

        const fd = new FormData(document.form1);
        fetch('edit-image-api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    console.log('更新成功');
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