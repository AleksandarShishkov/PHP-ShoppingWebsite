<?php

    namespace CQRS\Core\Domain\Model\User;

    interface UserRepositoryInterface {

        public function findById(string $id): ?User;

        public function findByEmail(string $email): ?User;

        public function save(User $user): void;

    }