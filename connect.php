<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "business";

//Line ใต้นี้เป็นการสร้าง Connect String เพื่อเชื่อมกับฐานข้อมูล MySQL โดยใช้ PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected succesfully";
} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
