<?php

namespace App\controller;

use App\model\CountriesDAO;
use App\model\UserDAO;

class Authentication
{
    private static $logState;

    public static function loginDisplay()
    {
        if (self::isLoggedOn()) {
            header("Location: ?action=home");
        } else {
            IndexController::basicAssets(false, "Sign in - Linguist");
            $alert = "";
            include "app/view/viewlogin.php";
        }
    }

    public static function isLoggedOn(): bool
    {
        self::sessionStart();
        self::$logState = false;

        if (isset($_SESSION["sessionMail"])) {
            $user = UserDAO::getUserByMail($_SESSION["sessionMail"]);
            if ($user->getUserMail() == $_SESSION["sessionMail"] && $user->getUserPasswrd() == $_SESSION["sessionPass"]
            ) {
                self::$logState = true;
            }
        }
        return self::$logState;
    }

    public static function sessionStart()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function registerDisplay()
    {
        if (self::isLoggedOn()) {
            header("Location: ?action=home");
        } else {
            IndexController::basicAssets(false, "Sign up - Linguist");
            $countries = CountriesDAO::getAllCountries();
            include "app/view/viewregister.php";
        }
    }

    public static function registerUser()
    {
        if (isset($_POST["email"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["userName"]) && isset($_POST["password"]) && isset($_POST["country"])) {
            $regEmail = $_POST["email"];
            $regFname = $_POST["firstName"];
            $regLname = $_POST["lastName"];
            $regUsername = $_POST["userName"];
            $regPasswrd = $_POST["password"];
            $regCountry = $_POST["country"];
            $emailExistence = UserDAO::checkEmailExistence($regEmail);
            if (!$emailExistence) {
                $signUpConfirm = UserDAO::signUp($regEmail, $regFname, $regLname, $regUsername, $regPasswrd, $regCountry);
                if (!$signUpConfirm) {
                    $alert = "Sign up failed, make sure to fill all the required fields.";
                    header("Location: ?action=register");
                } else {
                    self::autoLogin($regEmail, $regPasswrd);
                    header("Location: ?action=home");
                }
            } else {
                $alert = "Sign up failed, email already in use.";
                header("Location: ?action=register");
            }
            var_dump($emailExistence);
        }
    }

    public static function autoLogin($userMail, $userPasswrd)
    {
        self::sessionStart();
        $_SESSION["sessionMail"] = $userMail;
        $_SESSION["sessionPass"] = $userPasswrd;
    }

    public static function loginUser()
    {
        if ($_POST['email'] != "" && $_POST['passwrd'] != "") {
            $emailExistence = UserDAO::checkEmailExistence($_POST['email']);
            $logMail = $_POST['email'];
            $logPasswrd = $_POST['passwrd'];
            self::sessionStart();
            $dbChecker = UserDAO::getUserByMail($logMail);
            $dbPass = $dbChecker->getUserPasswrd();
            $dbMail = $dbChecker->getUserMail();
            if (trim($logPasswrd) == trim($dbPass) && trim($logMail == $dbMail)) {
                $_SESSION["sessionMail"] = $logMail;
                $_SESSION["sessionPass"] = $dbPass;
            } else {
                $alert = "Sign in failed, email or password invalid.";
            }
        } else {
            $alert = "Please fill all the required fields.";
        }
        self::loginRedirect();
    }

    public static function loginRedirect()
    {
        if (self::isLoggedOn()) { // Redirect on main if user is logged in
            header("Location: ?action=home");
        } else { // Not logged in, display the form for the user to log
            header("Location: ?action=login");
        }
    }

    public static function deleteAccount()
    {
        self::sessionStart();
        $usermail = $_SESSION["sessionMail"];
        UserDAO::removeDependecies($usermail);
        UserDAO::removeAccount($usermail);
        self::signOut();
        header("Location: ?action=home");
    }

    public static function signOut()
    {
        self::sessionStart();
        unset($_SESSION["sessionMail"]);
        unset($_SESSION["sessionPass"]);
        header("Location: ?action=home");
    }
}

