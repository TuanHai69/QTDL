<?php
try {
  $conn = new PDO("mysql:host=localhost;dbname=banhang", 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
  //  echo "Connected Successfully";
} catch (PDOException $e) {
  echo "Connection Failed" . $e->getMessage();
}
?>