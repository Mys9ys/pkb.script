<?php
header('Access-Control-Allow-Origin: https://vk.com');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/internal_settings.php';



echo($send = json_encode($_REQUEST));

$fp = fopen('/upload/' .$_REQUEST['id'].'mes.json', 'w');
fwrite($fp, $send);
fclose($fp);

if (false) {

    $arrWrite = [];
    $arrWrite[] = $_REQUEST;

    $send = json_encode($arrWrite);

    $fp = fopen('/upload/' .$_REQUEST['id'].'mes.json', 'w');
    fwrite($fp, $send);
    fclose($fp);

    $test = new \core\ParseMessage();
//
    echo json_encode($test->firstParseMessage($send));

}

//echo 'test';