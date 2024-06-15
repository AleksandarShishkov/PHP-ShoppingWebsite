<?php

    namespace CQRS\App\Query\Home;


    final class HomeQueryHandler {

        private $home_query;

        public function __construct($request) {

            $this->home_query = new HomeQuery($request);

        }

        public function homeQuery() {

            $request = $this->home_query->getHomeQuery();

            switch($request) {

                case 'index':
                    $this->home_query->index();
                    break;

                default:
                    $this->home_query->notFound();
                    break;
            }

        }

    }
