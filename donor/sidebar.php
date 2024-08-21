<?php
session_start();
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
 

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
	list-style: none;
	text-decoration: none;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Open Sans', sans-serif;
}

body{
    background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);
}

.wrapper .sidebar{
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
  backdrop-filter: blur(30px);
  -webkit-backdrop-filter: blur(20px);
  border-radius: 10px;
  border:1px solid rgba(255, 255, 255, 0.18);
  box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
	position: fixed;
	top: 0;
	left: 0;
	width: 300px;
	height: 100%;
	padding: 30px 0;
	transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
	margin-bottom: 30px;
	text-align: center;
}
i{
    color:black;
}

.wrapper .sidebar .profile img{
	display: block;
	width: 100px;
	height: 100px;
    border-radius: 50%;
	margin: 0 auto;
}

.wrapper .sidebar .profile h3{
	color: #ffffff;
	margin: 10px 0 5px;
}

.wrapper .sidebar .profile p{
	color: rgb(206, 240, 253);
	font-size: 14px;
}

.wrapper .sidebar ul li a{
	display: block;
	padding: 20px 30px;
	border-bottom: 1px solid #10558d;
	color:black;
	font-size: 16px;
	position: relative;
}

.wrapper .sidebar ul li a .icon{
	color: #dee4ec;
	width: 30px;
	display: inline-block;
}

.wrapper .sidebar ul li a:hover {
    background: white;
}

.active {
    background-color: red;
}




.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
	color: #0c7db1;
}



.wrapper .section{
	width: calc(100% - 240px);
	margin-left: 225px;
	transition: all 0.5s ease;
}


 

body.active .wrapper .sidebar{
	left: -225px;
}

body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
}

    </style>
</head>

<body>
  <?php
  include("connection.php");

  $query = "SELECT * FROM `donor_login` where id = $user_id ";
  $result=mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="wrapper">
       
        <div class="sidebar">
            <div class="profile">
                <?php
                echo'
                <img src="../uploads/' . $row['d_photo'] . '" alt="profile_picture">';
                ?>
                <h3>
                 <?php
                echo $row['d_name'];
                ?>
                </h3>
                <p>Donor</p>
            </div>
            <ul>
                <li >
                    <a href="sidebar.php?donor" >
                        <span class="icon"><i class="fas fa-check"></i></span>
                        <span class="item">Register</span>
                    </a>
                </li>
                <li >
                    <a href="sidebar.php?view_profile">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="item">View Profile</span>
                    </a>
                </li>
                <li>
                    <a href="sidebar.php?view_status">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">View Status</span>
                    </a>
                </li>
                <li>
                    <a href="logout_donor.php">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="item">Log-Out</span>
                    </a>
                </li>
                   
            </ul>
        </div>
        
    </div>
  



</body>

</html>

<?php
  }
?>
  

<?php
if(isset($_GET['donor'])){
    include('donor.php');
  }
  if(isset($_GET['view_profile'])){
    include('view_profile.php');
  }  
  if(isset($_GET['view_status'])){
    include('view_status.php');
  }
?>

