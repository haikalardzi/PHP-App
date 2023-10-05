<?php 
    session_start();
    // querying into the user table for authentication, 
    // and then querying further into the admin table for admin access
    require_once "connect_database.php";
    require_once "signin_query.php";

    //only accepting post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $rows_user = signin_query($username, $password, "user");
        if (!empty($rows_user)) {
            if ($rows_user[0]["username"] == $username and $rows_user[0]["password"] == $password) {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $rows_admin = signin_query($username, $password, "admin");
                if (!empty($rows_admin) and $rows_admin[0]["admin_username"] == $username){ 
                    $_SESSION['admin_status'] = true;
                    $response = array("success" => true, "message" => "admin {$username} is found");
                } else {
                    $_SESSION['admin_status'] = false;
                    $response = array("success" => true, "message" => "user {$username} is found");
                }
            } else {
                $response = array("success" => false, "message" => "Username/Password is incorrect");
            }
        } else {
            $response = array("success" => false, "message" => "Error: user not found");
        }
        echo json_encode($response);
    }
?>