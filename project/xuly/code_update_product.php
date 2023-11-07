<?php
    //Nếu tồn tại tài khoản đăng nhập
    if (isset($_SESSION["capdo"])) {
        //Nếu tài khoản đăng nhập là admin
        if ($_SESSION["capdo"] == 1) {
            //Nếu tồn tại $_POST["update_product_detail"]
            if (isset($_POST["update_product_detail"])) {
                //Lấy các biến từ phương thức POST về
                $masanpham = $_POST["masanpham"];
                $tensanpham = $_POST["tensanpham"];
                $giaca = $_POST["giaca"];
                $soluong = $_POST["soluong"];
                $size = $_POST["size"];
                $mota = $_POST["mota"];

                //Cập nhật CSDL dựa trên masanpham
                $stmt = $conn->prepare('UPDATE banhang.sanpham SET tensanpham=:tensanpham, giaca=:giaca, mota=:mota, soluong=:soluong,
                                                                    size=:size WHERE masanpham=:masanpham');
                $stmt->bindParam(':tensanpham', $tensanpham);
                $stmt->bindParam(':giaca', $giaca);
                $stmt->bindParam(':mota', $mota);
                $stmt->bindParam(':soluong', $soluong);
                $stmt->bindParam(':size', $size);
                $stmt->bindParam(':masanpham', $masanpham);
                $stmt->execute();

                echo '<script type="text/javascript">';
                echo 'alert("Cập nhật sản phẩm thành công");';
                echo 'window.location.href="index.php?act=homapage";'; 
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Bạn không phải là admin");';
            echo 'window.location.href="index.php?act=homapage";'; 
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Bạn cần phải đăng nhập");';
        echo 'window.location.href="index.php?act=dangnhap";'; 
        echo '</script>';
    }
?>