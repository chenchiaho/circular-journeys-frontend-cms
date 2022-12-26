<?php
require '../parts/connect_db.php';

$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

if(empty($post_id)){
    header('Location: blog-admin.php');
    exit;
}

$sql = "SELECT * FROM `post` WHERE post_id=$post_id";

$r = $pdo->query($sql)->fetch();
if(empty($r)){
    header('Location: blog-admin.php');
    exit;
}

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
            修改文章編號：<?= $r['post_id'] ?>
          </div>

          <div class="card-body">
            <form name="post_form" onsubmit="checkForm(event)" novalidate>
                <input type="hidden" name="post_id" value="<?= $r['post_id'] ?>">
                <div class="mb-3">
                    <label for="post_title" class="h3">文章標題</label>
                    <br>
                    <input type="text" id="post_title" name="post_title"  class="form-control" value="<?= htmlentities($r['post_title']) ?>">
                    <div class="form-text"></div>
                </div>
    
                <div class="mb-3">
                    <label for="post_content" class="card-text">文章內文</label>
                    <br>
                    <textarea name="post_content" id="post_content" class="form-control" cols="30" rows="10"><?= htmlentities($r['post_content']) ?></textarea>
                    <div class="form-text"></div>
                </div>

                <br>
                <button type="submit" class="btn btn-secondary">修改</button>
            </form>
          </div>
        </div>
    </div>
</div>


<?php include '../parts/scripts.php' ?>
<script>
    const checkForm = (e)=>{
        e.preventDefault();

        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach((el)=>{
            el.style.border = '1px solid #ccc';
            el.nextElementSibling.innerHTML = '';
        })

        let isPass = true;
        let field = document.post_form.post_title;
        if(field.value.length < 2){
            isPass = false;
            field.style.border = '1px solid red';
            field.nextElementSibling.innerHTML = '請輸入正確文章標題';
        }
        field = document.post_form.post_content;
        if(field.value.length < 2){
            isPass = false;
            field.style.border = '1px solid red';
            field.nextElementSibling.innerHTML = '請輸入正確文章內文';
        }

        const fd = new FormData(document.post_form);
        
        fetch('edit-api.php',{
            method: 'POST',
            body: fd
        })
        .then(r=> r.json())
        .then(obj=>{
            // console.log(obj);
            if(obj.success){
                alert('修改成功');
            }else{
                for(let k in obj.errors){
                    const el = document.querySelector('#'+k);
                    // console.log(el);
                    if(el){
                        el.style.border = '2px solid red';
                        el.nextElementSibling.innerHTML = obj.errors[k];
                    }
                }
            }
        })
    };
</script>
<?php include '../parts/html-foot.php' ?>