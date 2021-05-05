<?php

namespace App\model;

use PDO;
use PDOException;

class UserDAO extends DAO
{

    public static function signUp(string $email, string $fname, string $lname, string $username, string $passwrd, string $country)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
            INSERT INTO users (username, userfname, userlname, usermail, userpasswrd, usercountry, subscriptionId, registerDate) 
            VALUES (:username, :fname, :lname, :email, :passwrd, :country, 1, now()); 
        ");

            $query->bindValue(':email', $email);
            $query->bindValue(':fname', $fname);
            $query->bindValue(':lname', $lname);
            $query->bindValue(':username', $username);
            $query->bindValue(':passwrd', $passwrd);
            $query->bindValue(':country', $country);
            $query->execute();
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $query;
    }

    public static function removeAccount($email)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
            DELETE users FROM users WHERE usermail = :email; 
        ");
            $query->bindValue(':email', $email);
            $query->execute();

        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $query;
    }

    public static function removeDependecies($email)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
            DELETE language_choices FROM language_choices INNER JOIN users ON users.userID = language_choices.userId WHERE usermail = :email; 
        ");
            $query->bindValue(':email', $email);
            $query->execute();

        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $query;
    }

    public static function updateProfile($username, $usermail, $userfname, $userlname, $userId)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
            UPDATE users SET username = :username, usermail = :usermail, userfname = :fname, userlname = :lname WHERE userID = :userId;
            ");
            $query->bindValue(':username', $username);
            $query->bindValue(':usermail', $usermail);
            $query->bindValue(':fname', $userfname);
            $query->bindValue(':lname', $userlname);
            $query->bindValue(':userId', $userId);
            $query->execute();
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $query;
    }

    public static function getUserByMail($userMail)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("SELECT * FROM users WHERE usermail = :email");
            $query->bindValue(':email', $userMail);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $thisUserByMail = new User(
                $user["userID"],
                $user["username"],
                $user["userfname"],
                $user["userlname"],
                $user["usermail"],
                $user["userpasswrd"],
                $user["usercountry"],
                $user["subscriptionId"],
                $user["registerDate"]
            );
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $thisUserByMail;
    }

    public static function checkEmailExistence($email)
    {
        $emailExistence = false;
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("SELECT COUNT(*) AS countcheck FROM users WHERE usermail = :email");
            $query->bindValue(':email', $email);
            $query->execute();
            $emailVerification = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        if ($emailVerification['countcheck'] > 0) {
            $emailExistence = true;
        }
        return $emailExistence;
    }

    public static function getAllUsers(): array
    {
        $usersArray = [];
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("SELECT * FROM users");
            $query->execute();
            $users = $query->fetch(PDO::FETCH_ASSOC);

            while ($users) {
                $usersArray[$users["userID"]] = new User(
                    $users["userID"],
                    $users["username"],
                    $users["userfname"],
                    $users["userlname"],
                    $users["usermail"],
                    $users["userpasswrd"],
                    $users["usercountry"],
                    $users["subscriptionId"],
                    $users["registerDate"]
                );
                $users = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $usersArray;
    }
}