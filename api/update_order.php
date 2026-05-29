<?php
// api/update_order.php
// Allow CORS and support credentialed requests when an Origin header is present
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin) {
    header("Access-Control-Allow-Origin: $origin");
    header('Access-Control-Allow-Credentials: true');
} else {
    header('Access-Control-Allow-Origin: *');
}
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }
session_start();

try {
    $user = $_SESSION['user'] ?? null;
    if (!$user || ($user['role'] ?? '') !== 'admin') { http_response_code(401); echo json_encode(['success'=>false,'message'=>'Admin required']); exit; }

    $pdo = require __DIR__ . '/../config/db.php';
    if (!$pdo) throw new Exception('Database connection failed');

    $data = json_decode(file_get_contents('php://input'), true) ?: $_POST;
    $orderId = intval($data['order_id'] ?? 0);
    $status = $data['status'] ?? '';
    if (!$orderId || !$status) throw new Exception('order_id and status required');

    $stmt = $pdo->prepare('UPDATE orders SET status = :status WHERE id = :id');
    $stmt->execute([':status'=>$status,':id'=>$orderId]);
    echo json_encode(['success'=>true]);

} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
}
