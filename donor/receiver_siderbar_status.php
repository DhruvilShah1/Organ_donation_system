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
  <title>Organ Donation Status</title>

</head>
<body>
<div class="refresh-note" id="refreshNote">
        <span class="close-button" onclick="closeNote()">&times;</span>
        <p>Please refresh your page for new information.</p>
    </div>
<?php
include("connection.php");

$query = "SELECT * FROM `receiver_register` WHERE receiver_id = $user_id AND r_status='approve'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <h1>Organ Donation Status</h1>
        <div class="patient-info">
            <h2>Patient Information</h2>
            <ul>
                <li><strong>Name:</strong> <span id="patient-name"><?php echo $row['r_name'] ?></span></li>
                <li><strong>Blood Type:</strong> <span id="patient-bloodtype"><?php echo $row['r_bloodgroup'] ?></span></li>
                <li><strong>Date Of Birth:</strong> <span id="patient-birthdate"><?php echo $row['r_dateofbirth'] ?></span></li>
            </ul>
        </div>
        <div class="needs">
            <h2>Needs</h2>
            <ul>
                <li><strong>Organ(s) Needed:</strong> <span id="needed-organs"><?php echo $row['r_organ'] ?></span></li>
            </ul>
        </div>
        <div class="hospital-doctor">
        <?php
include("connection.php");
$query1 = "SELECT * FROM `matched` WHERE r_id = $user_id";
$result1 = mysqli_query($conn, $query1);

if ($result1 && mysqli_num_rows($result1) > 0) {
    $rowss = mysqli_fetch_assoc($result1);
    $id = $rowss['dd_name'];
    ?>
            <h2>Hospital and Doctor</h2>
            <ul>
                <li><strong>Assigned Hospital:</strong> <span id="assigned-hospital"><?php echo $rowss['hospital_name']?></span></li>
                <?php
$id = $rowss['dd_name'];
include("connection.php");

$query2 = "SELECT dd_name,dd_city FROM `doctor_login` WHERE d_id = '$id' AND dd_name != 'pending'";
$result2 = mysqli_query($conn, $query2);
$rowsss = mysqli_fetch_assoc($result2);
?>
<li><strong>Assigned Doctor:</strong> <span id="lead-surgeon"><?php 
if ($rowsss && isset($rowsss['dd_name'])) {
    echo 'Dr.' . $rowsss['dd_name'];
} else {
    echo "pending";
}
?>
</span></li>
<li><strong>Assigned City:</strong> <span id="assigned-hospital"><?php if ($rowsss && isset($rowsss['dd_city'])) {
    echo $rowsss['dd_city'];
} else {
    echo "pending";
}
?> </span></li>

            </ul>
        </div>
        <div class="donation-status">
            <h2>Donation Status</h2>
            <ul>
            <?php
include("connection.php");
$query4 = "SELECT * FROM `status` WHERE r_id = $user_id";
$result4 = mysqli_query($conn, $query4);

if ($result4 && mysqli_num_rows($result4) > 0) {
    $one = mysqli_fetch_assoc($result4);
    $idss = $one['r_id'];
    ?>
                <li><strong>Current Status:</strong> <span id="current-status"><?php echo $one['s_donate']?></span></li>
                <?php
include("connection.php");
$query5 = "SELECT * FROM `donor_register` WHERE R_id = '$idss'";
$result5 = mysqli_query($conn, $query5);
if ($result5 && mysqli_num_rows($result5) > 0) {
    $one1 = mysqli_fetch_assoc($result5);
   ?>
                <li><strong>Donor :</strong> <span id="current-status"><?php echo $one1['d_name']?></span></li>
                <li><strong>LAST UPDATE:</strong> <span id="current-status"><?php echo $one['update_date']?></span></li>
            </ul>
        </div>
    </div>
<?php
} }}}else {
    echo '<div class="status-box">
    <strong>Status:  Pending</strong>
    <p>
        Thank you for your interest in organ donation. Your registration is currently being reviewed.
        We will notify you once your donation status is approved. If you have any urgent concerns or questions,
        please feel free to <a href="contact.php">contact us</a>.
    </p>
    <p id="red">Please refresh the page for the most up-to-date information.</p>
</div>
';
}
?>

</body>
</html>
</body>
</html>

<script>
        function closeNote() {
            var note = document.getElementById('refreshNote');
            note.style.display = 'none';
        }
    </script>

<style>   .close-button {
            position: absolute;
            top: 1px;
            right: 5px;
            cursor: pointer;
            font-size: xx-large;
        }
 .refresh-note {
            background-color: #ffd700;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .status-box {
            position:relative;
            top:200px;
            width: 500px;
            left:100px;
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
  text-align: justify;
    font-size: 1em;
    line-height: 1.5;
    margin-bottom: 15px;
}

.status-box a {
    color: #007bff; 
    text-decoration: none;
    font-weight: bold;
}

.status-box a:hover {
    text-decoration: underline;
}
#red{
  color :red;
}

    .container{
        position:relative;
        width:50%;
        left:500px;
        height:110vh;
    }

body {
  font-family: sans-serif;
  height:110vh;
  
}
h1, h2 {
  margin-bottom: 1rem;
}
ul {
  list-style: none;
  padding: 0;
}
li {
  margin-bottom: 0.5rem;
}
.patient-info, .needs, .hospital-doctor, .donation-status {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0));
    backdrop-filter: blur(30px);
    -webkit-backdrop-filter: blur(30px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
  border: 1px solid #eee;
  padding: 1.3rem;
  margin-bottom: 1rem;
}

    <style>
