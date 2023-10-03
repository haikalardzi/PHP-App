<?php
    include "connect_database.php";
    $con = connect_database();

    if ($con) {
        echo "wow";
    } else {
        echo "wokwow";
    }
?>