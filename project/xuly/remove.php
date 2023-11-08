<?php 
// echo $_POST['magh'];
// echo $_POST['ma'];
if (isset($_POST["submit"])) {
    $statement = $conn->prepare("DELETE FROM banhang.giohang WHERE magiohang like :ma AND makhachhang like :mkh AND masanpham like :masp");
    $statement->bindParam(":ma", $_POST["magh"]);
    $statement->bindParam(":mkh", $_SESSION['id']);
    $statement->bindParam(':masp', $_POST['ma']);
    $statement->execute();
        
        echo '<script type="text/javascript">';
        echo 'alert("Đã xóa sản phẩm vào giỏ hàng thành công");';
        echo 'window.location.href="index.php?act=cart"'; 
        echo '</script>';
}
?>