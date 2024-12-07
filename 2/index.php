<?php 

$lines  = file_get_contents("input.txt");
$lines = explode("\n", $lines);
$matrix = [];
$answer = count($lines);

foreach($lines as $line) {
    preg_match_all('/\d+/', $line, $numbers);
    $numbers = $numbers[0];
    
    $check = checkNumbers($numbers);

    if(!$check) {
        for($i = 0; $i < count($numbers); $i++) {
            $check = checkNumbers($numbers, $i);
            if($check) break;
        }
        if(!$check) $answer -= 1;
    }
}


function checkNumbers($numbers, $index = null) {
    if(!is_null($index)) {
        array_splice($numbers, $index, 1);
    }
    $diff = 0;
    $p_diff = 0;
    for($j = 0; $j < count($numbers) - 1; $j++) {

        $diff = $numbers[$j + 1] - $numbers[$j];
        if(abs($diff) > 3 || $diff == 0 || ($p_diff * $diff < 0)) {
            return false;
        }
        $p_diff = $diff;
    }

    return true;
}

file_put_contents("answer.txt", $answer);

echo $answer;