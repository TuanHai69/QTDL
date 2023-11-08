<?php 
$random = strtoupper(substr(md5(mt_rand()), 0, 8));
$random1 = strtoupper(substr(md5(mt_rand()), 0, 8));

date_default_timezone_set ('Asia/Ho_Chi_Minh');
$time = date ('Y/m/d - H:i:s');
if (isset($_POST["submit"])) {
    $statement = $conn->prepare('INSERT into banhang.donhang (sodonhang,ngaydathang,makhachhang,magiohang)  values (:sodonhang,:currentday,:id, :magiohang)');
    $statement->bindParam(":sodonhang", $random);
    $statement->bindParam(":currentday",$time );
    $statement->bindParam(":id", $_SESSION['id']);
    $statement->bindParam(':magiohang', $_POST["magiohang"]);
    $statement->execute();

    $statement1 = $conn->prepare('INSERT into banhang.giaohang (magiaohang,diachigiao,sodonhang)  values (:magiaohang,:id_dc,:sodonhang)');
    $statement1->bindParam(":magiaohang", $random1);
    $statement1->bindParam(":id_dc",$_POST["diachi"]);
    $statement1->bindParam(":sodonhang",$random);
    $statement1->execute();

    echo '<script type="text/javascript">';
    echo 'alert("Đã đặt hàng thành công");';
    echo 'window.location.href="index.php?act=cart"'; 
    echo '</script>';

}
?>