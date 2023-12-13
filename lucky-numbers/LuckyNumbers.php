<?php

class LuckyNumbers
{
    private function array_of_digits_to_int(array $array_of_digits): int
    {
        $array_length = count($array_of_digits);
        if ($array_length === 0) { return 0; }
        $number = 0;
        for($i = 0; $i < $array_length; $i++)
        {
            // add the digit times the power of 10 it represents to the number
            $number += pow(10, ($i)) * $array_of_digits[$array_length - $i - 1];
        }
        return $number;
    }

    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        return $this->array_of_digits_to_int($digitsOfNumber1) + $this->array_of_digits_to_int($digitsOfNumber2);
    }

    public function isPalindrome(int $number): bool
    {
        $int_array = str_split($number);
        $num_digits = strlen($number);
        for($i = 0; $i < ($num_digits / 2); $i++){
            if ($int_array[$i] != $int_array[$num_digits - 1 - $i])
            {
                return false;
            }
        }
        return true;
    }

    public function validate(string $input): string
    {
        if (empty($input) && $input != "0") {
            return 'Required field';
        } else if ((int) $input > 0) {
            return '';
        } else {
            return 'Must be a whole number larger than 0';
        }
    }
}
