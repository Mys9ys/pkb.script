<?php
$arr = [
    '|Рассечение|'=>1,
    '|Таран|'=>3,
    '|Кровотечение|'=>14,
    '|Удар вампира|' => 10,
    '|Мощный удар|'=>25,
    '|Сила теней|' => 50,
    '|Грязный удар|' => 45,
    '|Слепота|' => 11,
    '|Заражение|' => 12,
    '|Раскол|' => 8,
    '|Расправа|' => 100,
    '|Берсеркер|'=>90,
    '|Проклятие тьмы|'=>5,
    '|Огонек надежды|'=>35,
    '|Слабое исцеление|'=>30,
    '|Целебный огонь|' => 20,
    'healingGroup' => ['|Слабое исцеление|', '|Целебный огонь|', '|Огонек надежды|'],
    'endingGroup' => ['|Расправа|', '|Берсеркер|'],
    'startingGroup' => ['|Заражение|','|Рассечение|','|Раскол|', '|Проклятие тьмы|']
];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/cache/1attack.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);