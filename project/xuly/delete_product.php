<?php
    //Nếu tồn tại tài khoản đăng nhập, tài khoản đăng nhập là admin và tồn tại $_POST["delete_product"]
    if (isset($_SESSION["capdo"]) && ($_SESSION["capdo"] == 1) && isset($_POST["delete_product"])) {
        //Gán $_POST["masanpham"] vào biến $masanpham
        $masanpham = $_POST["masanpham"];
        try {
            $stmt = $conn->prepare('DELETE FROM banhang.sanpham WHERE masanpham=:masanpham');
            $stmt->bindParam(':masanpham', $masanpham);
            $stmt->execute();
            echo '<script type="text/javascript">';
            echo 'alert("Xóa sản phẩm thành công");';
            echo 'window.location.href="index.php?act=homepage";'; 
            echo '</script>';
        } catch (PDOException $e) {
            echo '<script type="text/javascript">';
            echo 'alert("Không thể xóa sản phẩm vì sản phẩm đã nằm trong giỏ hàng của khách hàng");';
            echo 'window.location.href="index.php?act=homepage";'; 
            echo '</script>';
        }


        //Xuất thông báo thành công và quay về homepage

    }
?>