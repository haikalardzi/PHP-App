<?php
    session_start();
    require_once "connect_database.php";
    $username_current = $_SESSION["username"];
    $email_current = $_SESSION["email"];
    $conn = connect_database();
    function username_query($param){
        global $conn;
        $query = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Error in query preparation: " . $conn->error);
        }

        $stmt->bind_param("s", $param);
        $result = $stmt->execute();
        if (!$result) {
            die ("Error in query execution: " . $stmt->error);
        }

        $resultSet = $stmt->get_result();

        return $resultSet->fetch_all(MYSQLI_ASSOC);
    }

    function update_profile($target_username, $target_email, $target_password){
        global $conn;
        global $username_current;
        global $email_current;
        $query = "UPDATE user SET username = ?, email = ?, `password` = ? WHERE `username` = ?";
        //handling if user doesnt want to change some of the column
        if ($target_username == '%') {
            $target_username = $username_current;
        }
        if ($target_email == '%') {
            $target_email = $email_current;
        }
        if ($target_password == '%'){
            //handling not changing password is by seeing the user current password
            $target_password = username_query($username_current)[0]["password"];
        }

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Error in query preparation: " . $conn->error);
        }

        $stmt->bind_param("ssss", $target_username, $target_email, $target_password, $username_current);
        $result = $stmt->execute();
        if (!$result) {
            die ("Error in query execution: " . $stmt->error);
        } else {
            $_SESSION["username"] = $target_username;
            $_SESSION["email"] = $target_email;
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        //if user wants to change username
        if ($username != '%'){
            //check for possible existing username
            $username_check_rows = username_query($username);
            if (!empty($username_check_rows)) {
                // if username substitute already exists, returns a fail
                $response = array("success" => false, "message" => "username already exists");
            } else {
                // safe to change, execute change
                update_profile($username, $email, $password);
                $response = array("success" => true, "message" => "profile is updated");
            }
        } else {
            //user doesn't intend to change username
            //safe to change, can execute
            update_profile($username, $email, $password);
            $response = array("success" => true, "message" => "profile is updated");
        }
        
    }
    echo json_encode($response);
    mysqli_close($conn);
?>