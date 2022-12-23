<?php
require 'admin-required.php';
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
                    <input type="text" class="form-control" id="member_id" name="member_id" readonly>
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
                        <option value="" selected>請選擇</option>
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
                    <div class="input-group ">
                        <input type="password" class="form-control" id="password" name="password" value=""
                            aria-describedby="button-addon2">
                        <input type="button" class="btn btn-outline-secondary" id="button-addon2" value="顯示"></input>
                    </div>
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
                    <select id="country" name="country" class="form-control">
                        <option value="臺灣">臺灣</option>
                    </select>
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">城市</label>
                    <select id="city" name="city" class="form-control">
                        <option selected>請選擇</option>
                        <option value="臺北市">臺北市</option>
                        <option value="新北市">新北市</option>
                        <option value="桃園市">桃園市</option>
                        <option value="臺中市">臺中市</option>
                        <option value="臺南市">臺南市</option>
                        <option value="高雄市">高雄市</option>
                        <option value="基隆市">基隆市</option>
                        <option value="新竹市">新竹市</option>
                        <option value="嘉義市">嘉義市</option>
                        <option value="新竹縣">新竹縣</option>
                        <option value="苗栗縣">苗栗縣</option>
                        <option value="彰化縣">彰化縣</option>
                        <option value="南投縣">南投縣</option>
                        <option value="雲林縣">雲林縣</option>
                        <option value="嘉義縣">嘉義縣</option>
                        <option value="屏東縣">屏東縣</option>
                        <option value="宜蘭縣">宜蘭縣</option>
                        <option value="花蓮縣">花蓮縣</option>
                        <option value="台東縣">台東縣</option>
                        <option value="澎湖縣">澎湖縣</option>
                        <option value="金門縣">金門縣</option>
                        <option value="連江縣">連江縣</option>
                    </select>
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
                    <select id="payment_type" name="payment_type" class="form-control">
                        <option selected>請選擇</option>
                        <option value="信用卡">信用卡</option>
                        <!-- <option value="Apple Pay">Apple Pay</option>
                        <option value="Apple Pay">Google Pay</option>
                        <option value="ATM">ATM</option> -->
                    </select>
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="provider" class="form-label">信用卡供應商</label>
                    <select id="provider" name="provider" class="form-control">
                        <option selected>請選擇</option>
                        <option value="VISA">VISA</option>
                        <option value="MasterCard">MasterCard</option>
                        <option value="JCB">JCB</option>
                    </select>
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
    $(() => {
        // create random member_ID
        function generateOrderId(num) {
            let orderId = "";
            const characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            for (let i = 0; i < num; i++) {
                // 隨機選擇一個字元加入流水號
                orderId += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return orderId;
        }
        const orderId = generateOrderId(10);
        $('#member_id').val(orderId);
        // console.log(orderId)

        //event account_no and check inside number
        const $cardNumberInput = $("#account_no");
        $cardNumberInput.on("input", function () {
            let value = $(this).val();
            value = value.replace(/\D/g, "");
            value = value.replace(/(\d{4})/g, "$1 ");
            $(this).val(value);
        });

        //event account_no inside number length
        $("#account_no").on("input", function () {
            if ($(this).val().length > 19) {
                $(this).val($(this).val().substring(0, 19));
            }
        })

        //event telephone inside number length and rule
        $("#telephone").on("input", function () {
            if ($(this).val().length > 10) {
                $(this).val($(this).val().substring(0, 10));
            }
            // TODO:  create event handle telephone number rule
        })

        //change password input value show and hide
        let passwordSwitch = true;
        $('#button-addon2').click(function () {
            if (passwordSwitch) {
                $('#password').attr('type', 'text');
                passwordSwitch = false;
                $(this).val('隱藏');
            } else {
                $('#password').attr('type', 'password');
                passwordSwitch = true;
                $(this).val('顯示');
            }
        })
    });


    const checkForm = (e) => {
        e.preventDefault();

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