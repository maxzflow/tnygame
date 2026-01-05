<?php
// ตั้งค่า Database (แก้ตรงนี้ให้ตรงกับโฮสต์ของคุณ)
$host = 'sql311.infinityfree.com';
$dbname = 'if0_40830265_tnygame1'; 
$username = 'if0_40830265'; 
$password = 'Search12604'; 

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
