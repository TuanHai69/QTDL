<?php
 $random = strtoupper(substr(md5(mt_rand()), 0, 8));
    if (isset($_POST["addcart"])) { 
        $magiohang = $random;
        $masanpham = $_POST["masanpham"];
        $tensanpham = $_POST["tensanpham"];
        $gia = $_POST["giaca"];
        $soluong = 0;
        $soluong +=1;
        $makh =   $_POST["makhachhang"];
        $tenkh = $_POST["tenkhachhang"];
        $email = $_POST["email"];
        $diachi = $_POST["diachi"];
        $sdt = $_POST["sodienthoai"];


        $query=$conn->prepare("call themvaogiohang(:macart,:makh,:tenkh,:dc, :sdt,:email,:masp,:tensp,:gia,:sl)");

        $query->bindParam(":macart",$magiohang);
        $query->bindParam(":mahk",$makh);
        $query->bindParam(":tenkh",$tenkh); 
        $query->bindParam(":email",$email);
        $query->bindParam(":dc",$diachi);
        $query->bindParam(":sdt",$sdt);
        $query->bindParam(":masp",$masanpham);
        $query->bindParam(":tensp",$tensanpham);
        $query->bindParam(":gia",$gia);
        $query->bindParam(":sl",$soluong);
        $query->execute();
    }
?>