<?php
// config/db.php
// Returns $pdo connected to floracart_db
declare(strict_types=1);
try {
    // UPDATED FOR AIVEN CLOUD DATABASE CONNECTION
    $host = 'mysql-568ce49-floracart.l.aivencloud.com'; 
    $db   = 'defaultdb';                        // Aiven default database name
    $user = 'avnadmin';                         // Aiven username
    $pass = 'AVNS_W5Pz5lAidf1EU04-9iT';         // <-- PASTE YOUR EXACT AIVEN PASSWORD HERE!
    $port = '26778';                            // Aiven port number
    
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        // Crucial for Aiven: Tells PDO to use the secure certificate we put in the root folder
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
    // Fail silently but make a $pdo null so callers can handle it
    $pdo = null;
    
    // TIP: If it still fails, remove the "//" from the beginning of the line below 
    // to print the exact error on your screen to help you debug.
    // echo "Connection failed: " . $e->getMessage(); 
}

return $pdo;