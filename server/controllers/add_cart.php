<?php
    session_start();
    require_once "../../server/controllers/loggedout_catch.php";
    require_once "connect_database.php";
    global $conn; $conn = connect_database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        global $conn;
        $insert_query = "INSERT INTO `cart` (`item_id`, `cart_username`, `item_quantity`) VALUES ((?), (?), (?))
        ";
        $item_id = $_POST["item_id"];
        $cart_username = $_SESSION["username"];
        $item_quantity = $_POST["item_quantity"];

        $stmt = $conn->prepare($insert_query);
        if (!$stmt) {
            die("Error in query preparation". $conn->error);
        }

        $stmt->bind_param("sss", $item_id, $cart_username, $item_quantity);
        $result = $stmt->execute();
        if (!$result) {
            $response = array("success" => "false", "message" => $stmt.error);
            die ("Error in query execution: " . $stmt->error);
        } else {
            $response = array("success" => "true", "message" => "item has been added");
        }
        echo json_encode($response);
        mysqli_close($conn);
    }
?>