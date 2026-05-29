<?php
// api/place_order.php
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
    if (empty($_SESSION['user']) || !is_array($_SESSION['user']) || empty($_SESSION['user']['id'])) {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Authentication required']);
        exit;
    }
    $sessionUser = $_SESSION['user'];

    $pdo = require __DIR__ . '/../config/db.php';
    if (!$pdo) throw new Exception('Database connection failed');

    $data = json_decode(file_get_contents('php://input'), true) ?: $_POST;
    $cart = $data['cart'] ?? [];
    // Debug endpoint to inspect incoming cart types
    if (isset($_GET['debug'])) {
        $types = [];
        foreach ($cart as $k => $it) { $types[$k] = gettype($it); }
        echo json_encode([
            'success' => false,
            'data_type' => gettype($data),
            'user_type' => gettype($sessionUser),
            'user' => $sessionUser,
            'cart_types' => $types,
            'raw_cart' => $cart
        ]);
        exit;
    }
    $customer_name = trim($data['customer_name'] ?? '');
    $phone = trim($data['phone'] ?? '');
    $street = trim($data['street'] ?? '');
    $city = trim($data['city'] ?? '');
    $instructions = trim($data['instructions'] ?? '');
    $payment_method = trim($data['payment_method'] ?? '');

    if (empty($cart) || !$customer_name || !$phone || !$street || !$city || !$payment_method) {
        throw new Exception('Missing order information');
    }

    // If cart was sent as a JSON-encoded string, decode it
    if (is_string($cart)) {
        $decodedCart = json_decode($cart, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedCart)) {
            $cart = $decodedCart;
        }
    }

    // Normalize cart items: allow items to be objects or JSON strings
    $normalized = [];
    foreach ($cart as $it) {
        if (is_string($it)) {
            $decoded = json_decode($it, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $it = $decoded;
            }
        }
        if (!is_array($it)) {
            throw new Exception('Invalid cart item type: ' . gettype($it));
        }
        $normalized[] = $it;
    }
    $cart = $normalized;

    $subtotal = 0;
    foreach ($cart as $it) {
        $qty = intval($it['quantity'] ?? ($it['qty'] ?? 0));
        $price = floatval($it['price'] ?? ($it['amount'] ?? 0));
        $subtotal += $qty * $price;
    }
    $delivery_fee = floatval($data['delivery_fee'] ?? 50);
    $total = $subtotal + $delivery_fee;

    $pdo->beginTransaction();
    $ins = $pdo->prepare('INSERT INTO orders (user_id, customer_name, phone, street, city, instructions, payment_method, subtotal, delivery_fee, total, status) VALUES (:user_id,:customer_name,:phone,:street,:city,:instructions,:payment_method,:subtotal,:delivery_fee,:total, "pending")');
    $ins->execute([
        ':user_id' => $sessionUser['id'], ':customer_name' => $customer_name, ':phone' => $phone,
        ':street' => $street, ':city' => $city, ':instructions' => $instructions, ':payment_method' => $payment_method,
        ':subtotal' => $subtotal, ':delivery_fee' => $delivery_fee, ':total' => $total
    ]);
    $orderId = (int)$pdo->lastInsertId();

    $insItem = $pdo->prepare('INSERT INTO order_items (order_id, product_name, category, quantity, price) VALUES (:order_id,:product_name,:category,:quantity,:price)');
    foreach ($cart as $it) {
        $insItem->execute([ ':order_id'=>$orderId, ':product_name'=>$it['name'], ':category'=>$it['category'] ?? null, ':quantity'=>intval($it['quantity']), ':price'=>floatval($it['price']) ]);
    }

    $pdo->commit();
    echo json_encode(['success'=>true,'order_id'=>$orderId]);

} catch (Throwable $e) {
    if (!empty($pdo) && $pdo->inTransaction()) $pdo->rollBack();
    http_response_code(400);
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
}
