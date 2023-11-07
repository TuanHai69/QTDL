<?php
    $random = strtoupper(substr(md5(mt_rand()), 0, 8));

    if (isset($_POST["submit"])) {
        if ($_POST['password'] === $_POST['password_confirm'] ) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['password_confirm'];
            $email = $_POST['email'];

            $statement = $conn->prepare('SELECT * FROM banhang.khachhang WHERE email=:email');
            $statement->bindParam(':email', $email);
            $statement->execute();

            $Tontai = $statement->rowCount();

            if ($Tontai > 0) {
                echo "<h2 class='text-center text-dark' style='margin-top:200px'>Tài khoản hoặc email tồn tại, vui lòng sử dụng tên tài khoản hoặc email khác <a href='index.php?act=dangky'><b style='color:red'>Trở lại</b></a></h2>";
            }else{
                $query = $conn->prepare("CALL THEM_KH(:user,:name,:mk,:dc,:sdt,:email)");
                $query->bindParam(":user", $random);
                $query->bindParam(":name", $username);
                $query->bindParam(":mk", $password);
                $query->bindParam(":dc", $_POST['diachi']);
                $query->bindParam(":sdt", $_POST['sdt']);
                $query->bindParam(":email", $email);
                $query->execute();
                echo "<h2 class='text-center text-dark' style='margin-top:200px'>Tài khoản đã được đăng ký thành công <a href='index.php?act=dangnhap'><b style='color:green'>Đăng nhập</b></a></h2>";
            }
        }else{
            echo "<h2 class='text-center text-dark' style='margin-top:200px'>Mật khẩu nhập lại không trùng khớp <a href='index.php?act=dangky'><b style='color:red'>Trở về</b></a></h2>";
        }
    } else {
        echo "<h2 class='text-center text-dark' style='margin-top:200px'>Đăng ký không hợp lệ vui lòng đăng ký lại<a href='index.php?act=dangky'><b style='color:red'>Trở về</b></a></h2>";
    }

?>