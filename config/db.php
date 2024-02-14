<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "book_of_hotel";

try {
  // สร้าง PDO เชื่อมต่อกับฐานข้อมูล
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  // แสดงผลข้อความแสดงข้อผิดพลาดหากการเชื่อมต่อล้มเหลว
  echo "Connection failed: " . $e->getMessage();
}
?>
