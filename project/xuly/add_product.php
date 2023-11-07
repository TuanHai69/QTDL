<?php
    if (isset($_POST["submit"])) {
        if ($_POST['soluong'] < 0){
            echo "<h2 class='text-center text-dark' style='margin-top:200px'>Số lượng sản phẩm phải lớn hơn hoặc bằng 0 <a href='index.php?act=homepage'><b style='color:red'>Trở lại</b></a></h2>";
            return;
        }
        if ($_POST["price"] < 0){
            echo "<h2 class='text-center text-dark' style='margin-top:200px'>Giá của sản phẩm phải lớn hơn hoặc bằng 0 <a href='index.php?act=homepage'><b style='color:red'>Trở lại</b></a></h2>";
            return;
        }
        $statement = $conn->prepare('CALL THEM_SP(:id,:ten,:gia,:mota,:soluong,:size)');
        $statement->bindParam(':id',$_POST['IDSP']);
        $statement->bindParam(':ten',$_POST['tenSP']);
        $statement->bindParam(':gia',$_POST['price']);
        $statement->bindParam(':mota',$_POST['mota']);
        $statement->bindParam(':soluong',$_POST['soluong']);
        $statement->bindParam(':size',$_POST['size']);
        $statement->execute();
        echo "<h2 class='text-center text-dark' style='margin-top:200px'>Sản phẩm được thêm vào thành công <a href='index.php?act=homepage'><b style='color:green'>Trở lại</b></a></h2>";
    } else {
        echo "<h2 class='text-center text-dark' style='margin-top:200px'>Sản phẩm được thêm vào không thành công <a href='index.php?act=homepage'><b style='color:red'>Trở lại</b></a></h2>";
    }

?>