<?php


namespace App\model;

use PDO;
use PDOException;


class CountriesDAO extends DAO
{

    public static function getAllCountries()
    {
        $countriesArray = [];
        try {
            DAO::PDOconnect();
            $query = self::$dbh->prepare("SELECT * FROM countries ORDER BY en_short_name");
            $query->execute();
            $countries = $query->fetch(PDO::FETCH_ASSOC);

            while ($countries) {
                // Column names needs to be accurate and similar to db ones
                $countriesArray[$countries["num_code"]] = new Countries(
                    $countries["num_code"],
                    $countries["alpha_2_code"],
                    $countries["alpha_3_code"],
                    $countries["en_short_name"],
                    $countries["nationality"]
                );
                $countries = $query->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $error) {
            print "An error occured: " . $error->getMessage();
            die();
        }
        return $countriesArray;
    }
}