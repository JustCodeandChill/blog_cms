<!-- <?php
        $expireTime = time() + 86400;
        setcookie("name", "kasary", $expireTime);
        setcookie("price", "123", $expireTime);
        print_r($_COOKIE);
        echo "<hr></hr>";
        $expireTimeUnset = time() - 86400;
        setcookie("name", "kasary", $expireTimeUnset);
        setcookie("name", null);
        setcookie("name", "", $expireTimeUnset);

        if (isset($_COOKIE["name"])) {
            echo 'Cookie is set with name of: ' . $_COOKIE["name"];
        } else {
            echo "Cookie is unset";
        }
        ?> -->

<?php
session_start();
$_SESSION["id"] = 1234;
$id = $_SESSION["id"];
echo $id;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting cookeis</title>
</head>

<body>

</body>

</html>