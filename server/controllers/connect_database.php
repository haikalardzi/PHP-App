<?php
    $servername = "db";
    $dbname = "saranghaengbok_db";
    function connect_database($username, $password) { 
        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            echo "haha error";
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
?>
