<?php
    $statemet = $conn->prepare("SELECT * FROM banhang.giaohang join banhang.donhang on giaohang.sodonhang = donhang.sodonhang");
    $statemet->execute();
    $results = $statemet->fetchALL();
    $i = 0;
?>