<?php
// config/db.php
// Returns $pdo connected to floracart_db
declare(strict_types=1);
try {
    // UPDATED FOR LOCAL XAMPP DEVELOPMENT
    $host = 'localhost';             // Localhost for XAMPP
    $db   = 'floracart_db';          // The exact name of your database in local phpMyAdmin
    $user = 'root';                  // Default XAMPP username
    $pass = '';                      // Default XAMPP password (must be empty!)
    
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
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