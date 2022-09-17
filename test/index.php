<?php
header('Access-Control-Allow-Origin: https://vk.com');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: text/html; charset=utf-8');

//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

//require_once $_SERVER['DOCUMENT_ROOT'] . '/test/internal_settings.php';

//$id = 510815492;

//$mes = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/upload/'.$id.'mes.json');

//$test = new \test\ParseMessage();

//echo '<pre>';
//var_dump(json_decode($mes));
//var_dump($test->firstParseMessage($mes));
//echo '</pre>';

//echo json_encode($test->firstParseMessage($mes));


if ($_REQUEST) {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/test/internal_settings.php';

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