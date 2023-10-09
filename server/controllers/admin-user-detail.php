<?php
    require_once "connect_database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($_POST["signal"] == "userdetail") {
            $username = $_POST["Username"];

            $conn = connect_database();

            $query = "SELECT * FROM user WHERE username='$username'";
            $stmt = $conn->prepare($query);

            if (!$stmt){
                die("Error in query preparation: ". $conn->error);
            }
            $result = $stmt->execute();

            if (!$result){
                die("Error in query execution: " . $stmt->error);
            }

            $resultSet = $stmt->get_result();
            $rows = $resultSet->fetch_all();
            if (!empty($rows)){
                $response = array("success" => true, "message" => "data sent", "data" => $rows);
            } else {
                $response = array("success" => false, "message" => "Error: not found");
            }
            echo json_encode($response);
            mysqli_close($conn);
        } else if ($_POST["signal"] == "useredit"){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $conn = connect_database();

            $query = "UPDATE user
                      SET email='$email', password = '$password'
                      WHERE username='$username'";
            
            $stmt = $conn->prepare($query);

            if (!$stmt){
                die("Error in query preparation: ". $conn->error);
            }
            $result = $stmt->execute();

            if (!$result){
                die("Error in query execution: " . $stmt->error);
            } else {
                $response = array("success" => true, "message" => "edit account for {$username} success");
            }
        } else if ($_POST["signal"] == "userdelete"){
            $username = $_POST["username"];
            
            $conn = connect_database();

            $query = "DELETE FROM user WHERE username='$username'";
            $stmt = $conn->prepare($query);

            if (!$stmt){
                die("Error in query preparation: ". $conn->error);
            }
            $result = $stmt->execute();

            if (!$result){
                die("Error in query execution: " . $stmt->error);
            } else {
                $response = array("success" => true, "message" => "delete account for {$username} success");
            }
        }
    }
?>