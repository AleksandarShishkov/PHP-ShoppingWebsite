<?php

    namespace CQRS\Core\Domain\Model\User;

    class UserService {

        private $userRepository;

        public function __construct(UserRepositoryInterface $userRepository) {

            $this->userRepository = $userRepository;

        }

        public function registerUser(string $email, string $password): User {

            $user = new User($email, $password);
            $this->userRepository->save($user);
            return $user;

        }

        public function authenticate(string $email, string $password): ?User {

            $user = $this->userRepository->findByEmail($email);

            if($user && password_verify($password, $user->getPassword())) {
                
                return $user;

            }

            return null;

        }
    }