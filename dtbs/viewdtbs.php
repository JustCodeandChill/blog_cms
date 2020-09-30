<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View data from dtbs</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <table>
        <h2><?php echo $_GET["id"]; ?></h2>
        <div>
            <fieldset>
                <form action="viewdtbs.php" method="GET">
                    <input type="text" name="search" value="" placeholder="Provide name and ssn to search">
                    <input type="submit" name="searchB" value="Search Record">
                </form>
            </fieldset>
        </div>
        <?php
        print_r($GLOBALS);
        require_once('include/db.php');
        if (isset($_GET["searchB"])) {
            global $dbConnection;
            $search = $_GET["search"];
            $sql = "SELECT * FROM empl_record WHERE ename=:searcH OR ssn=:searcH";
            $stmt = $dbConnection->prepare($sql);
            $stmt->bindValue(':searcH', $search);
            $stmt->execute();

            while ($dataRow = $stmt->fetch()) {
                $id = $dataRow["id"];
                $eName = $dataRow["ename"];
                $ssn = $dataRow["ssn"];
                $dept = $dataRow["dept"];
                $salary = $dataRow["salary"];
                $homeAddress = $dataRow["homeadress"];
        ?>
                <table>
                    <caption>Search Result</caption>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ssn</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>HomeAddress</th>
                        <th>Update</th>
                    </tr>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $eName; ?></td>
                        <td><?php echo $ssn; ?></td>
                        <td><?php echo $dept; ?></td>
                        <td><?php echo $salary; ?></td>
                        <td><?php echo $homeAddress; ?></td>
                        <td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>

                    </tr>
                </table>
        <?php }
        }
        ?>
        <table>
            <caption>View from database</caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ssn</th>
                <th>Department</th>
                <th>Salary</th>
                <th>HomeAddress</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php

            global $dbConnection;
            $sql = "SELECT * FROM empl_record";
            $stmt = $dbConnection->query($sql);
            while ($dataRow = $stmt->fetch()) {
                $id = $dataRow["id"];
                $eName = $dataRow["ename"];
                $ssn = $dataRow["ssn"];
                $dept = $dataRow["dept"];
                $salary = $dataRow["salary"];
                $homeAddress = $dataRow["homeadress"];

            ?>

                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $eName; ?></td>
                    <td><?php echo $ssn; ?></td>
                    <td><?php echo $dept; ?></td>
                    <td><?php echo $salary; ?></td>
                    <td><?php echo $homeAddress; ?></td>
                    <td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
        <div>

        </div>

</body>

</html>