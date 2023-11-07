<?php
    $statement = $conn->prepare("SELECT * FROM banhang.sanpham WHERE sanpham.tensanpham like '%' :ten '%' OR sanpham.giaca like :gia OR sanpham.mota like '%' :mota '%' OR sanpham.size like :kt");
    $statement->bindParam(':ten', $_POST['search']);
    $statement->bindParam(':gia', $_POST['search']);
    $statement->bindParam(':mota', $_POST['search']);
    $statement->bindParam(':kt', $_POST['search']);
    $statement->execute();
    $results = $statement->fetchAll();
?>