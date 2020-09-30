<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>This is some content in index.php. If there is another h1 then the include function works</h1>
    <?php
    if (!empty($_GET["search"])) {
        $search = $_GET["search"];
        $dir = "some pages";
        // Find all file nam in the dir
        $fileNames = scandir($dir, 0);
        // Take out unncessary path in fileName array
        unset($fileNames[0], $fileNames[1]);
        // If there is a match in search query and file
        // print_r($fileNames);
        // echo (' ' . $search . ' ' . $dir);
        if (in_array($search . '.php', $fileNames)) {
            include($dir . "/" . $search . ".php");
        } else {
            echo '<h1 id="request">404 Page not found</h1>';
        }
    }
    ?>
    <a href="index.php?search=some">Go to Some.php</a>
    <a href="index.php?search=some2">Go to Some2.php</a>
    <a href="index.php?search=some3">Go to Some3.php</a>
</body>

</html>