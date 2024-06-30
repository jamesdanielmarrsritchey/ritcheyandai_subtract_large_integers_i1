<?php
function subtractLargeNumbers(string $num1, string $num2): string|bool {
    // Check for negative inputs
    if ($num1[0] === '-' || $num2[0] === '-') {
        return false; // Return FALSE if either input is negative
    }

    // Determine if the first number is less than the second
    $isNegative = false;
    if (strlen($num1) < strlen($num2) || (strlen($num1) == strlen($num2) && strcmp($num1, $num2) < 0)) {
        $isNegative = true;
        // Swap numbers
        [$num1, $num2] = [$num2, $num1];
    }

    // Reverse both numbers to start subtraction from the least significant digit
    $num1 = strrev($num1);
    $num2 = strrev($num2);

    $result = '';
    $carry = 0;
    $length = max(strlen($num1), strlen($num2));

    // Pad the shorter number with zeros
    $num1 = str_pad($num1, $length, '0');
    $num2 = str_pad($num2, $length, '0');

    for ($i = 0; $i < $length; $i++) {
        $digit1 = $num1[$i];
        $digit2 = $num2[$i];

        // Subtract the digits and the carry
        $diff = (int)$digit1 - (int)$digit2 - $carry;

        // If subtraction results in a negative number, carry 1 and add 10 to the diff
        if ($diff < 0) {
            $carry = 1;
            $diff += 10;
        } else {
            $carry = 0;
        }

        $result .= $diff;
    }

    // Remove leading zeros and reverse back
    $result = ltrim(strrev($result), '0');

    // If result is empty, it means the result is 0
    if (empty($result)) {
        return '0';
    }

    // Prepend a minus sign if the result is negative
    if ($isNegative) {
        $result = '-' . $result;
    }

    return $result;
}
?>