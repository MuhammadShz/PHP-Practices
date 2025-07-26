<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include("connect.php");

$id = $_GET["id"];

$query = "DELETE FROM student WHERE id=$id";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>alert('data is deleted successfully')</script>"
        ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/project_crud/read.php">
    <?php
} else {
    echo "<script>alert('Failed to delete data')</script>";
}

?>