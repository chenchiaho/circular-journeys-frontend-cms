<?php
// require './admin-required.php';
require '../parts/connect_db.php';
$title = "活動新增修改";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($id)) {
    header('Location: event-list.php');
    exit;
}

$sql = "SELECT * FROM events_menu WHERE id=$id";

$r = $pdo->query($sql)->fetch();
if (empty($r)) {
    // 透過編號找不到資料的話
    header('Location: event-list.php');
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
                    <h5 class="card-title">活動資訊修改</h5>
                    <form name="form1" novalidate="novalidate" onsubmit="checkForm(event)">
                        <!-- action="edit-api.php" method="POST" -->
                        <input type="hidden" name="id" value="<?= $r['id'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">活動名稱</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlentities($r['name']) ?>" required>
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="text" class="form-control" id="image" name="image" value="<?= $r['image'] ?>">
                            <div class=" form-text">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">活動簡介</label>
                                <textarea class="form-control" id="description" name="description" cols="20" rows="2"><?= htmlentities($r['description']) ?></textarea>
                                <div class="form-text"></div>
                            </div>



                            <div class="mb-3">
                                <label for="created_at" class="form-label">創建日期</label>
                                <input type="text" disabled="disabled" class="form-control" id="created_at" name="created_at" value="<?= $r['created_at'] ?>">
                                <div class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="modified_at" class="form-label">更新日期</label>
                                <input type="text" disabled="disabled" class="form-control" name="modified_at" id="modified_at"></input>
                                <div class="form-text"></div>
                            </div>
                            <figure>
                                <blockquote class="blockquote">
                                    <h5>是否確認修改?</h5>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    <cite title="Source Title">確認後無法變更!</cite></cite>
                                </figcaption>
                            </figure>
                            <div class="btn-group mb-3" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="1">
                                <label class="btn btn-outline-primary" for="btnradio1">確認修改</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="0">
                                <label class="btn btn-outline-primary" for="btnradio2">暫時不修改</label>
                                <div class="form-text"></div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">送出</button>
                    </form>

                </div>
            </div>

        </div>
    </div>



</div>
<?php include '../parts/scripts.php' ?>
<script>
    //持續更新時間function

    setInterval(function() {
        document.getElementById("modified_at").value = formatDate(new Date());
    }, 1000);
    //編輯顯示時間的格式
    function formatDate(date) {
        var year = date.getFullYear();
        var month = date.getMonth() + 1; // 0-based
        var day = date.getDate();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        return year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
    }

    const checkForm = (e) => {

        // 不要讓原來的表單送出
        e.preventDefault();

        // 所有輸入欄回復原來的外觀
        const inputs = document.querySelectorAll("input.form-control");
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
                    console.log('修改成功');
                    location.href = 'event-list.php';
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