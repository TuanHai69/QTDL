<?php

    if (isset($_POST["product_detail"])) {
        $masanpham = $_POST["masanpham"];

        $stmt = $conn->prepare('SELECT * FROM banhang.sanpham WHERE masanpham=:masanpham');
        $stmt->bindParam(':masanpham', $masanpham);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th,td{
            border: 1px;
            border-style: dotted;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Size</th>
        </tr>
        <tr>
            <td><?php echo $results["masanpham"]?></td>
            <td><?php echo $results["tensanpham"]?></td>
            <td><?php echo $results["giaca"]?></td>
            <td><?php echo $results["mota"]?></td>
            <td><?php echo $results["size"]?></td>
        </tr>
    </table>
</body>
</html>