<?php
// ตั้งค่า Database (แก้ตรงนี้ให้ตรงกับโฮสต์ของคุณ)
$host = 'localhost';
$dbname = 'ชื่อฐานข้อมูลของคุณ'; 
$username = 'ชื่อผู้ใช้'; 
$password = 'รหัสผ่าน'; 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(["error" => "Connection failed: " . $e->getMessage()]);
    exit();
}
?>
