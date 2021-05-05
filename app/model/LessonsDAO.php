<?php


namespace App\model;

use PDO;
use PDOException;

class LessonsDAO extends DAO
{

    public static function getUserLessons($userId)
    {
        $lessonsArray = [];
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
                SELECT lessonId, name, wording, content, illustrationPath, lessons.languageId
                FROM lessons, users, language_choices 
                WHERE (users.userID = :userId AND users.userID = language_choices.userId) AND language_choices.languageId = lessons.languageId
                ORDER BY lessons.languageId;
                ");
            $query->bindValue(':userId', $userId);
            $query->execute();
            $userLessons = $query->fetch(PDO::FETCH_ASSOC);

            while ($userLessons) {
                $lessonsArray[$userLessons["lessonId"]] = new Lessons(
                    $userLessons["lessonId"],
                    $userLessons["name"],
                    $userLessons["wording"],
                    $userLessons["content"],
                    $userLessons["illustrationPath"],
                    $userLessons["languageId"],
                );
                $userLessons = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $lessonsArray;
    }

    public static function getLessonById($lessonId)
    {
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("SELECT * FROM lessons WHERE lessonId = :lessonId");
            $query->bindValue(':lessonId', $lessonId);
            $query->execute();
            $lesson = $query->fetch(PDO::FETCH_ASSOC);
            $thisLesson = new Lessons(
                $lesson["lessonId"],
                $lesson["name"],
                $lesson["wording"],
                $lesson["content"],
                $lesson["illustrationPath"],
                $lesson["languageId"],
            );
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $thisLesson;
    }

    public static function getLessonBySearch($userId, $value)
    {
        $sLessonsArray = [];
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("
                SELECT lessonId, lessons.name, lessons.wording, content, illustrationPath, lessons.languageId
                FROM lessons, users, language_choices, languages 
                WHERE (users.userID = :userId AND users.userID = language_choices.userId) AND language_choices.languageId = lessons.languageId 
                AND languages.languageId = lessons.languageId
                AND (lessons.name LIKE :value OR languages.name LIKE :value)
                ORDER BY lessons.languageId
                ");
            $query->bindValue(':userId', $userId);
            $query->bindValue(':value', '%' . $value . '%');
            $query->execute();
            $sLessons = $query->fetch(PDO::FETCH_ASSOC);

            while ($sLessons) {
                $sLessonsArray[$sLessons["lessonId"]] = new Lessons(
                    $sLessons["lessonId"],
                    $sLessons["name"],
                    $sLessons["wording"],
                    $sLessons["content"],
                    $sLessons["illustrationPath"],
                    $sLessons["languageId"],
                );
                $sLessons = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $sLessonsArray;
    }
}