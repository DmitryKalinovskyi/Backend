<?php

require "vendor/autoload.php";

use Framework\application\AppBuilder;
use Framework\mapper\RouteMapper;
use MVCExample\db\MVCDatabaseContext;

try{
    // Create app and configure all services.
    $appBuilder = new AppBuilder();

    // add database
    $appBuilder->services()
        ->addSingleton( MVCDatabaseContext::class,
            new MVCDatabaseContext("mysql:host=127.0.0.1;dbname=mvcexample"));

    $appBuilder->useMVC();

    // custom route binding.
    $appBuilder->services()
        ->addScoped(RouteMapper::class, RouteMapper::class);

    $appBuilder->use(function(RouteMapper $routeMapper, $next) {
        $routeMapper->mapControllers("/mvc-example", "./src/controllers");

        $next();
    });

//    $appBuilder->use(function(ControllerRouter $router, $next){
//        $router->dump_routes();
//
//        $next();
//    });



    $app = $appBuilder->build();

    // index.php don't even know about controllers, application will create controller when needed.
    $app->run();

}catch(Exception $e){
    var_dump($e);
}
