<?php
    
    $statementc= $conn->prepare("SELECT * from banhang.giohang
      where giohang.makhachhang = :makhachhang");
    $statementf = $conn->prepare("SELECT khachhang.tenkhachhang, khachhang.diachi,khachhang.sodienthoai,khachhang.email,khachhang.makhachhang
     from banhang.khachhang 
      where khachhang.makhachhang = :makhachhang");
    
    $statementc->bindParam(':makhachhang',$_SESSION['id'] );
    $statementf->bindParam(':makhachhang',$_SESSION['id'] );
    $i = 0;
    $statementc->execute();
    $statementf->execute();
    $subtotal =0;
    $total = 0;
    $results=$statementc->fetchAll(PDO::FETCH_ASSOC);
    $r1=$statementf->fetch(PDO::FETCH_ASSOC);
    
?>