<?php

namespace App\controller;

use App\model\SubscriptionsDAO;
use App\model\UserDAO;

class PricingController
{
    public static function display()
    {
        if (!Authentication::isLoggedOn()) {
            header("Location: ?action=login");
        }
        IndexController::basicAssets(true, "Pricing - Linguist");

        $user = UserDAO::getUserByMail($_SESSION["sessionMail"]);
        $pricingList = SubscriptionsDAO::getAllSubscriptions();

        include "app/view/viewpricing.php";
    }

    public static function setUserSubscription()
    {
        Authentication::sessionStart();
        $subId = $_GET["sId"];
        $user = UserDAO::getUserByMail($_SESSION["sessionMail"]);
        if ($user->getSubscription() < $subId) {
            SubscriptionsDAO::updateUserSubscription($user->getUserID(), $subId);
            header("Location: ?action=home");
        }
    }
}
