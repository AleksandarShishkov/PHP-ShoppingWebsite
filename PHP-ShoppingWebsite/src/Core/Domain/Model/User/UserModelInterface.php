<?php

    namespace CQRS\Core\Domain\Model\User;

    interface UserModelInterface {

        public function login(bool $state): void;

    }