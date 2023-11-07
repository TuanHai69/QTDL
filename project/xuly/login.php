<?php
    if (isset($_POST["submit"]) && $_POST['email'] != null) {
        $statement = $conn->prepare("SELECT * FROM banhang.khachhang WHERE email=:email and matkhau=:pass");
        $statement->bindParam(":email", $_POST['email']);
        $statement->bindParam(':pass', $_POST['password']);
        $statement->execute();
        $result = $statement->fetch();


        if ($result) {
            $_SESSION['id'] = $result['makhachhang'];
            $_SESSION['user'] = $result['tenkhachhang'];
            $_SESSION['capdo'] = $result['capdo'];

            if ($result['capdo'] == '1') {
                header('Location: index.php?act=homepage');
            }
            if ($result['capdo'] == '0') {
                header('Location: index.php?act=homepage');
            }
            
        }else{
            echo "<h2 class='text-center text-dark' style='margin-top:200px'>Tài khoản của bạn không tồn tại<a href='index.php?act=dangky'><b style='color:RED'>Đăng ký tài khoản</b></a></h2>";
        }
    } else {
        echo "<h2 class='text-center text-dark' style='margin-top:200px'>Tài khoản của bạn không hợp lệ<a href='index.php?act=dangnhap'><b style='color:RED'>Trở lại</b></a></h2>";
    }

?>