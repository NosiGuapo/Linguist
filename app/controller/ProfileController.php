<?php


namespace App\controller;

use App\model\LanguageChoiceDAO;
use App\model\UserDAO;

class ProfileController
{
    public static function display()
    {
        IndexController::basicAssets(true, "Profile - Linguist");
        if (!isset($_SESSION["sessionMail"]) && !isset($_SESSION["sessionPass"])) {
            header("Location: ?action=login");
        } else {
            $user = UserDAO::getUserByMail($_SESSION["sessionMail"]);
            $languages = LanguageChoiceDAO::getUserChoices($user->getUserID());

            include "app/view/viewprofile.php";
        }
    }

    public static function editProfile()
    {
        Authentication::sessionStart();
        $user = UserDAO::getUserByMail($_SESSION["sessionMail"]);
        $emailExistence = UserDAO::checkEmailExistence($_POST['userMail-edit']);
        if (isset($_POST['saveEdits'])) {
            if ($_POST["userName-edit"] != "" && $_POST["userMail-edit"] != "" && $_POST["userFname-edit"] != "" && $_POST["userLname-edit"] != "") {
                if (!$emailExistence) {
                    UserDAO::updateProfile(
                        $_POST["userName-edit"],
                        $_POST["userMail-edit"],
                        $_POST["userFname-edit"],
                        $_POST["userLname-edit"],
                        $user->getUserID()
                    );
                    $_SESSION["sessionMail"] = $_POST["userMail-edit"];
                }
            }
        }
        header("Location: ?action=profile");
    }
}