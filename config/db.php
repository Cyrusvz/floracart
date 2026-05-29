<?php
// config/db.php
// Returns $pdo connected to floracart_db
declare(strict_types=1);
try {
    // UPDATED FOR AIVEN CLOUD DATABASE CONNECTION
    $host = 'mysql-568ce49-floracart.l.aivencloud.com'; 
    $db   = 'defaultdb';                        
    $user = 'avnadmin';                         
    $pass = 'AVNS_W5Pz5lAidf1EU04-9iT';         
    $port = '26778';                            
    
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_SSL_CA => __DIR__ . '/../ca.pem',
    ];

    $pdo = new PDO($dsn, $user, $pass, $options);

    // Ensure default admin exists (seed). Do not expose errors to frontend.
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => 'admin@floracart.com']);
    $admin = $stmt->fetch();
    if (!$admin) {
        $hash = password_hash('Admin@123', PASSWORD_DEFAULT);
        $ins = $pdo->prepare("INSERT INTO users (name, email, phone, password, role) VALUES (:name, :email, :phone, :password, 'admin')");
        $ins->execute([':name' => 'Administrator', ':email' => 'admin@floracart.com', ':phone' => '', ':password' => $hash]);
    }

} catch (Throwable $e) {
    $pdo = null;
    
    // THIS LINE IS NOW ACTIVE to print the real error:
   // echo "\n!!! REAL ERROR: " . $e->getMessage() . " !!!\n\n"; 
}

return $pdo;