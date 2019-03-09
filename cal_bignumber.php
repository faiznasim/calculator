<?php

class BigNumber
{
    public $number1;
    public $number2;
    public $result;
    public $base1;
    public $base2;
    public $base3;

    public function __construct($firstOperand, $secondOperand, $firstOperandBase, 
        $secondOperandBase, $resultBase)
    {
        $this->number1 = $firstOperand;
        $this->number2 = $secondOperand;
        $this->base1 = $firstOperandBase;
        $this->base2 = $secondOperandBase;
        $this->base3 = $resultBase;
        if ($this->base1 == 2)
            $this->number1 = bindec($this->number1);
        if ($this->base2 == 2)
            $this->number2 = bindec($this->number2);
    }

    public function sum()
    {
        //return $this->number1 + $this->number2;
        $arr = [];
        $carry = 0;
        $len1 = strlen($this->number1);
        $len2 = strlen($this->number2);
        if ($len1 >= $len2)
        {
            $n = $len1-1;
            $m = $len2 - 1;
            $var1 = $this->number1;
            $var2 = $this->number2;
        }
        else
        {
            $n = $len2-1;
            $m = $len1 - 1;
            $var1 = $this->number2;
            $var2 = $this->number1;
        }
        $var1 = str_split($var1);
        $var2 = str_split($var2);
        for ($i = $n, $j=0; $i >= 0; $i--,$j++)
        {
            if ($m >= 0)
                $arr[$j] = $var1[$i] + $var2[$m] + $carry;
            else
                $arr[$j] = $var1[$i] + $carry;

            if ($arr[$j] > 9)
            {
                $p = $arr[$j];
                $arr[$j] = $p % 10;
                $carry = (int)($p / 10);
            }
            else
                $carry = 0;
            $m--;
        }
        if ($carry == 1)
            $arr[$j] = $carry;

        $arr = array_reverse($arr);
        //$this->store = implode("",$arr);
        $store =  implode("",$arr);
        if (isset($this->base3) && $this->base3!=10)
        {
            if ($this->base3 == 2)
            {
                $arr = decbin($store);
                $this->result = $arr;
                return $this->result;
            }
        }
        else
        {
            $this->result = $store;
            return $this->result;
        }
         
    }

    public function Sum2()
    {
        $firstNumber = "";
        $secondNumber = "";
        
        if(strlen($this->number1) < strlen($this->number2))
        {
            $firstNumber = $this->number2;
            $secondNumber = $this->number1;
        }
        else
        {
            $firstNumber = $this->number1;
            $secondNumber = $this->number2;
        }

        $sum = array(strlen($firstNumber));
        
        $firstNumber = strrev($firstNumber);
        $secondNumber = strrev($secondNumber);

        $carry = 0;
        for($i = 0; $i< strlen($firstNumber); $i++)
        {
            $tempSum = ($firstNumber[$i] + $secondNumber[$i] + $carry);
            $sum[$i] = $tempSum % 10;
            $carry = (int)($tempSum / 10);
        }

        if($carry > 0)
            $sum[] = $carry;

        $this->result = strrev(implode("", $sum));
        return $this->result;
    }

