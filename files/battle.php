<?php
$arr = [
    'first' => []
];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/1battle.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);