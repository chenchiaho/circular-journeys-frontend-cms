<?php
require '../parts/connect_db.php';

$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if($page<1){
    header('Location: ?page=1');
    exit;
}

// 總比數
$t_sql = "SELECT count(1) FROM post";
$totalRows =$pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 總頁數
$totalPages = ceil($totalRows/$perPage);

$rows = [];
if(! empty($totalRows)){

    if($page > $totalPages){
        header('Location: ?page'. $totalPages);
        exit;
    }

    $sql = sprintf(
        "SELECT * FROM post ORDER BY created_date ASC LIMIT %s, %s",
        ($page-1)*$perPage,
        $perPage
    );
    $rows = $pdo->query($sql)->fetchAll();
};



?>
<?php include '../parts/html-head.php' ?>
<?php include '../parts/navbar.php' ?>
<br>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    <li class="page-item <?= $page==1 ? 'disabled' : ''?>">
                        <a class="page-link" href="?page=1">
                            <i class="fa-solid fa-backward-step"></i>
                        </a>
                    </li>

                    <li class="page-item <?= $page==1 ? 'disabled' : ''?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>">
                            <i class="fa-solid fa-circle-arrow-left"></i>
                        </a>
                    </li>

                    <?php for($i=$page-5; $i<=$page+5; $i++): 
                        if($i>=1 and $i<=$totalPages):
                    ?>
                    <li class="page-item <?= $i==$page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endif; endfor ?>

                    <li class="page-item <?= $page==$totalPages ? 'disabled' : ''?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>">
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </a>
                    </li>

                    <li class="page-item <?= $page==$totalPages ? 'disabled' : ''?>">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fa-solid fa-forward-step"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">會員編號</th>
                        <th scope="col">文章編號</th>
                        <th scope="col">文章標題</th>
                        <th scope="col">文章內文</th>
                        <th scope="col">創建日期</th>
                        <th scope="col">修改日期</th>
                        <th scope="col">檢舉</th>
                        <th scope="col">修改</th>
                        <th scope="col">刪除</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r) : ?>
                        <tr>
                            <td><?= $r['member_id'] ?></td>
                            <td><?= $r['post_id'] ?></td>
                            <td><?= htmlentities($r['post_title']) ?></td>
                            <td><?= htmlentities($r['post_content']) ?></td>
                            <td><?= $r['created_date'] ?></td>
                            <td><?= $r['modified_date'] ?></td>
                            <td><?= $r['is_reported'] ?></td>
                            <td>
                                <a href="blog-edit.php?post_id=<?= $r['post_id'] ?>">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a>
                            </td>
                            <td>
                                <a href="javascript: delete_it(<?= $r['post_id']?>)">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>

        </div>
    </div>
</div> 


<?php include '../parts/scripts.php' ?>
<script>
    function delete_it(post_id){
        if(confirm(`確定要刪除文章編號為 ${post_id} 的資料嗎？`)){
            location.href = `blog-delete.php?post_id=${post_id}`
        }
    }
</script>
<?php include '../parts/html-foot.php' ?>

<!-- 
檢舉流程：
1. 會員檢舉 
2. 會員文章下架
3. 管理者查看文章確認
4. 管理者恢復文章 或 管理者下架文章(🔺刪除資料庫？ >>> 進階：畫面下架)
-->