<?php


namespace App\controller;

use App\model\LanguageChoiceDAO;
use App\model\LanguagesDAO;
use App\model\SubscriptionsDAO;
use App\model\UserDAO;

class LanguageController
{
    public static function display()
    {
        if (!Authentication::isLoggedOn()) {
            header("Location: ?action=login");
        }
        IndexController::basicAssets(false, "Languages - Linguist");
        $language = LanguagesDAO::getLanguageById($_GET["lId"]);
        include "app/view/viewlanguage.php";
    }

    public static function addUserLanguageChoice()
    {
        Authentication::sessionStart();
        $langId = $_GET["lId"];
        $user = UserDAO::getUserByMail($_SESSION["sessionMail"]);

        $thisLang = LanguagesDAO::getLanguageById($langId);
        $languages = LanguageChoiceDAO::getUserChoices($user->getUserID());
        $thisLangExist = LanguageChoiceDAO::checkLanguageExistence($langId, $user->getUserID());

        $subscription = SubscriptionsDAO::getUserSubscription($user->getUserID());

        if ($thisLangExist['countcheck'] == 0) {
            if (count($languages) < $subscription->getSubscriptionLgAmount()) {
                LanguageChoiceDAO::addLanguageChoice($user->getUserID(), $thisLang->getLanguageId());
                header("Location: ?action=home");
            } else {
                header("Location: ?action=pricing");
            }
        } else if (count($languages) == 5) {
            header("Location: ?action=lessons");
        } else {
            header("Location: ?action=language&lId=" . $langId . "");
        }
    }
}