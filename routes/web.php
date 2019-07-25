<?php
     return FastRoute\simpleDispatcher(
         function (\FastRoute\RouteCollector $route){
             $route ->addRoute('GET','/',['Application\Controller\HomeController','index']);
             $route->addRoute('GET', '/contacto', ['Application\Controller\ContactController', 'contact']);
         }
     );
