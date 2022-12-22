<?php
require './admin-required.php';
require '../parts/connect_db.php';
$title = "新增會員";
?>


<?php include '../parts/html-head.php' ?>
<?php include '../parts/navbar.php' ?>
<div class="container w-50" style="margin-top: 150px;margin-bottom:150px;">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">新增會員</h5>
            <!-- onsubmit="checkForm(event) -->
            <form name="form1" onsubmit="checkForm(event)" novalidate>
                <div class="mb-3">
                    <label for="active_status" class="form-label">會員狀態</label>
                    <div class="form-text"></div>
                    <select id="active_status" name="active_status" class="form-control">
                        <option value="1">啟用</option>
                        <option value="0">停用</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="member_id" class="form-label">會員編號</label>
                    <input type="text" class="form-control" id="member_id" name="member_id" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">姓</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">名</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">生日</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="sex" class="form-label">性別</label>
                    <select id="sex" name="sex" class="form-control">
                        <option value="m">男</option>
                        <option value="f">女</option>
                        <option value="o">其他</option>
                    </select>
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">信箱</label>
                    <input type="email" class="form-control" id="email" name="email" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">密碼</label>
                    <input type="password" class="form-control" id="password" name="password" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">電話</label>
                    <input type="number" class="form-control" id="telephone" name="telephone" value=""
                        pattern="09\d{2}-?\d{3}-?\d{3}">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">國家</label>
                    <input type="text" class="form-control" id="country" name="country" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">城市</label>
                    <input type="text" class="form-control" id="city" name="city" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="postal_code" class="form-label">郵遞區號</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">地址</label>
                    <input type="text" class="form-control" id="address" name="address" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="payment_type" class="form-label">付款種類</label>
                    <input type="text" class="form-control" id="payment_type" name="payment_type" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="provider" class="form-label">信用卡供應商</label>
                    <input type="text" class="form-control" id="provider" name="provider" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="account_no" class="form-label">信用卡卡號</label>
                    <input type="text" class="form-control" id="account_no" name="account_no" value="">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="expiry" class="form-label">信用卡到期日</label>
                    <input type="date" class="form-control" id="expiry" name="expiry" value="">
                    <div class="form-text"></div>
                </div>
                <button type="submit" class="btn btn-success">新增</button>
                <button onclick="window.location='user-list.php'" type="button" class="btn btn-danger">返回</button>
            </form>
        </div>
    </div>
</div>

<?php include '../parts/scripts.php' ?>
<script>
    const checkForm = (e) => {
        e.preventDefault(); // 不要讓原來的表單送出

        const fd = new FormData(document.form1);
        fetch('create_member_api.php', {
            method: 'POST',
            body: fd
        })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    alert('新增成功');
                    window.location = 'user-list.php';
                } else {
                    for (let k in obj.errors) {
                        const el = document.querySelector('#' + k);
                        if (el) {
                            el.style.border = '2px solid red';
                            el.nextElementSibling.innerHTML = obj.errors[k];
                        }
                    }
                }
            })
    };

</script>
<?php include '../parts/html-foot.php' ?>