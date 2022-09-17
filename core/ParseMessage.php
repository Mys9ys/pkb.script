<?php

namespace core;

class ParseMessage
{
    use tLoad;
    use tBaseMethods;

    private $request = [];
    private $result = [];

    private $mesArr = [];
    private $btnArr = [];

    private $userId = '';

    private $battleFlag = false;
//    private $battleFlag = true;
    private $battleStep = '';
//    private $battleStep = 1;
    private $enemyBattleProps = [];
    private $userBattleProps = [];

    public function firstParseMessage($ajaxRequest): array
    {

        $this->request = json_decode($ajaxRequest, true)[0];

        // обработка кнопок
        if ($this->request['btn']) {
            $this->btnArr = $this->request['btn'];
        }

        // вытягиваем id игрока
        $this->userId = $this->request['id'];

        $this->getUserInfo($this->userId);

        //обработка сообщений
        $mesStr = $this->parseImg($this->request['mes']);

        $this->mesArr = explode('<br>', $mesStr);

        $this->detailParseMessage();

        if (empty($this->result) || $this->result['active'] == 'not active') $this->parseNotDefined();

        return $this->result ?: ['active' => 'not active'];
    }

    protected function detailParseMessage()
    {
        $battle = in_array('Состояние:', $this->mesArr);

        if ($this->battleFlag || $battle) {

            $this->battleStep();

        } else {

            if (count($this->mesArr) > 1) {

                $this->parseManyMessages();

            } else {

                $this->parseOneMessages($this->mesArr[0]);

            }

        }

    }

    protected function parseOneMessages($mes)
    {

        $firstEmoji = $this->parseEmoji($mes);

        if ($firstEmoji) {
            $this->getEmojiEvent($firstEmoji, 'first_emoji');
        } else {
            $this->getNoEmojiEvent($mes, 'no_emoji');
        }

    }

    protected function parseManyMessages()
    {

//        var_dump($this->mesArr);

        $firstMessage = $this->mesArr[0];

        $firstEmoji = $this->parseEmoji($firstMessage);

        if ($firstEmoji) {
            $event = $this->arrRules['many_row'][$firstEmoji]['type'];

        } else {
            $event = $this->arrRules['many_row'][trim($firstMessage)]['type'];
        }

        $this->result = $this->detectFirstRowEventMethod($event);

    }

    protected function parseNotDefined()
    {
        $arrFind = $this->arrRules['notDefined'];
        $arrExplode = [];
        $active = '';
        foreach ($arrFind as $key => $item) {
            $arrExplode = explode($key, $this->mesArr[0]);
            foreach ($arrExplode as $event) {
                if ($item[trim($event)]) {
                    $active = $this->arrEvent[$item[trim($event)]['type']];
                }

            }
        }

        $this->result = $active;
    }

    protected function getEmojiMethod()
    {

    }

    protected function getEmojiEvent($emoji, $findArr)
    {
        $event = $this->arrRules[$findArr][$emoji];

        $this->getEventMethod($event['type']);

//        $active = $this->arrEvent[$event['type']] ?: ['active' => 'not active'];
//
//        $this->result = $active;

    }

    protected function getNoEmojiEvent($mes, $findArr)
    {// если в сообщении нет эмодзи

        $mes = $this->parseArtImgGame($mes);

        $event = $this->arrRules[$findArr][$mes]['type'];

        if (method_exists($this, $event)) {
            $this->result = $this->{$event}($event);
        } else {
            $this->result = $this->arrEvent[$event] ?: ['active' => 'not active'];
        }

    }

    protected function getEventMethod($event){
        if (method_exists($this, $event)) {
            $this->result = $this->{$event}($event);
        } else {
            $this->result = $this->arrEvent[$event] ?: ['active' => 'not active'];
        }
    }

    protected function parseArtImgGame($mes)
    {// удаляем картинку артпейзаж игровой из сообщения
        $part = explode('<', $mes);

        return $part[0] ?: $mes;
    }

    protected function detectFirstRowEventMethod($event)
    {
        if (method_exists($this, $event)) {
            return $this->{$event}($event);
        }
    }

    protected function detectManyRowEventMethod()
    {

        unset($this->mesArr[0]);

        foreach ($this->mesArr as $item) {
            if (!empty($item)) {
                $emoji = $this->parseEmoji($item);

                if ($emoji) {
                    $res = $this->detectEmojiEvent($emoji, 'many_row', $item);

                    if ($res) $subAction = $res;
                } else {

                }
            }

        }

        return $subAction;
    }

