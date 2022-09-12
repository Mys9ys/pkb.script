<?php

namespace core;

trait tLoad
{
    protected $urlMesConfig = '/files/message.php';
    protected $urlMesJson = '/files/1message.json';

    protected $urlEventConfig = '/files/event.php';
    protected $urlEventJson = '/files/1event.json';

    protected $urlInfoConfig = '/files/info.php';
    protected $urlInfoJson = '/files/1info.json';

    protected $urlCrossRoadConfig = '/files/crossroad.php';
    protected $urlCrossRoadJson = '/files/1crossroad.json';

    protected $arrRules = [];
    protected $arrEvent = [];
    protected $arrInfo = [];
    protected $arrCrossRoad = [];

    public function __construct()
    {
        $this->arrRules = $this->loadFiles($this->urlMesJson, $this->urlMesConfig);
        $this->arrEvent = $this->loadFiles($this->urlEventJson, $this->urlEventConfig);
        $this->arrInfo = $this->loadFiles($this->urlInfoJson, $this->urlInfoConfig);
        $this->arrCrossRoad = $this->loadFiles($this->urlCrossRoadJson, $this->urlCrossRoadConfig);
    }

    protected function loadFiles($urlJson, $urlConfig)
    {
        $urlJsonLoad = $_SERVER['DOCUMENT_ROOT'] . $urlJson;
        if (!file_exists($urlJsonLoad)) require_once($_SERVER['DOCUMENT_ROOT'] . $urlConfig);

        return json_decode(file_get_contents($urlJsonLoad), true);
    }
}