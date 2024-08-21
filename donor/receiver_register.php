<!DOCTYPE html>
<html>
<head>
  <title>Cool Registration Page</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="registration-form">
    <h2>Create an Account</h2>
    <form  method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="r_name" placeholder="Enter your name"  required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="r_email"  placeholder="Enter your email address" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password"  name="r_password" placeholder="Enter your password" required>
      </div>
      <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" id="photo"  name="r_photo"required >
      </div>
      <input type="submit" name="submit">
      <p class="login-link">Already have an account? <a href="receiver_login.php">Sign in here</a></p>
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
  padding: 10px;
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

input[type=file]::file-selector-button:hover {
  background: #0d45a5;
}
input[type=text],input[type=email],input[type=password], select {
  width: 300px;
  padding: 10px 20px;
  margin-right: 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
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
include('connection.php');
if (isset($_POST["submit"])) {
    $name = $_POST["r_name"];
    $email = $_POST["r_email"];
    $password = $_POST["r_password"];
    $r_photo= $_FILES['r_photo']['name'];
    $tmp_image = $_FILES['r_photo']['tmp_name'];
    move_uploaded_file($tmp_image, "../uploads/$r_photo");
    $existing_user_query = "SELECT * FROM receiver_login WHERE r_email = '$email' OR r_name = '$name'";
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
  
        $query = "INSERT INTO receiver_login (r_name, r_email, r_password, r_photo) VALUES ('$name', '$email', '$password', '$r_photo')";
        $result = mysqli_query($conn, $query);
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful!',
            text: 'You have been successfully registered.',
            confirmButtonText: 'OK'
        }).then(() => {
            // Redirect to another page after 2 seconds
            window.location.href = 'receiver_login.php'; 
        });
    </script>";
      
    }
   
}

?>