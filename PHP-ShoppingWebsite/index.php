<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use CQRS\Router\Router;

    $router = new Router();

    $route = isset($_GET['controller']) ? $_GET : $_GET = ['controller' => 'HomeQueryHandler', 'request' => 'index', 'method' => 'homeQuery'];

    $router->makeRoute($route);

?>