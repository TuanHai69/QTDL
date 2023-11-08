<?php
    
    $statementc= $conn->prepare("select * from banhang.giohang  where makhachhang = :makhachhang");
    $statementc->bindParam(':makhachhang',$_SESSION['id'] );
    $i = 0;
    $statementc->execute();
    $subtotal =0;
    $total = 0;
    $results=$statementc->fetchAll(PDO::FETCH_ASSOC);
?>