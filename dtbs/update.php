<?php
require_once('include/db.php');
print_r($_GET);
$searchQueryParameter = $_GET["id"];

if (isset($_POST["Submit"])) {

    echo 'it is not empty';
    $eName = $_POST['eName'];
    $ssn = $_POST['ssn'];
    $dept = $_POST['dept'];
    $salary = $_POST['salary'];
    $homeAddress = $_POST['ha'];
    global $dbConnection;
    //Prepare a sql query to insert value to dtbs
    $sql = "UPDATE empl_record SET ename='$eName', ssn='$ssn', dept='$dept', salary='$salary', 
    homeadress='$homeAddress' WHERE id='$searchQueryParameter' ";

    //Run the sql query in dtbs
    $execute = $dbConnection->query($sql);

    //Only echo the result
    if ($execute) {
        echo '<script> window.open("viewdtbs.php?id=Record Update Successfully", "_self")</script>';
    } else {
        echo '<h2> Smth wrong happenned. No insertion</h2>';
    }
}

function isNotEmpty($name)
{
    return !empty($_POST[$name]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data to dtbs</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <?php
    global $dbConnection;
    $sql = "SELECT * FROM empl_record WHERE id='$searchQueryParameter'";
    $stmt = $dbConnection->query($sql);
    while ($dataRow = $stmt->fetch()) {
        $id = $dataRow["id"];
        $eName = $dataRow["ename"];
        $ssn = $dataRow["ssn"];
        $dept = $dataRow["dept"];
        $salary = $dataRow["salary"];
        $homeAddress = $dataRow["homeadress"];
        print_r($dataRow);
    }
    ?>

    <div>
        <form action="Update.php?id=<?php echo $searchQueryParameter; ?>" method="POST">
            <fieldset>
                <span class="fieldInfo">Employee name: </span>
                <br>
                <input type="text" name="eName" value="<?php echo $eName ?>">
                <br>

                <span class=" fieldInfo">SSN: </span>
                <br>
                <input type="text" name="ssn" value="<?php echo $ssn ?>">
                <br>

                <span class="fieldInfo">Department: </span>
                <br>
                <input type="text" name="dept" value="<?php echo $dept ?>">
                <br>

                <span class="fieldInfo">Salary: </span>
                <br>
                <input type="text" name="salary" value="<?php echo $salary ?>">
                <br>

                <span class="fieldInfo">Home address: </span>
                <br>
                <textarea name="ha" id="" cols="30" rows="10"><?php echo $homeAddress ?></textarea>
                <br>
                <input type="submit" name="Submit" value="submit your record">
            </fieldset>
        </form>
    </div>

</body>

</html>