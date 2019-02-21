<?php
require_once 'cal_bignumber.php';
$num1 = $_GET["f_num"];
$num2 = $_GET["s_num"];
$base1 = $_GET["f_num_base"];
$base2 = $_GET["s_num_base"];
$operator = $_GET["opr"];

$bignum = new BigNumber($num1, $num2, $base1, $base2);

if ($operator == 1)
{
    //$bignum = new BigNumber($num1, $num2);
    $sum = $bignum->sum();
    echo $sum;
}

if ($operator == 2)
{
    //$bignum = new BigNumber($num1, $num2);
    $subtraction = $bignum->subtraction();
    echo $subtraction;
}

