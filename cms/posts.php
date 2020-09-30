<?php
require_once("includes/db.php");
require_once("includes/session.php");
require_once("includes/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./fa/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/styles.css" />

  <!--load all styles -->
  <title>Posts</title>
</head>

<body>
  <div style="height: 10px; background-color: #27aae1"></div>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand">Kasary.com</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapse">
        <ul class="navbar-nav mr-auto">
          <li>
            <a href="myProfile.php" class="nav-link"><i class="fas fa-users"></i> My Profile</a>
          </li>
          <li><a href="dashboard.php" class="nav-link">Dashboards</a></li>
          <li><a href="posts.php" class="nav-link">Posts</a></li>
          <li><a href="categories.php" class="nav-link">Categories</a></li>
          <li><a href="admins.php" class="nav-link">Manage Admins</a></li>
          <li><a href="comments.php" class="nav-link">Comments</a></li>
          <li><a href="blog.php?page=1" class="nav-link">Live Blogs</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li>
            <a href="logout.php" class="nav-link text-danger"><i class="fa fa-user-times"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div style="height: 10px; background-color: #27aae1"></div>
  <!-- End navbar -->

  <!-- Header -->
  <header class="bg-dark text-white py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            <i class="fas fa-blog" style="color: #27aae1"></i> Blog Posts
          </h2>
        </div>

        <div class="col-lg-3 mb-2">
          <a href="addNewPost.php" class="btn btn-primary btn-block">
            <i class="fas fa-edit"></i> Add new Post
          </a>
        </div>
        <div class="col-lg-3 mb-2">
          <a href="categories.php" class="btn btn-info btn-block">
            <i class="fas fa-folder-plus"></i> Add new Category
          </a>
        </div>
        <div class="col-lg-3 mb-2">
          <a href="admins.php" class="btn btn-warning btn-block">
            <i class="fas fa-user-plus"></i> Add new Admin
          </a>
        </div>
        <div class="col-lg-3 mb-2">
          <a href="comments.php" class="btn btn-success btn-block">
            <i class="fas fa-check"></i> Add new Comment
          </a>
        </div>
      </div>
    </div>
  </header>
  <!-- End header -->
  <!-- Main area -->
  <section class="container py-2 mb-4">
    <div class="row">
      <div class="col-lg-12">
        <table class="table table-striped table-hover">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Category</th>
              <th>Date&Time</th>
              <th>Author</th>
              <th>Banner</th>
              <th>Comments</th>
              <th>Action</th>
              <th>Live Preview</th>

            </tr>
          </thead>

          <?php
          global $dbConnection;
          $sql = "SELECT * FROM post";
          $stmt = $dbConnection->query($sql);
          $sr = 0;
          while ($dataRow = $stmt->fetch()) {
            $id = $dataRow["id"];
            $dateTime = $dataRow["datetime"];
            $postTitle = $dataRow["title"];
            $category = $dataRow["category"];
            $admin = $dataRow["author"];
            $image = $dataRow["image"];
            $postText = $dataRow["post"];
            $sr++;
          ?>
            <tbody class>
              <tr>
                <td><?php echo $sr . '.' ?></td>
                <td>
                  <?php
                  $postTitle = limitDisplayName($postTitle, 20, 0, 18);
                  echo $postTitle; ?>
                </td>

                <td><?php
                    $category = limitDisplayName($category, 8, 0, 8);
                    echo $category; ?></td>
                <td><?php
                    $dateTime = limitDisplayName($dateTime, 11, 0, 11);
                    echo $dateTime; ?></td>

                <td><?php
                    $admin = limitDisplayName($admin, 20, 0, 18);
                    echo $admin; ?>
                </td>
                <td><img src="uploads/<?php echo $image; ?>" alt="" width="170px" height="100px"></td>
                <td>Comment</td>
                <td>
                  <a href="editPost.php?id=<?php echo $id; ?>"><span class="btn btn-warning">Edit</span></a>
                  <a href="deletePost.php?id=<?php echo $id; ?>"><span class="btn btn-danger">Delete</span></a>
                </td>
                <td>
                  <a href="fullPost.php?id=<?php echo $id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a>
                </td>
              </tr>
            </tbody>
          <?php } ?>
        </table>
      </div>
    </div>
  </section>
  <!-- end main area -->
  <!-- Footer -->
  <div style="height: 10px; background-color: #27aae1"></div>
  <footer class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="lead text-center">
            Theme by Kasary | <span id="year"></span> | &copy; ---All right
            Reserved
          </p>
        </div>
      </div>
    </div>
  </footer>
  <div style="height: 10px; background-color: #27aae1"></div>
  <!-- End FOoter -->
  <!-- Bootstrap functionality -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script>
    $("#year").text(new Date().getFullYear());
  </script>
</body>

</html>