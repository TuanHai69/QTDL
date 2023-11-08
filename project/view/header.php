<div class="header BGRheader">
    <div class="container">
        <div class="row">
            <div class="d-flex m-4">
                <div class="col-12 offset-2">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link bg-info text-light" href="index.php?act=homepage">Home </a>
                                </li>
                                <?php
                                    if (isset($_SESSION['user']) && $_SESSION['capdo'] == 0 ){
                                        echo '<li class="nav-item">
                                        <a class="nav-link bg-info text-light" href="index.php?act=cart">Giỏ hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-info text-light" href="index.php?act=checkout">Thanh Toán</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-info text-light" href="index.php?act=Tientrinh">Tiến trình</a>
                                    </li>';
                                    }
                                ?>
                                <?php
                                    if (isset($_SESSION['user'])) {
                                        if ($_SESSION['capdo'] == '1'){
                                            echo '<li class="nav-item">
                                                    <a class="nav-link bg-info text-light" href="index.php?act=Tientrinh">Tiến trình</a>
                                                </li>';
                                        }
                                    }
                                ?>
                                <li class="nav-item">
                                    <?php
                                                if (isset($_SESSION['user'])) {
                                                    if ($_SESSION['capdo'] == '1'){ 
                                                        echo '
                                                        
                                                        <a href="index.php?act=view_account" class="nav-link bg-info text-light">
                                                            Accounts setting
                                                        </a>
                                                        ';                                             
                                                    }
                                                    else if ($_SESSION['capdo'] == '0'){
                                                        echo '<a href="index.php?act=profile" class="nav-link bg-info text-light">';
                                                        echo $_SESSION['user'];
                                                        echo '</a>';
                                                    }
                                                }else {
                                                    echo '<a href="index.php?act=dangnhap" class="nav-link bg-info text-light">Đăng nhập</a>';
                                                }
                                            ?>
                                </li>
                                <li class="nav-item">
                                    <?php
                                        if (isset($_SESSION['user'])) {
                                             echo '
                                            <a href="index.php?act=logout" class="nav-link bg-info text-light">
                                                logout
                                            </a>
                                            ';
                                        }else {
                                            echo '<a href="index.php?act=dangky" class="nav-link bg-info text-light">Đăng ký</a>';
                                        }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>