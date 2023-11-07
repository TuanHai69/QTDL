<?php
    $statement = $conn->prepare('SELECT * FROM banhang.sanpham ORDER BY sanpham.tensanpham ASC');
    $statement->execute();
    $results = $statement->fetchAll();
?>