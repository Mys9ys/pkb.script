<?php

namespace core;

trait tBaseMethods
{
    private $userInfo;

    protected function getUserInfo($id){

        $this->loadUserInfo($id);

        if(!$this->userInfo) $this->initialUserInfo($id);

    }

    protected function initialUserInfo($id){
        $this->userInfo = [
            'id' => $id
        ];
        $this->saveUserInfo($id);
    }

    protected function setUserInfo($key, $value){
        $this->userInfo[$key] = $value;
        $this->saveUserInfo($this->userId);
    }

    protected function loadUserInfo($id)
    {
        $userFile = $_SERVER['DOCUMENT_ROOT'] . '/files/users/' . $id . '.json';
        if (file_exists($userFile)) {
            $this->userInfo = json_decode(file_get_contents($userFile), true);
        }
    }

    protected function saveUserInfo($id)
    {
        $userFile = $_SERVER['DOCUMENT_ROOT'] . '/files/users/' . $id . '.json';
        $fp = fopen($userFile, 'w');
        fwrite($fp, json_encode($this->userInfo));
        fclose($fp);
    }
}