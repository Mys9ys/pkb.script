<?php
$arr = [
    '5' => ['таран'],
    '6' => ['раскол', 'ученик', 'феникс'],
    '7' => [],
    '5_4' => ['рыбий глаз'],
    '8_3' => ['ловкость рук'],

];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/1dreams.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);