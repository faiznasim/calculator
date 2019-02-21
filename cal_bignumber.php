<?php

class BigNumber
{
    public $number1;
    public $number2;
    public $base1;
    public $base2;

    public function __construct($x, $y, $p, $q)
    {
        // $this->number1 = str_split($x);
        // $this->number2 = str_split($y);
        $this->number1 = $x;
        $this->number2 = $y;
        $this->base1 = $p;
        $this->base2 = $q;
    }

    public function sum()
    {
        return $this->number1 + $this->number2;
        // $arr = [];
        // $carry = 0;
        // $len1 = strlen($this->number1);
        // $len2 = strlen($this->number2);
        // $len1 > $len2 ? $n = $len1-1 : $n = $len2-1;
        // $m = $len2 - 1;
        // for ($i = $n, $j=0; $i >= 0; $i--,$j++)
        // {
        //     if ($m >= 0)
        //         $arr[$j] = $str1[$i] + $str2[$m] + $carry;
        //     else
        //         $arr[$j] = $str1[$i] + $carry;
        //     if ($arr[$j] > 9)
        //     {
        //         $p = $arr[$j];
        //         $arr[$j] = $p % 10;
        //         $carry = (int)($p / 10);
        //     }
        //     else
        //         $carry = 0;
        //     $m--;
        // }
        // $arr[$j] = $carry;
        // var_dump(array_reverse($arr));
    }

    public function subtraction()
    {
        //$sub =  $this->number1 - $this->number2;
        return $this->number1 - $this->number2;
       // echo $sub;
    }
}