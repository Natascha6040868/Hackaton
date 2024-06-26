<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Mborijnland</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="style3.css" />
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
          <a href="./loginStudent.php">
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
          <img src="./img/user.jpg" alt="" />
          <span class="admin_name">User</span>
        </div>
      </nav>

      <div class="home-content">
        
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic"></div>
              <div class="number"></div>
              <div class="indicator">
                <span class="text"></span>
              </div>
            </div>
            <!-- <i class="bx bx-cart-alt cart"></i> -->
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic"></div>
              <div class="number"></div>
              <div class="indicator">
                <span class="text"></span>
              </div>
            </div>
            <!-- <i class="bx bxs-cart-add cart two"></i> -->
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic"></div>
              <div class="number"></div>
              <div class="indicator">
                <span class="text"></span>
              </div>
            </div>
            <!-- <i class="bx bx-cart cart three"></i> -->
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic"></div>
              <div class="number"></div>
              <div class="indicator">
                <span class="text"></span>
              </div>
            </div>
            <!-- <i class="bx bxs-cart-download cart four"></i> -->



            




          </div>
          


            

          
        </div>
        
        
      </div>
      <div class="container mt-5">
		<h2>Upload a file</h2>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="file" class="form-label">Select file</label>
				<input type="file" class="form-control" name="file" id = "file">
			</div>
			<button type="submit" class="btn btn-primary">Upload file</button>
		</form>
            
          </div>
    </section>

    <script src = "./js/search.js"></script>
<script src="js3.js"></script>
    <script src="./js/index.js">
      
    </script>
  </body>
</html>
