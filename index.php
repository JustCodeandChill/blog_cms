<?php 
 require("function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <?php
            $x = 110;
            $y = "asd";
            $concat = $x;
            $concat .= $y;
            $concat = strtoupper($concat);
            echo "$concat is the cariable concat";
            echo "it is integer or not: " . bindec($x) . "<br>";
            echo "it is integer or not: " . is_numeric($x);
            ?> -->
    <?php
    define("constant", 12);
    echo fmod(15, 7) . "<br>";
    echo rand(0, 20);
    echo (constant);
    ?>
    <!-- <?php
            $newA = array(1, 234, 12343, array("a", "b", "c"));
            echo $newA[3][1] . " " . $newA[3][0];
            $newB = array("a" => 1, "b" => 2);
            array_shift($newA);
            print_r($newA);
            echo in_array(12, $newB);
            $champs = "samia yasuo kasary";
            $b =  explode(" ", $champs);
            print_r($b);
            echo $b;
            ?> -->
    <!-- // iterate through array -->
    <!-- <?php
            $newC = array(1, 2, 3, 4);
            next($newC);
            echo current($newC);
            echo current($newC);
            reset($newC);
            echo current($newC);
            ?> -->
    <?php
    if (1 == 2) {
        echo ("1=2");
    } else if (1 < 2) {
        echo ("1>2");
    }
    ?>
    <hr>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "$i is printing on screen <br>";
    }
    $newD = array(1, 2, 3, 4);
    foreach ($newD as $x) {
        echo ("current is $x <br>");
    } ?>
    <hr>
    <?php
    $newE = array("item_price" => false, "item_name" => "pizza");
    $i = 0;
    foreach ($newE as $k => $v) {
        $data = ucwords(str_replace("_", " ", $k));
        if ($k == "item_price") {
            if (isset($v)) {
            } else {
                $v = " cannot be determined";
            }
        }
        echo (" $data is $v<br>");
        $i++;
    }
    echo $i;
    ?>
    <hr>
    <?php
    $weather = "susnny";
    switch ($weather) {
        case "sunny":
            echo "sunny outside <br>";
            break;
        case "cloudy":
            echo "cloudy outside <br>";
        break;
        default:
            echo "cannot forecast <br>";
    }
    ?>
    <hr>
    <?php
        welcome();

        echo add_two_number(3, 2)
    ?>
    <hr>
    <?php 
        function noramlv() {
            static $a = 1;
            echo $a."<br>";
            $a++;
        }

        noramlv();
        noramlv();
        $a = 12;
    ?>
    <hr>
    <?php 
        function test() {
            echo $GLOBALS['a'];
            // print_r($GLOBALS);
        }
        test();
    ?>
</body>

</html>