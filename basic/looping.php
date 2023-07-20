<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looping Statements</title>
</head>

<body>
    <?php
    $a = 1;
    while ($a <= 10) {
        echo "The number is $a <br>";
        $a++;   // increment
    }
    echo "<br>";
    echo "==================================== <br>";

    $b = 1;
    do {
        echo "The number is $b <br>";
        $b++;
    } while ($b <= 10);
    echo "<br>";
    echo "==================================== <br>";

    for ($c = 1; $c <= 5; $c++) {
        echo "The number is $c <br>";
    }
    echo "<br>";
    echo "==================================== <br>";

    $names = array("Angelica", "Helena", "Daniel", "Olla", "Chaterine");
    foreach ($names as $name) {
        echo "The name is $name <br>";
    }
    echo "<br>";
    echo "==================================== <br>";

    $persons = array(
        "name" => "Jennifer",
        "email" => "jennifer@email.com",
        "age" => 28,
        "active" => true,
    );
    foreach ($persons as $key => $value) {
        echo "$key : $value <br>";
    }
    ?>
</body>

</html>