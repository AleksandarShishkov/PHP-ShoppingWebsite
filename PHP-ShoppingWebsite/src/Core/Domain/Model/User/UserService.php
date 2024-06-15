<?php

    namespace CQRS\Core\Domain\Model\User;

    class UserService {

        private $user_repository;

        public function __construct(UserRepositoryInterface $user_repository) {

            $this->user_repository = $user_repository;
            
        }

        public function registerUser(string $email, string $password): User {

            $user = new User($email, $password);
            $this->user_repository->save($user);
            return $user;

        }

        public function authenticate(string $email, string $password): void {

            $user = $this->user_repository->findByEmail($email);
    
            if ($user && password_verify($password, $user->getPassword())) {
                
                $user->login(true);

            }
    
            $user->login(false);

        }
    }