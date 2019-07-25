<?php
     return FastRoute\simpleDispatcher(
         function (\FastRoute\RouteCollector $route){
             $route ->addRoute('GET','/',['Application\Controller\HomeController','index']);
             $route->addRoute(['GET','POST'], '/contacto',['Application\Controller\ContactController','contact']);
             $route->addRoute(['GET','POST'], '/contacto2',['Application\Controller\ContactController','contact2']);
             $route->addRoute('GET','/hola/{nombre}',['Application\Controller\HomeController','hola']);
         }
     );
