<?php

include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // File or image upload logic 
    $filename = $_FILES["myfile"]["name"];
    $tempname = $_FILES["myfile"]["tmp_name"];
    $folder = "images/" . $filename;
    move_uploaded_file($tempname, $folder);

    $name = $_POST["name"];
    $age = $_POST["age"];
    $pwd = $_POST["pass"];
    $city = $_POST["city"];
    $gender = $_POST["gender"];
    $religion = $_POST["religion"];
    if(isset($_POST['languages'])) {
        $langs = $_POST["languages"];
        $languages_string = implode(",", $langs);
    }
    else{
        $languages_string = "Other";
    }
   
    $address = $_POST["address"];


    $query = "INSERT INTO student (stu_image, name, age, password, city, gender, religion, languages, address) VALUES ('$folder', '$name', '$age', '$pwd', '$city', '$gender', '$religion', '$languages_string' ,'$address')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "data is inserted";
        ?>
        <script>
            alert("Data is inserted successfully");
        </script>
        <?php

        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/project_crud/read.php">
        <?php
    } else {
        echo "failed to insert data";
    }

    mysqli_close($conn);
}

?>