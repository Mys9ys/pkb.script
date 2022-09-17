<?php
header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/internal_settings.php';

$id = 747762770;
$id = 510815492;
//$id = 66775934;


$mes = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/upload/'.$id.'mes.json');

//$mes  = '[{"type":"send","id":"747762770","mes":"<img class=\"emoji\" src=\"\/emoji\/e\/f09f919e.png\" alt=\"\ud83d\udc5e\">\u0412\u044b \u0443\u0432\u0435\u0440\u043d\u0443\u043b\u0438\u0441\u044c \u043e\u0442 \u0430\u0442\u0430\u043a\u0438 \u043f\u0440\u043e\u0442\u0438\u0432\u043d\u0438\u043a\u0430.<br><img class=\"emoji\" src=\"\/emoji\/e\/e29a94.png\" alt=\"\u2694\">\u0412\u044b \u043d\u0430\u043d\u0435\u0441\u043b\u0438 5\u2727 \u0443\u0440\u043e\u043d\u0430 \u0432 \u043e\u0442\u0432\u0435\u0442.<br><br>\u0421\u043e\u0441\u0442\u043e\u044f\u043d\u0438\u0435:<br><img class=\"emoji\" src=\"\/emoji\/e\/e29da4.png\" alt=\"\u2764\">HP: 10\/36 (0)<br>\u25a0\u25a0\u25a0\u25a1\u25a1\u25a1\u25a1\u25a1\u25a1\u25a1 28%<br><img class=\"emoji\" src=\"\/emoji\/e\/f09f929a.png\" alt=\"\ud83d\udc9a\">HP: 21\/32 (0)<br>\u25a0\u25a0\u25a0\u25a0\u25a0\u25a0\u25a0\u25a1\u25a1\u25a1 66%","btn":"<div class=\"Keyboard__row\"><div class=\"Keyboard__button\" style=\"width: calc(50% - 10px);\"><button type=\"text\" color=\"positive\" store=\"[object Object]\" class=\"Button Button--positive Button--size-m Button--wide Button--overflow BotButton BotButton--text \"><span class=\"BotButtonLabel Button--overflow\">\u0410\u0442\u0430\u043a\u0430<\/span><\/button><\/div><div class=\"Keyboard__button\" style=\"width: calc(50% - 10px);\"><button type=\"text\" color=\"negative\" store=\"[object Object]\" class=\"Button Button--negative Button--size-m Button--wide Button--overflow BotButton BotButton--text \"><span class=\"BotButtonLabel Button--overflow\">\u0417\u0435\u043b\u044c\u0435<\/span><\/button><\/div><\/div><div class=\"Keyboard__row\"><div class=\"Keyboard__button\" style=\"width: calc(100% - 10px);\"><button type=\"text\" color=\"primary\" store=\"[object Object]\" class=\"Button Button--primary Button--size-m Button--wide Button--overflow BotButton BotButton--text \"><span class=\"BotButtonLabel Button--overflow\">|\u0413\u0440\u044f\u0437\u043d\u044b\u0439 \u0443\u0434\u0430\u0440|<\/span><\/button><\/div><\/div><div class=\"Keyboard__row\"><div class=\"Keyboard__button\" style=\"width: calc(50% - 10px);\"><button type=\"text\" color=\"default\" store=\"[object Object]\" class=\"Button Button--secondary Button--size-m Button--wide Button--overflow BotButton BotButton--text \"><span class=\"BotButtonLabel Button--overflow\">#\u0420\u0443\u0431\u044f\u0449\u0438\u0439<\/span><\/button><\/div><div class=\"Keyboard__button\" style=\"width: calc(50% - 10px);\"><button type=\"text\" color=\"default\" store=\"[object Object]\" class=\"Button Button--secondary Button--size-m Button--wide Button--overflow BotButton BotButton--text \"><span class=\"BotButtonLabel Button--overflow\">\u0421\u0431\u0435\u0436\u0430\u0442\u044c<\/span><\/button><\/div><\/div>"}]';

//
//$mes = '[{"mes" : "Символы:<br>■■■■■■■■ ■■■<br>Отправьте букву или текст:"}]';
//$mes = '[{"type":"send","id":"747762770", "mes" : "Символы:<br>■■■■■■<br>Отправьте букву или текст:"}]';

$res = new \core\ParseMessage();

echo '<pre>';
//var_dump(json_decode($mes));
var_dump($res->firstParseMessage($mes));
echo '</pre>';


//
echo '<pre>';
//var_dump($res);
echo '</pre>';

//$mesDecode = imgReplace($mesDecode[0]['mes']);
//
//echo '<pre>';
////var_dump($mesDecode);
//echo '</pre>';
//
//$arrMes = explode('<br>', $mesDecode);
//
//
//echo '<pre>';
////var_dump($arrMes);
//
//
//if(count($arrMes) > 1){
//    foreach ($arrMes as $mes){
////        var_dump($mes);
//    }
//}
//
//var_dump($arrMes[0]);
//var_dump($arrMes);
//
//var_dump(mb_ord(mb_substr($arrMes[0],0,1)));
//
//$first = mb_ord(mb_substr($arrMes[0],0,1)) > 10000 ? mb_substr($arrMes[0],0,1) : '';
//
//var_dump($first);
//
//echo '</pre>';
//function imgReplace($yourString){
//    preg_match_all('/\<img[^\>]*\>/', $yourString, $matches);
//
//    foreach ($matches as $match)
//    {
//        $replacement = '';
//
//        $replacement = preg_replace('/<img(.*)alt="(.*)"\>/', "$2", $match);
//
//        $yourString = str_replace($match, $replacement, $yourString);
//    }
//
//    return $yourString;
//}