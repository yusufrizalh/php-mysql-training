<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions</title>
</head>

<body>
    <?php
    function newLine()
    {
        echo "<br>============================<br>";
    }

    function whatIsToday()
    {
        echo "Today is " . date('l');
    }

    // memanggil fungsi
    whatIsToday();
    newLine();

    // function with parameter
    function getSum($num1 = 10, $num2)
    {
        $result = $num1 + $num2;
        $show = "Sum of two numbers $num1 and $num2 is $result";
        return $show;
    }
    echo getSum(10, 10);
    newLine();

    $greeting = "Hello, Inixindo!";
    function test()
    {
        global $greeting;
        echo '$greeting inside function: ' . $greeting . "<br>";
    }
    test();
    echo '$greeting outside function: ' . $greeting . "<br>";
    newLine();

    echo decbin(187); // convert dec to bin
    newLine();
    echo bindec(1001101001101);    // convert bin to dec
    newLine();
    echo rand(1, 10);
    newLine();
    echo ceil(4.656754376);    // pembulatan ke atas
    newLine();
    echo floor(4.656754376);    // pembulatan ke bawah
    ?>
</body>

</html>