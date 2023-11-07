<?php
    $statement = $conn->prepare('SELECT * FROM banhang.sanpham ORDER BY sanpham.giaca DESC');
    $statement->execute();
    $results = $statement->fetchAll();
?>