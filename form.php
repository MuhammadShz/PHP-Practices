<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="form-container" enctype="multipart/form-data">
    <form action="create.php" method="POST" class="custom-form" enctype="multipart/form-data">
      <h2>Register Form</h2>

      <div class="image-field">
        <label for="name">Upload Image: </label>
        <input type="file" name="myfile" required id="fileInput">
        <div id="preview">Image Preview</div>
      </div>

      <div class="form-group">
        <input type="text" name="name" id="name" required />
        <label for="name">Name</label>
      </div>

      <div class="form-group">
        <input type="number" name="age" id="age" min="0" required />
        <label for="age">Age</label>
      </div>

      <div class="form-group">
        <input type="password" name="pass" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}" title="Password must be at least 8 characters and include uppercase, lowercase, number, and special character" required />
        <label for="pass">Password</label>
      </div>

      <div class="form-group">
        <input type="text" name="city" id="city" required />
        <label for="city">City</label>
      </div>

      <div class="form-group">
        <select name="gender" id="gender" required>
          <option value="" disabled selected>Choose Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>

      <!-- Religion (Radio Buttons) -->
      <div class="radio_btn">
        <p>Religion:</p>
        <div class="option-group">
          <label><input type="radio" name="religion" value="Muslim" required /> Muslim</label>
          <label> <input type="radio" name="religion" value="Hindu" /> Hindu</label>
          <label><input type="radio" name="religion" value="Christian" /> Christian</label>
          <label> <input type="radio" name="religion" value="Athiest" /> Athiest</label>
        </div>
      </div>

      <!-- Languages (Checkboxes) -->
      <div class="checkbox-btn">
        <p>Languages:</p>
        <div class="option-group">
          <label><input type="checkbox" name="languages[]" value="English" /> English</label>
          <label><input type="checkbox" name="languages[]" value="Urdu" /> Urdu</label>
          <label><input type="checkbox" name="languages[]" value="Hindi" /> Hindi</label>
        </div>
      </div>

      <div class="form-group">
        <p style="    margin: 10px 0px 5px 0px; color: #8e44ad;">Address:</p>
        <textarea style="resize: none" name="address" id="address" required
          placeholder="Enter your detail address here..."></textarea>
      </div>

      <input type="submit" value="Submit Data" name="submit" class="submit-btn" />
    </form>
  </div>
</body>

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

</html>