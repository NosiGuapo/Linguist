<?php

namespace App\model;

class Lessons
{
    private $lessonId;
    private $name;
    private $wording;
    private $content;
    private $illustrationPath;
    private $languageId;

    public function __construct($lessonId, $name, $wording, $content, $illustrationPath, $languageId)
    {
        $this->lessonId = $lessonId;
        $this->name = $name;
        $this->wording = $wording;
        $this->content = $content;
        $this->illustrationPath = $illustrationPath;
        $this->languageId = $languageId;
    }

    public function getLessonId()
    {
        return $this->lessonId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getWording()
    {
        return $this->wording;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getIllustrationPath()
    {
        return $this->illustrationPath;
    }

    public function getLanguageId()
    {
        return $this->languageId;
    }
}