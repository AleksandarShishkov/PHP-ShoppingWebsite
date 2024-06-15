<?php

    namespace CQRS\Core\App\Command\User\RegisterUser;

    use CQRS\Core\App\Command\User\RegisterUser\RegisterUserCommand;
    use CQRS\Core\Domain\Infrastructure\Repository\UserRepository\UserRepository;
    use CQRS\Core\Infrastructure\HashPassword\HashPassword;

    final class RegisterUserCommandHandler {

        private $db;
        private $command;
        private $repo;
        private $hash_password;

        public function __construct() {

            $credentials = [
                'name' => isset($_POST['name']) ? $_POST['name'] : null,
                'surname' => isset($_POST['surname']) ? $_POST['surname'] : null,
                'email' => isset($_POST['email']) ? $_POST['email'] : null,
                'phone' => isset($_POST['phone']) ? $_POST['phone'] : null,
                'password' => isset($_POST['password']) ? $_POST['password'] : null,
                'city' => isset($_POST['city']) ? $_POST['city'] : null
            ];

            $this->repo = new UserRepository();

            $this->command = new RegisterUserCommand($credentials);

            $this->hash_password = new HashPassword();
        
        }


        public function register() {

            $credentials = [
                'email' => $this->command->getEmail(),
                'phone' => $this->command->getPhone()
            ];

            $check_credentials = $this->repo->checkCredentials($credentials);

            if($check_credentials) {

                $hashed_password = $this->hash_password->hashPassword($this->command->getPassword());

                $credentials['name'] = $this->command->getName();
                $credentials['surname'] = $this->command->getSurname();
                $credentials['city'] = $this->command->getCity();
                $credentials['password'] = $hashed_password;

                $table = 'users';
                $result = $this->repo->registerUser($table, $credentials);

                if($result) {

                    $success_message = 'You have registered your profile successfully!';
                    $query_string = 'success_message=' . urlencode($success_message);

                    header('Location:src/View/Users/Auth/login.php?' . $query_string);
                    die();

                }

                $error_message = 'Invalid credentials. Email or Phone number are alredy provided!';
                $query_string = 'error_message=' . urlencode($error_message);

                header('Location:src/Views/Users/Auth/register.php?' . $query_string);
                die();
                
            }

        }

    }