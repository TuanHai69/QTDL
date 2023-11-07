<?php
    //Nếu tồn tại tài khoản đăng nhập và tài khoản đăng nhập là admin
    if (isset($_SESSION["capdo"]) && ($_SESSION["capdo"] == 1)) {
        //Nếu tồn tại $$_POST["update_product"]
        if (isset($_POST["update_product"])) {
            //Gán $_POST["masanpham"] vào biến $masanpham
            $masanpham = $_POST["masanpham"];

            //Truy xuất CSDL dựa trên masanpham
            $stmt = $conn->prepare('SELECT * FROM banhang.sanpham WHERE masanpham=:masanpham');
            $stmt->bindParam(':masanpham', $masanpham);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <style>
    .update_detail_btn{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .update_detail_btn div button{
        margin: 10px;
    }

    .update_detail_btn div button a, .btn1 button a{
        color: #fff;
    }
    </style>
</head>

<body>
    <h2 style="text-align: center; color: black;">CẬP NHẬT SẢN PHẨM</h2>
    </div>
    <form action="index.php?act=code_update_product" method="post">
        <input type="hidden" name="masanpham" value="<?=$results["masanpham"]?>">
        <div class="row">
            <div class="col-4">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="tensanpham" placeholder="" id="floatingTextarea"><?=$results["tensanpham"]?></textarea>
                    <label for="floatingTextarea">Tên sản phẩm</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="giaca" class="form-control" required id="floatingInput" placeholder=" "
                        value="<?=$results["giaca"]?>">
                    <label for="floatingInput">Giá</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating mb-3">
                    <input type="text" name="soluong" class="form-control" required id="floatingInput" placeholder=" "
                        value="<?=$results["soluong"]?>">
                    <label for="floatingInput">Số lượng</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="size" class="form-control" required id="floatingInput" placeholder=" "
                        value="<?=$results["size"]?>">
                    <label for="floatingInput">Size</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="mota" placeholder="" id="floatingTextarea"
                        style="height: 133px;"><?=$results["mota"]?></textarea>
                    <label for="floatingTextarea">Mô tả</label>
                </div>
            </div>
        </div>
        <div class="update_detail_btn">
            <div>
                <button type="button" class="btn btn-secondary btn-lg"><a href="index.php?act=homepage">Trở
                        về</a></button>
            </div>
            <div>
                <button type="submit" name="update_product_detail" class="btn btn-primary btn-lg">Cập nhật</button>
            </div>
        </div>
    </form>
</body>

</html>