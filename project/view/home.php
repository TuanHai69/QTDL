<?php
    $i=0;
?>
<div class="container">
    <hr>
    <div class="row">
        <div class="col-8 offset-2 ">
            <h1 class="text-center">Trang Chủ</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Xắp xếp</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Theo tên
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php?act=TenAtoiZ">Từ A -> Z</a>
                                <a class="dropdown-item" href="index.php?act=TenZveA">Từ Z -> A</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Theo giá
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php?act=GiaTang">Tăng dần</a>
                                <a class="dropdown-item" href="index.php?act=GiaGiam">Giảm dần</a>
                            </div>
                        </li>
                    </ul>
                    <form action="index.php?act=search" method="post" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col-2">Tên sản phẩm</th>
                    <th></th>
                    <th scope="col">Giá</th>
                    <th scope="col">
                        <?php
                        if (isset($_SESSION['capdo'])){
                            if ($_SESSION['capdo'] == '1'){
                                echo '<a href="index.php?act=add_product">Thêm sản phẩm</a>';
                            }
                        }else{
                            echo '';
                        }
                    ?>

                    </th>
                    <th scope="col">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                <tr>
                    <th scope="row"><?= $i=$i+1 ?></th>
                    <td><?= htmlspecialchars($result['tensanpham'])?></td>
                    <td></td> 
                    <td><?= htmlspecialchars($result['giaca'])?></td>
                    <td></td>
                    
                    <?php
                
                        if (isset($_SESSION['capdo']) && $_SESSION['capdo'] == 0){
                            echo '<td>
                                    <form action="index.php?act=add_cart" method="post">
                                        <input type="hidden" name="makhachhang" value="';
                                        echo $_SESSION['id'];
                                        echo '">
                                        <input type="hidden" name="masanpham" value="';
                                        echo htmlspecialchars($result["masanpham"]);
                                        echo '">
                                        <input type="hidden" name="tensanpham" value="';
                                        echo htmlspecialchars($result["tensanpham"]);
                                        echo '">
                                        <input type="hidden" name="giaca" value="';
                                        echo htmlspecialchars($result["giaca"]);
                                        echo '">
                                        <button type="submit2" name="add_cart" class="btn btn-info">Thêm vào giỏ hàng</button>
                                    </form>
                                </td>';
                        }else{
                            if (isset($_SESSION['capdo']) && $_SESSION['capdo']== '1'){
                            }else{
                                echo '<td><a href="index.php?act=chuyendangnhap" class="btn btn-info" role="button" >Thêm vào giỏ hàng</a></td>';
                            }
                            
                        }
                    ?>
                    <form action="index.php?act=product_detail" method="post">
                        <input type="hidden" name="masanpham" value=<?=$result['masanpham']?>>
                        <td><button class="btn btn-info" name="product_detail" type="submit">Xem chi tiết</button></td>
                    </form>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>