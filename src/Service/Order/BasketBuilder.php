<?php


namespace Service\Order;


use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketBuilder
{
    private $billing;
    private $discount;
    private $communication;
    private $security;

    public function setBilling(){
        $this->billing = new Card();
    }

    public function getBilling(){
        return $this->billing;
    }

    public function setDiscount(){
        $this->discount = new NullObject();
    }

    public function getDiscount(){
        return $this->discount;
    }

    public function setCommunication(){
        $this->communication = new Email();
    }

    public function getCommunication(){
        return $this->communication;
    }

    public function setSecurity(SessionInterface $session){
        $this->security = new Security($session);
    }

    public function getSecurity(){
        return $this->security;
    }
}