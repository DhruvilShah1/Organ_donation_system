<?php
include("connection.php");
if (!isset($_SESSION['a_id'])) {
   
    header('location: admin_login.php');
    exit; 
}
if(isset($_SESSION['a_id'])){
    $user_id = $_SESSION['a_id'];
 }else{
    $user_id = '';
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
<form method="POST">
  <h3>Doctor Information</h3>
  <div>
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="dd_name" required>
  </div>
  <div>
    <label for="name">Email:</label>
    <input type="text" id="name" name="dd_email" required>
  </div>
  <div>
    <label for="name">Password:</label>
    <input type="text" id="name" name="dd_password" required>
  </div>
  <div>
    <label for="specialization">Specialization(s):</label>
    <select id="specialization" name="dd_special" required>
      <option value="">Select...</option>
      <option value="Cardiology">Cardiology</option>
      <option value="Neurology">Neurology</option>
      </select>
  </div>
  <div>
    <label for="affiliation">Hospital Name:</label>
    <input type="text" id="name" name="dd_hospital" required>
  </div>
  <div>
    <label for="name">City:</label>
    <input type="text" id="name" name="dd_city" required>
  </div>
  <div>
    <label for="registration_number">Professional Registration Number (Masked):</label>

    <input type="text" id="registration_number" name="dd_registernumber" placeholder="XX-XXXX-XXXX-XXXX" maxlength="16" oninput="formatRegistrationNumber()" required>  </div>
 
  <button type="submit" name="submit">Add Doctor</button>
</form>

</body>
</html>
<script>
function formatRegistrationNumber() {

    let input = document.getElementById('registration_number').value;

    let formattedInput = input.replace(/[^A-Z0-9]/g, '');

    formattedInput = formattedInput.replace(/(.{2})(.{4})(.{4})(.{4})/, '$1-$2-$3-$4');

    document.getElementById('registration_number').value = formattedInput;
}
</script>
<style>
form {
    
    position: relative;
    left:500px;
    width: 50%;
    height: 100vh;
  padding: 25px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

fieldset {
  margin-bottom: 20px;
  border: 1px solid #ddd;
  padding: 10px;
}
h3{
    margin-bottom: 20px;

}

label {
    margin-top:20px;
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input, select {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-size: 16px;
}




button {
  background-color: #4CAF50; 
  color: white;
  margin-top:10px;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #449A48;
}

input[type="checkbox"] {
  margin-right: 5px;
}

.error-message {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}

</style>

<?php
require('connection.php');
if (isset($_POST["submit"])) {
    $name = $_POST["dd_name"];
    $email = $_POST["dd_email"];
    $password = $_POST["dd_password"];
    $hospital=  $_POST["dd_hospital"];
    $city=  $_POST["dd_city"];
    $special = $_POST["dd_special"];
    $register = $_POST["dd_registernumber"];
    $existing_user_query = "SELECT * FROM doctor_login WHERE dd_email = '$email' OR dd_name = '$name'";
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
  
        $query = "INSERT INTO doctor_login (dd_name, dd_special, dd_hospital, dd_registernumber , dd_email , dd_password , dd_city) VALUES ('$name', '$special', '$hospital', '$register','$email','$password','$city')";
        $result = mysqli_query($conn, $query);
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful!',
            text: 'You have been successfully registered.',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'admin_sidebar.php?doctor'; 
        });
    </script>";
      
    }
   
}

?>

