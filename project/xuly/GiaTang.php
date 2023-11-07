<?php
    $statement = $conn->prepare('SELECT * FROM banhang.sanpham ORDER BY sanpham.giaca ASC');
    $statement->execute();
    $results = $statement->fetchAll();
?>