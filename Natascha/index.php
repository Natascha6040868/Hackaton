<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Mborijnland</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    /* Popup form container styling */
.popup-form {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    background-color: #f8f8f8;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    width: 300px;
    max-width: 90%;
    transition: all 0.3s ease;
}

/* Form inputs */
.popup-form input[type="date"],
.popup-form input[type="text"],
.popup-form input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
}

/* Form buttons */
.popup-form .form-buttons input[type="submit"],
.popup-form .form-buttons button {
    padding: 10px 15px;
    margin-right: 10px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    color: white;
}

.popup-form .form-buttons input[type="submit"] {
    background-color: #4caf50;
}

.popup-form .form-buttons button {
    background-color: #f44336;
}

.popup-form .form-buttons input[type="submit"]:hover,
.popup-form .form-buttons button:hover {
    opacity: 0.8;
}

/* Active state styling */
.popup-form.active {
    display: block;
}

/* Overlay styling */
.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 5;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.overlay.active {
    display: block;
    opacity: 0.6;
}
</style>
  </head>
  <body>
    <section class="sidebar">
      <section class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">Mborijnland</span>
      </section>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-box"></i>
            <span class="links_name">Studenten</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Docenten</span>
          </a>
        </li>
        <li>
          <a href="admin.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Admin</span>
          </a>
        </li>
        
        <li class="log_out">
          <a href="#">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </section>
    <section class="home-section">
      <nav>
        <section class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </section>
        <section class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </section>
        <section class="profile-details">
          <img src="images/profile.jpg" alt="" />
          <span class="admin_name">Prem Shahi</span>
          <i class="bx bx-chevron-down"></i>
        </section>
      </nav>

      <section class="home-content">
        <section class="overview-boxes">
          <section class="box">
            <section class="right-side">
              <section class="box-topic">Docenten</section>
              <section class="number">8</section>
              <section class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </section>
            </section>
            <i class="bx bx-cart-alt cart"></i>
          </section>
          <section class="box">
            <section class="right-side">
              <section class="box-topic">Studenten</section>
              <section class="number">35</section>
              <section class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </section>
            </section>
            <i class="bx bxs-cart-add cart two"></i>
          </section>
          <section class="box">
            <section class="right-side">
              <section class="box-topic">Files</section>
              <section class="number">30</section>
              <section class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Up from yesterday</span>
              </section>
            </section>
            <i class="bx bx-cart cart three"></i>
          </section>
          <section class="box">
            <section class="right-side">
              <section class="box-topic">Feedback</section>
              <section class="number">-</section>
              <section class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Down From Today</span>
              </section>
            </section>
            <i class="bx bxs-cart-download cart four"></i>
          </section>
        </section>

        <section class="sales-boxes">
          <section class="recent-sales box">
            <section class="title">Recent</section>
            <button id="addEntryBtn">Add</button>

            <div id="popupForm" class="popup-form">
    <h3>Add New Entry</h3>
    <form action="submit_form.php" method="POST">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

    

        <label for="status">status</label>
        <input type="text" id="status" name="status" required>

        <label for="grades">Grades:</label>
        <input type="number" id="grades" name="grades" step="0.1" min="0" max="10" required>

        <div class="form-buttons">
            <input type="submit" value="Submit">
            <button type="button" id="closeFormBtn">Close</button>
        </div>
    </form>
</div>



<?php
$host = 'localhost';
$dbname = 'schoolserver_hackaton';
$username = 'root';
$password = 'root';
try {
  // Establish a database connection
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Define the SQL query to retrieve data from the Activity table
  $sql = "SELECT date, datum AS student_name, status, grades AS grade FROM Activity";
  
  // Execute the query
  $stmt = $conn->query($sql);

  // Start the sales-details section
  echo '<section class="sales-details">';
  
  // Initialize arrays to hold the data
  $dates = [];
  $students = [];
  $statuses = [];
  $grades = [];
  
  // Fetch the results and organize them into the arrays
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $dates[] = $row['date'];
      $students[] = $row['student_name'];
      $statuses[] = $row['status'];
      $grades[] = $row['grade'];
  }

  // Display dates
  echo '<ul class="details">';
  echo '<li class="topic">Date</li>';
  foreach ($dates as $date) {
      echo '<li><a href="#">' . htmlspecialchars($date) . '</a></li>';
  }
  echo '</ul>';

 // Display students
echo '<ul class="details">';
echo '<li class="topic">students</li>';
foreach ($students as $student_name) {
    echo '<li><a href="#">' . htmlspecialchars($student_name) . '</a></li>';
}
echo '</ul>';

// Display grades
echo '<ul class="details">';
echo '<li class="topic">Grades</li>';
foreach ($grades as $grade) {
    echo '<li><a href="#">' . htmlspecialchars($grade) . '</a></li>';
}
echo '</ul>';
  
  // Display statuses
  echo '<ul class="details">';
  echo '<li class="topic">Status</li>';
  foreach ($statuses as $status) {
      echo '<li><a href="#">' . htmlspecialchars($status) . '</a></li>';
  }
  echo '</ul>';

  // Close the sales-details section
  echo '</section>';
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>


            <section class="button">
              <a href="#">See All</a>
            </section>
          </section>
          <section class="top-sales box">
            <section class="title">Te Laat Ingeleverd</section>
            <ul class="top-sales-details">
              <li>
                <a href="#">
                  <img src="images/sunglasses.jpg" alt="" />
                  <span class="product"></span>
                </a>
                <span class="price"></span>
              </li>
              <li>
                <a href="#">
                  <img src="images/jeans.jpg" alt="" />
                  <span class="product"> </span>
                </a>
                <span class="price"></span>
              </li>
              <li>
                <a href="#">
                  <img src="images/nike.jpg" alt="" />
                  <span class="product"></span>
                </a>
                <span class="price"></span>
              </li>
              <li>
                <a href="#">
                  <img src="images/scarves.jpg" alt="" />
                  <span class="product"></span>
                </a>
                <span class="price"></span>
              </li>
              <li>
                <a href="#">
                  <img src="images/blueBag.jpg" alt="" />
                  <span class="product"></span>
                </a>
                <span class="price"></span>
              </li>
              <li>
                <a href="#">
                  <img src="images/bag.jpg" alt="" />
                  <span class="product"></span>
                </a>
                <span class="price"></span>
              </li>

              <li>
                <a href="#">
                  <img src="images/addidas.jpg" alt="" />
                  <span class="product"></span>
                </a>
                <span class="price"></span>
              </li>
              <li>
                <a href="#">
                  <img src="images/shirt.jpg" alt="" />
                  <span class="product"></span>
                </a>
                <span class="price"></span>
              </li>
            </ul>
          </section>
        </section>
      </section>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
<script>
   // Get elements
const addEntryBtn = document.getElementById('addEntryBtn');
const popupForm = document.getElementById('popupForm');
const overlay = document.getElementById('overlay');
const closeFormBtn = document.getElementById('closeFormBtn');

// Event listener to open popup form
addEntryBtn.addEventListener('click', () => {
    popupForm.classList.add('active');
    overlay.classList.add('active');
});

// Event listener to close popup form
closeFormBtn.addEventListener('click', () => {
    popupForm.classList.remove('active');
    overlay.classList.remove('active');
});

// Event listener to close popup form when clicking outside the form
overlay.addEventListener('click', () => {
    popupForm.classList.remove('active');
    overlay.classList.remove('active');
});

</script>

  </body>
</html>
