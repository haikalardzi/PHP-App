<?php 
    include "connect.php";
    //only accepting post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // instantiating username and password variable
        $username = $_POST["username"];
        $password = $_POST["password"];
    

    //verification process
    $query = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $role = "USER";
    } else {
        $role = "GUEST";
    }

    // Provide a response, e.g., success or error message, in JSON format
    $response = ["success" => true, "message" => "Registration successful"];
    echo json_encode($response);
}
?>