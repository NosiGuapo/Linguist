<?php

namespace App\model;

class User
{
    private $userID;
    private $userName;
    private $userMail;
    private $userPasswrd;
    private $userFname;
    private $userLname;
    private $userCountry;
    private $subscription;
    private $registerDate;

    public function __construct($userID, $userName, $userFname, $userLname, $userMail, $userPasswrd, $userCountry, $userSubscription, $registerDate)
    {
        $this->userID = $userID;
        $this->userName = $userName;
        $this->userFname = $userFname;
        $this->userLname = $userLname;
        $this->userMail = $userMail;
        $this->userPasswrd = $userPasswrd;
        $this->userCountry = $userCountry;
        $this->subscription = $userSubscription;
        $this->registerDate = $registerDate;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getUserMail()
    {
        return $this->userMail;
    }

    public function getUserPasswrd()
    {
        return $this->userPasswrd;
    }

    public function getUserFname()
    {
        return $this->userFname;
    }

    public function getUserLname()
    {
        return $this->userLname;
    }

    public function getUserCountry()
    {
        return $this->userCountry;
    }

    public function getSubscription()
    {
        return $this->subscription;
    }

    public function getRegisterDate()
    {
        return $this->registerDate;
    }

}