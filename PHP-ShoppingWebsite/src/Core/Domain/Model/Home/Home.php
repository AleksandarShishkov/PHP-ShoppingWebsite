<?php

    namespace CQRS\Core\Domain\Model\Home;

    class Home implements HomeModelInterface {

        #[\Override]
        public function index() {

            $success_message = isset($_GET['success']) ? $_GET['success'] : null;
            $error_message = isset($_GET['error']) ? $_GET['error'] : null;

            $query_string = 'success=' . urlencode($success_message) . '&error=' . urlencode($error_message);
            
            header('Location:src/View/home.php?' . $query_string);
            exit();
        }

        #[\Override]
        public function notFound() {

            header('Location:src/View/404/404.php');
            exit();
        }

    }