<?php
// config/db.php
declare(strict_types=1);
try {
    $dsn = 'pgsql:host=dpg-d8cnf5hkh4rs73c196g0-a.oregon-postgres.render.com;port=5432;dbname=floracart_db';
    $user = 'floracart_db_user';
    $pass = 'bzUjTfDPsWqqBdnKfw4KQchjIRXE1qxE';

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $user, $pass, $options);

    // Seed default admin if not exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => 'admin@floracart.com']);
    $admin = $stmt->fetch();
    if (!$admin) {
        $hash = password_hash('Admin@123', PASSWORD_DEFAULT);
        $ins = $pdo->prepare("INSERT INTO users (name, email, phone, password, role) VALUES (:name, :email, :phone, :password, 'admin')");
        $ins->execute([':name' => 'Administrator', ':email' => 'admin@floracart.com', ':phone' => '', ':password' => $hash]);
    }

} catch (Throwable $e) {
    die("<div style='background:white;color:red;padding:20px;text-align:center;font-size:18px;margin-top:50px;'><b>DB ERROR:</b> " . $e->getMessage() . "</div>");
}

return $pdo;