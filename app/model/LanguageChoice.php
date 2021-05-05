<?php


namespace App\model;


class LanguageChoice
{
    private $lcId;
    private $lcUserId;
    private $lcLanguageId;

    public function __construct($lcId, $lcLanguageId, $lcUserId)
    {
        $this->lcId = $lcId;
        $this->lcLanguageId = $lcLanguageId;
        $this->lcUserId = $lcUserId;

    }

    public function getLcId()
    {
        return $this->lcId;
    }

    public function getLcLanguageId()
    {
        return $this->lcLanguageId;
    }

    public function getLcUserId()
    {
        return $this->lcUserId;
    }
}