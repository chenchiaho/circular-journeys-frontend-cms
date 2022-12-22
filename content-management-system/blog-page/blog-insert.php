<?php
require '../parts/connect_db.php';

?>
<?php include '../parts/html-head.php' ?>
<?php include '../parts/navbar.php' ?>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container"> 
    <div class="row">
        <div class="card text-center p-0">
          <div class="card-header">
            新增文章
          </div>

          <div class="card-body">
            <!-- <form name="post_form" method="post" action="insert-api.php"> -->
            <form name="post_form" onsubmit="checkForm(event)">
                <div class="mb-3">
                    <label for="post_title" class="card-title">文章標題</label>
                    <br>
                    <input type="text" id="post_title" name="post_title">
                    <div class="form-text"></div>
                </div>
    
                <div class="mb-3">
                    <label for="post_content" class="card-text">文章內文</label>
                    <br>
                    <textarea name="post_content" id="post_content" class="form-control" cols="30" rows="10"></textarea>
                    <div class="form-text"></div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">送出</button>
            </form>

          </div>
        </div>
    </div>
</div>


<?php include '../parts/scripts.php' ?>
<script>
    const checkForm = (e)=>{
        e.preventDefault();

        const fd = new FormData(document.post_form);
        
        fetch('insert-api.php',{
            method: 'POST',
            body: fd
        }).then(function(response){
            return response.json()
        }).then(obj=>{
            console.log(obj);
        })
    };
</script>
<?php include '../parts/html-foot.php' ?>
