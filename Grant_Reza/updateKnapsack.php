<?php
#########################################################
# 0-1 Knapsack Problem Solve with memoization optimize
# $w = weight of item
# $v = value of item
#########################################################
$items = array("box", "toy", "food", "book");#$_POST['items'];
$w = array(1, 2, 4, 5);#$_POST['weights'];
$v = array(1, 3, 4, 5);#$_POST['values'];
$MaxWeight = (int)4;#$_POST['maxWeight'];

#function call for knapsack
function knapSack($W, $wght, $val, $items)
{
	
	echo "<b>Items:</b><br>".join(", ",$items)."<br>";
    echo "<b>Chosen Items:</b><br>";
    echo "<table border cellspacing=0>";
    echo "<tr><td>Item</td><td>Value</td><td>Weight</td></tr>";
	$totalVal=0;
	$totalWt =0;
	 foreach($items as $key=>$value) 
        {
            $totalVal += $val[$key];
            $totalWt += $wght[$key];
            echo "<tr><td>".$items[$key]."</td><td>".$val[$key]."</td><td>".$wght[$key]."</td></tr>";
        }
    echo "<tr><td align=right><b>Totals</b></td><td>$totalVal</td><td>$totalWt</td></tr>";
    echo "</table><hr>";
	echo "Max Weight is: " . $GLOBALS['MaxWeight'];
    $i = 0;
    $K = array(array());
	$maxVal = count($val);
	
    for(; $i < $maxVal; $i++)
    {
        for($weight = 0; $weight < $W; $weight++)
        {
            if($i == 0 || $weight == 0)
            {
                $K[$i][$weight] = 0;
            }
            else if($wght[$i - 1] <= $weight)
            {
                $K[$i][$weight] = max($val[$i-1] + $K[$i-1][$weight-$wght[$i-1]], $K[$i-1][$weight]);
            }
            else
            {
                $K[$i][$weight] = $K[$i-1][$weight];
            }
			
        }
		//print '<br>$k['.$i.']['.$weight.']='.$K[$i][$weight];
    }
	//print'<pre>';
	//print_r($K);
	print '<table border="1">';
	foreach($K as $row_index=>$row_value){
	print '<tr>';
		foreach($row_value as $column_index=>$column_value){
			print '<td>'.$column_value.'</td>';
		}
		print'</tr>';
	}
	print '</table>';
    return $K[$maxVal - 1][$W - 1];
}


$returnVal = knapSack($MaxWeight, $w, $v, $items);

echo "\nThe result is: ".$returnVal;
