<?php 
if (isset($_POST["remove"])) {
    $masp = $_POST["masanpham"];
    $statement = $conn->prepare("DELETE * from banhang.giohang where giohang.masanpham = :masanpham");
    $statement->bindParam(":masanpham", $masp);
    $statement->execute();
}
?>