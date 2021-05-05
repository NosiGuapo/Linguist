<?php


namespace App\model;

use PDO;
use PDOException;

class LanguagesDAO extends DAO
{

    public static function getAllLanguages()
    {
        $languagesArray = [];
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("SELECT * FROM languages");
            $query->execute();
            $language = $query->fetch(PDO::FETCH_ASSOC);

            while ($language) {
                $languagesArray[$language["languageId"]] = new Languages(
                    $language["languageId"],
                    $language["name"],
                    $language["wording"],
                    $language["iconPath"],
                    $language["languageImg"]
                );
                $language = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $languagesArray;
    }

    public static function getLanguageById($id)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("SELECT * FROM languages WHERE languageId = :id");
            $query->bindValue(':id', $id);
            $query->execute();
            $language = $query->fetch(PDO::FETCH_ASSOC);
            $thisLanguage = new Languages(
                $language["languageId"],
                $language["name"],
                $language["wording"],
                $language["iconPath"],
                $language["languageImg"]
            );
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $thisLanguage;
    }
}