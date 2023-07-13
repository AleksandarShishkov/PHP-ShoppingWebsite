<?php

require_once __DIR__ . '/../requires.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Products {
    
    private $productModel;
    
    public function __construct() {
        $this->productModel = new Product();
    }


        public function _create() {
            $create_product = $this->productModel->create();

            if($create_product) {
                $_SESSION['success_message'] = "You have created a new product!";
                header("Location: http://localhost/indeavr_website/src/View/Products/index.php");

            } else {
                $_SESSION['error_message'] = "There`s been an issue. Name taken or image extension invaid (jpg/jpeg/png). Try again!";
                header("Location: http://localhost/indeavr_website/src/View/Products/index.php");
            }
        }


        public function _edit() {
            $edit_product = $this->productModel->edit();

            if($edit_product) {
                $_SESSION['success_message'] = "The item has been edited!";
                header("Location: http://localhost/indeavr_website/src/View/Products/index.php"); 
            } else {
                $_SESSION['error_message'] = "Something went wrong. Try again!";
                header("Location: http://localhost/indeavr_website/src/View/Products/index.php");
            }
        }

    }

?>