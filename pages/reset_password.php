<?php
// Include database connection file
include 'db_connection.php';

// Ensure the Composer autoloader is included
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];

    // Validate input
    if (!empty($token) && !empty($new_password)) {
        try {
            // Check if token is valid and not expired
            $stmt = $pdo->prepare("SELECT email FROM password_resets WHERE token = ? AND expires >= ?");
            $stmt->execute([$token, date("U")]);
            $reset = $stmt->fetch();

            if ($reset) {
                $email = $reset['email'];

                // Update the user's password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
                $stmt->execute([$hashed_password, $email]);

                // Delete the used token
                $stmt = $pdo->prepare("DELETE FROM password_resets WHERE email = ?");
                $stmt->execute([$email]);

                $message = "Your password has been reset successfully.";
            } else {
                $message = "Invalid or expired token.";
            }
        } catch (PDOException $e) {
            $message = "Database error: " . $e->getMessage();
        }
    } else {
        $message = "All fields are required.";
    }
} elseif (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    die("Invalid request.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <meta name="author" content="Redwan Abate">
</head>
<body>
    <h1>Reset Password</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php else: ?>
        <form action="reset_password.php" method="post">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <label for="new_password">Enter new password</label>
            <input type="password" name="new_password" id="new_password" required>
            <button type="submit">Reset Password</button>
        </form>
    <?php endif; ?>
</body>
</html>
