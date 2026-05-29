<?php
// api/customers.php
// Allow CORS and support credentialed requests when an Origin header is present
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin) {
    header("Access-Control-Allow-Origin: $origin");
    header('Access-Control-Allow-Credentials: true');
} else {
    header('Access-Control-Allow-Origin: *');
}
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }
session_start();

try {
    $user = $_SESSION['user'] ?? null;
    if (!$user || ($user['role'] ?? '') !== 'admin') { http_response_code(401); echo json_encode(['success'=>false,'message'=>'Admin required']); exit; }

    $pdo = require __DIR__ . '/../config/db.php';
    if (!$pdo) throw new Exception('Database connection failed');

    $stmt = $pdo->prepare('SELECT id, name, email, phone, role, created_at FROM users WHERE role = "user" ORDER BY created_at DESC');
    $stmt->execute();
    $users = $stmt->fetchAll();
    echo json_encode(['success'=>true,'customers'=>$users]);

} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
}
