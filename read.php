<!-- read.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>All User Data</title>
  <link rel="stylesheet" href="read.css">
</head>

<body>

  <div class="container">
    <h2>All User Data</h2>

    <?php
    include("connect.php");
    $query = "SELECT * FROM student";
    $data = mysqli_query($conn, $query);
    $total_rows = mysqli_num_rows($data);

    if ($total_rows > 0) {
      echo "<table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Password</th>
                  <th>City</th>
                  <th>Gender</th>
                  <th>Religion</th>
                  <th>Languages</th>
                  <th>Address</th>
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody>";


      while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>'<img src={$row['stu_image']} height='100px' width='100px' style='filter: drop-shadow(10px 10px 15px rgba(0,0,0,0.4))'>'</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['password']}</td>
                <td>{$row['city']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['religion']}</td>
                <td>{$row['languages']}</td>
                <td>{$row['address']}</td>
                <td>
                  <a href='update.php?id={$row['id']}' class='btn btn-up'>Update</a>
                  <a href='delete.php?id={$row['id']}' class='btn btn-del' onclick='return deleteData()'>Delete</a>
                </td>
              </tr>";
      }

      echo "</tbody></table>";
    } else {
      echo "<p class='no-record'>No record found.</p>";
    }
    ?>
  </div>

  <script>
    function deleteData() {
      return confirm("Are you sure you want to delete this data?");
    }
  </script>



</body>

</html>