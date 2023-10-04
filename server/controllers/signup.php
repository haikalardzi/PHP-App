<?php 
    require_once "connect_database.php";
    //only accepting post method
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //verification process
        $conn = connect_database();
        $query = "SELECT * FROM User";
        $stmt = $conn->prepare($query);
        

        if (!$stmt) {
            die("Error in query preparation: " . $conn->error);
        }

        $result = $stmt->execute();

        if (!$result) {
            die("Error in query execution: " . $stmt->error);
        }
        // Bind the result variables
        // $stmt->bind_result($resultEmail, $resultUsername, $resultPassword);
        $resultSet = $stmt->get_result();
        // Fetch the result
        // $stmt->fetch();
        $rows = $resultSet->fetch_all();

        // If found something from the query, determined by the fetched results
        // and making response as json format
        if (!empty($rows)) {
            $response = array("success" => true, "message" => "data sent", "data" => $rows);
        } else {
            $response = array("success" => false, "message" => "Error: not found");
        }
        echo json_encode($response);
        mysqli_close($conn);
    } else if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $conn = connect_database();
        $query = "INSERT INTO `User` (`email`, `username`, `password`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Error in query preparation: " . $conn->error);
        }

        $email    = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $stmt->bind_param("sss", $email, $username, $password);
        $result = $stmt->execute();

        if (!$result) {
            die("Error in query execution: " . $stmt->error);
        } else {
            $response = array("success" => true, "message" => "Sign up success");
            echo json_encode($response);
        }
        mysqli_close($conn);
    }
?>