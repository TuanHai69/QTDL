<?php
    //Nếu tồn tại tài khoản đăng nhập
    if (isset($_SESSION["capdo"])) {

        $masanpham = $_POST["masanpham"];
        //Xuất dữ liệu từ bảng giỏ hàng
        $stmt1 = $conn->prepare('SELECT * FROM banhang.giohang where makhachhang=:ma');
        $stmt1->bindParam(':ma',$_POST['makhachhang']);
        $stmt1->execute();
        $results = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        //Tạo 2 biến đếm i, j
        $i=0; $j=0;

        //Tìm và so sánh các sản phẩm trong giỏ hàng
            //Nếu đã tồn tại sản phẩm trong giỏ hàng thì cập nhật số lượng
        if ($results > 0) {
                foreach ($results as $product) {
                    if ($product["masanpham"] == $masanpham){
                        //Cập nhật số lượng
                        $soluongmoi = $product["soluong"] + 1;
                        $stmt2 = $conn->prepare('UPDATE banhang.giohang SET soluong=:soluongmoi WHERE masanpham=:masanpham');
                        $stmt2->bindParam(':soluongmoi', $soluongmoi);
                        $stmt2->bindParam(':masanpham', $masanpham);
                        $stmt2->execute();
                        echo '<script type="text/javascript">';
                        echo 'alert("Thêm sản phẩm vào giỏ hàng thành công1");';
                        echo 'window.location.href="index.php?act=homepage"'; 
                        echo '</script>';
                        $j=1;
                        break;
                    }
                    $i++;
                }
        }

            //Nếu sản phẩm chưa tồn tại trong giỏ hàng thì thực hiện thêm vào giỏ
        if ($j == 0) {
            $makhachhang = $_POST["makhachhang"];
            $tensanpham = $_POST["tensanpham"];
            $giaca = $_POST["giaca"];
            $soluong = 1;

            //Thực hiện thêm vào CSDL
            $stmt = $conn->prepare("CALL themvaogiohang(:magiohang, :makhachhang, :masanpham, :tensanpham, :giaca, :soluong)");
            $stmt->bindParam(':magiohang', $makhachhang);
            $stmt->bindParam(':makhachhang', $makhachhang);
            $stmt->bindParam(':masanpham', $masanpham);
            $stmt->bindParam(':tensanpham', $tensanpham);
            $stmt->bindParam(':giaca', $giaca);
            $stmt->bindParam(':soluong', $soluong);
            $stmt->execute();

            echo '<script type="text/javascript">';
            echo 'alert("Thêm sản phẩm vào giỏ hàng thành công");';
            echo 'window.location.href="index.php?act=homepage"'; 
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Bạn cần phải đăng nhập");';
        echo 'window.location.href="index.php?act=dangnhap";'; 
        echo '</script>';
    }
?>