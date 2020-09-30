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
  <title>Blog Page</title>
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
          <li><a href="blogs.php" class="nav-link"><i class="fas fa-users"></i> Home</a></li>
          <!-- <li><a href="dashboard.php" class="nav-link">Dashboards</a></li> -->
          <li><a href="#" class="nav-link">About Us</a></li>
          <li><a href="blogs.php" class="nav-link">Blog</a></li>
          <li><a href="#" class="nav-link">Contact Us</a></li>
          <li><a href="#" class="nav-link">Feature</a></li>

        </ul>
        <ul class="navbar-nav ml-auto">
          <form class="form-inline d-none d-sm-block" action="blogs.php">
            <input class="form-control mr-2" type="text" name="search" placeholder="Type here" value="">
            <button type="submit" class="btn btn-primary" name="searchButton">Search</button>

          </form>
        </ul>
      </div>
    </div>
  </nav>
  <div style="height: 10px; background-color: #27aae1"></div>
  <!-- End navbar -->

  <!-- Header -->

  <!-- End header -->

  <!-- Main area -->
  <div class="container">
    <div class="row mt-4">
      <div class="col-sm-8">
        <h1>Complete Responsive CMS Blog </h1>
        <h1 class="lead">show all the blog post</h1>

        <?php
        global $dbConnection;
        if (isset($_GET["searchButton"])) {
          $search = $_GET["search"];
          $sql = "SELECT * FROM post 
          WHERE datetime LIKE :search 
              OR title LIKE :search
              OR category LIKE :search
              OR post LIKE :search";

          $stmt = $dbConnection->prepare($sql);
          $stmt->bindValue(":search", '%' . $search . '%');
          $stmt->execute();
        } else {
          $postIdFromURL = $_GET['id'];
          if (!isset($postIdFromURL)) {
            $_SESSION['errorMessage'] = "Bad request";
            redirectTo("blogs.php");
          }
          $sql = "SELECT * FROM post WHERE id='$postIdFromURL'";
          $stmt = $dbConnection->query($sql);
        }

        while ($dataRow = $stmt->fetch()) {
          $id = $dataRow["id"];
          $dateTime = $dataRow["datetime"];
          $postTitle = $dataRow["title"];
          $category = $dataRow["category"];
          $admin = $dataRow["author"];
          $image = $dataRow["image"];
          $postText = $dataRow["post"];

        ?>

          <div class="card">
            <img class="img-fluid card-img-top" src="uploads/<?php echo htmlentities($image); ?>" alt="banner" style="max-height: 450px;">
            <div class="card-body">
              <h4 class="card-title"><?php echo htmlentities($postTitle)  ?></h4>
              <small>Written by <?php htmlentities($admin); ?> on <?php echo $dateTime; ?></small>
              <span style="float: right;" class="badge badge-dark text-light">Comments 20</span>
              <hr>
              <p class="card-text">
                <?php
                echo htmlentities($postText); ?>
              </p>
              <a href="fullPost.php?id=<?php echo $id; ?>" style="float: right;">
                <span class="btn btn-info">Read more >></span>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="col-sm-3 offset-sm-1">
        <h1><?php
            $search = $_GET["search"];
            $sql = "SELECT * FROM post 
        WHERE title LIKE :search 
            -- OR title LIKE :search
            -- OR category LIKE :search
            -- OR post LIKE :search";

            $stmt = $dbConnection->prepare($sql);
            $stmt->bindValue(":search", '%' . $search . '%');
            $stmt->execute();
            $data = $stmt->fetch();
            print_r($data); ?></h1>
      </div>
    </div>
  </div>
  <!-- end main area -->
  <!-- Footer -->
  <div class="mt-3" style="height: 10px; background-color: #27aae1"></div>
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