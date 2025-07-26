<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

error_reporting(0);
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
</head>

</html>



<?php
include 'connect.php';

$id = $_GET['id'];


$sql = "SELECT * FROM student WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$languages_array = explode(",", $row["languages"]);



// Imagae URL testing
$imageFile = $row["stu_image"];
if (!str_starts_with($imageFile, "images/")) {
    $imageFile = "images/" . $imageFile;
}

?>

<div class="form-container">
    <form action="" method="POST" class="custom-form" enctype="multipart/form-data">
        <h2>Update Form</h2>

        <div class="image-field">
            <label for="name">Upload Image: </label>
            <input type="file" name="myfile" id="fileInput">
            <div id="preview"><img src="<?php echo $imageFile; ?>" alt="Image Preview" height="100px" width="100px">
            </div>
            <!-- hidden input field to store old image value -->
            <input type="hidden" name="old_image" value="<?php echo $imageFile; ?>">
        </div>

        <div class="form-group">
            <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required />
            <label for="name">Name</label>
        </div>

        <div class="form-group">
            <input type="number" name="age" id="age" min="0" value="<?php echo $row['age']; ?>" required />
            <label for="age">Age</label>
        </div>

        <div class="form-group">
            <input type="password" name="pass" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}"
                title="Password must be at least 8 characters and include uppercase, lowercase, number, and special character"
                value="<?php echo $row['password']; ?>" required />
            <label for="pass">Password</label>
        </div>

        <div class="form-group">
            <input type="text" name="city" id="city" value="<?php echo $row['city']; ?>" required />
            <label for="city">City</label>
        </div>

        <div class="form-group">
            <select name="gender" required>
                <option value="" disabled selected>Choose Gender</option>
                <option value="male" <?php
                if ($row['gender'] == 'male') {
                    echo 'selected';
                }
                ?>>Male</option>
                <option value="female" <?php
                if ($row['gender'] == 'female') {
                    echo 'selected';
                }
                ?>>Female</option>
            </select>
        </div>

        <div class="radio_btn">
            <p>Religion:</p>
            <div class="option-group">
                <label><input type="radio" name="religion" value="Muslim" <?php
                if ($row['religion'] == 'Muslim') {
                    echo 'checked';
                }
                ?> /> Muslim</label>
                <label> <input type="radio" name="religion" value="Hindu" <?php
                if ($row['religion'] == 'Hindu') {
                    echo 'checked';
                }
                ?> /> Hindu</label>
                <label><input type="radio" name="religion" value="Christian" <?php
                if ($row['religion'] == 'Christian') {
                    echo 'checked';
                }
                ?> /> Christian</label>
                <label> <input type="radio" name="religion" value="Athiest" <?php
                if ($row['religion'] == 'Athiest') {
                    echo 'checked';
                }
                ?> /> Athiest</label>
            </div>
        </div>

        <div class="checkbox-btn">
            <p>Languages:</p>
            <div class="option-group">
                <label><input type="checkbox" name="languages[]" value="English" <?php
                if (in_array('English', $languages_array)) {
                    echo 'checked';
                }
                ?> /> English</label>
                <label><input type="checkbox" name="languages[]" value="Urdu" <?php
                if (in_array('Urdu', $languages_array)) {
                    echo 'checked';
                }
                ?> /> Urdu</label>
                <label><input type="checkbox" name="languages[]" value="Hindi" <?php
                if (in_array('Hindi', $languages_array)) {
                    echo 'checked';
                }
                ?> /> Hindi</label>
            </div>
        </div>

        <div class="form-group">
            <p style="margin: 10px 0px 5px 0px; color: #8e44ad;">Address:</p>
            <textarea style="resize: none;" name="address" id="address" required
                placeholder="Enter your detail address here..."><?php echo $row['address']; ?></textarea>
        </div>

        <input type="submit" value="Update Data" name="submit" class="submit-btn" />
    </form>
</div>

<?php
if (isset($_POST['submit'])) {

    // file or image upload logic

    $oldImage = $_POST['old_image'];

    if ($_FILES['myfile']['name'] != "") {
        $new_image = $_FILES['myfile']['name'];
        $tmp = $_FILES['myfile']['tmp_name'];
        move_uploaded_file($tmp, "images/" . $new_image);
    } else {
        $new_image = $oldImage;
    }


    $name = $_POST["name"];
    $age = $_POST["age"];
    $pwd = $_POST["pass"];
    $city = $_POST["city"];
    $gender = $_POST["gender"];
    $religion = $_POST["religion"];
    if (isset($_POST['languages'])) {
        $langs = $_POST["languages"];
        $languages_updated = implode(",", $langs);
    } else {
        $languages_updated = "Other";
    }

    $address = $_POST["address"];




    $query = $query = "UPDATE student SET 
            stu_image = '$new_image',
            name = '$name', 
            age = '$age', 
            password = '$pwd',
            city = '$city', 
            gender = '$gender',
            religion = '$religion',
            languages = '$languages_updated',
            address = '$address'
          WHERE id = '$id'";


    $res = mysqli_query($conn, $query);

    if ($res) {
        ?>
        <!-- Put this line into alter() message to check the values of these variables if you face any problem while fetching image/file data from database and while updating them. -->
        <!-- code: -->
        <!-- echo "imagefile:" . $imageFile . "Old_Image: " . $oldImage . "new_Image:" . $new_image;  -->
        <script>alert('data is updated')</script>
        <meta http-equiv="refresh" content="0; url=http://localhost/project_crud/read.php">
        <?php
    } else {
        echo "Failed to update data";
    }
}
?>

<!-- Js code for showing the image preview inside div -->
<script>
    let fileInput = document.getElementById('fileInput');
    let previewDiv = document.getElementById('preview');


    fileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewDiv.innerHTML = `<img src="${e.target.result}" alt="Image Preview" height="100px" width="100px">`;
            }
            reader.readAsDataURL(file);
        }
        else {
            previewDiv.innerHTML = `Image preview here`;
        }
    })
</script>