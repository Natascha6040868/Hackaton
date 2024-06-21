<?php
$servername = "localhost";
$db_username = "root"; 
$password = ""; 
$dbname = "hackathon_db";

try {
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $db_username, $password, $options);
} catch (PDOException $e) {
    die("Database connection error: " . $e->getMessage());
}
?>
