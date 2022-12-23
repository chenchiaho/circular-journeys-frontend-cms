<?php
require 'admin-required.php';
require '../parts/connect_db.php';
$pageName = 'add product';
$title = "新增商品";

?>
<?php include '../parts/html-head.php' ?>
<?php include '../parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增商品</h5>


                    <form method="POST" name="form1" onsubmit="checkForm(event)" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">商品名稱</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">商品敘述</label>
                            <textarea type="description" class="form-control" id="description" name="description" cols="20" rows="2"></textarea>
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">價格</label>
                            <input type="number" class="form-control" id="price" name="price">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="inventory" class="form-label">庫存</label>
                            <input type="number" class="form-control" id="inventory" name="inventory">
                            <div class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">商品分類</label>

                            <input class="form-control" name="category" id="category"></input>
                            <div class="form-text"></div>
                        </div>


                        <div>

                            <label for="active_status">是否已上架?</label>
                            <input type="checkbox" id="active_status" name="active_status" value="1">


                        </div>

                        <div>

                            <label for="upload">上傳圖片</label>
                            <input class="form-control" type="file" id="upload" name="upload">


                        </div>
                        <br>
                        <button type="submit" name="submit" value="Upload Image" class="btn btn-primary">確認新增</button>



                    </form>



                </div>
            </div>

        </div>
    </div>



</div>
<?php include '../parts/scripts.php' ?>
<script>
    const checkForm = (e) => {
        // 不要讓原來的表單送出
        e.preventDefault();

        // 所有輸入欄回復原來的外觀
        const inputs = document.querySelectorAll('input.form-control');
        inputs.forEach((el) => {
            el.style.border = '1px solid #CCCCCC';
            // el.nextElementSibling.innerHTML = '';
        });


        const fd = new FormData(document.form1);

        fetch('product-add-api.php', {
                method: 'POST',
                body: fd
            })
            .then(r => r.json())
            .then(obj => {
                console.log(obj);
                if (obj.success) {
                    console.log('新增成功');
                    location.href = 'product-list.php';

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