<?php


namespace Framework\Command;


class Routes
{
    /**
     * @param IRegister $register
     * @return void
     */
    protected function register(IRegister $register): void
    {
        $register->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $register->containerBuilder->set('route_collection', $register->routeCollection);
    }

}