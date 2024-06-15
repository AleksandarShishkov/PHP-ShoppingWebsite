<?php

    namespace CQRS\Core\Domain\Model\User;

    interface UserRepositoryInterface {

        public function findById(string $id): ?User;

        public function fundByEmail(string $email): ?User;

        public function save(User $user): void;

    }