<?php

/**
 * Given an integer x, return true if x is a palindrome, and false otherwise.
 * 
 */


function isPalindrome($x)
{
    $x = str_split($x);
    $length = count($x);

    for ($i = 0; $i < $length / 2; $i++) {
        if ($x[$i] != $x[$length-1-$i]) {
            return false;
        }
    }

    return true;
}

$result = isPalindrome(121);
var_dump($result);