<?php

// A sentence is a list of words that are separated by a single space with no leading or trailing spaces.

// /For example, "Hello World", "HELLO", "hello world hello world" are all sentences.

// Words consist of only uppercase and lowercase English letters. Uppercase and lowercase English letters are considered different.


// A sentence is circular if:
// The last character of a word is equal to the first character of the next word.
// The last character of the last word is equal to the first character of the first word.

// For example, "leetcode exercises sound delightful", "eetcode", "leetcode eats soul" are all circular sentences. However, "Leetcode is cool", "happy Leetcode", "Leetcode" and "I like Leetcode" are not circular sentences.
// Given a string sentence, return true if it is circular. Otherwise, return false.

// CONSTRAINTS 
// 1 <= sentence.length <= 500
// sentence consist of only lowercase and uppercase English letters and spaces.
// The words in sentence are separated by a single space.
// There are no leading or trailing spaces.


$sentence = 'leetcode eats soul';


function isCircularSentence($sentence)
{
    // Explode 
    $sentenceArr = explode(' ', $sentence);

    $veryFirstLetter = $sentenceArr[0][0];

    for ($i = 0; $i < count($sentenceArr); $i++) {

        if ($i == count($sentenceArr)-1) {
            if ($veryFirstLetter == $sentenceArr[$i][-1]) {
                return true;
            } else {
                return false;
            }
        }

        $currentLastLetter = $sentenceArr[$i][-1];
        $nextFirstLetter = $sentenceArr[$i+1][0];
        if ($currentLastLetter == $nextFirstLetter) {
            continue;
        } else {
            return false;
        }
    }

    return true;

    // var_dump($sentenceArr);
}


$result = isCircularSentence($sentence);

if ($result) {
    echo 'Yes!';
} else {
    echo 'No!';
}