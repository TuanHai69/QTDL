<?php
    $statement = $conn->prepare('SELECT * FROM banhang.sanpham');
    $statement->execute();
    $results = $statement->fetchAll();
?>