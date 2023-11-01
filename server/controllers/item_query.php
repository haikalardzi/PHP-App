<?php
    require_once "connect_database.php";

    function item_query($id) {
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $id = $_GET["id"];
            
            $conn = connect_database();
    
            $query = "SELECT * FROM `item` WHERE item_id = (?)";
            $stmt = $conn->prepare($query);
    
            if (!$stmt){
                die("Error in query preparation: ". $conn->error);
            }
            $stmt->bind_param("i", $id);
    
            $result = $stmt->execute();
            if (!$result){
                die("Error in query execution: " . $stmt->error);
            }
            $resultSet = $stmt->get_result();
            // $rows = $resultSet->fetch_all(MYSQLI_ASSOC);
            // if (!empty($rows)){
            //     $response = array("success" => true, "message" => "data sent", "data" => $rows);
            // } else {
            //     $response = array("success" => false, "message" => "Error: not found");
            // }
            
            mysqli_close($conn);
            return $resultSet->fetch_all(MYSQLI_ASSOC);
        } 
    }
?>