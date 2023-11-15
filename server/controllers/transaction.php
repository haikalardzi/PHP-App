<?php
    session_start();
    require_once "connect_database.php";
    require_once "../model/transaction.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_SESSION["username"];
        $conn = connect_database();

        $query = "SELECT `c`.`cart_username`, `i`.`seller_username`,
                         `c`.`item_id`, `c`.`item_quantity` 
                         FROM `cart` AS `c` JOIN `item` AS `i`
                         ON `c`.`item_id`=`i`.`item_id`
                         WHERE `c`.`cart_username` = (?)";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Error in query preparation". $conn->error);
        }

        $stmt->bind_param("s", $username);
        $result = $stmt->execute();
        $resultSet = $stmt->get_result();
        $data_request = $resultSet->fetch_all(MYSQLI_ASSOC);

        $transaction = new Transaction($data_request);
        
        $data_response = $transaction->createTransaction();

        if (!$result) {
            $response = array("success" => "false", "message" => $stmt->error);
            die ("Error in query execution: " . $stmt->error);
        } else {
            $response = array("success" => "true", "message" => $data_response);
        }
        echo json_encode($response);
        mysqli_close($conn);
    }
?>