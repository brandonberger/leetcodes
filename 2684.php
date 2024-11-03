<?php

// You are given a 0-indexed m x n matrix grid consisting of positive integers.
// You can start at any cell in the first column of the matrix, and traverse the grid in the following way:
// From a cell (row, col), you can move to any of the cells: (row - 1, col + 1), (row, col + 1) and (row + 1, col + 1) such that the value of the cell you move to, should be strictly bigger than the value of the current cell.

// Return the maximum number of moves that you can perform.

$grid = [[1,2,1,1],[5,2,7,8],[9,4,2,1],[10,9,13,15]];


function maxMoves($grid)
{
    $maxMoves = 0;
    $gridSize = count($grid);
    $paths = [];

    foreach ($grid as $key => $row) {
        $startingPoint = $row[0];
        $paths[$key][] = $startingPoint;
        $currentValue = $startingPoint;
        $currentCord = [0, 0];

        echo '<br><br>';
        echo $startingPoint;
        echo ' -> ';

        for ($i = 0; $i < $gridSize; $i++) {
            // if (isset($grid[$i][$key+1])) {             
                
            //     // echo $grid[$i][$key+1];
            //     // echo $row[$i];
            // }

            // echo $grid[$currentCord[0]][$currentCord[1]];
            // echo $grid[$currentCord[0]][$currentCord[1]+1];
            if ($grid[$currentCord[0]+1][$currentCord[1]+1] > $currentValue) {
                // side
                // echo 'side';
                echo $grid[$currentCord[0]+1][$currentCord[1]+1];
                $currentValue = $grid[$currentCord[0]+1][$currentCord[1]+1];
                $paths[$key][] = $grid[$currentCord[0]+1][$currentCord[1]+1];
                $currentCord = [$currentCord[0]+1, $currentCord[1]+1];
            } else if (isset($grid[$currentCord[0]+1][$currentCord[1]+1]) && $grid[$currentCord[0]+1][$currentCord[1]+1] > $currentValue) {
                // down
                echo 'down';
                echo $grid[$currentCord[0]+1][$currentCord[1]+1];
                $currentValue = $grid[$currentCord[0]+1][$currentCord[1]+1];
                $paths[$key][] = $grid[$currentCord[0]+1][$currentCord[1]+1];
                $currentCord = [$currentCord[0]+1, $currentCord[1]+1];
            } else if (
                    array_key_exists($currentCord[0]-1, $grid) &&
                    array_key_exists($currentCord[0]+1, $grid[$currentCord[0]-1]) &&
                    $grid[$currentCord[0]-1][$currentCord[1]+1] > $currentValue
                ) {
                    // up
                    echo 'up';
                echo $grid[$currentCord[0]-1][$currentCord[1]+1];
                $currentValue = $grid[$currentCord[0]-1][$currentCord[1]+1];
                $paths[$key][] = $grid[$currentCord[0]+1][$currentCord[1]+1];
                $currentCord = [$currentCord[0]-1, $currentCord[1]+1];
            } else {
                $currentCord = [0, $i];
            }
        }


        // I can move up diagnolly, right, or down diagnolly. The cell has to have a larger integer than current cell.
        // since were in the current row, we can first check our neighbor.
    }
    
    echo '<br><br>';
    foreach ($paths as $path) {
        foreach ($path as $p) {
            echo $p;
        }
        echo '<br>';
    }

    // return $maxMoves;
}

function displayGrid($grid)
{
    $html = '<table>';
    foreach ($grid as $row) {
        $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td>'.$cell.'</td>';
            }
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}

echo displayGrid($grid);
echo '<br><br>';
// echo 'Max moves: ';
echo maxMoves($grid);


?>


<style> 
    td { 
        border: solid 1px #333; 
        text-align:center;
        width: 50px;
        height: 50px;
    } 
</style>