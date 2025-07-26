<?php
session_start();
include("connect.php");

$incorrect_message = "";
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM student 
            WHERE name = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $_SESSION["username"] = $username;
    header("location: read.php");
    exit();
  } else {
    $incorrect_message = "Incorrect username or password! Try Again";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div class="login-container">
    <form class="login-form" action="#" method="POST">
      <h2>🔐 AI Login Portal</h2>

      <div class="input-group">
        <input type="text" name="username" required>
        <label>Username</label>
      </div>

      <div class="input-group">
        <input type="password" name="password" required>
        <label>Password</label>
      </div>

      <!-- Show incorrect login message here -->
      <div class="input-group" style="color:red; font-size: 0.95rem;">
        <?php echo $incorrect_message; ?>
      </div>

      <div class="forgot"><a href="#" id="forgot-link">Forgot password?</a></div>

      <script>
        document.getElementById('forgot-link').addEventListener('click', function(e){
          e.preventDefault();
          alert("Sorry! This feature is not available yet. {Developer still working on it}");
        });
      </script>

      <button type="submit" name="login" class="login-btn">Login</button>

      <p class="signup-text">New member? <a href="form.php">Sign up first</a></p>
    </form>
  </div>
</body>
</html>
