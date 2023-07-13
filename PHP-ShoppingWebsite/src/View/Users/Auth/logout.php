<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();

    header("Location:http://localhost/indeavr_website/src/View/home.php");

?>