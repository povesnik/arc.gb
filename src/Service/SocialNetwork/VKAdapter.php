<?php


namespace Service\SocialNetwork;


class VKAdapter implements AuthInterface
{
    protected $vk;

    public function login(array $user)
    {
        $this->vk = Socialite::login($user);
        return Socialite::driver()->redirect();
    }

    public function callback()
    {
        return Socialite::callback($this->vk);
    }
}