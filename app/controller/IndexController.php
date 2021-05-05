<?php


namespace App\controller;

class IndexController
{
    public static function redirect($operation)
    {
        switch ($operation) {
            case "register":
                Authentication::registerDisplay();
                break;
            case "registerAction":
                Authentication::registerUser();
                break;
            case "login":
                Authentication::loginDisplay();
                break;
            case "loginAction":
                Authentication::loginUser();
                break;
            case "logout":
                Authentication::signOut();
                break;
            case "deleteAccount":
                Authentication::deleteAccount();
                break;
            case "profile":
                ProfileController::display();
                break;
            case "editProfile":
                ProfileController::editProfile();
                break;
            case "pricing":
                PricingController::display();
                break;
            case "purchase":
                PricingController::setUserSubscription();
                break;
            case "searchLesson":
            case "lessons":
                LessonsController::display();
                break;
            case "openlesson":
                LessonsController::thisLessonDisplay();
                break;
            case "language":
                LanguageController::display();
                break;
            case "learn":
                LanguageController::addUserLanguageChoice();
                break;
            case "home":
            default:
                MainController::display();
                break;
        }
    }

    public static function basicAssets($header, $pageTitle)
    {
        $title = $pageTitle;
        include "app/view/head.php";
        if ($header) {
            $logState = Authentication::isLoggedOn();
            $displayLang = MainController::languageDisplay();
            include "app/view/header.php";
        }
    }
}