<?php

    namespace CQRS\App\Query\User\LoginUser;

    class LoginUserQuery {

        private $email;
        private $password;

        public function __construct($email, $password) {

            $this->email = $email;
            $this->password = $password;

        }

        public function getUserEmail() {

            return $this->email;

        }

        public function getUserPassword() {

            return $this->password;

        }

    }