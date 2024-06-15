<?php

    namespace CQRS\App\Query\User\LoginUser;

    use CQRS\Core\Domain\Model\User\UserService;
    use CQRS\Core\Domain\Model\User\User;

    class LoginUserQueryHandler {

        private $user_service;
        private $user_query;

        public function __construct(UserService $user_service, LoginUserQuery $user_query) {

            $this->user_service = $user_service;
            $this->user_query = $user_query;

        }

        public function handle() {

            $this->user_service->authenticate($this->user_query->getUserEmail(), $this->user_query->getUserPassword());

        }

    }