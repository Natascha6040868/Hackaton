<?php
// Include database connection file
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name'];

    // Validate input
    if (!empty($username) && !empty($email) && !empty($password) && !empty($full_name)) {
        try {
            // Check if username or email already exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$username, $email]);

            if ($stmt->rowCount() > 0) {
                echo "Username or email already exists.";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user
                $stmt = $pdo->prepare("INSERT INTO users (username, password, email, full_name) VALUES (?, ?, ?, ?)");
                if ($stmt->execute([$username, $hashed_password, $email, $full_name])) {
                    echo "Registration successful.";
                } else {
                    echo "Error: Could not execute the query.";
                }
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <style>
        .password-strength {
            height: 10px;
            width: 100%;
            background-color: #ddd;
            border-radius: 5px;
            margin-top: 5px;
        }
 
         .password-strength div {
            height: 100%;
            border-radius: 5px;
        } 
 
        .strength-weak {
            width: 25%;
            background-color: red;
        }
 
        .strength-medium {
            width: 50%;
            background-color: orange;
        }
 
        .strength-strong {
            width: 75%;
            background-color: yellowgreen;
        }
 
        .strength-very-strong {
            width: 100%;
            background-color: green;
        }

        .password-match {
            color: green;
            display: none;
        }
 
        .password-mismatch {
            color: red;
            display: none;
        } 
    </style>
</head>
 
<body>
 
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="registerForm" action="register.php" method="post">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <!-- <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a> -->
                </div>
                <span>Input your information for registration</span>
                <input type="text" name="username" placeholder="Name" required>
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required id="password">
                <div class="password-strength" id="password-strength"></div>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required id="confirm_password">
                <div class="password-match" id="password-match">Passwords match!</div>
                <div class="password-mismatch" id="password-mismatch">Passwords do not match!</div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1>Log in</h1>
                <div class="social-icons">
                    <!-- <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a> -->
                </div>
                <span>Use your email for login</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="forgot_password.php">Forget Your Password?</a>
                <button type="submit">Log in</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Log in</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
 
    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');
        const registerForm = document.getElementById('registerForm');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordStrength = document.getElementById('password-strength');
        const passwordMatch = document.getElementById('password-match');
        const passwordMismatch = document.getElementById('password-mismatch');
 
        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });
 
        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
 
        registerForm.addEventListener('submit', (e) => {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
           
            // Als password niet gelijk is aan confirmpassword dan geeft het de tekst 'Password do not match'
            if (password !== confirmPassword) {
                alert('Passwords do not match.');
                e.preventDefault();
            }
        });
 
        passwordInput.addEventListener('input', () => {
            const strength = getPasswordStrength(passwordInput.value);
            updatePasswordStrengthMeter(strength);
            checkPasswordMatch();
        });
 
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
 
        // Wanneer de password meer dan 8 letters bevat wordt het groen
        function getPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[\W]/.test(password)) strength++;
            return strength;
        }
 
        function updatePasswordStrengthMeter(strength) {
            passwordStrength.innerHTML = '';
            let strengthClass;
            switch (strength) {
                case 1:
                    strengthClass = 'strength-weak';
                    break;
                case 2:
                    strengthClass = 'strength-medium';
                    break;
                case 3:
                    strengthClass = 'strength-strong';
                    break;
                case 4:
                case 5:
                    strengthClass = 'strength-very-strong';
                    break;
                default:
                    strengthClass = '';
            }
            if (strengthClass) {
                const strengthDiv = document.createElement('div');
                strengthDiv.classList.add(strengthClass);
                passwordStrength.appendChild(strengthDiv);
            }
        }
 
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
 
            if (password === confirmPassword && password.length > 0) {
                passwordMatch.style.display = 'block';
                passwordMismatch.style.display = 'none';
            } else {
                passwordMatch.style.display = 'none';
                passwordMismatch.style.display = 'block';
            }
        }
    </script>
 
</body>
</html>
