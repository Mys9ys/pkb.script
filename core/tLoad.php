<?php

namespace core;

trait tLoad
{
    protected $urlRulesConfig = '/files/rules.php';
    protected $urlRulesJson = '/files/cache/1rules.json';

    protected $urlEventConfig = '/files/event.php';
    protected $urlEventJson = '/files/cache/1event.json';

    protected $urlInfoConfig = '/files/info.php';
    protected $urlInfoJson = '/files/cache/1info.json';

    protected $urlCrossRoadConfig = '/files/crossroad.php';
    protected $urlCrossRoadJson = '/files/cache/1crossroad.json';

    protected $urlAttackConfig = '/files/attack.php';
    protected $urlAttackJson = '/files/cache/1attack.json';

    protected $urlDreamsConfig = '/files/dreams.php';
    protected $urlDreamsJson = '/files/cache/1dreams.json';

    protected $arrRules = [];
    protected $arrEvent = [];
    protected $arrInfo = [];
    protected $arrCrossRoad = [];
    protected $arrAttack = [];
    protected $arrDreams = [];

    public function __construct()
    {
        $arrLib = [
            'Rules',
            'Event',
            'Info',
            'CrossRoad',
            'Attack',
            'Dreams',
        ];

        foreach ($arrLib as $name) {
            $this->{'arr' . $name} = $this->loadFiles($this->{'url' . $name . 'Json'}, $this->{'url' . $name . 'Config'});
        }
    }

    protected function loadFiles($urlJson, $urlConfig)
    {
        $urlJsonLoad = $_SERVER['DOCUMENT_ROOT'] . $urlJson;
        if (!file_exists($urlJsonLoad)) require_once($_SERVER['DOCUMENT_ROOT'] . $urlConfig);

        return json_decode(file_get_contents($urlJsonLoad), true);
    }
}