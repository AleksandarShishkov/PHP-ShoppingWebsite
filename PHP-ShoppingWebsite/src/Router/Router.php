<?php

    namespace CQRS\Router;

    use CQRS\Factory\Factory;

    final class Router {

        public function makeRoute(array $route) {

            $path = [
                'controller' => $route['controller'],
                'request' => $route['request'] ?? '' 
            ];

            $factory = new Factory($path);
            
            $controller = $factory->createPath();
            
            if(method_exists($controller, $route['method'])) {
                
                $controller->{$route['method']}();
                
            }

        }
    }