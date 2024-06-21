<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user information
$query = $pdo->prepare("SELECT full_name, email, profile_picture FROM users WHERE id = ?");
$query->execute([$user_id]);
$user = $query->fetch();

$full_name = $user['full_name'];
$email = $user['email'];
$profile_picture = $user['profile_picture'];

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['full_name'];

    // Fetch profile picture
    require 'db_connection.php';
    $stmt = $pdo->prepare("SELECT profile_picture FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    $profile_picture = $user['profile_picture'];
   
} else {
    $username = 'Sign-up';
    $profile_picture = '../img/user.jpg'; // Default image for non-logged-in users
}




// Fetch user information from the database
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT username, email, password FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    if (!empty($old_password) && !empty($new_password) && !empty($confirm_new_password)) {
        if ($new_password === $confirm_new_password) {
            if (password_verify($old_password, $user['password'])) {
                $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                $stmt->execute([$new_password_hashed, $user_id]);
                $message = "Password changed successfully.";
            } else {
                $message = "Old password is incorrect.";
            }
        } else {
            $message = "New password and confirmation do not match.";
        }
    } else {
        $message = "All fields are required.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_username'])) {
    $new_username = $_POST['new_username'];
    $confirm_new_username = $_POST['confirm_new_username'];

    if (!empty($new_username) && !empty($confirm_new_username)) {
        if ($new_username === $confirm_new_username) {
            $stmt = $pdo->prepare("UPDATE users SET username = ? WHERE id = ?");
            $stmt->execute([$new_username, $user_id]);
            $message = "Username changed successfully.";
        } else {
            $message = "New username and confirmation do not match.";
        }
    } else {
        $message = "All fields are required.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
        $fileName = $_FILES['profile_picture']['name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileType = $_FILES['profile_picture']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = 'uploads/';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $stmt = $pdo->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
                $stmt->execute([$dest_path, $user_id]);
                $message = "Your Profile Picture is succesfully updated!";
            } else {
                $message = "There was an error moving the file to the upload directory.";
            }
        } else {
            $message = "Upload failed. Allowed file types: " . implode(',', $allowedfileExtensions);
        }
    } else {
        $message = "There was an error uploading the file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Mborijnland</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> 
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/update_profile.css">

  </head>
  <body>
  <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Mborijnland</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="add.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Add Project</span>
          </a>
        </li>
        <li>
          <a href="werkgevers.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Studenten</span>
          </a>
        </li>
        <li>
          <a href="./adminL.php">
            <i class="bx bx-shield"></i>
            <span class="links_name">Admin</span>
          </a>
        </li>
        
        <li class="log_out">
          <a href="../pages/login.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Update-profile</span>
        </div>
        <!-- <div class="search-box">
          <input type="text" id="searchInput" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div> -->
        <div class="profile-details">
          <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="User Profile Picture" class="profile-picture">
          <a href="profile.php" class="admin_name"><i class="ri-account-circle-fill"></i><?php echo htmlspecialchars($username); ?></a>
          <i class="bx bx-chevron-right"></i>
        </div>
      </nav>

      <div class="home-content">
        <div class="main-up-profile">
            <h1>Update Your Profile</h1>
            <?php if (!empty($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
            <!-- <form action="update_profile.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['gebruikersnaam']); ?>" required>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                <button type="submit" name="update">Update Profile</button>
            </form> -->

            <form action="update_profile.php" method="post">
                <h2>Change Password</h2>
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" id="old_password" required>
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password" required>
                <label for="confirm_new_password">Confirm New Password</label>
                <input type="password" name="confirm_new_password" id="confirm_new_password" required>
                <button type="submit" name="change_password">Change Password</button>
            </form>

            <form action="update_profile.php" method="post">
                <h2>Customize Username</h2>
                <label for="new_username">New Username</label>
                <input type="text" name="new_username" id="new_username" required>
                <label for="confirm_new_username">Confirm New Username</label>
                <input type="text" name="confirm_new_username" id="confirm_new_username" required>
                <button type="submit" name="change_username">Change Username</button>
            </form>

            <form action="update_profile.php" method="post" enctype="multipart/form-data">
                <h2>Update Your profile picture</h2>
                <label for="profile_picture">Upload Profile Picture:</label>
                <input type="file" name="profile_picture" id="profile_picture" required>
                <button type="submit" name="upload">Upload</button>
            </form>

            <div class="parent-container">
            <a href="profile.php"><button id="back-button-p">Back to Profile</button></a>
            </div>

        
        </div>
      </div>
    </section>

    <script src = "../js/admin.js"></script>
    <script src = "../js/search.js"></script>
    <!-- <script src="js3.js"></script> -->
    <script src="../js/index.js"></script>
  </body>
</html>
