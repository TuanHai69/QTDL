<?php

    //Kiểm tra nếu tồn tại button product_detail với phương thức POST
    if (isset($_POST["product_detail"])) {
        //Gán $_POST["masanpham"] vào biến $masanpham
        $masanpham = $_POST["masanpham"];
        //Truy xuất bảng sản phẩm
        $stmt = $conn->prepare('SELECT * FROM banhang.sanpham WHERE masanpham=:masanpham');
        $stmt->bindParam(':masanpham', $masanpham);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($_SESSION["id"]) ) {
        //Gán $_SESSION["id"] vào biến $makhachhang
        $makhachhang = $_SESSION["id"];
        //Truy xuất bảng khachhang
        $stmt1 = $conn->prepare('SELECT * FROM banhang.khachhang WHERE makhachhang=:makhachhang');
        $stmt1->bindParam(':makhachhang', $makhachhang);
        $stmt1->execute();
        $results1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    }   
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <style>
    th,
    td {
        border: 1px;
        border-style: dotted;
    }

    .btn {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn div {
        margin-left: 10px;
    }
    </style>
</head>

<body>
    <h2 style="text-align: center; color: black;">CHI TIẾT SẢN PHẨM</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="width: 150px">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Size</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?php echo $results["masanpham"]?></th>
                <td><?php echo $results["tensanpham"]?></td>
                <td><?php echo $results["giaca"]?></td>
                <td><?php echo $results["mota"]?></td>
                <td><?php echo $results["size"]?></td>
            </tr>
        </tbody>
    </table>
    <?php     
    //Kiểm tra tài khoản đăng nhập bằng biến $_SESSION
    if (isset($_SESSION['capdo'])){
        //Gán $_SESSION['capdo'] vào biến $capdo
        $capdo = $_SESSION['capdo'];

        //Nếu tài khoản đăng nhập là user
        if ($capdo == 0){
            echo '<div class="btn"> 
                    <div class="d-grid gap-2 mx-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Thêm vào giỏ hàng</button>
                    </div>
                </div>'; 
        }
        //Nếu tài khoản đăng nhập là admin
        else if ($capdo == 1){
            echo '<div class="btn">
                    <div class="d-grid gap-2 d-md-block">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Cập nhật sản phẩm</button>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa sản phẩm</button>
                    </div>
                </div>'
          ;
        }
    }
    //Nếu $SESSION['capdo'] chưa tồn tại
    else {
        echo '<div class="btn"> 
                <div class="d-grid gap-2 mx-auto">
                    <button class="btn btn-primary" name="add_cart" type="button">Thêm vào giỏ hàng</button>
                </div>
            </div>';
    }?>
    <!--Modal button xóa sản phẩm -->
    <form action="index.php?act=delete_product" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sản phẩm</h1>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="masanpham" value="<?=$results["masanpham"]?>">
                        <div class="modal-body">
                            Bạn có chắn chắn muốn xóa sản phẩm này không?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                        <button type="submit" name="delete_product" class="btn btn-danger">Xóa sản phẩm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Modal button cập nhật sản phẩm -->
    <form action="index.php?act=update_product" method="post">
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật sản phẩm</h1>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="masanpham" value="<?=$results["masanpham"]?>">
                        <div class="modal-body">
                            Bạn có chắn chắn muốn cập nhật sản phẩm này không?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                        <button type="submit" name="update_product" class="btn btn-success">Cập nhật sản phẩm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--Modal button thêm vào giỏ hàng -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm vào giỏ hàng</h1>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        Bạn có chắn chắn muốn thêm sản phẩm này vào giỏ hàng không?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <form action="index.php?act=add_cart" method="post">
                        <input type="hidden" name="makhachhang" value="<?=$results1["makhachhang"]?>">
                        <input type="hidden" name="masanpham" value="<?=$results["masanpham"]?>">
                        <input type="hidden" name="tensanpham" value="<?=$results["tensanpham"]?>">
                        <input type="hidden" name="giaca" value="<?=$results["giaca"]?>">
                        <button type="submit" name="add_cart" class="btn btn-success">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>