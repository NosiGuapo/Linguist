<?php

namespace App\controller;

use App\model\LanguagesDAO;

class MainController
{
    public static function display()
    {
        IndexController::basicAssets(true, "Home - Linguist");

        $displayLang = MainController::languageDisplay();

        include "app/view/main.php";
        include "app/view/footer.php";
    }

    public static function languageDisplay()
    {
        Authentication::sessionStart();
        return LanguagesDAO::getAllLanguages();
    }
}