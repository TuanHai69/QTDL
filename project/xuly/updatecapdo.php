<?php
    if (isset($_POST['submit'])) {
        
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        // echo $username;
        // echo $password;
        // echo $level;
        $stmt = $conn->prepare('SELECT * from banhang.khachhang where makhachhang=:user and matkhau=:password');
        $stmt->bindParam(':user', $userid);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result) {
            $statement = $conn->prepare('CALL CapNhatTK(:user,:password,:capdo)');
            $statement->bindParam(':user', $userid);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':capdo', $level);
            $statement->execute();            
            echo "<h2 class='text-center text-dark' style='margin-top:200px'>Thông tin thay đổi thành công <a href='index.php?act=view_account'><b style='color:green'>Trở về</b></a></h2>";
        } else {
            echo "<h2 class='text-center text-dark' style='margin-top:200px'>Thông tin thay đổi không thành công <a href='index.php?act=view_account'><b style='color:red'>Trở về</b></a></h2>";
        }
    }else{
        echo "<h2 class='text-center text-dark' style='margin-top:200px'>Thông tin thay đổi không thành công hoặc hợp lệ<a href='index.php?act=view_account'><b style='color:red'>Trở về</b></a></h2>";
    }
?>