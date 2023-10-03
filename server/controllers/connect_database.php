<?php
    function connect_database(){
    // Create a connection
    $conn = new mysqli('db', 'saranghaengbok_db_admin', 'BOOMbitchgetouttheway', 'saranghaengbok_db');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
    }
?>