    public function subtraction()
    {
        $arr = [];
        $borrow = 0;

        $len1 = strlen($this->number1);
        $len2 = strlen($this->number2);
        $flag = 0;
        $ans = 0;
        if ($len1 > $len2)
        {
            $n = $len1-1;
            $m = $len2-1;
            $var1 = $this->number1;
            $var2 = $this->number2;
        }
        else if ($len1 < $len2)
        {
            $n = $len2-1;
            $m = $len1-1;
            $var1 = $this->number2;
            $var2 = $this->number1;
            $flag = 1;
        }
        else
        {
            for ($i = 0; $i < $len1; $i++)
            {
                if ($this->number1[$i] < $this->number2[$i])
                {
                    $n = $len2-1;
                    $m = $len1-1;
                    $var1 = $this->number2;
                    $var2 = $this->number1;
                    $flag = 1;
                    break;
                }
                else if ($this->number1[$i] > $this->number2[$i])
                {
                    $n = $len1-1;
                    $m = $len2-1;
                    $var1 = $this->number1;
                    $var2 = $this->number2;
                    break;
                }
                else
                {
                    $n = $len1-1;
                    $m = $len2-1;
                    $var1 = $this->number1;
                    $var2 = $this->number2;
                }
            }
        }

        for ($i = $n, $j=0; $i >= 0; $i--,$j++)
        {
            $p = $var1[$i];
            if ($var1[$i] < ($var2[$m]+$borrow) && $m >= 0)
            {
                $p = $p + 10;
            }
            if ($m < 0)
                $arr[$j] = $p - $borrow;
            else
                $arr[$j] = $p - ($var2[$m]+$borrow);

            if ($var1[$i] < ($var2[$m]+$borrow) && $m >= 0)
                $borrow = 1;
            else
                $borrow = 0;

            $m--;
        }
        $arr = array_reverse($arr);
        if ($flag == 1)
        {
            array_unshift($arr, "-");
            $this->result = implode("", $arr);
            return $this->result;
        }
        else
        {
            $this->result = implode ("", $arr);
            return $this->result;
        }
    }

    public function multiplication()
    {
        $arr = [];
        $carry = 0;
        // $y = str_split($this->number1);
        // $z = str_split($this->number2);
        $flag1 = 0;
        $flag2 = 0;
        // echo $y."   ".strlen($y)."\n";
        // echo $z."   ".strlen($z)."\n";
        // if ($y[0] == "-")
        // {
        //     $this->number1 = array_slice($y, 1, strlen($y)-1);
        //     $flag1 = 1;
        // }
        // if ($z[0] == "-")
        // {
        //     $this->number2 = array_slice($z, 1, strlen($z)-1);
        //     $flag2 = 1;
        // }
        $len1 = strlen($this->number1);
        $len2 = strlen($this->number2);
        //echo $len1."    ".$len2;
        if ($len1 > $len2 || $len1 == $len2)
        {
            $n = $len1-1;
            $m = $len2 - 1;
            $var1 = $this->number1;
            $var2 = $this->number2;
        }
        else
        {
            $n = $len2-1;
            $m = $len1 - 1;
            $var1 = $this->number2;
            $var2 = $this->number1;
        }
        if ($var1[0] == "-")
        {
            $flag1 = 1;
        }
        if ($var2[0] == "-")
        {
            $flag2 = 1;
        }
        $count = 0;
        for ($i=$m; $i>=$flag2; $i--)
        {
            $k = 0;
            $carry = 0;
            $carry2 = 0;
            $p = 0;
            if ($count > 0)
            {
                for ($a=0; $a < $count; $a++,$p++)
                {
                    $arr2[$a] = 0;
                    $arr[$a] = $arr2[$a] + $arr[$p];
                }
            }
            for ($j=$n; $j>=$flag1; $j--)
            {
                if ($count > 0)
                {
                    $arr2[$a] = $var1[$j] * $var2[$i];
                    if (isset($arr[$a]))
                        $arr[$a] = $arr2[$a] + $arr[$a] + $carry2;
                    else
                        $arr[$a] = $arr2[$a] + $carry2;
                    if ($arr[$a] > 9)
                    {
                        $z = $arr[$a];
                        $arr[$a] = $z % 10;
                        $carry2 = (int)($z / 10);
                    }
                    else
                        $carry2 = 0;
                    $a++;
                }   
                else    // for 1st line
                {
                    $arr[$k] = $var1[$j] * $var2[$i] + $carry; 
                
                    if ($arr[$k] > 9)
                    {
                        $p = $arr[$k];
                        $arr[$k] = $p % 10;
                        $carry = (int)($p / 10);
                    }
                    else
                        $carry = 0;
                    $k++;
                }

        }

        if ($carry2 > 0)
            $arr[$a] = $carry2;
        else if ($carry > 0)
            $arr[$k] = $carry;
    
            $count++;
        }
        $arr = array_reverse($arr);
        //$store = implode("",$arr);
        if (($flag1==0 && $flag2==0) || ($flag1==1 && $flag2==1))
        {
            $this->result = implode("",$arr);
            return $this->result;
        }
            //echo $store;
        else
        {
            //echo "-";
            array_unshift($arr, "-");
            $this->result = implode("",$arr);
            return $this->result;
            //echo $store;
        }
    }

