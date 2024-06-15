<?php

    namespace CQRS\Core\App\Query\User\LoginUser;

    use CQRS\Core\Domain\Model\UserModel\User\UserLoginModelInterface;

    final class LoginUserQuery implements UserLoginModelInterface {

        private $email;
        private $password;

        public function __construct(array $user_credentials) {

            $this->email = $user_credentials['email'];
            $this->password = $user_credentials['password'];

        }

        #[\Override]
        public function getEmail() {
            
            return $this->email;

        }

        #[\Override]
        public function getPassword() {
            
            return $this->password;

        }

    }