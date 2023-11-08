<?php
    $statemet = $conn->prepare("SELECT * FROM banhang.giaohang join banhang.donhang on giaohang.sodonhang = donhang.sodonhang WHERE donhang.makhachhang =:ma ");
    $statemet->bindParam(':ma',$_SESSION['id']);
    $statemet->execute();
    $results = $statemet->fetchALL();
    $i = 0;
?>