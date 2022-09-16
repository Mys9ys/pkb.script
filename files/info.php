<?php
$arr = [
    'parse_char' => [
        'countTrophy' => [
            'cut' => 'Трофеев: '
        ],
        'countHp' => [
            'cut' => 'HP: '
        ],

        'countTrauma' => [
            'cut' => 'Количество травм: '
        ],
    ],
];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/cache/1info.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);