<?php


namespace App\model;

use PDO;
use PDOException;

class SubscriptionsDAO extends DAO
{

    public static function getAllSubscriptions()
    {
        $subscriptionsArray = [];
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("SELECT * FROM subscriptions;");
            $query->execute();
            $subscriptions = $query->fetch(PDO::FETCH_ASSOC);

            while ($subscriptions) {
                $subscriptionsArray[$subscriptions["subscriptionId"]] = new Subscriptions(
                    $subscriptions["subscriptionId"],
                    $subscriptions["name"],
                    $subscriptions["price"],
                    $subscriptions["wording"],
                    $subscriptions["lgAmount"]
                );
                $subscriptions = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $subscriptionsArray;
    }

    public static function getUserSubscription($userId)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
                SELECT subscriptions.subscriptionId, name, price, wording, lgAmount FROM subscriptions, users WHERE userID = :userId AND users.subscriptionId = subscriptions.subscriptionId;
                ");
            $query->bindValue(':userId', $userId);
            $query->execute();
            $subscriptions = $query->fetch(PDO::FETCH_ASSOC);
            $thisSubById = new Subscriptions(
                $subscriptions["subscriptionId"],
                $subscriptions["name"],
                $subscriptions["price"],
                $subscriptions["wording"],
                $subscriptions["lgAmount"]
            );
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $thisSubById;
    }

    public static function updateUserSubscription($userId, $subId)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
            UPDATE users SET subscriptionId = :newSub WHERE userID = :userId;
            ");
            $query->bindValue(':newSub', $subId);
            $query->bindValue(':userId', $userId);
            $query->execute();
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $query;
    }

//    public static function updateUserSubscription($userId, $subscriptionId){
//        try {
//            DAO::PDOconnect();
//            $query = self::$dbh->prepare("
//                UPDATE users SET subscriptionId = :subscriptionId WHERE userID = :userId
//                ");
//            $query->bindValue(':subscriptionId', $subscriptionId);
//            $query->bindValue(':userId', $userId);
//            $query->execute();
//            $userSub = $query->fetch(PDO::FETCH_ASSOC);
//
//            $thisUserSub = new Subscriptions(
//                $userSub["subscriptionId"],
//                $userSub["name"],
//                $userSub["price"],
//                $userSub["wording"],
//                $userSub["lgAmount"]
//                );
//        } catch (PDOException $error) {
//            print "An error occured: " . $error->getMessage();
//            die();
//        }
//        return $thisUserSub;
//    }
}