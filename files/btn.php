<?php
$arr = [

    'battle start' => [
        ['В бой'],
        ['Прокрасться']
    ],
    'battle step' => [
        ['Атака', 'Зелья'],
        [''],
        ['Рубящий', 'Сбежать']
    ],
    'inspect' => [
        ['Осмотреть'],
    ],
    'lvl up' => [
        ['Спуститься'],
        ['Остаться']
    ],
    'find event' => [
        ['Исследовать уровень'],
        ['Наверх', 'Глубже', 'В портал'],
        ['Персонаж', 'Отдых'],
    ],
    'inspect quickly' => [
        ['Обыскать']
    ],
    'mini loot' => [
        ['Собрать']
    ],

    'up skill' => [
        ['Собрать']
    ],
    'resource len' => [
        ['Добыть']
    ],
    'resource wood' => [
        ['Добыть']
    ],

    'resource stone' => [
        ['Добыть']
    ],

    'resource iron' => [
        ['Добыть']
    ],
    'small eat' => [
        ['Собрать']
    ],
    'book' => [
        ['Осмотреть']
    ],
    'potion' => [
        ['Осмотреть']
    ],
    'diamond' => [
        ['Собрать']
    ],
    'potion loss' => [
        ['Продолжить']
    ],

    'three road' => [
        ['Запад', 'Север', 'Восток'],
        ['Уйти']
    ],

    'cut meat' => [
        ['Освежевать']
    ],
    'water plant' => [
        ['Полить растение']
    ],
    'ask water' => [
        ['Хочу 1 воды']
    ],

    'wait plant' => [
        ['Ждать'],
        ['Уйти'],
    ],

    'collect plant' => [
        ['Уйти'],
    ],
    'small gold' => [
        ['Продолжить']
    ],
    'equipment' => [
        ['Осмотреть']
    ],
    'jewelry' => [
        ['Осмотреть']
    ],
    'trap not work' => [ // ловушка
        ['Продолжить']
    ],
    'trap work' => [
        ['Освободиться']
    ],
    'roulette skill' => [
        ['Бросить кости'],
        ['Уйти']
    ],
    'open door force' => [
        ['Открыть силой'],
        ['Уйти']
    ],
    'sell trophy' => [
        ['Продать трофеи'],
        ['Уйти']
    ],
];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/src/file/btn.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);