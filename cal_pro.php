<?php
require_once 'cal_bignumber.php';
$num1 = $_GET["f_num"];
$num2 = $_GET["s_num"];
$base1 = $_GET["f_num_base"];
$base2 = $_GET["s_num_base"];
$operator = $_GET["opr"];
$base3 = $_GET["ans_base"];

$bignum = new BigNumber($num1, $num2, $base1, $base2, $base3);

if ($operator == 1)
{
   $sumResult = $bignum->sum();
   echo $sumResult;
}

if ($operator == 2)
{
    $subtractionResult = $bignum->subtraction();
    echo $subtractionResult;
}

if ($operator == 4)
{
    $multiplicationResult = $bignum->multiplication();
    echo $multiplicationResult;
}

if ($operator == 5)
{
    $factorialResult = $bignum->factorial();
    echo $factorialResult;
}

