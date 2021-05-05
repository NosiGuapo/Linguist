<?php


namespace App\model;


class Countries
{
    private $num_code;
    private $alpha_2;
    private $alpha_3;
    private $countryName;
    private $nationality;

    public function __construct($num_code, $alpha_2, $alpha_3, $countryName, $nationality)
    {
        $this->num_code = $num_code;
        $this->alpha_2 = $alpha_2;
        $this->alpha_3 = $alpha_3;
        $this->countryName = $countryName;
        $this->nationality = $nationality;
    }

    public function getNumCode()
    {
        return $this->num_code;
    }

    public function getAlpha2()
    {
        return $this->alpha_2;
    }

    public function getAlpha3()
    {
        return $this->alpha_3;
    }

    public function getCountryName()
    {
        return $this->countryName;
    }

    public function getNationality()
    {
        return $this->nationality;
    }
}