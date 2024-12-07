<?php 


$lines  = file_get_contents("input.txt");
$lines = explode("\n", $lines);
$right = [];
$left = [];
foreach($lines as $line) {
    preg_match_all('/\d+/', $line, $numbers);
    $left[] = $numbers[0][0];
    $right[] = $numbers[0][1];
}

// sort($left);
// sort($right);

$answer = 0;
$counts = array_count_values($right);
foreach($left as $item) {
    $answer +=  $item * (isset($counts[$item])?$counts[$item]:0);
}

file_put_contents("answer.txt", $answer);

echo $answer;