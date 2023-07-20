<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // komentar 1 baris
    # ini juga komentar
    /* komentar
        multi baris
    */
    echo "Hello, Inixindo!";

    // vriabel dalam PHP ditandai dengan simbol $
    // variabel PHP bersifat case sensitive
    $color = "red";         // tipe data String
    $Color = "blue";
    $COLOR = "green";
    $number = 100;          // tipe data integer
    $number = 1000;
    $number1 = 50.75;       // tipe data double
    $status = true;         // tipe data boolen

    // mendeklarasikan constant
    define("url", "http://inixindo.id");

    echo "<br>";

    echo 'The color is $color';
    echo "<br>";
    echo "The color is " . $Color;
    echo "<br>";
    echo "The color is " . $COLOR;
    echo "<br>";
    echo "My number is " . $number;
    echo "<br>";
    echo "My decimal number is " . $number1;
    echo "<br>";
    echo "My status is " . $status;
    echo "<br>";
    echo "Thank you for visiting " . url;
    ?>
</body>

</html>