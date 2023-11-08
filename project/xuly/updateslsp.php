<?php
    if (isset($_POST["submit"])) {
        if ($_POST["sl"] < 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Số lượng sản phẩm không được âm");';
            echo 'window.location.href="index.php?act=cart"'; 
            echo '</script>';
        } else {
            $statement = $conn->prepare("UPDATE banhang.giohang SET soluong=:sl WHERE magiohang like :ma AND makhachhang like :mkh AND masanpham like :masp");
            $statement->bindParam(":sl", $_POST["sl"]);
            $statement->bindParam(":ma", $_POST["magh"]);
            $statement->bindParam(":mkh", $_SESSION['id']);
            $statement->bindParam(':masp', $_POST['ma']);
            $statement->execute();
                
            echo '<script type="text/javascript">';
            echo 'alert("Đã thay đổi số lượng sản phẩm vào giỏ hàng thành công");';
            echo 'window.location.href="index.php?act=cart"'; 
            echo '</script>';
        }
    }

?>