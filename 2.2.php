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
    while ($l1 !== null) {
        $num1 .= $l1->val;
        $l1 = $l1->next;
    }

    while ($l2 !== null) {
        $num2 .= $l2->val;
        $l2 = $l2->next;
    }

    $num1 = intval(strrev($num1));
    $num2 = intval(strrev($num2));
    $sum = str_split(strrev($num1 + $num2));

    $dummyHead = new ListNode(0);
    $currentNode = $dummyHead;
    foreach ($sum as $int) {
        $currentNode->next = new ListNode(intval($int));
        $currentNode = $currentNode->next;
    }
    return $dummyHead->next;
}

$l1Arr = [2,4,3];
$l2Arr = [5,6,4];

function listArrToLinkedList($listArr)
{
    $dummyHead = new ListNode(0);
    $currentNode = $dummyHead;
    foreach ($listArr as $listItem) {
        $currentNode->next = new ListNode($listItem);
        $currentNode = $currentNode->next;
    } 

    return $dummyHead->next;
}


$l1 = listArrToLinkedList($l1Arr);
$l2 = listArrToLinkedList($l2Arr);

$result = addTwoNumbers($l1, $l2);
var_dump($result);
