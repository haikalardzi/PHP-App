<?php
    session_start();
    require_once "connect_database.php";
    global $conn; $conn = connect_database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        global $conn;
        $query = "SELECT * FROM `cart` 
                JOIN `item` ON `cart`.`item_id` = `item`.`item_id`
                WHERE `cart_username` = (?)
        ";
        $cart_username = $_SESSION["username"];

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Error in query preparation". $conn->error);
        }

        $stmt->bind_param("s", $cart_username);
        $result = $stmt->execute();
        $resultSet = $stmt->get_result();


        if (!$result) {
            $response = array("success" => "false", "message" => $stmt.error);
            die ("Error in query execution: " . $stmt->error);
        } else {
            $response = array("success" => "true", "message" => "showing ".$cart_username."'s cart", "data" => $resultSet->fetch_all(MYSQLI_ASSOC));
        }
        echo json_encode($response);
        mysqli_close($conn);
    }
?>