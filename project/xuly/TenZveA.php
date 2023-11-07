<?php
    $statement = $conn->prepare('SELECT * FROM banhang.sanpham ORDER BY sanpham.tensanpham DESC');
    $statement->execute();
    $results = $statement->fetchAll();
?>