<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
    } else {
        $username = "guest"; //default akses adalah guest account
        $password = "tamu"; //default guest account password
    }
    $servername = "localhost";
    $dbname = "db";
    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
