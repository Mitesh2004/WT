<?php

function mod($a, $b)
{
    return $a % $b;
}

function power($a, $b)
{
    return $a ** $b;
}

function sumOfFirstN($n)
{
    return array_sum(range(1, $n));
}

function factorial($n)
{
    return array_product(range(1, $n)) ?: 1;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    echo "Modulus: " . mod($num1, $num2) . "<br>";
    echo "Power: " . power($num1, $num2) . "<br>";
    echo "Sum of first $num1 numbers: " . sumOfFirstN($num1) . "<br>";
    echo "Factorial of $num2: " . factorial($num2) . "<br>";
}

?>