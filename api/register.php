<?php
// api/register.php
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
    $pdo = require __DIR__ . '/../config/db.php';
    if (!$pdo) throw new Exception('Database connection failed');

    $data = json_decode(file_get_contents('php://input'), true) ?: $_POST;
    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $phone = trim($data['phone'] ?? '');
    $password = $data['password'] ?? '';

    if (!$name || !$email || !$password) {
        throw new Exception('Missing required fields');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception('Invalid email');

    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
    $stmt->execute([':email' => $email]);
    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Email already registered']); exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $ins = $pdo->prepare('INSERT INTO users (name, email, phone, password, role) VALUES (:name, :email, :phone, :password, :role)');
    $ins->execute([':name' => $name, ':email' => $email, ':phone' => $phone, ':password' => $hash, ':role' => 'user']);

    echo json_encode(['success' => true, 'message' => 'Account created']);
} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}