<?php

namespace Infrastructure\API\Silex;

class Application
{
    public static function bootstrap()
    {
        $app = new \Silex\Application();

        $app['debug'] = true;

        return $app;
    }
}
