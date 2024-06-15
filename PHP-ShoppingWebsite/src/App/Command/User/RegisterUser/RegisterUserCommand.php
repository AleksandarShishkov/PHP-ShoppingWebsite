<?php

    namespace CQRS\App\Command\User\RegisterUser;

    use CQRS\Core\Domain\Model\User\UserRegister\UserRegisterModelInterface;

    final class RegisterUserCommand implements UserRegisterModelInterface {

        private $name;
        private $surname;
        private $password;
        private $email;
        private $phone;
        private $city;

        public function __construct(array $credentials) {

            $this->name = $credentials['name'];
            $this->surname = $credentials['surname'];
            $this->password = $credentials['password'];
            $this->email = $credentials['email'];
            $this->phone = $credentials['phone'];
            $this->city = $credentials['city'];

        }

        #[\Override]
        public function getName() {
            
            return $this->name;
        
        }

        #[\Override]
        public function getSurname() {

            return $this->surname;
        
        }

        #[\Override]
        public function getPassword() {

            return $this->password;

        }

        #[\Override]
        public function getEmail() {

            return $this->email;

        }

        #[\Override]
        public function getPhone() {

            return $this->phone;

        }

        #[\Override]
        public function getCity() {

            return $this->city;

        } 

    }