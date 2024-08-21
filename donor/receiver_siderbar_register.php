<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Become a Hope Giver</title>
</head>
<body>
  <div class="container">
    <h1>Fill Detail Here</h1>
    <form  method="post" enctype="multipart/form-data">
    <?php
include("connection.php");
$query = "SELECT * FROM `receiver_login` WHERE r_id = $user_id";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$names = $row['r_name'];
$emails = $row['r_email'];
        ?>
      <div class="field">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="r_name" value="<?php echo $names?>"required disabled>
      </div>
      <div class="field">
        <label for="name">Date of Birth:</label>
        <input type="date" id="name" name="r_dateofbirth"required>
      </div>
      <div class="field">
        <label for="name">Blood Group:</label>
        <input type="text" id="name" name="r_bloodgroup" placeholder="Eg: O+"required>
      </div>
      <div class="field">
        <label for="phone">Phone Number (optional):</label>
        <input type="tel" id="phone" name="r_phone" placeholder="10 Digit Number" maxlength="10" required>
      </div>
      <div class="field">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="r_email" value="<?php echo $emails?>"required disabled>
      </div>
      <div class="field">
        <label for="address">Address:</label>
        <input type="text" id="address" name="r_address" required>
      </div>
      <div class="field">
    <label for="donate_organ">Need Of Organ:</label>
    <div class="checkbox-group">
        <label for="donate_heart">
            <input type="checkbox" id="donate_heart" name="r_organ[]" value="heart" >
            Heart
        </label>
        <label for="donate_lungs">
            <input type="checkbox" id="donate_lungs" name="r_organ[]" value="lung" >
            Lungs
        </label>
        <label for="donate_kidneys">
            <input type="checkbox" id="donate_kidneys" name="r_organ[]" value="kidney" >
            Kidneys
        </label>
        <label for="donate_liver">
            <input type="checkbox" id="donate_liver" name="r_organ[]" value="liver" >
            Liver
        </label>
        <label for="donate_pancreass">
            <input type="checkbox" id="donate_pancreas" name="r_organ[]" value="pancreas" >
            Pancreas
        </label>
        <label for="donate_eyes">
            <input type="checkbox" id="donate_eyes" name="r_organ[]" value="eyes" >
            Eyes
        </label>
        <label for="donate_intestine">
            <input type="checkbox" id="donate_instestine" name="r_organ[]" value="intestine" >
            Intestine
        </label>
        <label for="donate_hands">
            <input type="checkbox" id="donate_hands" name="r_organ[]" value="hand" >
            Hand
        </label>
          
  <br>
        </div>
      </div>
      <div class="field">
      <label for="file-upload">Upload Perception Report:</label>
    <input type="file" id="file-upload" accept="image/*, .pdf"  name="r_upload" required>
      </div>
      <div class="field">
        <label for="city">City:</label>
        <input type="text" id="city" name="r_city" required>
      </div>
      <button type="submit" name="submit">Submit Registration</button>
    </form>
  </div>
  <script src="script.js"></script>
</body>
</html>


<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: sans-serif;
  background-color: #f9f9f9;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.container {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 40px;
  width: 800px;
  position: relative;
  left : 100px;
  margin: 0 auto; 
}

h1 {
  text-align: center;
  font-size: 24px;
  color: #3498db; 
  margin-bottom: 20px;
}

.field {
  margin-bottom: 15px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="file"],
input[type="date"],
select {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}
input[type="file"]{
    border: 1px solid black;
}
input[type="checkbox"] {
  margin-right: 5px;
}

button[type="submit"] {
  display: block;
  width: 100%;
  background-color: #3498db; 
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

button[type="submit"]:hover {
  background-color: #2980b9; 
}

.checkbox-group {
  display: flex;
  flex-wrap: wrap; 
  margin-bottom: 10px;
}

.checkbox-group label {
  margin-right: 10px;
}


</style>
<script>
  const otherCheckbox = document.getElementById('other');
  const otherText = document.getElementById('other_text');
  otherCheckbox.addEventListener('change', () => {
    otherText.disabled = !otherCheckbox.checked;
  });

  </script>

<?php

include("connection.php");
if (isset($_POST["submit"])) {
  $blood = $_POST["r_bloodgroup"];
  $dateofbirth = $_POST["r_dateofbirth"];
  $phone = $_POST["r_phone"];
  $address = $_POST["r_address"];
  $organ = $_POST["r_organ"];
  $city = $_POST["r_city"];
  $r_upload= $_FILES['r_upload']['name'];
  $tmp_image = $_FILES['r_upload']['tmp_name'];
  move_uploaded_file($tmp_image, "../uploads/$r_upload");

  $selectedOrgans = isset($_POST['r_organ']) ? $_POST['r_organ'] : [];

  $otherText = isset($_POST['other_text']) ? $_POST['other_text'] : '';

  $combinedValue = implode(', ', $selectedOrgans);
  
  if (!empty($selectedOrgans) && !empty($otherText)) {
      $combinedValue .= ' ';
  }

  $combinedValue .= $otherText;

  $dob = date('Y-m-d',strtotime($dateofbirth));
  $existing_user_query = "SELECT * FROM `receiver_register` WHERE r_email = '$emails' OR r_name = '$names'";
  $existing_user_result = mysqli_query($conn, $existing_user_query);
  if (mysqli_num_rows($existing_user_result) > 0) {
      echo "<script>
          Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'User with this email or username already exists.'
          });
      </script>";
        }else{
  $query = "INSERT INTO `receiver_register`(r_name , r_dateofbirth , r_bloodgroup , r_phone , r_address, r_email  , r_organ ,r_upload ,r_city ,r_dates,receiver_id , r_status) VALUES ('$names','$dob','$blood','$phone','$address','$emails','$combinedValue','$r_upload','$city',NOW() , $user_id ,'pending')";
  $result = mysqli_query($conn, $query);
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful!',
            text: 'You have been successfully registered.',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'receiver_siderbar.php?receiver_siderbar_profile'; 
        });
    </script>";
}



}

?>