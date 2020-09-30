<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $name = "alex as";
    $price = "s1   23s";
    ?>
    <a href="link2.php?name=<?php echo $name;?>&price=<?php echo urlencode($price)?>">Click</a>

</body>

</html>