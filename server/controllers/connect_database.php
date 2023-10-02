<?php
    $servername = "localhost";
    $dbname = "db";
    function connect_database($username, $password) { 
        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
?>
