<?php

    namespace CQRS\Core\Infrastructure\HashPassword;

    class HashPassword {

        public static function hash(string $password) {

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            return $hashed_password;

        }

    }