    public function fact_calculation($string1, $string2)
    {
        //echo "Receive : ".$string1." ".$string2."\n";
        $arr = [];
        $carry = 0;
        $flag1 = 0;
        $flag2 = 0;
        $len1 = strlen($string1);
        $len2 = strlen($string2);
        //echo "len : ".$len1."    ".$len2."\n";
        if ($len1 > $len2 || $len1 == $len2)
        {
            $n = $len1 - 1;
            $m = $len2 - 1;
            $var1 = $string1;
            $var2 = $string2;
        }
        else
        {
            $n = $len2 - 1;
            $m = $len1 - 1;
            $var1 = $string2;
            $var2 = $string1;
        }
        $var1 = str_split($var1);
        $var2 = str_split($var2);
        $count = 0;
        for ($i=$m; $i>=$flag2; $i--)
        {
            $k = 0;
            $carry = 0;
            $carry2 = 0;
            $p = 0;
            if ($count > 0)
            {
                for ($a=0; $a < $count; $a++,$p++)
                {
                    $arr2[$a] = 0;
                    $arr[$a] = $arr2[$a] + $arr[$p];
                }
            }
            for ($j=$n; $j>=$flag1; $j--)
            {
                if ($count > 0)
                {
                    $arr2[$a] = $var1[$j] * $var2[$i];
                    if (isset($arr[$a]))
                        $arr[$a] = $arr2[$a] + $arr[$a] + $carry2;
                    else
                        $arr[$a] = $arr2[$a] + $carry2;
                    if ($arr[$a] > 9)
                    {
                        $z = $arr[$a];
                        $arr[$a] = $z % 10;
                        $carry2 = (int)($z / 10);
                    }
                    else
                        $carry2 = 0;
                    $a++;
                }   
                else    // for 1st line
                {
                    $arr[$k] = $var1[$j] * $var2[$i] + $carry;
                
                    if ($arr[$k] > 9)
                    {
                        $p = $arr[$k];
                        $arr[$k] = $p % 10;
                        $carry = (int)($p / 10);
                    }
                    else
                        $carry = 0;
                    $k++;
                }

            }

            if ($carry2 > 0)
                $arr[$a] = $carry2;
            else if ($carry > 0)
                $arr[$k] = $carry;
        
            $count++;
        }
        $arr = array_reverse($arr);
        $arr = implode("",$arr);
        // echo $arr;
        // echo "\n";
        return $arr;
        //echo "  ".$store."\n";
        //return $store;
    }

    public function factorial()
    {
        $store = $this->number1;
        //$c = $this->number1;
        $arr = $this->number1;
        $store--;
        for ($i = $store; $i >= 2; $i--)
        {
            //echo $arr."  ".$arr2."\n";
            $arr2 = $store;
            //echo $arr."  ".$arr2."\n";
            $arr = $this->fact_calculation($arr, $arr2);
            //echo $i." : ".$arr."\n";
            $store--;
        }
        $this->result = $arr;
        return $arr;
    }

}
// $bignum = new BigNumber("9111", "1010", 10, 10, 10);
// echo $bignum->Sum2();

//  $bignum = new BigNumber("-0", "-0", 10, 10, 10);
// $bignum->multiplication();

// $bignum = new BigNumber("5", "", 10, 10, 10);
// $bignum->factorial();

// $bignum = new BigNumber("205", "310", 10, 10, 10);
// $bignum->subtraction();