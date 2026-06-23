<?php
$host = '192.168.1.16';
$user = 'd4cskt';
$pass = 'Tung';
$dbname = 'd4cskt';
$charset = 'utf8mb4';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=$charset",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    die("Lỗi kết nối database: " . $e->getMessage());
}

session_start();

define('ADMIN_PASSWORD', 'Tung');
define('BASE_URL', 'http://localhost/admin-dashboard/');

function isAdminLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function isUserLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['idcb']);
}

function showError($message) {
    return "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Lỗi!</strong> $message
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>";
}

function showSuccess($message) {
    return "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Thành công!</strong> $message
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>";
}

function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>