    protected function detectEmojiEvent($emoji, $findArr, $mes)
    {
        $action = [];
        $event = $this->arrRules[$findArr][$emoji]['type'];

        if (method_exists($this, $event)) {
            $action = $this->{$event}($mes, $emoji, $event);
        }

        return $action;
    }

    protected function parseImg($str): string
    {
        preg_match_all('/\<img[^\>]*\>/', $str, $matches);

        foreach ($matches as $match) {
            $replacement = '';

            $replacement = preg_replace('/<img(.*)alt="(.*)"\>/', "$2", $match);

            $str = str_replace($match, $replacement, $str);
        }

        return $str;
    }


    protected function parseEmoji($str): string
    {
        $put = mb_substr($str, 0, 1);

        if (!empty($put)) {
            return strlen($put) > 2 ? $put : '';
        } else {
            return '';
        }
    }

    protected function findEvent($event)
    {

        $action = $this->arrEvent[$event];

        $subAction = $this->detectManyRowEventMethod();

        if (!empty($this->userBattleProps['hp']) && $this->userBattleProps['hp'] < 80) $subAction = $this->goHealing();
        if (!empty($_COOKIE['userHP']) && $_COOKIE['userHP'] < 80) $subAction = $this->goHealing();

        return $subAction ?: $action;
    }

    protected function goHealing()
    {
        $active = ['active' => 'click_btn', 'btn' => 'Отдых'];
//        var_dump('countTrophy');
        return $active;
    }

    protected function countTrophy($event)
    {
//        var_dump('countTrophy');
        return '';
    }
    protected function countEat($event)
    {
        $lastRow = end($this->mesArr);

        $emoji = $this->parseEmoji($lastRow);

        if($emoji && $emoji ==='👁'){
            return $this->findEvent('findDead');
        }
    }

    protected function trapAttack($event)
    {
        $this->userBattleProps['hp'] = 70;
        $action = $this->arrEvent[$event];

        return $action;
    }

    protected function breakCraft($event)
    {
        $action = $this->arrEvent[$event];

        return $action;
    }

    protected function breakRuins($event)
    {
        $action = $this->arrEvent[$event];

        return $action;
    }

    protected function crossRoad($event)
    {
        $arrBtn = [
            'Запад',
            'Север',
            'Восток'
        ];

        $arrCrossRoad = [];

        for ($i = 0; $i < 3; $i++) {
            $arrCrossRoad[$i] = $this->crossRoadParse($this->mesArr[$i], $i);
        }

        $flip = array_flip($arrCrossRoad);

        $action = ['active' => 'click_btn',
            'btn' => $arrBtn[$flip[min($arrCrossRoad)]]];

        return $action;
    }

    protected function crossRoadParse($mes, $id)
    {

        $replacement = [
            "🚩Западный путь:",
            "🚩Северный путь:",
            "🚩Восточный путь:"
        ];

        $res = [];

        $mes = trim(str_replace($replacement[$id], '', $mes));

        $arr = explode(' и ', $mes);

        foreach ($arr as $key => $item) {

            $value = $this->arrCrossRoad[trim($item, '"')]['action'];
            $res = array_merge($res, (array)$value);
        }

        $res = array_unique($res, SORT_REGULAR);

        if (count($res) === 1) {
            return $this->arrCrossRoad['priority'][$res[0]];
        } else {
            $small = 16;
            foreach ($res as $val) {
                $priority = $this->arrCrossRoad['priority'][$val];

                $small = $small < $priority ? $small : $priority;
            }
            return $small;
        }
    }


    protected function countHp($mes, $emoji, $event)
    {

        $active = ['active' => 'click_btn', 'btn' => 'Отдых'];

        $mes = str_replace($emoji, '', $mes);
        $mes = str_replace($this->arrInfo['parse_char'][$event], '', $mes);

        $hp = explode('/', $mes);

        $percent = (int)$hp[0] / (int)$hp[1] * 100;

        return $percent < 85 ? $active : '';

    }

