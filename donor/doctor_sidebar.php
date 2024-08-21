<?php
session_start();
include("connection.php");
if (!isset($_SESSION['d_id'])) {
   
    header('location: doctor_login.php');
    exit; 
}
if(isset($_SESSION['d_id'])){
    $user_id = $_SESSION['d_id'];
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
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
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

 

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
	color: #000000;
	background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
	color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
	display: block;
}

.wrapper .section{
	width: calc(100% - 240px);
	margin-left: 225px;
	transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
	background: rgb(7, 105, 185);
	height: 60px;
	display: flex;
	align-items: center;
	padding: 0 100px;
 
}

.wrapper .section .top_navbar .hamburger a{
  font-weight: bolder;
	font-size: 28px;
	color: #000000;
}

.wrapper .section .top_navbar .hamburger a:hover{
	color: #000000;
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

  $query = "SELECT * FROM `doctor_login` where d_id = $user_id ";
  $result=mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="wrapper">
       
        <div class="sidebar">
            <div class="profile">
                <?php
                echo'
                <img src="https://th.bing.com/th/id/R.81269e874243743d46cdefea1863db82?rik=1bWzxvj1HSZToA&riu=http%3a%2f%2fwww.clipartbest.com%2fcliparts%2f9Tz%2fLEr%2f9TzLErg8c.png&ehk=%2fBiJwzGMHdqTWSP2YgTBSlkvI7taCv7EawW%2b4G8q0zc%3d&risl=&pid=ImgRaw&r=0" alt="profile_picture">';
                ?>
                <h3>
                 <?php
                echo $row['dd_name'];
  }
                ?>
                </h3>
                <p>Doctor</p>
            </div>
            <ul>
                <li>
                    <a href="doctor_sidebar.php?doctor_paitent" class="active">
                    <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">View assign Paitent</span>
                    </a>
                </li>
                <li>
                    <a href="doctor_sidebar.php?doctor_status">
                        <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <span class="item">Update Status</span>
                    </a>
                </li>
                <li>
                    <a href="doctor_sidebar.php?view_history">
                        <span class="icon"><i class="fa fa-history" aria-hidden="true"></i></span>
                        <span class="item">View History</span>
                    </a>
                </li>
                <li>
                    <a href="logout_doctor.php">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="item">Log-Out</span>
                    </a>
                </li>
                <li>
                  
            </ul>
        </div>
        
    </div>
  <script>
       var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
  </script>
</body>
</html>

<?php
if(isset($_GET['doctor_paitent'])){
    include('doctor_paitent_detail.php');
  }
  if(isset($_GET['doctor_status'])){
    include('doctor_status.php');
  }  
  if(isset($_GET['view_status'])){
    include('view_status.php');
  }
  if(isset($_GET['view_history'])){
    include('view_history.php');
  }
?>