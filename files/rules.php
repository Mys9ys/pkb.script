<?php
$arr = [
    'first_emoji' => [

        '🐺' => [
            'type' => 'cut_meat',
        ],

        '⌛' => [
            'type' => 'description',
        ],

        '🌕' => [
            'type' => 'small_gold',
        ],

        '🐞' => [
            'type' => 'smallEat',
        ],

        '👁' => [
            'type' => 'findLoot',
        ],

        '🛡' => [
            'type' => 'equipment',
        ],
        '🎏' => [
            'type' => 'fishing',
        ],

        '⚔' => [
            'type' => 'equipment',
        ],
        '📚' => [
            'type' => 'book',
        ],
        '👞' => [
            'type' => 'trap_not_work',
        ],

        '❌' => [
            'type' => 'breakRuins',
        ],

        '🔥' => [
            'type' => 'battleStep',
        ],

        '🥀' => [
            'type' => 'skillUp',
        ],

        '👝' => [
            'type' => 'findEvent',
        ],

        '🍄' => [
            'type' => 'mushroomsRoots',
        ],

    ],

    'many_row' => [

        '👝' => [
            'type' => 'findEvent',
        ],

        '🧭' => [
            'type' => 'countEat',
        ],

        '🚩' => [
            'type' => 'findEvent',
        ],

        '💀' => [
            'type' => 'countTrophy',
        ],

        '💚' => [
            'type' => 'countHp',
        ],

        '❤' => [
            'type' => 'battleStep',
        ],

        '🖤' => [
            'type' => 'countTrauma',
        ],


        'Руда добыта!' => [
            'type' => 'breakCraft',
        ],
        'Завал разобран!' => [
            'type' => 'breakCraft',
        ],

        'Лодка плавно покачивается на воде...' => [
            'type' => 'fishingStart',
        ],

        'Символы:' => [
            'type' => 'fieldDreams',
        ],

        'Перед каждым проходом другими искателями приключений нацарапаны различные надписи, которые, видимо, могут помочь определить, куда ведет конкретная дорога.' => [
            'type' => 'crossRoad',
        ],

    ],

    'no_emoji' => [
        'Можно сразу сразиться с ним, не теряя времени, а можно попробовать осторожно обойти его вне поля зрения...' =>
            ['type' => 'battleStart'],
        'Можно сразу сразиться с ним, не теряя времени, а можно попробовать аккуратно обойти его боковым коридором...' =>
            ['type' => 'battleStart'],
        'Можно сразу сразиться с ним, не теряя времени, а можно попробовать аккуратно обойти его за спиной...' =>
            ['type' => 'battleStart'],
        'Можно сразу сразиться с ним, не теряя времени, а можно попробовать осторожно обойти его боковым коридором...' =>
            ['type' => 'battleStart'],
        'Можно сразу сразиться с ним, не теряя времени, а можно попробовать аккуратно обойти его вне поля зрения...' =>
            ['type' => 'battleStart'],
        'Можно сразу сразиться с ним, не теряя времени, а можно попробовать осторожно обойти его за спиной...' =>
            ['type' => 'battleStart'],
        'Больше здесь нечего добыть.' =>
            ['type' => 'find_event'],
        'Больше тут нечего добыть.' =>
            ['type' => 'find_event'],
        'Больше здесь нечего получить.' =>
            ['type' => 'find_event'],


        'Блуждая по коридорам, вы наткнулись на сундук с сокровищем!' =>
            ['type' => 'openBox'],
        'Блуждая по коридорам, вы набрели на сундук с сокровищем!' =>
            ['type' => 'openBox'],

        'Покинуть текущее занятие?' => [
            'type' => 'exitEvent',
        ],

        'Вы пережили этот урон, но необходимо немного времени, чтобы освободиться...' =>
            ['type' => 'trapAttack'],

        'Правила несложные: Вы кидаете кости, и если выпадет от 1 до 3 - отшельник забирает у Вас единицу одной из характеристик. Если выпадет от 4 до 6 - он отдаст Вам случайную свою...' =>
            ['type' => 'skillRoulette'],

        // события из каталога событий
        'Этот череп пугает до жути. Вы кое как берете себя в руки и делаете шаг навстречу. Еще шаг. Череп уже совсем близко, стоит только протянуть руку...' =>
            ['type' => '1incident'],
        'Путь туда, однако, перекрыт стальной решеткой. Прутья кажутся достаточно крепкими, однако попробовать все-таки стоит. Наверное...' =>
            ['type' => '2incident'],
        'Однако, Вы оказались тут не одни. С другой стороны, рассеивая тьму, спешит еще пара искателей приключений. Вам стоит поторопиться и выбрать, что именно Вы хотите собрать.' =>
            ['type' => '3incident'],
    ],

    'notDefined' => [
         '.' => [
             'Можно попробовать обыскать останки на предмет ценностей, либо же оставить их с миром' =>
             ['type' => 'findDead']
         ],

    ]


];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/cache/1rules.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);