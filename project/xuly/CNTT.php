<?php
    if (isset($_POST["submit"])) {
        $statement = $conn->prepare("UPDATE banhang.giaohang SET tientrinhgiao =:tc WHERE magiaohang =:ma");
        $statement->bindParam(':tc',$_POST['tientrinh']);
        $statement->bindParam(':ma',$_POST['magh']);
        $statement->execute();
        echo '<script type="text/javascript">';
        echo 'alert("Đã cập nhật tiến trình giao");';
        echo 'window.location.href="index.php?act=Tientrinh"'; 
        echo '</script>';
    }
?>