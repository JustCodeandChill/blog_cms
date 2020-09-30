<?php
$username = $_POST["Username"];
$password = $_POST["Password"];
$submit = $_POST["submit"];

if (isset($submit)) {
    

    
} else {
    echo "<h2>Login required</h2>";
}

if (isset($username)) {
    echo "<h3>Username is set with {$username}</h3>";
    $username = $_POST["Username"];
}else {
    echo "<h3> username was set to empty</h3>";
    $username = "";
}

if (isset($password)) {
    echo "<h3>Password is set with {$password}</h3>";
    $password = $_POST["Password"];
}else {
    echo "<h3> password was set to blank</h3>";
    $password = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>

</body>

</html>