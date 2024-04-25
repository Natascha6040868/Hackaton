<?php
// Database connection details
$db_host = "localhost:3307";
$db_user = "root";
$db_pass = "";
$db_name = "fileuploaddownload";

try {
    // Establish PDO connection
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the uploaded files from the database
    $sql = "SELECT * FROM files";
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
?>
