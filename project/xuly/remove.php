<?php 
// echo $_POST['magh'];
// echo $_POST['ma'];
if (isset($_POST["submit"])) {
    $statement1 = $conn->prepare("DELETE from banhang.giohang where masanpham =:masanpham AND makhachhang=:id AND magiohang=:magh");
    $statement1->bindParam(":masanpham", $_POST['ma']);
    $statement1->bindParam(":id", $_SESSION['id']);
    $statement1->bindParam(':magh', $_POST['magh']);
    $statement1->execute();
    echo $_POST['magh'];
    echo $_POST['ma'];

    // echo '<script type="text/javascript">';
    // echo 'alert("Đã xóa sản phẩm vào giỏ hàng thành công");';
    // echo 'window.location.href="index.php?act=cart"'; 
    // echo '</script>';
}
?>