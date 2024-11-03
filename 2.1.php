<?php

// You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.
// You may assume the two numbers do not contain any leading zero, except the number 0 itself.


class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}


function addTwoNumbers($l1, $l2)
{   
    $num1 = null;
    $num2 = null;
    for ($i = 0; $i < count($l1); $i++) {
        $num1 .= $l1[$i]->val;
    }
    for ($i = 0; $i < count($l2); $i++) {
        $num2 .= $l2[$i]->val;
    }
    $sum = str_split(intval(strrev($num1)) + intval(strrev($num2)));
    return $sum;
}

$l1Arr = [2,4,3];
$l2Arr = [5,6,4];

function listArrToLinkedList($listArr)
{
    $list = [];
    for ($i = 0; $i < count($listArr); $i++) {
        $next = ($i+1 != count($listArr)) ? $listArr[$i+1] : null;
        $list[] = new ListNode($listArr[$i], $next);
    }

    return $list;
}


$l1 = listArrToLinkedList($l1Arr);
$l2 = listArrToLinkedList($l2Arr);

$result = addTwoNumbers($l1, $l2);
var_dump($result);
