<?php
$arr = [
    '5' => ['таран'],
    '6' => ['раскол', 'ученик', 'феникс'],
    '7' => [],
    '5_4' => ['рыбий глаз'],
    '4_5' => ['сила теней'],
    '8_3' => ['ловкость рук'],

];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/cache/1dreams.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);