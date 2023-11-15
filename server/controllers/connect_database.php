<?php
    function connect_database(){
    // Create a connection
    $conn = new mysqli('db-php-app', 'root', 'admin', 'saranghaengbok_php');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
    }
?>
