<?php

namespace core;

trait tLoad
{
    protected $urlRulesConfig = '/files/rules.php';
    protected $urlRulesJson = '/files/1rules.json';

    protected $urlEventConfig = '/files/event.php';
    protected $urlEventJson = '/files/1event.json';

    protected $urlInfoConfig = '/files/info.php';
    protected $urlInfoJson = '/files/1info.json';

    protected $urlCrossRoadConfig = '/files/crossroad.php';
    protected $urlCrossRoadJson = '/files/1crossroad.json';

    protected $urlAttackConfig = '/files/attack.php';
    protected $urlAttackJson = '/files/1attack.json';

    protected $arrRules = [];
    protected $arrEvent = [];
    protected $arrInfo = [];
    protected $arrCrossRoad = [];
    protected $arrAttack = [];

    public function __construct()
    {
        $arrLib = [
            'Rules',
            'Event',
            'Info',
            'CrossRoad',
            'Attack'
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