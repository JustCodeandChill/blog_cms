<?php
require_once('include/db.php');

if (isset($_POST["Submit"])) {
    if (isNotEmpty('eName') && isNotEmpty('ssn')) {
        echo 'it is not empty';
        $eName = $_POST['eName'];
        $ssn = $_POST['ssn'];
        $dept = $_POST['dept'];
        $salary = $_POST['salary'];
        $homeAddress = $_POST['ha'];
        global $dbConnection;
        //Prepare a sql query to insert value to dtbs
        $sql = "INSERT INTO empl_record(ename,ssn,dept,salary,homeadress)
        VALUES(:eNamE, :ssN, :depT, :salarY, :homeaddresS)";

        //Use sql injection prevention practice
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindValue('eNamE', $eName);
        $stmt->bindValue('ssN', $ssn);
        $stmt->bindValue('depT', $dept);
        $stmt->bindValue('salarY', $salary);
        $stmt->bindValue('homeaddresS', $homeAddress);

        //Run the sql query in dtbs
        $execute = $stmt->execute();

        //Only echo the result
        if ($execute) {
            echo '<h2> Record has been added to your database.</h2>';
        } else {
            echo '<h2> Smth wrong happenned. No insertion</h2>';
        }
    } else {
        echo "<h2>Please add name and ssn</h2>";
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
    <div>
        <form action="insertdtbs.php" method="POST">
            <fieldset>
                <span class="fieldInfo">Employee name: </span>
                <br>
                <input type="text" name="eName">
                <br>

                <span class="fieldInfo">SSN: </span>
                <br>
                <input type="text" name="ssn">
                <br>

                <span class="fieldInfo">Department: </span>
                <br>
                <input type="text" name="dept">
                <br>

                <span class="fieldInfo">Salary: </span>
                <br>
                <input type="text" name="salary">
                <br>

                <span class="fieldInfo">Home address: </span>
                <br>
                <textarea name="ha" id="" cols="30" rows="10"></textarea>
                <br>
                <input type="submit" name="Submit" value="submit your record">
            </fieldset>
        </form>
    </div>

</body>

</html>