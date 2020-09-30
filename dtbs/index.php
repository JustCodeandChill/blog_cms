<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data to dtbs</title>
    <link rel="stylesheet" href="style.css">
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