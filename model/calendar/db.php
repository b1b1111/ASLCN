<?php

$conn = mysqli_connect("webagencawben.mysql.db","webagencawben","Ben0ubenou","webagencawben") ;

if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>