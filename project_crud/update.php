<?php
include 'connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM student WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<h2>Update User</h2>
<form action="" method="POST">
    <label for="">Name: </label>
    <input type="text" name="name" id="name" value="<?php echo $row['name'];?>"/>
    <br />
    <label for="">Age: </label>
    <input type="number" name="age" id="age" value="<?php echo $row['age'];?>" />
    <br />
    <label for="">Password: </label>
    <input type="password" name="pass" id="pass"  value="<?php echo $row['password'];?>"/>
    <br />
    <label for="">City: </label>
    <input type="text" name="city" id="city" value="<?php echo $row['city'];?>"/>
    <br />
    <input type="submit" value="Update Data" name="submit" />
</form>

<?php
if (isset($_POST['submit'])) {
$name = $_POST["name"];
$age = $_POST["age"];
$pwd = $_POST["pass"];
$city = $_POST["city"];



$query = "UPDATE student SET 
            name = '$name', 
            age =' $age', 
            city = '$city', 
            password = '$pwd'
            WHERE id='$id'";

$result = mysqli_query($conn, $query);

if($result){
    ?>
    <script>alert('data is updated')</script>
    <meta http-equiv="refresh" content="0; url=http://localhost/test/read.php">
    <?php
}
else{
    echo "Failed to update data";
}
}

?>