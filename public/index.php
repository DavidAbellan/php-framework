<?php
$container = require __DIR__.'./bootstrap/container.php';
$dispacher = require __DIR__.'/../routes/web.php';
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$route = $dispacher->dispatch($httpMethod,$uri);
switch ($route[0]){
    case FastRoute\Dispatcher:: NOT_FOUND : echo ('<h2>Ruta no encontrada</h2>');break;
    case FastRoute\Dispatcher:: METHOD_NOT_ALLOWED: echo('<h2>Método no permitido</h2>');break;
    case FastRoute\Dispatcher::FOUND:
        $controller = $route[1];
        $params = $route[2];
        $container -> call($controller,$params) ;
        break;



}

Kint::dump($route);
Kint::dump($container);
Kint::dump($dispacher);


?>
