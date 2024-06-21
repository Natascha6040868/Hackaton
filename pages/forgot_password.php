<?php
// Include database connection file
include 'db_connection.php';
require '../vendor/autoload.php'; // Include Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Validate email
    if (!empty($email)) {
        try {
            // Check if email exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user) {
                // Generate a unique token
                $token = bin2hex(random_bytes(50));
                $expires = date("U") + 1800; // Token expires in 30 minutes

                // Insert token into database
                $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires) VALUES (?, ?, ?)");
                $stmt->execute([$email, $token, $expires]);

                // Send email to user with reset link
                $resetLink = "http://localhost/side-project/reset_password.php?token=$token";
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'mail.smtp2go.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'Redwan';                // SMTP username from SMTP2GO
                    $mail->Password   = 'Red1@password';                // SMTP password from SMTP2GO
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
                    $mail->Port       = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('6040682@mborijnland.nl', 'Hackathon');  // Set sender's verified email address and name
                    $mail->addAddress($email);                                  // Add a recipient

                    // Content
                    $mail->isHTML(true);                                        // Set email format to HTML
                    $mail->Subject = 'Password Reset Request';
                    $mail->Body    = "Click the following link to reset your password: <a href='$resetLink'>$resetLink</a>";
                    $mail->AltBody = "Click the following link to reset your password: $resetLink";

                    $mail->send();
                    echo 'An email with the password reset link has been sent to your email address.';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "No account found with that email address.";
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "Please enter your email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <meta name="author" content="Redwan Abate">
</head>
<body>
    <form action="forgot_password.php" method="post">
        <h1>Forgot Password</h1>
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
