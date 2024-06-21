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
  
    
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
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
          <a href="../login.php">
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
          <img src="../img/user.jpg" alt="" />
          <a href="account.php" class="admin_name"><i class="ri-account-circle-fill"></i><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}else{echo "Account";} ?></a>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>

      <div class="home-content">
        <!-- <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Gementee Leiden</div>
              <div class="number">30</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div> --> 
            <!-- <i class="bx bx-cart-alt cart"></i> -->
          <!-- </div> -->
          <!-- <div class="box">
            <div class="right-side">
              <div class="box-topic">Gementee Gouda</div>
              <div class="number">20</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div> -->
            <!-- <i class="bx bxs-cart-add cart two"></i> -->
          <!-- </div> -->
          <!-- <div class="box">
            <div class="right-side">
              <div class="box-topic">Dutch-Innovation</div>
              <div class="number">15</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </div>
            </div> -->
            <!-- <i class="bx bx-cart cart three"></i> -->
          <!-- </div> -->
          <!-- <div class="box">
            <div class="right-side">
              <div class="box-topic">All projects</div>
              <div class="number">65</div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Down From Today</span>
              </div>
            </div> -->
            <!-- <i class="bx bxs-cart-download cart four"></i> -->
          <!-- </div> -->

          <!-- <div class="box" style = "margin-top: 15px ;">
            <div class="right-side">
              <div class="box-topic">Lange Projects</div>
              <div class="number">50</div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">All in one</span>
              </div>
            </div> -->
            <!-- <i class="bx bxs-cart-download cart four"></i> -->
          <!-- </div> -->

          <!-- <div class="box" style = "margin-top: 15px ;">
            <div class="right-side">
              <div class="box-topic">Korte Projects</div>
              <div class="number">15</div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">All in one</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i> -->
          <!-- </div> -->
          

        <!-- Display list of projects -->
        <div class="project-list m-5">
          <h2>Projects</h2>
          <ul class="list-group">
            <?php
            // Read data from projects.txt and display each project
            $file_path = 'projects.txt';
            if (file_exists($file_path)) {
              $projects = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
              foreach ($projects as $project) {
                list($project_name, $description, $duration, $contact_person) = explode('|', $project);
                echo '<li class="list-group-item">';
                echo "<h4>$project_name</h4>";
                echo "<p><strong>Description:</strong> $description</p>";
                echo "<p><strong>Duration:</strong> $duration weeks</p>";
                echo "<p><strong>Contact Person:</strong> $contact_person</p>";
                echo '</li>';
              }
            } else {
              echo '<li class="list-group-item">No projects added yet.</li>';
            }
            ?>
          </ul>
        </div>


            

            <div class="container mt-5">
                <img src="../img/MboRijnland.png" width = "100%" alt="">
              </form>
            </div>
          
        </div>
      </div>
    </section>

    <script src = "./admin nath/admin.js"></script>
    <script src = "./js/search.js"></script>
    <script src="js3.js"></script>
    <script src="./js/index.js">
      
    </script>
  </body>
</html>
