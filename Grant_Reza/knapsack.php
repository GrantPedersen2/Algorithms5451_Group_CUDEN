<?php
#########################################################
# 0-1 Knapsack Problem Solve with memoization optimize
# $w = weight of item
# $v = value of item
#########################################################

$items = $_POST['items'];
$w = $_POST['weights'];
$v = $_POST['values'];
$MaxWeight = $_POST['maxWeight'];

#function call for knapsack
function knapSack($W, $wght, $val)
{
    $i = 0;
    $K = array(array());
    
    for(; $i < count($val); $i++)
    {
        for($weight = 0; $weight < $W; $weight++)
        {
            if($i == 0 | $w == 0)
            {
                $K[$i][$w] = 0;
            }
            else if($wght[$i - 1] <= $weight)
            {
                $K[$i][$w] = max($val[$i-1] + $K[i-1][$weight-$wght[$i-1]], $K[$i-1][$weight]);
            }
            else
            {
                $K[$i][$weight] = $K[$i-1][$weight];
            }
        }
    }
    
    return $K[count($val) - 1][$W];
}

function DisplayTable()
{
    $totalVal = 0;
    $totalWt = 0;
    echo "<b>Items:</b><br>".join(", ",$items)."<br>";

    echo "<b>Chosen Items:</b><br>";
    echo "<table border cellspacing=0>";
    echo "<tr><td>Item</td><td>Value</td><td>Weight</td></tr>";
        foreach($items as $key) 
        {
            $totalVal += $v[$key];
            $totalWt += $w[$key];
            echo "<tr><td>".$items[$key]."</td><td>".$v[$key]."</td><td>".$w[$key]."</td></tr>";
        }
    echo "<tr><td align=right><b>Totals</b></td><td>$totalVal</td><td>$totalWt</td></tr>";
    echo "</table><hr>";
}

$returnVal = knapSack($MaxWeight, $w, $v);

DisplayTable();

?>