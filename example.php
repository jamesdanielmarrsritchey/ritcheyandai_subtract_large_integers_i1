<?php
$location = realpath(dirname(__FILE__));
require_once $location . '/function.php';
$num1 = '10000000000000000000000000000000000000';
$num2 = '6';
$return = subtractLargeNumbers($num1, $num2);
var_dump($return);