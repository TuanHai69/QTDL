<?php
if (isset($_POST['submit'])) {

    //   Kiểm tra thông tin mật khẩu
    // echo $_POST['userchange'];
    // echo $_POST['sdtchange'];
    // echo $_POST['diachichange'];
    // echo $_POST['emailchange'];
    // echo $_POST['codeid'];
    // echo $_POST['passwordchange'];

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
        header('Location: index.php?act=profile');
    } else {
        header('Location: index.php?act=edit_profile');
        exit(0);
    }
}
?>