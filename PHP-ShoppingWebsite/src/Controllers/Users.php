<?php

require_once __DIR__ . '/../requires.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    class Users {
        
        protected $userModel;
        
        public function __construct() {

            $this->userModel = new User();

        }


        public function _login() {
            $login_user = $this->userModel->login();

            if($login_user) {
                
                $_SESSION['success_message'] = "You have logged in successfully!";
                header("Location: http://localhost/indeavr_website/src/View/home.php");
            } else {

                $_SESSION['error_message'] = "Invalid credentials. Try again!";
                $_SESSION['logged_in'] = false;
                header("Location: http://localhost/indeavr_website/src/View/Users/Auth/login.php");
            }

        }

        public function _register() {
            $register = $this->userModel->register();
            
            if($register) {
                $_SESSION['success_message'] = 'You have registered successfully. Log in with your credentials!';
                header("Location: http://localhost/indeavr_website/src/View/Users/Auth/login.php");
            } else {
                $_SESSION['error_message'] = 'The email is already registered. Try again!';
                header("Location: http://localhost/indeavr_website/src/View/Users/Auth/register.php");
            }
        }


        public function _edit() {
            $edit = $this->userModel->edit();

            if($edit) {
                $_SESSION['success_message'] = 'You have edited your profile successfully!';
                header("Location: http://localhost/indeavr_website/src/View/home.php");
            } else {
                $_SESSION['error_message'] = 'Something went wrong. Try again!';
                header("Location: http://localhost/indeavr_website/src/View/home.php");
            }
        }

    }

?>