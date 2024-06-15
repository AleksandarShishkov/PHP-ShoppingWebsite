<?php

    namespace CQRS\App\Query\Home;

    class HomeQuery {

        private $query;

        public function __construct($query) {

            $this->query = $query;

        }

        public function getHomeQuery() {
            
            return $this->query;

        }

    }