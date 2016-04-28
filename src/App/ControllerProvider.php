<?php

namespace App;

use Silex\Application as App;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ControllerProvider implements ControllerProviderInterface
{
    private $app;
    
    public function connect(App $app)
    {
        $this->app = $app;
        
        /**
         * Error handling.
         */
        $app->error(function (\Exception $e, Request $request, $code) use ($app) {
            if ($app['debug']) {
                return;
            }

            // 404.html, or 40x.html, or 4xx.html, or error.html
            $templates = array(
                './errors/'.$code.'.html.twig',
                './errors/'.substr($code, 0, 2).'x.html.twig',
                './errors/'.substr($code, 0, 1).'xx.html.twig',
                './errors/default.html.twig',
            );

            return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
        });
        
        /**
         * Add Controllers.
         */
        // Home Controller
        $controllers = $app['controllers_factory'];
        $controllers
            ->get('/', [$this, 'homepage'])
            ->bind('homepage');
        
        return $controllers;
    }
    
    /**
     * 
     * @param App $app
     * @return type
     */
    public function homepage(App $app)
    {
        return $app['twig']->render('index.html.twig');
    }
    
}
