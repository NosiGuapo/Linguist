<?php


namespace App\model;


class Languages
{
    private $languageId;
    private $languageName;
    private $languageWording;
    private $languageIcon;
    private $languageImg;

    public function __construct($languageId, $languageName, $languageWording, $languageIcon, $languageImg)
    {
        $this->languageId = $languageId;
        $this->languageName = $languageName;
        $this->languageWording = $languageWording;
        $this->languageIcon = $languageIcon;
        $this->languageImg = $languageImg;
    }


    public function getLanguageId()
    {
        return $this->languageId;
    }

    public function getLanguageName()
    {
        return $this->languageName;
    }

    public function getLanguageWording()
    {
        return $this->languageWording;
    }

    public function getLanguageIcon()
    {
        return $this->languageIcon;
    }

    public function getLanguageImg()
    {
        return $this->languageImg;
    }
}