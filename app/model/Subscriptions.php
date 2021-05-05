<?php


namespace App\model;


class Subscriptions
{
    private $subscriptionId;
    private $subscriptionName;
    private $subscriptionPrice;
    private $subscriptionWording;
    private $subscriptionLgAmount;

    public function __construct($subscriptionId, $subscriptionName, $subscriptionPrice, $subscriptionWording, $subscriptionLgAmount)
    {
        $this->subscriptionId = $subscriptionId;
        $this->subscriptionName = $subscriptionName;
        $this->subscriptionPrice = $subscriptionPrice;
        $this->subscriptionWording = $subscriptionWording;
        $this->subscriptionLgAmount = $subscriptionLgAmount;
    }

    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    public function getSubscriptionName()
    {
        return $this->subscriptionName;
    }

    public function getSubscriptionPrice()
    {
        return $this->subscriptionPrice;
    }

    public function getSubscriptionWording()
    {
        return $this->subscriptionWording;
    }

    public function getSubscriptionLgAmount()
    {
        return $this->subscriptionLgAmount;
    }
}