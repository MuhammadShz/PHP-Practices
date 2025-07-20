<?php

include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $city = $_POST["city"];
    $age = $_POST["age"];
    $pwd = $_POST["pass"];

    $query = "INSERT INTO student (name, age, password, city) VALUES ('$name', '$age', '$pwd', '$city')";
    $data = mysqli_query($conn, $query);
    
    if ($data) {
        echo "data is inserted";
        ?>
        <script>
            alert("Data is inserted successfully");
        </script>
        <?php
        
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/test/read.php">
        <?php
    }
    else{
        echo "failed to insert data";
    }

    mysqli_close($conn);
}

?>