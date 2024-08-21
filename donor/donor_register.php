<!DOCTYPE html>
<html>
<head>
  <title>Cool Registration Page</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" type="image/x-icon" href="uploads/favi.jpeg">
</head>
<body>
  <div class="registration-form">
    <h2>Create an Account</h2>
    <input type="hidden"  name="id" required>
    <form  method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" placeholder="Enter your name" name="d_name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="Enter your email address" name="d_email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" placeholder="Enter your password" name="d_password" required>
      </div>
      <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="d_photo" required>
      </div>
      <input type="submit" name="submit">
      <p class="login-link">Already have an account? <a href="donor_login.php">Sign in here</a></p>
    </form>
  </div>
</body>
</html>
<style>

body {
  height: 85vh;
  background-image: linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%);
  font-family: Arial, sans-serif;
}

.registration-form {
  background:rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 0px 16px 0 rgba(0, 0, 0, 0.5);
  max-width: 500px;
  margin: 0 auto;
  margin-top:100px;
  text-align: justify;
  padding: 10px;
  border-radius: 5px;
}

.registration-form h2 {
  text-align: center;
  padding-top:20px;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
}

.form-group input {
  width: 100%;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 5px
}
input[type=file]::file-selector-button {
  
  margin-right: 10px;
  border: none;
  background: #084cdf;
  padding: 5px 10px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}
input[type=file]{
  width: 400px;
}
input[type=file]::file-selector-button:hover {
  background: #0d45a5;
}
input[type=text],input[type=email],input[type=password], select {
  width: 400px;
  padding: 10px 20px;
  margin-right: 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 400px;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
.login-link{
    padding: 20px;
}
</style>

<?php
require('connection.php');
if (isset($_POST["submit"])) {
    $name = $_POST["d_name"];
    $email = $_POST["d_email"];
    $password = $_POST["d_password"];
    $d_photo= $_FILES['d_photo']['name'];
    $tmp_image = $_FILES['d_photo']['tmp_name'];
    move_uploaded_file($tmp_image, "../uploads/$d_photo");
    $existing_user_query = "SELECT * FROM donor_login WHERE d_email = '$email' OR d_name = '$name'";
    $existing_user_result = mysqli_query($conn, $existing_user_query);
    if (mysqli_num_rows($existing_user_result) > 0) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'User with this email or username already exists.'
            });
        </script>";
    } else {
  
        $query = "INSERT INTO donor_login (d_name, d_email, d_password, d_photo) VALUES ('$name', '$email', '$password', '$d_photo')";
        $result = mysqli_query($conn, $query);
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful!',
            text: 'You have been successfully registered.',
            confirmButtonText: 'OK'
        }).then(() => {
            // Redirect to another page after 2 seconds
            window.location.href = 'donor_login.php'; 
        });
    </script>";
      
    }
   
}

?>

