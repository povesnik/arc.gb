<?php


namespace Framework\Command;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RouteCollection;

class Register implements IRegister
{
    /**
     * @var RouteCollection
     */
    public $routeCollection;

    /**
     * @var ContainerBuilder
     */
    public $containerBuilder;


    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;
    }

    public function register()
    {
        //
    }
}