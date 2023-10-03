<?php 
    include "connect_database.php";
    //only accepting post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //verification process
        $conn = connect_database();
        $query = "SELECT * FROM User WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Error in query preparation: " . $conn->error);
        }

        $username = $_POST["username"];
        $password = $_POST["password"];
        $stmt->bind_param("ss", $username, $password);
        $result = $stmt->execute();

        if (!$result) {
            die("Error in query execution: " . $stmt->error);
        }
        // Bind the result variables
        $stmt->bind_result($resultEmail, $resultUsername, $resultPassword);

        // Fetch the result
        $stmt->fetch();

        // If found something from the query, determined by the fetched results
        // and making response as json format
        if (!empty($resultUsername) && !empty($resultPassword)) {
            $response = array("success" => true, "message" => "Sign in found");
        } else {
            $response = array("success" => false, "message" => "Error: not found");
        }
        echo json_encode($response);
        mysqli_close($conn);
    }
?>