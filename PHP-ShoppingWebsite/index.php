<?php

    require_once "src/requires.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $user = new Users();
    $product = new Products();


    if(isset($_POST['register_button'])) {
        $user->_register();
    } elseif(isset($_POST['login_button'])) {
        $user->_login();
    } elseif(isset($_POST['edit_button'])) {
        $user->_edit();
    } elseif(isset($_POST['create_product_button'])) {
        $product->_create();
    } elseif(isset($_POST['edit_product_button'])) {
        $product->_edit();
    } else {
        header('Location:src/View/home.php');
    }

?>