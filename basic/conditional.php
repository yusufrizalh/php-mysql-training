<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditional Statements</title>
</head>

<body>
    <?php
    $d = date("D"); // Mon
    if ($d == "Fri") {
        echo "Have a nice weekend...";
    } elseif ($d == "Sun") {
        echo "Have a nice Sunday...";
    } else {
        echo "Have a nice day...";
    }
    echo "<br>";

    $age = 18;
    if ($age < 19) {
        echo "Child";
    } else {
        echo "Adult";
    }
    echo "<br>";

    // ternary operator
    echo ($age < 19) ? "Child" : "Adult";
    echo "<br>";

    // ternary untuk null
    $name = $_GET['name'] ?? "ANONYMOUS";   // request dengan metode GET
    echo "Name is $name";
    echo "<br>";

    $today = date("D"); // mengambil nilai Day saja hari ini
    switch ($today) {
        case 'Mon':
            echo "Today is Monday";
            break;
        case 'Tue':
            echo "Today is Tuesday";
            break;
        case 'Wed':
            echo "Today is Wednesday";
            break;
        case 'Thu':
            echo "Today is Thursday";
            break;
        case 'Fri':
            echo "Today is Friday";
            break;
        case 'Sat':
            echo "Today is Saturday";
            break;
        case 'Sun':
            echo "Today is Sunday";
            break;
        default:
            echo "No day available!";
            break;
    }

    ?>

</body>

</html>