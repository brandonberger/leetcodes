<?php

// Write a function to find the longest common prefix string amongst an array of strings.
// If there is no common prefix, return an empty string "".

function longestCommonPrefix($strs)
{
    $prefixes = [];
    $longestWord = 0;

    if (count($strs) == 1) {
        return $strs[0];
    }


    sort($strs);

    foreach ($strs as $str) {
        if (strlen($str) > $longestWord) {
            $longestWord = strlen($str);
        }
    }

    for ($i = 0; $i < count($strs); $i++) {
        for ($k = 1; $k <= $longestWord; $k++) {
            for ($j = $i; $j < count($strs); $j++) {
                if (strlen($strs[$i]) >= $k && strlen($strs[$j]) >= $k) {
                    if (substr($strs[$i], 0, $k) == substr($strs[$j], 0, $k)) {
                        $prefixes[substr($strs[$i], 0, $k)] = substr($strs[$i], 0, $k);
                    } else {
                        unset($prefixes[substr($strs[$i], 0, $k)]);
                        break 3;
                    }
                } else {
                    break 3;
                }
            }
        }
    }


    $longestPrefix = "";
    foreach ($prefixes as $prefix) {
        if (strlen($prefix) > strlen($longestPrefix)) {
            $longestPrefix = $prefix;
        }
    }
    return $longestPrefix;
}

$result = longestCommonPrefix(["flower","flow","flight"]);
var_dump($result);