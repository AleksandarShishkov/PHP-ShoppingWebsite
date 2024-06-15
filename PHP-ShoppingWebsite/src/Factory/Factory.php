<?php

    namespace CQRS\Factory;

    use CQRS\Core\Domain\Model\Home\Home;
    use CQRS\Core\Domain\Model\Home\HomeService;
    use CQRS\App\Query\Home\HomeQuery;
    use CQRS\App\Query\Home\HomeQueryHandler;
    use CQRS\Core\Domain\Model\User\UserService;
    use CQRS\App\Query\User\LoginUser\LoginUserQueryHandler;
    use CQRS\App\Query\User\LoginUser\LoginUserQuery;
    use CQRS\Core\Infrastructure\Database\Database;
    use CQRS\Core\Infrastructure\Repository\UserRepository\UserRepository;

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

                    $home = new Home();
                    $home_service = new HomeService($home);
                    $home_query = new HomeQuery($this->request);

                    return new HomeQueryHandler($home_service, $home_query);
                    break;
                
                case 'LoginUserQueryHandler':

                    $db = new Database();
                    $user_repository = new UserRepository($db);
                    $userService = new UserService($user_repository);

                    $email = isset($_POST['email']) ? $_POST['email'] : null;
                    $password = isset($_POST['password']) ? $_POST['password'] : null;

                    $query = new LoginUserQuery($email, $password);
                    
                    return new LoginUserQueryHandler($userService, $query);
                    break;

                case 'RegisterUserCommandHandler':
                    return new RegisterUserCommandHandler();
                    break;
            }
        }
    }