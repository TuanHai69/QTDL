<?php 
$random = strtoupper(substr(md5(mt_rand()), 0, 8));
$time = date_default_timezone_set ('Asia/Ho_Chi_Minh');
    // $time = date ('Y/m/d - H:i:s');
if (isset($_POST["submit"])) {
    $magh = $_POST["magh"];
    echo $_POST["magh"];
    $statement = $conn->prepare("UPDATE banhang.donhang  set sodonhang = :sodonhang, ngaythangdat=:currentday,makhachhang= :id,doanhthu= :doanhthu
    where makhachhang=:id AND magiohang=:magh");

    $statement->bindParam(":sodonhang", $random);
    $statement->bindParam(":currentday",$time );
    $statement->bindParam(":id", $_SESSION['id']);
    $statement->bindParam(':doanhthu', $tong);
    $statement->execute();

    echo '<script type="text/javascript">';
    echo 'alert("Đã đặt hàng thành công");';
    echo 'window.location.href="index.php?act=cart"'; 
    echo '</script>';
}
?>