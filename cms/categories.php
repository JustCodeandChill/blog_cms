<?php
require_once("includes/db.php");
require_once("includes/session.php");
require_once("includes/functions.php");
//variabels
$characterLengthMin = 3;
$characterLengthMax = 49;
global $dbConnection;
// f the submit button is clicked, do the code below
if (isset($_POST['submit'])) {
    $category = $_POST['categoryTitle'];
    $admin = "kasary";
    $timeCreated = getCurrentTimeIAmericaChicagoFormat();

    // category name must not be empty
    if (empty($category)) {
        $_SESSION['errorMessage'] = "All field must be filled out";
        redirectTo("categories.php");
        // check for length of the name, 1 < length < 49 (dtbs requirement)
    } elseif (strlen($category) < $characterLengthMin) {
        $_SESSION['errorMessage'] = "Category title should be more than $characterLengthMin characters";
        redirectTo("categories.php");
    } elseif (strlen($category) > $characterLengthMax) {
        $_SESSION['errorMessage'] = "Category title should be less than $characterLengthMax characters";
        redirectTo("categories.php");
    } else {
        //query to insert into database
        $sql = "INSERT INTO category(title, author, datetime) ";
        //prder is matter
        $sql .= "VALUES(:categorY, :admiN, :dateTimE)";

        $stmt = $dbConnection->prepare($sql);
        //binding order not matter
        $stmt->bindValue(":categorY", $category);
        $stmt->bindValue(":admiN", $admin);
        $stmt->bindValue(":dateTimE", $timeCreated);

        //execute
        $execute = $stmt->execute();

        if ($execute) {
            $_SESSION["successMessage"] = "Category with id: " . $dbConnection->lastInsertId() . " added Successfully";
            redirectTo("categories.php");
        } else {
            $_SESSION['errorMessage'] = "Cannot create the data";
            redirectTo("categories.php");
        }
    }
}
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
    <title>Categories</title>
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
                        <i class="fa fa-edit" style="color: #27aae1"></i>Manage Categories

                    </h2>
                </div>
            </div>
        </div>
    </header>
    <!-- End header -->
    <!-- Main area -->
    <section class="container py-2 mb-4" style="min-height: 400px;">
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <!-- The submit button has been clicked, have to run message function to
            determine the output based on the session variable errorMessage -->
                <?php
                echo successMessage();
                echo errorMessage();
                ?>
                <form action="categories.php" method="POST">
                    <div class="card bg-secondary text-light mb-3">
                        <div class="card-header">
                            <h1>Add New Category</h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="fieldInfo">Category Title: </span></label><br>
                                <input class="form-control" type="text" name="categoryTitle" id="title" placeholder="Type your title" value="">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a class="btn btn-warning btn-block" href="dashboard.php"><i class="fa fa-arrow-left"> Back to Dashboard</i></a>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <button type="submit" name="submit" class="btn btn-success btn-block">
                                        <i class="fa fa-check"></i> Publish
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

<!-- style="min-height:50px; background-color: yellow" -->