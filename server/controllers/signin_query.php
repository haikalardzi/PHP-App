<?php
    require_once "connect_database.php";
//querying with set queries, with differentiation to query user or admin table
function signin_query($uname, $pass, $table) {
    //establishing connection
    $conn = connect_database();
    // query definition, preparation, and binding parameters
    if ($table == "user") {
        $query = "SELECT * FROM {$table} WHERE username = ? AND password = ?";
    } else if ($table == "admin") {
        $query = "SELECT * FROM {$table} WHERE admin_username = ?";
    }
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Error in query preparation: " . $conn->error);
    }
    if ($table == "user") {
        $stmt->bind_param("ss", $uname, $pass);
    } else {
        $stmt->bind_param("s", $uname);
    }

    // Execute prepared statement
    $result = $stmt->execute();
    if (!$result) {
        die("Error in query execution: " . $stmt->error);
    }

    // Get the result set
    $resultSet = $stmt->get_result();

    mysqli_close($conn);
    // Fetch all rows from the result set
    return $resultSet->fetch_all(MYSQLI_ASSOC);
}
?>