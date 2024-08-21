<?php
include("connection.php");
if (!isset($_SESSION['r_id'])) {
   
    header('location: receiver_login.php');
    exit; 
}
if(isset($_SESSION['r_id'])){
    $user_id = $_SESSION['r_id'];
 }else{
    $user_id = '';
 }
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
</head>
<body>

  <div class="container">
  <div class="popup">
   <div class="content">
   <form id="death-registration-form" method="post">
   <span class="icons"><i class="fas fa-cross"></i></span>
        <fieldset>
        <?php
  include("connection.php");
  $query = "SELECT * FROM `receiver_register` where receiver_id = $user_id";
  $result=mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
    $r_organ = $row['r_organ'];
    $r_organ1 = explode(",",$r_organ);
    ?>
            <legend>Personal Information</legend>
            <label for="name">Name:</label>
            <input type="text" id="name" name="r_name"  value ="<?php  echo $row['r_name']; ?>"required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="r_phone" pattern="^\d{10}$" value ="<?php  echo $row['r_phone']; ?>"required>
            <small>Enter 10-digit phone number (without spaces).</small>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="r_email" value ="<?php  echo $row['r_email']; ?>"required>

            <label for="address">Address:</label>
            <textarea id="address" name="r_address" rows="4" required><?php  echo $row['r_address']; ?></textarea>

            <div class="field">
    <label for="donate_organ">Need Of Organ:</label>
    <div class="checkbox-group">
        <label for="donate_heart">
            <input type="checkbox" id="donate_heart" name="r_organ[]" value="heart" <?php if(in_array("heart", $r_organ1)){ echo "checked"; }?>>
            Heart
        </label>
        <label for="donate_lungs">
            <input type="checkbox" id="donate_lungs" name="r_organ[]" value="lungs" <?php if(in_array("lungs", $r_organ1)){ echo "checked";} ?>>
            Lungs
        </label>
        <label for="donate_kidneys">
            <input type="checkbox" id="donate_kidneys" name="r_organ[]" value="kidneys" <?php if(in_array("kidneys", $r_organ1)){ echo "checked";} ?>>
            Kidneys
        </label>
        <label for="other">
  <input type="checkbox" id="other" name="r_organ[]"> Other
  </label>
  <input type="text" id="other_text" name="other_text" disabled>
  <br>
    </div>
</div>


            <label for="city">City:</label>
            <input type="text" id="city" name="r_city" value ="<?php  echo $row['r_city']; ?>"required>
        </fieldset>

        <button type="submit"  name="update">UPDATE</button>
    </form>
   </div>
</div>
<?php
include("connection.php");
  // UPDATE CODE
  if(isset($_POST['update'])){
     $name = $_POST['r_name'];
     $phone = $_POST['r_phone'];
     $email = $_POST['r_email'];
     $r_organ = $_POST['r_organ'];
     $selectedOrgans = isset($_POST['r_organ']) ? $_POST['r_organ'] : [];
     $otherText = isset($_POST['other_text']) ? trim($_POST['other_text']) : '';
     
     $combinedValue = implode(', ', $selectedOrgans);
  
     if (!empty($selectedOrgans) && !empty($otherText) && strtolower($otherText) !== 'on') {
         $combinedValue .= ', ' . $otherText;
     }
     $address = $_POST['r_address'];
     $city= $_POST['r_city'];
     $query = "UPDATE `receiver_register` SET r_name='$name', r_phone ='$phone' , r_email='$email',r_address ='$address',r_city = '$city' ,r_organ='$combinedValue' WHERE receiver_id=$user_id";
     $result=mysqli_query($conn,$query);
  }
?>
    <header>
      <h1>My Profile</h1>
      </header>
    

<section class="photo-info">
<?php
include("connection.php");

