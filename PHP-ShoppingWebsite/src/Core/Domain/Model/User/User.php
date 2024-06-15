<?php

    namespace CQRS\Core\Domain\Model\User;

    use CQRS\Core\Infrastructure\HashPassword\HashPassword;

    final class User implements UserModelInterface {

        private $id;
        private $email;
        private $password;

        public function __construct(string $email, string $password) {

            $this->email = $email;
            $this->password = $password;

        }

        public function getId() {

            return $this->id;

        }

        public function getEmail() {

            return $this->email;

        }

        public function getPassword() {

            return $this->password;

        }

        #[\Override]
        public function login(bool $state): void {

            if($state) {

                $success_message = 'You have logged into your profile !';
                $query_string = 'success=' . urlencode($success_message);

                header('Location:src/View/home.php?' . $query_string);
                exit();
            }

            $error_message = 'Invalid credentials';
            $query_string = 'error=' . urlencode($error_message);

            header('Location:src/View/Users/Auth/login.php?' . $query_string);
            exit();

        }

    }