<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];


if (empty($host) || empty($dbname) || empty($user) || empty($password)) {
    die("One or more environment variables are missing or not loaded correctly.");
}

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful";
} catch (PDOException $e) {
    die("Database Connection failed: {$e->getMessage()}");
}
?>