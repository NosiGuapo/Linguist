<?php

namespace App\controller;

use App\model\LanguageChoiceDAO;
use App\model\LessonsDAO;
use App\model\UserDAO;

class LessonsController
{
    public static function display()
    {
        Authentication::sessionStart();
        $user = UserDAO::getUserByMail($_SESSION["sessionMail"]);

        if (Authentication::isLoggedOn()) {
            if (empty(LanguageChoiceDAO::getUserChoices($user->getUserID()))) {
                header("Location: ?action=home");
            } else {
                IndexController::basicAssets(true, "Your lessons - Linguist");
                if (isset($_POST['searchLesson'])) {
                    $lessons = LessonsDAO::getLessonBySearch($user->getUserID(), $_POST['searchbarLesson']);
                } else {
                    $lessons = LessonsDAO::getUserLessons($user->getUserID());
                }
                include "app/view/viewlessons.php";
            }
        } else {
            header("Location: ?action=login");
        }
    }

    public static function thisLessonDisplay()
    {
        if (!Authentication::isLoggedOn()) {
            header("Location: ?action=login");
        }
        $thisLesson = LessonsDAO::getLessonById($_GET["lessId"]);
        IndexController::basicAssets(false, $thisLesson->getName() . " - Linguist");
        include "app/view/viewthislesson.php";
    }
}
