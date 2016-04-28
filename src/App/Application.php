<?php

namespace App;

use Silex\Application as App;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Twig_Environment;

class Application extends App
{
    private $rootDir;
    private $env;
    
    public function __construct($env)
    {
        $this->rootDir = __DIR__.'/../../';
        $this->env = $env;
        
        parent::__construct();
        
        $app = $this;
        
        $app->register(new ServiceControllerServiceProvider());
        $app->register(new AssetServiceProvider());
        $app->register(new TwigServiceProvider());
        $app->register(new HttpFragmentServiceProvider());
        $app['twig'] = $app->extend('twig', function (Twig_Environment $twig, App $app) {
            // add custom globals, filters, tags, ...

            return $twig;
        });
        
        $app->mount('', new ControllerProvider());
    }
}