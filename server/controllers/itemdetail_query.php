<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["signal"] == "make-purchase") {
        global $conn;
        $query = "SELECT * FROM `item` WHERE username = (?)
        ";
        $item_id = $_POST["item_id"];

        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Error in query preparation". $conn->error);
        }

        $stmt->bind_param("i", $item_id);
        $result = $stmt->execute();
        $resultSet = $stmt->get_result();

        
        if (!$result) {
            $response = array("success" => "false", "message" => $stmt.error);
            die ("Error in query execution: " . $stmt->error);
        } else {
            $response = array("success" => "true", "message" => "item has been added", "data" => $resultSet->fetch_all(MYSQLI_ASSOC));
        }
        
        echo json_encode($response);
        mysqli_close($conn);
    }
?>