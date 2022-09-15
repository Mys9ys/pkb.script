<?php
$arr = [
    'findEvent' => [
        'active' => 'click_btn',
        'btn'=>'Исследовать уровень'
    ],

    'cut_meat' => [
        'active' => 'click_btn',
        'btn'=>'Освежевать'
    ],

    'smallEat' => [
        'active' => 'click_btn',
        'btn'=>'Собрать'
    ],

    'battleStart' => [
        'active' => 'click_btn',
        'btn'=>'В бой'
    ],

    'trapAttack' => [
        'active' => 'click_btn',
        'btn'=>'Освободиться'
    ],
    'findDead' => [
        'active' => 'click_btn',
        'btn'=>'Обыскать'
    ],

    'description' => [
        'active' => 'not_active'
    ],

    'small_gold' => [
        'active' => 'click_btn',
        'btn'=>'Продолжить'
    ],

    'equipment' => [
        'active' => 'click_btn',
        'btn'=>'Осмотреть'
    ],

    'book' => [
        'active' => 'click_btn',
        'btn'=>'Осмотреть'
    ],

    'trap_not_work' => [
        'active' => 'click_btn',
        'btn'=>'Продолжить'
    ],

    'breakCraft' => [
        'active' => 'click_btn',
        'btn'=>'Покинуть'
    ],
    'breakRuins' => [
        'active' => 'click_btn',
        'btn'=>'Прервать поиск'
    ],

    'skillRoulette' => [
        'active' => 'click_btn',
        'btn'=>'Бросить кости'
    ],

    'openBox' => [
        'active' => 'click_btn',
        'btn'=>'Открыть'
    ],

    'findLoot' => [
        'active' => 'click_btn',
        'btn'=>'Обыскать'
    ],

    'skillUp' => [
        'active' => 'click_btn',
        'btn'=>'Собрать'
    ],

    '1incident' => [
        'active' => 'click_btn',
        'btn'=>'Коснуться черепа'
    ],
    '2incident' => [
        'active' => 'click_btn',
        'btn'=>'Пройти мимо'
    ],

    '3incident' => [
        'active' => 'click_btn',
        'btn'=>'Чернильник'
    ],


];

$fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/files/1event.json', 'w');
fwrite($fp, json_encode($arr));
fclose($fp);