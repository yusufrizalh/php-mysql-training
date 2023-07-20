<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTTP Methods</title>
</head>

<body>
    <h3>Perform GET or POST Method</h3>
    <hr>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="name">Enter Name</label> <br><br>
        <input type="text" name="name" autocomplete="off"> <br><br>
        <input type="submit" value="Submit"> <br><br>
    </form>
    <?php
    if (isset($_POST['name'])) {
        echo "<h3>My name is " . $_POST["name"] . "</h3>";
    }
    ?>
</body>

</html>