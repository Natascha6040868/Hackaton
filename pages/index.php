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
  </head>
  <body>
  <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Mborijnland</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index.php" class="active">
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
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" id="searchInput" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="User Profile Picture" class="profile-picture">
          <a href="profile.php" class="admin_name"><i class="ri-account-circle-fill"></i><?php echo htmlspecialchars($username); ?></a>
          <i class="bx bx-chevron-right"></i>
        </div>
      </nav>

      <div class="home-content">
          <!-- Organization section with Bootstrap styling -->
          <!-- First Organization Section begins here--> 
          <div class="organization-section">
                  <div class="card mb-3">
                      <div class="row g-0">
                          <div class="col-md-4">
                              <img src="../img/MboRijnland.png" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                              <div class="card-body">
                                  <h5 class="card-title">Gementee Leiden</h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis malesuada finibus maximus.</p>
                                  <a href="projects.php?organization=Gementee Leiden" class="btn btn-primary">View Projects</a>
                              </div>
                          </div>
                      </div>
                  </div>
          </div>
          <!-- First Organization Section ends here-->

          <!-- Second Organization Section begins hier -->
          <div class="organization-section">
                  <div class="card mb-3">
                      <div class="row g-0">
                          <div class="col-md-4">
                              <img src="../img/MboRijnland.png" class="img-fluid rounded-start" alt="Gementee Gouda">
                          </div>
                          <div class="col-md-8">
                              <div class="card-body">
                                  <h5 class="card-title">Gementee Gouda</h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis malesuada finibus maximus.</p>
                                  <a href="projects.php?organization=Gementee Gouda" class="btn btn-primary">View Projects</a>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>
            <!-- Second Organization Section ends here -->

            <!-- Third Organization Section begins here-->
          <div class="organization-section">
                  <div class="card mb-3">
                      <div class="row g-0">
                          <div class="col-md-4">
                              <img src="../img/MboRijnland.png" class="img-fluid rounded-start" alt="Gementee Gouda">
                          </div>
                          <div class="col-md-8">
                              <div class="card-body">
                                  <h5 class="card-title">Dutch Innovation Industry</h5>
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis malesuada finibus maximus.</p>
                                  <a href="projects.php?organization=Dutch Innovation" class="btn btn-primary">View Projects</a>
                              </div>
                          </div>
                      </div>
                  </div>
          </div>
          <!-- Third Organization Section ends here-->

          <div class="container mt-5">
              <img src="../img/MboRijnland.png" width = "100%" alt="">
            </form>
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
