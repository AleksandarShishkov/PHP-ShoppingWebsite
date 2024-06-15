<?php

    namespace CQRS\Core\Domain\Model\Home;
    
    interface HomeModelInterface {
        
        public function index();

        public function notFound();
        
    }