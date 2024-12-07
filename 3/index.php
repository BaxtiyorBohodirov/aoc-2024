<?php 

$lines  = file_get_contents("input.txt");
$start_with_dont = str_starts_with($lines, "don't()");
$lines = preg_split("/don\'t\(\)/", $lines, -1, PREG_SPLIT_NO_EMPTY);

$answer = 0;

foreach($lines as $key => $line) {
    $start_with_do = str_starts_with($line, "do()");
    $do_lines = preg_split("/do\(\)/", $line, -1, PREG_SPLIT_NO_EMPTY);
    $i = 1;
    if((!$start_with_dont && $key == 0) || $start_with_do) $i = 0;
    for($i; $i < count($do_lines); $i++) {
        $matches = preg_split("/mul\(|\)/", $do_lines[$i], -1, PREG_SPLIT_NO_EMPTY);
        foreach($matches as $match) {
            $numbers = explode(",", $match);
            if(count($numbers) == 2 && is_numeric($numbers[0]) && is_numeric($numbers[1])) $answer += $numbers[0] * $numbers[1];
        }

    }
}




file_put_contents("answer.txt", $answer);

echo $answer;