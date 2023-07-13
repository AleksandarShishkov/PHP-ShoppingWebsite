<?php

require_once __DIR__ . '/../database.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    class User {
        
        
        private $name;
        private $surname;
        private $email;
        private $phone;
        private $city;
        private $password;



        // login
        public function login() {

            $this->email = $_POST['email'];
            $this->password = $_POST['password'];

            $login = false;

            $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

            if($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            $credentials = "SELECT * FROM users WHERE email = '$this->email'";
            $validate_credentials = $conn->query($credentials);

            if($validate_credentials->num_rows > 0) {
                $record = $validate_credentials->fetch_assoc();
                $reg_password = $record['password'];

                if(password_verify($this->password, $reg_password)) {
                    $_SESSION['user_id'] = $record['id'];
                    $login = true;
                }
            }

            $conn->close();

            return $login;
        }

        // register
        public function register() {

            
            $this->name = $_POST['name'];
            $this->surname = $_POST['surname'];
            $this->email = $_POST['email'];
            $this->phone = $_POST['phone'];
            $this->city = $_POST['city'];
            $this->password= password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $register = false;

            $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

            if($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            $credentials = "SELECT * FROM users WHERE email = '$this->email'";
            $validate_email = $conn->query($credentials);

            if($validate_email->num_rows > 0) {
                return $register;
            } else {

                $sql = "INSERT INTO users (name, surname, email, phone, city, password) 
                        VALUES ('$this->name', '$this->surname', '$this->email', '$this->phone', '$this->city', '$this->password')";
    
    
                if ($conn->query($sql) == true) {
                    $register = true;
                } 
    
                $conn->close();
    
                return $register;
            }

        }


        // edit profile
        public function edit() {

            $this->name = $_POST['edit_name'];
            $this->surname = $_POST['edit_surname'];
            $this->email = $_POST['edit_email'];
            $this->phone = $_POST['edit_phone'];
            $this->city = $_POST['edit_city'];

            $edit = false;
            $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

            if($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            $user_id = $_SESSION['user_id'];

            $edit_user = "UPDATE users SET name='$this->name', surname='$this->surname', 
                            email='$this->email', phone='$this->phone', city='$this->city'";

            
            if(isset($_POST['edit_password'])) {
                $this->password = password_hash($_POST['edit_password'], PASSWORD_DEFAULT);
                $edit_user .= ", password='$this->password'";
            }

            $edit_user .= " WHERE id='$user_id'";  

            if($conn->query($edit_user)) {
                $edit = true;
            }

            $conn->close();

            return $edit;
        }


    }


?>