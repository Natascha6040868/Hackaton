<!DOCTYPE html>
<html lang="en">
  <head>
    <meta
      name="viewport"
      content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width"
    />
    <!-- CSS file linked -->
    <link rel="stylesheet" href="./add project/add.css" />
    <title>PROJECTEN</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
  </head>

  <body>
    <header>
      <h1 class="logo"><a href="#">Projecten</a></h1>
      <nav>
        <ul>
          <li class="nav1"><a href="index.php">Dashboard</a></li>
          <li class="nav1">
            <a href="#" id="createPostBtn"> Create Post </a>
          </li>
          <li class="nav1"><a href="#"></a></li>
        </ul>
      </nav>
    </header>

    <main class="post-container">
      <div id="createPostModal" class="modal">
        <div class="modal-content">
          <span class="close" id="closeModal">×</span>
          <h2>Create a New Post</h2>
          <form id="postForm" action="submit_post.php" method="post">
            <div class="upper">
              <div class="title">
                <label class="postheading" for="postTitle"> Title </label>
                <input
                  type="text"
                  class="postTitle"
                  id="postTitle"
                  name="postTitle"
                  autocomplete="off"
                  required
                />
              </div>
              <div class="category1">
                <label class="postheading" for="postCategory"> Category </label>
                <input
                  type="text"
                  class="postCategory"
                  id="postCategory"
                  name="postCategory"
                  autocomplete="off"
                  required
                />
              </div>
            </div>

            <label class="postheading" for="postDescription">
              Description
            </label>
            <textarea
              class="postDescription"
              id="postDescription"
              name="postDescription"
              autocomplete="off"
              required
            ></textarea>

            <button type="submit" id="postSubmitBtn" class="postSubmitBtn">
              Post
            </button>
          </form>
        </div>
      </div>

      <!-- Detail Modal -->
      <div id="postDetailModal" class="modal">
        <div class="modal-content">
          <span class="close" id="closeDetailModal"> × </span>
          <h1 id="detailTitle"></h1>
          <span id="detailDate"></span>
          <p id="detailDescription"></p>
        </div>
      </div>

      <div id="postCreatedMessage" class="post-message">
        <?php
        if(isset($_GET['success']) && $_GET['success'] == "true") {
            echo "Post created successfully!";
        }
        ?>
      </div>
    </main>

    <footer>
      <p>Hackaton</p>
    </footer>

    <!-- JavaScript file linked -->
    <script src="./js/add.js"></script>
  </body>
</html>
