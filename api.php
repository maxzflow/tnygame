<?php
include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

// 1. ถ้า Admin กดบันทึก (POST)
if ($method === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if ($input) {
        try {
            $stmt = $conn->prepare("UPDATE zifo_game SET words = :words WHERE id = :id");
            foreach ($input as $roundIndex => $wordsArray) {
                $id = $roundIndex + 1; // ID ใน DB เริ่มที่ 1
                $jsonWords = json_encode($wordsArray, JSON_UNESCAPED_UNICODE);
                $stmt->execute([':words' => $jsonWords, ':id' => $id]);
            }
            echo json_encode(['status' => 'success', 'message' => 'บันทึกข้อมูลสำเร็จ!']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
} 
// 2. ถ้าหน้าเกมขอข้อมูล (GET)
else {
    $stmt = $conn->query("SELECT * FROM zifo_game ORDER BY id ASC");
    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = json_decode($row['words']);
    }
    echo json_encode($data);
}
?>
