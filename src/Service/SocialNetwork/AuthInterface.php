<?php


namespace Service\SocialNetwork;


interface AuthInterface
{
    public function login(array $user);

    public function callback();
}