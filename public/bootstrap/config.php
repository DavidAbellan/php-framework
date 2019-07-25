<?php
     use Application\Controller\HomeController;
     use Application\Controller\ContactController;
     use Application\Providers\Doctrine;

     return [
         'config.database' => function(){
             return parse_ini_file(__DIR__ . '/../../app/Config/database.ini');

         },
         HomeController::class=>function(Doctrine $doctrine){
             return new HomeController($doctrine);

         },
         ContactController::class=>function(Doctrine $doctrine){
             return new ContactController($doctrine);
         },
         Doctrine::class=>function(Psr\Container\ContainerInterface $container){
             return new Doctrine($container);
         },
         HomeController::class=>\DI\create()->constructor(\DI\get(Doctrine::class)),
         ContactController::class=>\DI\create()->constructor(\DI\get(Doctrine::class))
     ];