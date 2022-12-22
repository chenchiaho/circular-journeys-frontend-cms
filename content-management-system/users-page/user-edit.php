<?php
require './admin-required.php';
require '../parts/connect_db.php';
$title = "修改資料";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($id)) {
    header('Location: user-list.php');
    exit;
}

$sql = "SELECT * FROM users_information WHERE id=$id";

$r = $pdo->query($sql)->fetch();
if (empty($r)) {
    // 透過編號找不到資料的話
    header('Location: user-list.php');
    exit;
}

# echo json_encode($r, JSON_UNESCAPED_UNICODE);
?>
<?php include '../parts/html-head.php' ?>
<?php include '../parts/navbar.php' ?>
<div class="container" style="margin-top: 150px;">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">修改資料</h5>
                    <form name="form1" onsubmit="checkForm(event)" novalidate>
                        <input type="hidden" name="id" value="<?= $r['id'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">姓名</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?= htmlentities($r['first_name']) ?>" required>
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $r['email'] ?>">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <input type="number" class="form-control" id="mobile" name="mobile"
                                value="<?= $r['telephone'] ?>" pattern="09\d{2}-?\d{3}-?\d{3}">
                            <div class="form-text"></div>
                        </div>


                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>

                </div>
            </div>

        </div>
    </div>



</div>
<?php include '../parts/scripts.php' ?>
<script>
    function validateEmail(email) {
        var re =
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
        return re.test(email);
    }



    const checkForm = (e) => {
        e.preventDefault(); // 不要讓原來的表單送出

        // 所有輸入欄回復原來的外觀
        const inputs = document.querySelectorAll('input.form-control');
        inputs.forEach((el) => {
            el.style.border = '1px solid #CCCCCC';
            el.nextElementSibling.innerHTML = '';
        });


        // TODO: 欄位資料檢查

        let isPass = true; // 預設是通過檢查的

        let field = document.form1.name; // 當前要檢查的欄位
        if (field.value.length < 2) {
            isPass = false;
            field.style.border = '2px solid red';
            field.nextElementSibling.innerHTML = '請輸入正確的名字';
        }

        field = document.form1.email; // 當前要檢查的欄位
        if (!validateEmail(field.value)) {
            isPass = false;
            field.style.border = '2px solid red';
            field.nextElementSibling.innerHTML = '請輸入正確的 Email';
        }


        if (!isPass) {
            return; // 沒有通過檢查就結束, 不發 AJAX request
        }
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