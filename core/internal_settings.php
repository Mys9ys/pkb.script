<?php
header('Access-Control-Allow-Origin: https://vk.com');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

function autoloadMainClasses($class_name){
    $class_name = $_SERVER['DOCUMENT_ROOT'] . '/' . $class_name;
    $class_name = str_replace('\\', '/', $class_name);

    if(!@include_once $class_name . '.php'){
       die;
    }
}

spl_autoload_register('autoloadMainClasses');

//
//spl_autoload_register(function ($class) {
//
//    $class = str_replace('\\', '/', $class);
//    // Получаем путь к файлу из имени класса
//    $path = __DIR__ . $class . '.php';
//    // Если в текущей папке есть такой файл, то выполняем код из него
//    if (file_exists($path)) {
//        require_once $path;
//    }
//    // Если файла нет, то ничего не делаем - может быть, класс
//    // загрузит какой-то другой автозагрузчик или может быть,
//    // такого класса нет
//});