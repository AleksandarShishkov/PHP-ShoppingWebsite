<?php

    namespace CQRS\Core\Domain\Model\Home;

    class HomeService {

        private $home;

        public function __construct(HomeModelInterface $home) {

            $this->home = $home;

        }

        public function execute($request) {

            switch($request) {
                case 'index':
                    $this->home->index();
                    break;
                default:
                    $this->home->notFound();
                    break;
            }
        }
    }