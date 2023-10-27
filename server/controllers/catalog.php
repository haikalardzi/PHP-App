<?php
    require_once "connect_database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $page = $_POST["rows"];
        $search = $_POST["search"];
        
        $conn = connect_database();

        $query = "SELECT *
                 ,(CASE WHEN name LIKE '%$search%' THEN 1 ELSE 0 END) +
                  (CASE WHEN `Seller_username` LIKE '%$search%' THEN 1 ELSE 0 END) AS priority
                  FROM item
                  WHERE name LIKE '%$search%'
                  OR Seller_username LIKE '%$search%'
                  ORDER BY priority DESC
                  LIMIT $page, 10";
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
    } else if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $search = $_GET["search"];
        
        $conn = connect_database();

        $query = "SELECT COUNT(item_id) FROM `item` WHERE name LIKE '%$search%' OR Seller_username LIKE '%$search%'";
        $stmt = $conn->prepare($query);

        if (!$stmt){
            die("Error in query preparation: ". $conn->error);
        }
        $result = $stmt->execute();

        if (!$result){
            die("Error in query execution: " . $stmt->error);
        }
        $resultSet = $stmt->get_result();
        $total = $resultSet->fetch_all();
        if (!empty($total)){
            $response = array("success" => true, "message" => "data sent", "total" => $total);
        } else {
            $response = array("success" => false, "message" => "Error: not found");
        }
        
        echo json_encode($response);
        mysqli_close($conn);
    }
?>