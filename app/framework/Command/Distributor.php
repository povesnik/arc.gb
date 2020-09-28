<?php


namespace Framework\Command;


class Distributor implements ICommand

{
    private $register;

    public function __construct(IRegister $register)
    {
        $this->$register = $register;
    }

    public function execute()
    {
        $this->register->regiser();
    }


}