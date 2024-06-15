<?php

    namespace CQRS\App\Query\Home;

    use CQRS\Core\Domain\Model\Home\HomeService;

    class HomeQueryHandler {

        private $home_service;
        private $home_query;

        public function __construct(HomeService $service, HomeQuery $query) {

            $this->home_query = $query;
            $this->home_service = $service;

        }

        public function handle() {

            $request = $this->home_query->getHomeQuery();
            $this->home_service->execute($request);

        }

    }
