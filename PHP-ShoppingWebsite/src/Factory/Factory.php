<?php

    namespace CQRS\Factory;

    use CQRS\App\Query\Home\HomeQueryHandler;

    final class Factory {

        private $controller;
        private $request;

        public function __construct($path) {

            $this->controller = $path['controller'];
            $this->request = $path['request'];

        }

        public function createPath() {

            switch($this->controller) {
                
                case 'HomeQueryHandler':
                    return new HomeQueryHandler($this->request);
                    break;
                
                case 'LoginUserQueryHandler':
                    return new LoginUserQueryHandler();
                    break;

                case 'RegisterUserCommandHandler':
                    return new RegisterUserCommandHandler();
                    break;
            }
        }
    }