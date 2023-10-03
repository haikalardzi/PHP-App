<?php

$con = new mysqli('db', 'guest', 'tamu', 'saranghaengbok_db');

if ($con) {
    echo "wow";
} else {
    echo "wokwow";
}
?>