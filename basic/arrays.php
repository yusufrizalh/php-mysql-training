<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>

<body>
    <?php
    // indexed array
    $cars = array("BMW", "Volvo", "Mercedez", "Toyota", "Mitsubishi");
    print_r($cars);

    echo "<br>================<br>";

    // associative array
    $persons = array(
        "Chaterine" => 30,
        "Laura" => 20,
        "John" => 37
    );
    print_r($persons);

    echo "<br>================<br>";

    // multidimentional array
    $contacts = array(
        array(
            "name" => "Steven",
            "email" => "steven@email.com",
            "status" => true
        ),
        array(
            "name" => "Natalie",
            "email" => "natalie@email.com",
            "status" => false
        ),
        array(
            "name" => "Queenza",
            "email" => "queenza@email.com",
            "status" => true
        ),
    );
    echo "Name is " . $contacts[0]["name"] . "<br>";
    echo "Email is " . $contacts[0]["email"] . "<br>";
    echo "Status is " . $contacts[0]["status"] . "<br>";
    ?>
</body>

</html>