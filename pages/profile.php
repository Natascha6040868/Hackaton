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

    <style>
        /* Add your existing CSS styles here */

        /* Styling for the profile section */
        .profile-content {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            min-height: 500px;
        }

        .profile-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-info img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile-info p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .profile-actions {
            text-align: center;
        }

        .profile-actions a {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .profile-actions a.logout-link {
            background-color: #dc3545;
        }

        .profile-actions a:hover {
            background-color: #0056b3;
        }

        .profile-actions a.logout-link:hover {
            background-color: #c82333;
        }
    </style>

  </head>
  <body>
  <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Mborijnland</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index.php" >
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
          <span class="dashboard">Profile</span>
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
        <div class="profile-content">
            <div class="profile-info">
                <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($full_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <div class="profile-actions">
                    <a href="update_profile.php">Update Profile</a>
                    <a href="logout.php" class="logout-link">Logout</a>
                </div>
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