    protected function countTrauma($mes, $emoji, $event)
    {

        $active = ['active' => 'click_btn', 'btn' => 'Покинуть'];

        $mes = str_replace($emoji, '', $mes);
        $mes = str_replace($this->arrInfo['parse_char'][$event], '', $mes);

        $trauma = (int)$mes;

        return $trauma < 3 ? $active : '';
    }

    protected function battleStart($event)
    {

        $action = $this->arrEvent[$event];

        $this->setUserInfo('battle', true);

        return $action;
    }

    protected function battleStep()
    {
        $battleEvent = [
            '🗣'
        ];

        $this->parseAttackBtn();

        $this->parseBattleMessage();

        $this->result = $this->calcAttack();

        return $this->result;

    }

    protected function parseAttackBtn()
    {

        if (count($this->btnArr) === 1) {
            if ($this->btnArr[0] === 'Яркий свет') $this->btnArr = [];
        }

        if (count($this->btnArr) === 2) {
            if ($this->btnArr[1] === 'Сбежать') $this->btnArr = [];
        }
    }

    protected function calcAttack()
    {
        $countAttack = count($this->btnArr);

        switch ($countAttack) {
            case 0:
                $this->result = ['active' => 'click_btn', 'btn' => 'Атака'];
                break;
            case 1:
                $this->result = ['active' => 'click_btn', 'btn' => $this->btnArr[0]];
                break;
            default:
                $this->result = $this->calcAttackManyBtn();
        }

        return $this->result;
    }

    protected function calcAttackManyBtn()
    {

    }

    protected function parseBattleMessage()
    {
        foreach ($this->mesArr as $mes) {
            $emoji = $this->parseEmoji($mes);
            if ($emoji === '❤') $this->getInfoHP($mes, 'enemyBattleProps');
            if ($emoji === '❤') $this->getInfoHP($mes, 'enemyBattleProps');
            if ($emoji === '💚') $this->getInfoHP($mes, 'userBattleProps');
        }

        $arrEnd = [
            "Бой завершен. Вы победили!",
            "Бой завершен! Вы проиграли!",
        ];

        foreach ($arrEnd as $res) {
            if (in_array($res, $this->mesArr)) {
                $battleFlag = false;
            }
        }

    }

    protected function getInfoHP($mes, $arrName)
    {
        $emoji = $this->parseEmoji($mes);

        if ($emoji) {
            $mes = str_replace($emoji, '', $mes);
        }

        $arrExplode = explode(':', $mes);
        $this->{$arrName}['nation'] = trim($arrExplode[0]);

        $arr = explode('/', trim($arrExplode[1]));
        $hp = ((int)$arr[0] / (int)$arr[1]) * 100;
        $this->{$arrName}['hp'] = $hp;

        if ($arrName == 'userBattleProps' && $hp < 100) setcookie("userHP", $hp, time() + 3600);

    }

    protected function battleFirstStep()
    {

    }

    protected function fieldDreams()
    {

        $arr = explode(' ', $this->mesArr[1]);

        $selector = [];

        if (count($arr) >1) {
            foreach ($arr as $word) {
                $selector[] = mb_strlen($word);
            }
            if (count($selector) > 1) $selector = implode("_", $selector);
        } else {
            $selector = mb_strlen($arr[0]);
        }

        $arrWords = $this->arrDreams[$selector];

        if (count($arrWords) == 1 && $arrWords) {
            return ['active' => 'click_btn', 'btn' => $this->arrDreams[$selector]];
        } else {
            $this->setUserInfo('dreams', $arrWords);
            $this->saveUserInfo($this->userId);

            $this->parseFieldDreams($arrWords);
        }

    }

    protected function parseFieldDreams($arrWords)
    {
//        var_dump($arrWords);
    }

    protected function mushroomsRoots($event)
    {

        $hellItem = mb_stripos($this->mesArr[0], 'Адский');

        if(!$hellItem) {
            return $this->arrEvent[$event];
        } else {
            return $this->arrEvent['findEvent'];
        }

    }

    protected function fishingStart($event)
    {
        $bait = $this->mesArr[1];
        $emoji = $this->parseEmoji($bait);
        if($emoji) {
            $bait = str_replace($emoji, '', $bait);
            $bait = str_replace('Наживки осталось: ', '', $bait);

            if($bait != 0) {
                $action = $this->arrEvent[$event];
            } else {
                $action = $this->arrEvent['fishingEnd'];
            }
        }

        return $action;

    }


}