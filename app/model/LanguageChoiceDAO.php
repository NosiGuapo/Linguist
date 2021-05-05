<?php


namespace App\model;

use PDO;
use PDOException;

class LanguageChoiceDAO extends DAO
{
    public static function getUserChoices($userId)
    {
        $thisUserChoices = [];
        $thisUserLanguages = [];
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
                SELECT * FROM language_choices, languages WHERE userId = :userId AND languages.languageId = language_choices.languageId
                ");
            $query->bindValue(':userId', $userId);
            $query->execute();
            $languages = $query->fetch(PDO::FETCH_ASSOC);
            while ($languages) {
                $thisUserChoices[$languages["choiceId"]] = new LanguageChoice(
                    $languages["choiceId"],
                    $languages["languageId"],
                    $languages["userId"],
                );
                $thisUserLanguages[$languages["languageId"]] = new Languages(
                    $languages["languageId"],
                    $languages["name"],
                    $languages["wording"],
                    $languages["iconPath"],
                    $languages["languageImg"]
                );
                $languages = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $thisUserLanguages;
    }

    public static function addLanguageChoice($userId, $languageId)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
            INSERT INTO language_choices (userId, languageId) VALUES (:userId, :languageId)
            ");
            $query->bindValue(':userId', $userId);
            $query->bindValue(':languageId', $languageId);
            $query->execute();
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
    }

    public static function checkLanguageExistence($languageId, $userId)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
                SELECT COUNT(*) AS countcheck FROM language_choices WHERE (userId = :userId AND languageId = :languageId);
                ");
            $query->bindValue(':userId', $userId);
            $query->bindValue(':languageId', $languageId);
            $query->execute();
            $thisLang = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $thisLang;
    }
}