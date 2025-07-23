<?php

$name = "localhost";
$user = "root";
$password = "";
$database = "mydb";


// establishing connection with db mysql
$conn = mysqli_connect($name, $user, $password, $database);

if ($conn) {
    //echo "connection ok";
} else {
    echo "connection failed" . mysqli_connect_error();
}

?>