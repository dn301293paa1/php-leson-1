<?php

namespace Data;

class DataManager
{
    private $saveData;
    private $displayData;

    public function __construct(SaveData $saveData, DisplayData $displayData)
    {
        $this->saveData = $saveData;
        $this->displayData = $displayData;
    }

    public function saveData($data)
    {
        $this->saveData->save($data);
    }

    public function displayData($data)
    {
        $this->displayData->display($data);
    }
}
