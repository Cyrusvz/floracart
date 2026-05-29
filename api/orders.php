<?php
// api/orders.php
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
    $pdo = require __DIR__ . '/../config/db.php';
    if (!$pdo) throw new Exception('Database connection failed');

    $user = $_SESSION['user'] ?? null;
    if (!$user) { http_response_code(401); echo json_encode(['success'=>false,'message'=>'Authentication required']); exit; }

    if (($user['role'] ?? '') === 'admin') {
        $stmt = $pdo->query('SELECT * FROM orders ORDER BY created_at DESC');
        $orders = $stmt->fetchAll();
    } else {
        $stmt = $pdo->prepare('SELECT * FROM orders WHERE user_id = :uid ORDER BY created_at DESC');
        $stmt->execute([':uid' => $user['id']]);
        $orders = $stmt->fetchAll();
    }

    $orderIds = array_map(function($o){ return (int)$o['id']; }, $orders);
    $items = [];
    if ($orderIds) {
        $in = implode(',', array_fill(0, count($orderIds), '?'));
        $stmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id IN ($in)");
        $stmt->execute($orderIds);
        $items = $stmt->fetchAll();
    }

    // nest items under orders
    $byOrder = [];
    foreach ($items as $it) { $byOrder[$it['order_id']][] = $it; }
    foreach ($orders as &$o) { $o['items'] = $byOrder[$o['id']] ?? []; }

    echo json_encode(['success'=>true,'orders'=>$orders]);

} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
}
