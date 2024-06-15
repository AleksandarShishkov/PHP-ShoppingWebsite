<?php

    namespace CQRS\Core\Infrastructure\Database;

    use mysqli;

    final class Database extends mysqli {

        private $conn;

        public function __construct() {

            $host = 'localhost';
            $username = 'root';
            $password = '';
            $db_name = 'shopping_db';

            $this->conn = parent::__construct($host, $username, $password, $db_name);

            if(!$this->conn) {
                die('Unable to connect to the database!');
            }

        }

        public function query(string $sql, int $result_mode = MYSQLI_STORE_RESULT) {

            return parent::query($sql, $result_mode);

        }

    }