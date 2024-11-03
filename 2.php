<?php

// You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.
// You may assume the two numbers do not contain any leading zero, except the number 0 itself.

function addTwoNumbers($l1, $l2)
{
    $num1 = intval(strrev(implode('',$l1)));
    $num2 = intval(strrev(implode('',$l2)));
    $sum = array_reverse(str_split($num1 + $num2));
    return $sum;
}

$l1 = [2,4,3];
$l2 = [5,6,4];
$result = addTwoNumbers($l1, $l2);
var_dump($result);
