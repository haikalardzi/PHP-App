<?php
    session_start();
    require_once "connect_database.php";
    global $conn; $conn = connect_database();
    function itemCount_query(){
        global $conn;
        $query = "SELECT COUNT(*) FROM `item`";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Error in query preparation: " . $conn->error);
        }
        $result = $stmt->execute();
        if (!$result) {
            die ("Error in query execution: " . $stmt->error);
        }
        $resultSet = $stmt->get_result();
        return $resultSet->fetch_all(MYSQLI_ASSOC);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        global $conn;
        $insert_query = "INSERT INTO `item` (`item_id`, `name`, `picture_path`, `description`, `price`, `quantity`, `Seller_username`) VALUES ((?), (?), (?), (?), (?), (?), (?))
        ";
        $item_id = itemCount_query()[0]["COUNT(*)"] + 1;
        $name = $_POST["name"];
        $picture_path = $_POST["picture_path"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $seller_username = $_SESSION["username"];

        $stmt = $conn->prepare($insert_query);
        if (!$stmt) {
            die("Error in query preparation". $conn->error);
        }

        $stmt->bind_param("issssss", $item_id, $name, $picture_path, $description, $price, $quantity, $seller_username);
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