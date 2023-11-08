<?php 
// echo $_POST['magh'];
// echo $_POST['ma'];
if (isset($_POST["submit"])) {
    $masp = $_POST["ma"];
    $statement = $conn->prepare("DELETE from banhang.giohang where masanpham = :masanpham AND makhachhang=:id AND magiohang=:magh");
    $statement->bindParam(":masanpham", $masp);
    $statement->bindParam(":id", $_SESSION['id']);
    $statement->bindParam(':magh', $_POST['magh']);
    $statement->execute();

    echo '<script type="text/javascript">';
    echo 'alert("Đã xóa sản phẩm vào giỏ hàng thành công");';
    echo 'window.location.href="index.php?act=cart"'; 
    echo '</script>';
}
?>