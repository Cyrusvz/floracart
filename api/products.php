<?php
// api/products.php
// Allow CORS and support credentialed requests when an Origin header is present
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin) {
    header("Access-Control-Allow-Origin: $origin");
    header('Access-Control-Allow-Credentials: true');
} else {
    header('Access-Control-Allow-Origin: *');
}
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }
session_start();

try {
    $pdo = require __DIR__ . '/../config/db.php';
    if (!$pdo) throw new Exception('Database connection failed');

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'GET') {
        $category = isset($_GET['category']) ? trim($_GET['category']) : null;
        if ($category) {
            $stmt = $pdo->prepare('SELECT * FROM products WHERE category = :cat ORDER BY created_at DESC');
            $stmt->execute([':cat' => $category]);
        } else {
            $stmt = $pdo->query('SELECT * FROM products ORDER BY created_at DESC');
        }
        $products = $stmt->fetchAll();
        echo json_encode(['success'=>true,'products'=>$products]);
        exit;
    }

    // Check admin for write actions
    $user = $_SESSION['user'] ?? null;
    if (!$user || ($user['role'] ?? '') !== 'admin') {
        http_response_code(401);
        echo json_encode(['success'=>false,'message'=>'Admin privileges required']); exit;
    }

    $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;

    if ($method === 'POST') {
        $name = trim($input['name'] ?? '');
        $category = trim($input['category'] ?? '');
        $price = floatval($input['price'] ?? 0);
        $stock = intval($input['stock'] ?? 0);
        $image_data = trim($input['image_data'] ?? '');
        $desc = trim($input['description'] ?? '');
        if (!$name) throw new Exception('Product name required');
        
        // Handle image upload
        $image = '';
        if ($image_data && strpos($image_data, 'data:') === 0) {
            try {
                // Parse base64 data
                $parts = explode(',', $image_data);
                if (count($parts) === 2) {
                    $image_bytes = base64_decode($parts[1], true);
                    if ($image_bytes === false) throw new Exception('Invalid base64 data');
                    
                    // Create category folder if needed
                    $img_dir = __DIR__ . '/../Images/' . $category;
                    if (!is_dir($img_dir)) {
                        mkdir($img_dir, 0755, true);
                    }
                    
                    // Generate unique filename
                    $filename = uniqid('product_') . '.png';
                    $filepath = $img_dir . '/' . $filename;
                    
                    // Save image
                    if (file_put_contents($filepath, $image_bytes) !== false) {
                        $image = 'Images/' . $category . '/' . $filename;
                    }
                }
            } catch (Throwable $e) {
                // If image upload fails, continue without image
                error_log('Image upload error: ' . $e->getMessage());
            }
        }
        
        $ins = $pdo->prepare('INSERT INTO products (name, category, price, stock, image_path, description) VALUES (:name,:category,:price,:stock,:image,:desc)');
        $ins->execute([':name'=>$name,':category'=>$category,':price'=>$price,':stock'=>$stock,':image'=>$image,':desc'=>$desc]);
        echo json_encode(['success'=>true,'id'=>$pdo->lastInsertId()]); exit;
    }

    if ($method === 'PUT') {
        $id = intval($input['id'] ?? 0);
        if (!$id) throw new Exception('Product id required');
        
        // Get existing product to get category
        $stmt = $pdo->prepare('SELECT category FROM products WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $product = $stmt->fetch();
        if (!$product) throw new Exception('Product not found');
        
        // Handle image upload if provided
        $image_data = trim($input['image_data'] ?? '');
        if ($image_data && strpos($image_data, 'data:') === 0) {
            try {
                $parts = explode(',', $image_data);
                if (count($parts) === 2) {
                    $image_bytes = base64_decode($parts[1], true);
                    if ($image_bytes === false) throw new Exception('Invalid base64 data');
                    
                    $category = $input['category'] ?? $product['category'];
                    $img_dir = __DIR__ . '/../Images/' . $category;
                    if (!is_dir($img_dir)) {
                        mkdir($img_dir, 0755, true);
                    }
                    
                    $filename = uniqid('product_') . '.png';
                    $filepath = $img_dir . '/' . $filename;
                    
                    if (file_put_contents($filepath, $image_bytes) !== false) {
                        $input['image_path'] = 'Images/' . $category . '/' . $filename;
                    }
                }
            } catch (Throwable $e) {
                error_log('Image upload error: ' . $e->getMessage());
            }
        }
        
        $fields = ['name','category','price','stock','image_path','description'];
        $sets = [];
        $params = [];
        foreach ($fields as $f) {
            if (isset($input[$f])) { 
                $sets[] = "$f = :$f"; 
                $params[":$f"] = $input[$f]; 
            }
        }
        if (!$sets) throw new Exception('No fields to update');
        $params[':id']=$id;
        $sql = 'UPDATE products SET '.implode(', ',$sets).' WHERE id = :id';
        $pdo->prepare($sql)->execute($params);
        echo json_encode(['success'=>true]); exit;
    }

    if ($method === 'DELETE') {
        // accept id via query or body
        $id = intval($_GET['id'] ?? ($input['id'] ?? 0));
        if (!$id) throw new Exception('Product id required');
        $pdo->prepare('DELETE FROM products WHERE id = :id')->execute([':id'=>$id]);
        echo json_encode(['success'=>true]); exit;
    }

    throw new Exception('Invalid request');

} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]);
}
