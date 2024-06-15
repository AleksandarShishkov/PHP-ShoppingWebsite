<?php

    namespace CQRS\App\Query\Home;

    use CQRS\Core\Domain\Model\Home\HomeModelInterface;


    final class HomeQuery implements HomeModelInterface {

        private $query;

        public function __construct($query) {

            $this->query = $query;

        }

        public function getHomeQuery() {
            
            return $this->query;

        }

        #[\Override]
        public function index() {

            $success_message = isset($_GET['success_message']) ? $_GET['success_message'] : null;
            $error_message = isset($_GET['error_message']) ? $_GET['error_message'] : null;

            $query_string = 'success_message=' . urlencode($success_message) . '&error_message=' . urlencode($error_message);

            header('Location:src/View/home.php?' . $query_string);
            exit();

        }

        #[\Override]
        public function notFound() {

            $error_messsage = isset($_GET['error_message']) ? $_GET['error_message'] : null;
            $query_string = 'error_message=' . urlencode($error_message);

            header('Location:src/View/404/404.php?' . $query_string);
            exit();

        }

    }