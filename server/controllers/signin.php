<?php 
    include "connect_database.php";
    //only accepting post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // instantiating username and password variable
        $username = $_POST["username"];
        $password = $_POST["password"];
        echo "username=" + $username + "&password=" + $password;
    
    //verification process
    $conn = connect_database("guest", "tamu"); // karena ingin mencari data di table user, jadi sebelumnya establish koneksi sebagai tamu
    $query = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password); // data di table adalah string, maka dari itu bind_param "ss" (string)
    $stmt->execute();
    $result = $stmt->get_result();

    // if found something from the query, determined by the number of rows
    // and making response as json format
    if($result->num_rows == 1) {
        $username = "user";
        $password = "properuserisintheHOUSE";
        $response = array("success" => true, "message" => "Sign in as "+$username);
    } elseif ($result->num_rows == 0){
        $response = array("success" => false, "message" => "Sign in failed: user not found");
    } else {
        $response = array("success" => false, "message" => "Sign in failed: unknown error, found multiple user");
    }
    mysqli_close($conn);
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>