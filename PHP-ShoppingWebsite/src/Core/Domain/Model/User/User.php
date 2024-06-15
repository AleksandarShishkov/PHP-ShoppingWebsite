<?php

    namespace CQRS\Core\Domain\Model\User;

    use CQRS\Core\Infrastructure\HashPassword\HashPassword;

    final class User {

        private $id;
        private $email;
        private $password;

        public function __construct(string $email, string $password) {

            $this->email = $email;
            $this->password = HashPassword::hash($password);

        }

        public function getId() {

            return $this->id;

        }

        public function getEmail() {

            return $this->email;

        }

        public function gerPassword() {

            return $this->password;

        }
    }