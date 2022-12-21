<?php
require './parts/connect_db.php';
$pageName = 'login';

?>
<?php include './parts/html-head.php' ?>

<body>
    <div class="container card text-white bg-dark justify-content-center" style="padding: 10px;width:30%;">
        <div class="card-body">
            <h5 class="card-title">管理者登入</h5>
            <form name="form1" onsubmit="checkForm(event)">
                <div class="mb-3">
                    <label for="account_id" class="form-label">帳號</label>
                    <input type="text" class="form-control" id="account_id" name="account_id" required>
                    <div class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">密碼</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="form-text"></div>
                </div>
                <button type="submit" class="btn btn-outline-success btn-lg">登入</button>
            </form>
        </div>
    </div>
</body>

<?php include './parts/scripts.php' ?>
<script>
    function checkForm(e) {
        e.preventDefault();
        // TODO: 欄位檢查

        const fd = new FormData(document.form1);

        fetch('login-api.php', {
            method: 'POST',
            body: fd
        })
            .then(r => r.json())
            .then(data => {
                console.log(data);
                if (data.success) {
                    // alert('成功登入');
                    location.href = 'home.php';
                } else {
                    alert(data.error);
                }
            })

    }
</script>
<?php include './parts/html-foot.php' ?>