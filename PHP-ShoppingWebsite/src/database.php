<?php

require_once 'config.php';
    
    $conn = new mysqli(HOST, USERNAME, PASSWORD);

    if($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql_db = 'CREATE DATABASE IF NOT EXISTS '. DBNAME;
    if($conn->query($sql_db) == true) {
        echo "Database created successfully!";
    } else {
        echo "Error creating the database. Try again.";
    }

    $conn->close();


    $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // the users table
    $usersTable = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        surname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(255) NOT NULL,
        city VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    if ($conn->query($usersTable) === TRUE) {
        echo "Table 'users' created successfully";
    } else {
        echo "Error creating table 'users': " . $conn->error;
    }

    // the items table
    $itemsTable = "CREATE TABLE IF NOT EXISTS items (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11) NOT NULL,
        publication_date DATE NOT NULL,
        images TEXT,
        title VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL
    )";
    if ($conn->query($itemsTable) == true) {
        echo "Table 'items' created successfully";
    } else {
        echo "Error creating table 'items': " . $conn->error;
    }

    $conn->close();

?>