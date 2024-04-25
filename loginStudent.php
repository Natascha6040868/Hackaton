<?php
include_once 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select the database
$db_selected = mysqli_select_db($conn, $database);

// Check if the database selection succeeded
if (!$db_selected) {
    die ('Can\'t use database : ' . mysqli_error($conn));
}

// Register User
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform validation here
    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Login User
if(isset($_POST['login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];
    // Perform validation here

    // Check if the user exists in the database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Fetch user data
        $row = $result->fetch_assoc();

        // Start session
        session_start();


        // Store user data in session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];

        // Redirect to index.php
        header("location:index.php");
        exit;
    } else {
        echo "Invalid email or password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Register/Login</title>
</head>
<body>
<!--? ========== Signup page Section ========== -->
    
<div class="container" id="container">
	<div class="form-container sign-up-container">
	<form action="#" method="post">
        <h1>Create Account</h1>
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        <button type="submit" name="register">Sign Up</button>
    </form>
	</div>

<!--? ========== Login Page Section ========== -->

	<div class="form-container sign-in-container">
        <form action="#" method="post">
            <h1>Inloggen</h1>
            <h2 class="signLogo">⬇</h2>
            <input type="email" name="login_email" placeholder="Email" required />
            <input type="password" name="login_password" placeholder="Password" required />
            <button type="submit" name="login">Sign In</button>
            <p>Don't have an account? <a href="login.php">Sign Up</a></p>
        </form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Terug naar de Login page</h1>
				<p>Log in met uw persoonlijke gegevens om toegang te krijgen tot de website.</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Welkom Onze Website</h1>
				<p>Voer uw persoonlijke gegevens</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!--* ========== Javascript link ========== -->

<script src="./js/login.js"></script>
</body>
</html>