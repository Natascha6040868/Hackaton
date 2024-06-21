<?php
// Include database connection file
include 'db_connection.php';

try {
    // Fetch the user
    $stmt = $pdo->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->execute(['6040682@mborijnland.nl']);
    $user = $stmt->fetch();

    // Check if the user exists and verify the password
    if ($user) {
        $password = '12345'; // The plain text password you want to verify
        $hashed_password = $user['wachtwoord'];

        if (password_verify($password, $hashed_password)) {
            echo "Password verification successful.";
        } else {
            echo "Password mismatch.";
        }
    } else {
        echo "No user found with this email.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
