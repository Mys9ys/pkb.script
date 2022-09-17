<?php
$arr = [
    "Впереди засада" => ["action" => "enemy"], "Осторожно, сверху" => ["action" => "enemy"], "Впереди атаковать из засады" => ["action" => "enemy"], "Впереди требуется атака" => ["action" => "enemy"], "Почему опять враг?" => ["action" => "enemy"], "Атака не поможет?" => ["action" => "enemy"], "Требуется внимание" => ["action" => "enemy"], "Слабый враг? Неожиданно..." => ["action" => "enemy"], "Требуется выманивание" => ["action" => "enemy"], "Требуется взяться за всех сразу" => ["action" => "enemy"], "Слабый враг, о слабый враг" => ["action" => "enemy"], "Отдых пока не здесь..." => ["action" => "enemy"], "Ближний бой является в видениях..." => ["action" => "enemy"],
    "Осторожно, ловушка!" => ["action" => "trap"], "Впереди ловушка" => ["action" => "trap"], "Впереди ценный предмет" => ["action" => ["trap", "lootBox", "ruins"]], "Впереди смотри внимательно" => ["action" => "trap"], "Впереди сокровище" => ["action" => "trap"], "Впереди подсадная утка отсутствует" => ["action" => "trap"], "Впереди подсадная утка" => ["action" => "trap"], "Вероятно нечто потрясающее" => ["action" => "trap"], "Почему опять ловушка?" => ["action" => "trap"],
    "Смотри внимательно и тогда - сундук с сокровищем!" => ["action" => "lootBox"], "Впереди экипировка" => ["action" => "lootBox"], "Осторожно, мимикрия" => ["action" => "lootBox"], "Впереди мимикрия отсутствует" => ["action" => "lootBox"], "Да славится сундук с сокровищем!" => ["action" => "lootBox"], "Сокровище является в видениях..." => ["action" => "lootBox"], "Узри, ценный предмет!" => ["action" => "lootBox"], "Может, это мимикрия?" => ["action" => "lootBox"], "" => ["action" => "lootBox"],
    "Восславь солнце!" => ["action" => "healingSpring"], "Впереди отдых" => ["action" => "healingSpring"], "Впереди контрольная точка" => ["action" => "healingSpring"], "Смотри внимательно, и тогда - утраченная благодать" => ["action" => "healingSpring"], "Отдых не требуется?" => ["action" => "healingSpring"], "Отдых сейчас не помешает" => ["action" => "healingSpring"], "Впереди враг отсутствует" => ["action" => ["healingSpring", "trader", "skillRoulette", "labyrinth", "guessWord", "pottyGold", "page"]],
    "Впереди лжец" => ["action" => ["trophyExchange", "skillRoulette"]], "Впереди торговец" => ["action" => ["trophyExchange", "trader"]], "Впереди друг" => ["action" => ["trophyExchange", "trader", "skillRoulette"]], "Осторожно, друг" => ["action" => ["trophyExchange", "skillRoulette"]], "Будь у меня трофеи?" => ["action" => "trophyExchange"], "Лжец? Неожиданно..." => ["action" => ["trophyExchange", "skillRoulette"]], "Друг? Неожиданно..." => ["action" => ["trophyExchange", "skillRoulette"]], "Лжец, о лжец" => ["action" => "trophyExchange"], "Вероятно лжец" => ["action" => ["trophyExchange", "skillRoulette"]],
    "Требуется золото" => ["action" => "trader"], "Впереди лжец отсутствует" => ["action" => "trader"], "Впереди требуется золото, и тогда - ценный предмет" => ["action" => "trader"], "Вероятно торговец" => ["action" => "trader"],
    "Узри, друг!" => ["action" => "skillRoulette"], "Так одиноко..." => ["action" => "skillRoulette"],
    "Не сдавайся!" => ["action" => "labyrinth"], "Помогите..." => ["action" => "labyrinth"], "Я хочу домой..." => ["action" => "labyrinth"], "Это похоже на сон..." => ["action" => ["labyrinth", "hunting"]], "Выглядит знакомым..." => ["action" => ["labyrinth", "ruins"]], "Не верю..." => ["action" => "labyrinth"], "Это немыслимо..." => ["action" => "labyrinth"], "Сюда..." => ["action" => "labyrinth"], "Снова..." => ["action" => ["labyrinth", "page"]], "Не вышло..." => ["action" => ["labyrinth", "guessWord", "page"]], "Это невыносимо..." => ["action" => "labyrinth"], "Не думай" => ["action" => "labyrinth"],
    "Впереди требуется ключ" => ["action" => "door"], "Камень не поможет?" => ["action" => "door"], "Ключ не требуется?" => ["action" => "door"], "Дверь? Неожиданно..." => ["action" => "door"], "Ты не имеешь права, о ты не имеешь права!" => ["action" => "door"], "Будь у меня ключ?" => ["action" => "door"], "Да славится ключ!" => ["action" => "door"], "Впереди требуется кулак" => ["action" => "door"],
    "Впереди пещера" => ["action" => "guessWord"], "Сюда!" => ["action" => ["guessWord", "hunting"]], "Узри, нечто потрясающее" => ["action" => "guessWord"], "Удачи!" => ["action" => "guessWord"], "Слушай внимательно..." => ["action" => "guessWord"], "Подумай хорошенько!" => ["action" => "guessWord"], "Молодец!" => ["action" => "guessWord"], "Не сдавайся..." => ["action" => "guessWord"],
    "Камень? Неожиданно..." => ["action" => "runeStone"], "Может, это нечто потрясающее?" => ["action" => "runeStone"], "Камень является в видениях..." => ["action" => "runeStone"], "Рунный камень, о рунный камень" => ["action" => "runeStone"], "Можно начинать?" => ["action" => "runeStone"],
    "Впереди нечто потрясающее" => ["action" => ["hunting", "fishing"]], "Дальний бой не поможет?" => ["action" => "hunting"], "Требуется скрытность" => ["action" => "hunting"], "Красиво..." => ["action" => ["hunting", "fishing"]], "Действуй!" => ["action" => ["hunting", "ruins"]], "Так держать, и тогда - ценный предмет" => ["action" => "hunting"], "Спокойно..." => ["action" => "hunting"], "Впереди собака" => ["action" => "hunting"], "Осторожно, стадо" => ["action" => "hunting"],
    "Будь у меня удочка?" => ["action" => "fishing"], "Требуется лодка" => ["action" => "fishing"], "Узри, озеро!" => ["action" => "fishing"], "Озеро является в видениях..." => ["action" => "fishing"], "Рыбалка сейчас не помешает..." => ["action" => "fishing"], "Удочка не требуется?" => ["action" => "fishing"],
    "Сперва — смотри внимательно" => ["action" => "ruins"], "Требуется смотри внимательно и тогда — боевая экипировка!" => ["action" => "ruins"], "Вероятно, руины" => ["action" => "ruins"], "Слишком высоко" => ["action" => "ruins"], "Впереди ловушка отсутствует" => ["action" => ["ruins", "page"]],
    "Не сюда!" => ["action" => "pottyGold"], "Горшок? Неожиданно..." => ["action" => "pottyGold"], "Может, это золото?" => ["action" => "pottyGold"], "Золото сейчас не помешает" => ["action" => "pottyGold"], "Впереди золото" => ["action" => "pottyGold"], "Да славится горшок!" => ["action" => "pottyGold"], "Золото не требуется?" => ["action" => "pottyGold"],
    "Впереди древность" => ["action" => "page"], "Не думай..." => ["action" => "page"], "Узри нечто!" => ["action" => "page"], "Впереди требуется смотри внимательно" => ["action" => "page"], "Враг отсутствует" => ["action" => "page"], " Да будет книга!" => ["action" => "page"],

    "priority" => [
        "guessWord" => 1,
        "page"=>2,
        "ruins"=>3,
        "lootBox"=>4,
        "fishing"=>5,
        "trophyExchange"=>6,
        "door"=>7,
        "trader"=>8,
        "pottyGold"=>9,
        "healingSpring"=>10,
        "hunting"=>11,
        "enemy"=>12,
        "runeStone"=>13,
        "labyrinth"=>14,
        "skillRoulette"=>15,
        "trap"=>16,
    ]
];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/cache/1crossroad.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);