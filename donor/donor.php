<?php
include("connection.php");
if (!isset($_SESSION['id'])) {
   
    header('location: donor_login.php');
    exit; 
}
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
 }else{
    $user_id = '';
 }
 
?>
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
    <form id="registration_form" method="post" action="">
      <div class="field">
        <?php
include("connection.php");
$query = "SELECT * FROM `donor_login` WHERE id = $user_id";
$result=mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$names = $row['d_name'];
$emails = $row['d_email'];
        ?>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="d_name" value="<?php echo $names ?>"required disabled>
      </div>
      <div class="field">
        <label for="name">Blood Group:</label>
        <input type="text" id="name" name="d_bloodgroup" placeholder="Eg: O+"required>
      </div>
      <div class="field">
        <label for="name">Date of Birth:</label>
        <input type="date" id="name" name="d_dateofbirth" placeholder="Eg: O+"required>
      </div>
      <div class="field">
        <label for="phone">Phone Number (optional):</label>
        <input type="tel" id="phone" name="d_phone" placeholder="10 Digit Number" maxlength="10" required>
      </div>
      <div class="field">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="d_email" value="<?php echo $emails ?>" disabled required>
      </div>
      <div class="field">
        <label for="address">Address:</label>
        <input type="text" id="address" name="d_address" required>
      </div>
      <div class="field">
        <label for="donate_organ">Become an Organ Donor :</label>
        <div class="checkbox-group">                                    
          <label for="donate_heart">
            <input type="checkbox" id="donate_heart" name="d_organ[]" value="heart"> Heart
          </label>
          <label for="donate_lungs">
            <input type="checkbox" id="donate_lungs" name="d_organ[]" value="lung"> Lungs
          </label>
          <label for="donate_kidneys">
            <input type="checkbox" id="donate_kidneys" name="d_organ[]" value="kidney"> Kidneys
          </label>
          <label for="donate_liver">
            <input type="checkbox" id="donate_livwe" name="d_organ[]" value="liver"> Liver
          </label>
          <label for="donate_pancreas">
            <input type="checkbox" id="donate_pancreas" name="d_organ[]" value="pancreas"> Pancreas
          </label>
          <label for="donate_Eyes">
            <input type="checkbox" id="donate_Eyes" name="d_organ[]" value="Eyes"> Eyes
          </label>
          <label for="donate_intestine">
            <input type="checkbox" id="donate_intestine" name="d_organ[]" value="intestine"> Intestine
          </label>
          <label for="donate_hands">
            <input type="checkbox" id="donate_hands" name="d_organ[]" value="hands"> Hands
          </label>
  <br>
        </div>
      </div>
      <div class="field">
  <label for="cause_of_death">Possible Cause of Death (optional):</label>
  <input type="text" id="select_cause" name="select_cause" required>
</div>

      <div class="field">
        <label for="city">City:</label>
        <input type="text" id="city" name="d_city" required>
      </div>
      <button type="submit" name="submit">Submit Registration</button>
    </form>
  </div>

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
  width: 900px;
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
input[type="date"],
select {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
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

<?php

include("connection.php");
if (isset($_POST["submit"])) {
  $blood = $_POST["d_bloodgroup"];
  $dateofbirth = $_POST["d_dateofbirth"];
  $phone = $_POST["d_phone"];
  $address = $_POST["d_address"];
  $organ = $_POST["d_organ"];
  $text = $_POST['select_cause'];
  $city = $_POST["d_city"];

  $goo = implode(',',array_filter($organ));
  $dob = date('Y-m-d',strtotime($dateofbirth));
  $existing_user_query = "SELECT * FROM `donor_register` WHERE d_email = '$emails' OR d_name = '$names'";
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
  $query = "INSERT INTO `donor_register` (d_name , d_bloodgroup , d_dateofbirth , d_phone , d_email , d_address , d_organ ,d_cause ,d_city , d_dates,R_id) VALUES ('$names','$blood','$dob','$phone','$emails','$address','$goo','$text','$city',NOW() , $user_id)";
  $result = mysqli_query($conn, $query);
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful!',
            text: 'You have been successfully registered.',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'sidebar.php?view_profile'; 
        });
    </script>";
}



}

?>