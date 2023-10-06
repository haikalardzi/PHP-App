<?php
    require_once "connect_database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $page = $_POST["rows"];
        
        $conn = connect_database();

        $query = "SELECT * FROM `item` LIMIT ? , 10";
        $stmt = $conn->prepare($query);

        if (!$stmt){
            die("Error in query preparation: ". $conn->error);
        }

        $stmt->bind_param("i", $page);
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
    }
?>