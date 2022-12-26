<?php
// require './admin-required.php';
require '../parts/connect_db.php';
$title = "活動新增修改";



?>
<?php include '../parts/html-head.php' ?>
<?php include '../parts/navbar.php' ?>
<?php date_default_timezone_set("Asia/Taipei"); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <form name="form1" onsubmit="checkForm(event)" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="text" class="form-control" id="image" name="image">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="created_at" class="form-label">創建日期</label>
                            <input type="text" disabled="disabled" class="form-control" id="created_at" name="created_at">
                            <div class="form-text"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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
        document.getElementById("created_at").value = formatDate(new Date());
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
            field.nextElementSibling.innerHTML = '請輸入合法名字';
        }
        /*
        field = document.form1.email; // 當前要檢查的欄位
        if (!validateEmail(field.value)) {
            isPass = false;
            field.style.border = '2px solid red';
            field.nextElementSibling.innerHTML = '請輸入正確的 Email';
        }
        */

        if (!isPass) {
            return; // 沒有通過檢查就結束, 不發 AJAX request
        }
        const fd = new FormData(document.form1);


        /*
                fetch('add-api.php', {
                    method: 'POST',
                    body: fd
                }).then(function(response) {
                    return response.json()
                }).then(obj => {
                    console.log(obj);
                })

        */


        fetch('add-api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    alert('新增成功');
                    location.href = 'event-list.php';
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

    /*
    取得頁面上的所有表單
      document.forms

    某個表單 (名稱為 form1) 裡面的所有欄位
      document.form1.elements

    拿到某一個欄位
      document.form1.elements[2]
      document.form1.mobile
      document.form1.elements['mobile']
    */
</script>
<?php include '../parts/html-foot.php' ?>