$query = "SELECT * FROM `receiver_login` as rl, `receiver_register` as rr WHERE rl.r_id = $user_id AND rr.receiver_id = $user_id AND rr.r_status='approve'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $photo = $row['r_photo'];
?>
        <main>
            <section class="photo-info">
                <?php
                echo '<img src="../uploads/' . $photo . '" alt="Profile picture">';
                ?>
                <div class="details">
                    <p><span class="label">Name:</span> <?php echo $row['r_name']; ?></p>
                    <p><span class="label">Email:</span> <?php echo $row['r_email']; ?> </p>
                    <p><span class="label">City:</span> <?php echo $row['r_city']; ?></p>
                    <p><span class="label">Phone:</span> <?php echo $row['r_phone']; ?></p>
                    <p><span class="label">Address:</span> <?php echo $row['r_address']; ?></p>
                </div>
            </section>

            <section class="donations">
                <h2>Donation Details</h2>
                <ul>
                    <li>
                        <span class="label">Organs:</span> <?php echo $row['r_organ']; ?>
                    </li>
                    <li>
                        <span class="label">Additional Notes:</span> (Optional space for details)
                    </li>
                </ul>
                <p class="wel">Your generous decision to donate organs will make a profound difference in the lives of others. Thank you for your compassion!</p>
            </section>
            <button type="button" class="btn btn-primary" id="button" data-toggle="modal" data-target="#exampleModal">
                Edit Profile
            </button>
        </main>
    <?php
    }
} else {
    echo '<div class="status-box">
              <strong>Status: Pending</strong> 
              <p>
              Additional details about the hospital, doctor, and other information are pending.
              We will show them here once available. 
          </p>
          <p id="red">Please refresh the page for the most up-to-date information.</p>
          </div>';
}
?>


</body>
</html>
<script>
  const otherCheckbox = document.getElementById('other');
  const otherText = document.getElementById('other_text');
  otherCheckbox.addEventListener('change', () => {
    otherText.disabled = !otherCheckbox.checked;
  });

  </script>
<style>
  .status-box {
            position:relative;
            width: 600px;
            padding: 15px;
            background-color: #ffc107; 
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            margin: 20px auto; 
        }
        .status-box strong {
    font-size: 1.2em;
    margin-bottom: 10px;
    display: block;
}

.status-box p {
    font-size: 1em;
    line-height: 1.5;
    margin-bottom: 15px;
    text-align: justify;
}
 #red{
  text-align: center;
  color :red;
 }
body {
  font-family: sans-serif;
  background-color: #f3f3f3;
  margin: 0;
  width: 100%;
  height: 100vh; 
}

.container {
  display: flex;
  flex-direction: column;
  justify-content: space-between; 
  align-items: center;
  min-height: 90vh;
  padding-left:200px;
}

header {
  padding: 30px;
  text-align: center;
}

main {
  flex: 1; 
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  gap: 20px;
}

.photo-info,
.bio,
.donations {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0));
    backdrop-filter: blur(30px);
    -webkit-backdrop-filter: blur(30px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 20px;
  flex: 1; /* Share horizontal space equally */
}

.photo-info {
  display: flex;
  align-items: center;
}

.photo-info img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  margin-right: 20px;
}

.details {
  font-size: 16px;
  color: #333;
}

.label {
  font-weight: bold;
  
}
p{
    padding-left:30px;
    margin-bottom:10px;
}
 .wel{
    padding-left:0px;
    margin-bottom:0px;
 }
.edit-profile{
    margin-top:20px;
  background: linear-gradient(to right, #3498db 0%, #2980b9 100%);
  color: #fff;
  padding: 15px 25px;
  border: none;
 position: relative;
 left:450px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.edit-profile:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}


.bio,
.donations {
  text-align: justify; /* Justified text for better readability */
}

.donations p {
  margin-top: 20px
}
li{
    margin-bottom:10px;
}
.donations h2{
    margin-bottom:20px;
}

/* Initial popup styles */
.popup {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
 width:90%;
 height:97%;
 z-index: 1;
position:absolute;
top:20px;
right:30px;
display:none;
align-items:center;
}
.content{
  width:100%;
 height:100%;
background:white;
  padding:20px;
  position: relative;
}

h1 {
    text-align: center;
    font-size: 1.5em;
    margin-bottom: 20px;
}

fieldset {
    border: 1px solid #ccc;
    padding: 5px;
    margin-bottom: 20px;
}

legend {
    font-weight: bold;
    margin-bottom: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

button {
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45A049; /* Darker green */
}
.icons{
  position: relative;
  float:right;
  bottom:15px;
  left:10px;
  cursor: pointer;
}

</style>
<script>
    
document.getElementById('button').addEventListener("click",function(){
  document.querySelector(".popup").style.display = "flex";
})
document.querySelector(".icons").addEventListener("click",function(){
  document.querySelector(".popup").style.display = "none";
})

    </script>