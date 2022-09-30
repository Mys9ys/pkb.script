<?php
//header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: https://vk.com');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: text/html; charset=utf-8');

if ($_REQUEST) {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/core/internal_settings.php';

    $arrWrite = [];
    $arrWrite[] = $_REQUEST;

    $fileName = $_SERVER['DOCUMENT_ROOT'] . '/upload/' .$_REQUEST['id'].'mes.json';

    $send = json_encode($arrWrite);

    $fp = fopen($fileName, 'w');
    fwrite($fp, $send);
    fclose($fp);

    $test = new \core\ParseMessage();

    echo json_encode($test->firstParseMessage($send));
}

