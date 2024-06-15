<?php

    namespace CQRS\Core\App\Query\User\LoginUser;

    use CQRS\Core\App\Query\User\LoginUser\LoginUserQuery;
    use CQRS\Core\Domain\Infrastructure\Repository\UserRepository\UserRepository;

    final class LoginUserQueryHandler {

        private $login_user;
        private $user_repo;

        public function __construct() {

            $user_credentials = [
                'email' => isset($_POST['email']) ? $_POST['email'] : '',
                'password' => isset($_POST['password']) ? $_POST['password'] : ''
            ];

            $this->login_user = new LoginUserQuery($user_credentials);
            $this->user_repo = new UserRepository();

        }

        public function login() {

            $result = $this->user_repo->checkRegisteredUser($this->login_user->getEmail(), $this->login_user->getPassword());

            if($result) {

                $success_message = 'You have logged into your profile successfully!';
                $controller = 'HomeQueryHandler';
                $request = 'index';
                $method = 'homeQuery';

                $query_string = 'controller=' . urlencode($controller) . '&request=' . urlencode($request) . '&method=' . urlencode($method) . '&success=' . urlencode($success_message);
                
                header('Location:index.php?' . $query_string);
                die();
            }

            $error_message = 'Invalid credentials!';

            header('Location:src/View/Users/Auth/login.php?error_message=' . $error_message);
            die();
            
        }

    }