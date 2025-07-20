<html>

<head>
    <title></title>
    <style>
        .btn {
            padding: 5px;
            font-weight: bold;
        }

        .btn-up {
            background-color: rgba(13, 212, 37, 1);
        }

        .btn-del {
            background-color: rgba(229, 36, 11, 1);
        }
    </style>
</head>

</html>


<?php

include("connect.php");

$query = "SELECT * FROM student";
$data = mysqli_query($conn, $query);

$total_rows = mysqli_num_rows($data);
// echo $total_rows;

if ($total_rows > 0) {
    ?>
    <h2>All User Data</h2>
    <table border='1' cellpadding='10'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Password</th>
            <th>City</th>
            <th>Operations</th>
        </tr>
        <?php

        while ($row = mysqli_fetch_assoc($data)) {
            echo "<tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['age'] . "</td>
        <td>" . $row['password'] . "</td>
        <td>" . $row['city'] . "</td>
        <td><a href='update.php?id=" . $row['id'] . "'><input type='submit' value='Update' class='btn btn-up'></a>
        <a href='delete.php?id=" . $row['id'] . "'><input type='submit' value='Delete' class='btn btn-del' onclick=' return deleteData()'></a>
        </td>
      </tr>";

        }
} else {
    echo "No record Found";
}
?>
</table>

<script>
    function deleteData() {
        return confirm("are you sure to delete data?");
    }
</script>