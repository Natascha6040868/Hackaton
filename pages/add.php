<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Project - Mborijnland</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/add.css">
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Redwan Abate">
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
          <a href="add.php" class="active">
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
                <span class="dashboard">Add Project</span>
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
        <div class="container">
        <div class="row mt-5">
            <div class="col">
            <div class="form-container">
              <h2>Add Project</h2>
              <form action="process_add_project.php" method="POST">
                  <div class="form-group">
                      <label for="organization">Organization:</label>
                      <select id="organization" name="organization" required>
                          <option value="Gementee Leiden">Gementee Leiden</option>
                          <option value="Gementee Gouda">Gementee Gouda</option> 
                          <option value="Dutch Innovation">Dutch Innovation Industry</option>
                          <!-- Add more organizations as needed -->
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="project_name">Project Name:</label>
                      <input type="text" id="project_name" name="project_name" required>
                  </div>
                  <div class="form-group">
                      <label for="description">Description:</label>
                      <textarea id="description" name="description" rows="4" required></textarea>
                  </div>
                  <div class="form-group">
                      <label for="duration">Duration (weeks):</label>
                      <input type="number" id="duration" name="duration" required>
                  </div>
                  <div class="form-group">
                      <label for="contact_person">Contact Person:</label>
                      <input type="text" id="contact_person" name="contact_person" required>
                  </div>
                  <!-- Additional form fields as needed -->
                  <div class="form-group">
                      <button type="submit">Add Project</button>
                      <a href="index.php" class="cancel-link">Cancel</a>
                  </div>
              </form>
          </div>

            </div>
        </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src = "../js/search.js"></script>
  <script src="../js/index.js">
  <script src = "../js/admin.js"></script>
</body>
</html>
