<?php
if (isset($_POST['submit'])) {


    $statement = $conn->prepare("SELECT * FROM banhang.khachhang WHERE makhachhang=:mkh and matkhau=:mk");
    $statement->bindParam(':mkh', $_POST['codeid']);
    $statement->bindParam(':mk', $_POST['passwordchange']);
    $statement->execute();
    $result = $statement->fetch();

    // // Kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu không
    if ($result) {
        $statement = $conn->prepare('UPDATE banhang.khachhang SET tenkhachhang=:user, diachi=:dc, sodienthoai=:sdt,email=:email WHERE makhachhang=:mkh and matkhau=:pass');
        $statement->bindParam(':user', $_POST['userchange']);
        $statement->bindParam(':dc', $_POST['diachichange']);
        $statement->bindParam(':sdt', $_POST['sdtchange']);
        $statement->bindParam(':email', $_POST['emailchange']);
        $statement->bindParam(':mkh', $_POST['codeid']);
        $statement->bindParam(':pass', $_POST['passwordchange']);
        $statement->execute();
        echo '<script type="text/javascript">';
        echo 'alert("Cập nhật thông tin thành công");';
        echo 'window.location.href="index.php?act=profile";'; 
        //         echo 'window.history.back();'; 

        echo '</script>';
    } else {
        header('Location: index.php?act=edit_profile');
        exit(0);
    }
}
?>