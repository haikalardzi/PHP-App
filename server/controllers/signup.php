<?php 
    session_start();
    require_once "connect_database.php";
    require_once "signin_query.php";
    //only accepting post method
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email    = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $conn = connect_database();

        $rows_signin = signin_query($username, $password, "user");
        if (empty($rows_signin) or $rows_signin[0]["username"] != $username) {
            $query = "INSERT INTO `user` (`email`, `username`, `password`) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
    
            if (!$stmt) {
                die("Error in query preparation: " . $conn->error);
            }
    
            $stmt->bind_param("sss", $email, $username, $password);
            $result = $stmt->execute();
    
            if (!$result) {
                die("Error in query execution: " . $stmt->error);
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['admin_status'] = false;
                $response = array("success" => true, "message" => "sign up for {$email} and {$username} success");
            }
        } else {
            $response = array("success" => false, "message" => "user {$username} already exists");
        }
        echo json_encode($response);
        mysqli_close($conn);
    }
?>