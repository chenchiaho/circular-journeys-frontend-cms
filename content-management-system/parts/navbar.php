<style>

</style>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Content Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            會員管理
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">管理清冊</a></li>
                            <li><a class="dropdown-item" href="#">註冊驗證</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            發文系統
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">檢舉審核</a></li>
                            <li><a class="dropdown-item" href="#">文章審核</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            商城系統
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="./../marketplace-page/list.php">產品新增修改</a></li>
                            <li><a class="dropdown-item" href="./../marketplace-page/order-mgmt/order-list.php">訂單管理</a></li>

                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link"><?= $_SESSION['admin']['account_id'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">登出</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageName == 'login' ? 'active' : '' ?>" href="../login.php">登入</a>
                        </li>

                    <?php endif ?>


                </ul>

            </div>
        </div>
    </nav>
</header>