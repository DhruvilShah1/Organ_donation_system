<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100vh;
    }
    
    body {
        display: grid;
        grid-template-areas:
        "header header"
        "nav nav"
        "main main"
        "section section"
        "footer footer";
        grid-template-rows: auto auto 1fr auto;
        grid-template-columns: 1fr 3fr;
        min-height: 100vh; 
    }
    
    header {
        grid-area: header;
        background: rgb(238,174,202);
background: linear-gradient(45deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        padding: 10px;
  
        text-align: center;
        font-size: 40px;
        font-weight: 800;
        text-transform: uppercase;
    }
    
    nav {
        grid-area: nav;
        background: rgb(238,174,202);
        background: linear-gradient(45deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        padding: 10px;
        text-align: center;
    }
    nav ul {
        float: right;
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        margin-top: 20px;
        margin-right: 50px;
       gap: 50px;
    }
    
    nav a {
        color: #fff;
        text-decoration: none;
        font-size: 20px;
        font-weight: 500;
        transition: background-color 0.3s;
    }
    nav a:hover{
        color: red;
    }
    aside {
        grid-area: aside;
        background-color: #EAEDED;
        padding: 10px;
        text-align: center;
        animation: slide-in-from-left 2s ease-out;
    }
    
    @keyframes slide-in-from-left {
        from {
            opacity: 0;
            transform: translateX(-100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .padding {
        padding: 10px;
    }
    
    .border-bottom-orange {
        border-bottom: 2px solid #000;
    }
    
    .static-horizontal-center {
        text-align: start;
        font-size: 20px;
    }
    .static-horizontal-center ul li a{
        text-decoration: none;
        list-style: none;
    }
    
    .small-padding {
        padding: 5px;
    }
    
    .button {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
        cursor: pointer;
    }
    
    .border-orange {
        border: 2px solid #000;
    
    }
    
    main {
        grid-area: main;
        background: rgb(238,174,202);
        background: linear-gradient(45deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        padding: 10px;
        padding: 10px;
        text-align: center;
    }

    .slide-in {
        grid-area: main;
        opacity: 0;
        text-align: left;
        transform: translateY(-50px);
        animation: slide-in 2s forwards;
        margin: 0;
        padding: 1em;
        width: 90%;
    }
    .right-side{
        float: right;
        margin-top: 80px;
    }
    .right-side > img{
        height: 70%;
        width: 100%;
    }
    
    @keyframes slide-in {
        from {
            opacity: 0;
            transform: translateY(-100%);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
  
  
   .left-side{
    position: relative;
    top: 150px;
    left: 80px;
    text-align: center;
   }
   .left-side > h2{
    font-size: x-large;
    font-weight: bolder;
   }
   .left-side > h1{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: xx-large;
   }
   .left-side > p{

    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: large;

   }
   .part2{
    grid-area: section;
    background: rgb(238,174,202);
    background: linear-gradient(45deg, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
    padding: 10px;
    padding: 10px;
    text-align: center;
}
.part2>.container>.card{
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    margin-right: 50px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
}
.part2>.container{
    display: flex;
    margin-top: 30px;
    margin-bottom: 30px;
    justify-content: space-between;


}

    footer {
        grid-area: footer;
        background-image: linear-gradient(135deg, #df89b5 10%, #bfd9fe 100%);
        color: #000;
        padding: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: 500;
    }
  footer >.merge> .address{
    display: flex;
    flex-direction: column;
    width: 20%;
    margin-left: 60px;
  }
  footer >.merge> .policy{
    display: flex;
    flex-direction: column;
    
  }
  ul.no-bullets {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
   .merge{
    display: flex;
    justify-content: space-evenly;
   } 
   .top{
        
        color: rgb(0, 0, 0);
        text-align: center;
    }
    
    .h1 {
        font-size: 1em;
    }
    
   .p1 {
        font-size: 1em;
    }
    
    .donation-container {
        display: flex;
       gap:10px;
        width: 100%; 
        height: 400px;
        margin:20px;
        margin : 0 auto;
        padding: 20px;
      
    }
    
    .donation-box {
        width: 100%; 
        margin-bottom: 10px;
    
        text-align: center;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        border:  2px solid rgb(143, 143, 143);
    }
    
    .donation-box img {
        width: 100%; 
    }
    
    .donation-number,
    .donation-text {
        margin: 5px 0;
    }
    
    .donation-text {
        font-weight: bold;
    }
    
  .donate_image{
    width: 100%
 
  }
    
    @media (max-width: 768px) {
        body {
            grid-template-areas:
          "header header"
          "nav nav"
          "main main"
          "section section"
          "footer footer";
        }
        main {
            display: block; 
        }
    
        .grid-container {
            grid-template-columns: 1fr;
        }
        .right-side > img {
            height: 50%;
            width: 108%;
            position: relative;
            bottom: 45px;
        }
        nav ul {
            margin-top: 0;
            margin-right: -3px;
        }
        nav a{
            font-size: 19px;
        }
        .left-side {
            position: relative;
            top: -9px;
            left: 7px;
            text-align: center;
        }
        .part2>.container {
            display: grid;
            grid-template-rows: 1fr 1fr 1fr;
            margin-top: 30px;
            margin-bottom: 30px;
            justify-content: center;
        }
        .card{
            margin-bottom: 12px;
            margin-left: 46px;
        }
        footer >.merge> .address {
            display: flex;
            flex-direction: column;
            width: 72%;
            margin-left: 60px;
        }
        .merge {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

    }
    @media (width: 1024px) {
        .left-side {
            position: relative;
            top: 113px;
            left: 7px;
            text-align: center;
        }
        .right-side > img {
            height: 62%;
            width: 113%;
            position: relative;
            bottom: 45px;
        }
        footer >.merge> .address {
            display: flex;
            flex-direction: column;
            width: 42%;
            margin-left: 60px;
        }
        
    }
</style>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href=
"https://financialtribune.com/sites/default/files/field/image/17january/12_organ_donation_0.jpg"
          type="image/png">
    <title>Semantic web</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="donor_login.php">Donor</a></li>
        <li><a href="receiver_login.php">Receiver</a></li>
        <li><a href="doctor_login.php">Doctor</a></li>
        <li><a href="admin_login.php">Admin</a></li>
    </ul>
</nav>

<main>
    <section class="slide-in">
       <div class="right-side">
        <img src="main-coeur.png">
       </div>
       <div class="left-side">
        <h2>Saving People Lives</h2>
        <h1>ORGAN DONATION SYSTEM</h1>
          <p>Welcome to our organ donation website. This is a platform for doctor , paitent and a donor</p>
       </div>
</main>

<section class="part2">
    <h1>ORGAN AND TISSUE DONATION</h1>
    <div class="container">
     
    
     <div class="card" style="width: 18rem;">
         <img src="https://cdn1.vectorstock.com/i/thumb-large/88/85/heart-donation-giving-hand-with-heart-vector-31118885.jpg" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">WHAT IS ORGAN AND TISSUE DONATION?</h5>
           <p class="card-text">Organ Donation is the gift of an organ to a person with end stage organ disease and who needs a transplant. The donated organ may be from a deceased donor or a living donor.</p>
           
         </div>
       </div>
       
       <div class="card" style="width: 18rem;">
         <img src="https://img.freepik.com/premium-vector/transplantation-human-organ-design-flatvector-illustration_599408-774.jpg?w=2000" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">WHAT IS TRANSPLANTATION?</h5>
           <p< class="card-text">Surgical operation in which a failing or damaged organ in the human body is removed and replaced with a functioning one.</p>
           
         </div>
       </div>
       
       <div class="card" style="width: 18rem;">
         <img src="Screenshot 2024-01-17 191152.png" class="card-img-top" alt="...">
         <div class="card-body">
           <h5 class="card-title">WHO CAN PLEDGE TO DONATE ORGANS?</h5>
           <p class="card-text">Any person not less than 18 years of age, who voluntarily authorizes the removal of any of his organ and/or tissue…</p>
           
         </div>
       </div>
     </div>
</section>


<footer>
<?php
include("connection.php");

$query = "SELECT organ, COUNT(*) as organ_count FROM `status` GROUP BY organ";
$result = mysqli_query($conn, $query);

$intestine = 0;
$lung = 0;
$heart =0;
$kidney =0;
$pancreas = 0;
$eyes = 0;
$hands = 0;
$liver = 0;

while ($row = mysqli_fetch_assoc($result)) {
 
    if ($row['organ'] == 'intestine') {
        $intestine += $row['organ_count'];
    } elseif ($row['organ'] == 'lung') {
        $lung += $row['organ_count'];
    }
    elseif ($row['organ'] == 'heart') {
        $heart += $row['organ_count'];
    }
    elseif ($row['organ'] == 'kidney') {
        $kidney += $row['organ_count'];
    }
    elseif ($row['organ'] == 'pancreas') {
        $pancreas += $row['organ_count'];
    }
    elseif ($row['organ'] == 'eyes') {
        $eyes += $row['organ_count'];
    }
    elseif ($row['organ'] == 'hands') {
        $hands += $row['organ_count'];
    }
    elseif ($row['organ'] == 'liver') {
        $liver += $row['organ_count'];
    }
   
}
?>
<section class="part3">
    <h3>Donate Life is the pioneer for the first ever Lung and Heart donation from Gujarat.</h3>
    <section class="donation-container">
    
        <div class="donation-box">
            <img src="kidney.png" alt="Donation Image">
            <hr>
            <p class="donation-number"><?php  echo $kidney;  ?></p>
            <p class="donation-text">KIDNEYS</p>
            <p class="donation-text">DONATED</p>
        </div>
        <div class="donation-box">
            <img src="liver.png" alt="Donation Image">
            <hr>
            <p class="donation-number"><?php  echo $liver;  ?></p>
            <p class="donation-text">LIVER</p>
            <p class="donation-text">DONATED</p>
        </div>
        <div class="donation-box">
            <img src="heart.png" alt="Donation Image">
            <hr>
            <p class="donation-number"><?php  echo $heart;  ?></p>
            <p class="donation-text">HEARTS</p>
            <p class="donation-text">DONATED</p>
        </div>
        <div class="donation-box">
            <img src="lung.png" alt="Donation Image">
            <hr>
            <p class="donation-number"><?php echo $lung; ?></p>
            <p class="donation-text">LUNG</p>
            <p class="donation-text">DONATED</p>
        </div>
        <div class="donation-box">
            <img src="pancreas.png" alt="Donation Image">
            <hr>
            <p class="donation-number"><?php  echo $pancreas;  ?></p>
            <p class="donation-text">PANCREAS</p>
            <p class="donation-text">DONATED</p>
        </div>
        <div class="donation-box">
            <img src="eyes.png" alt="Donation Image">
            <hr>
            <p class="donation-number"><?php  echo $eyes; ?></p>
            <p class="donation-text">EYES</p>
            <p class="donation-text">DONATED</p>
        </div>
        <div class="donation-box">
            <img src="instentine.png" alt="Donation Image">
            <hr>
            <p class="donation-number"><?php echo $intestine; ?></p>
            <p class="donation-text">INTESTINE</p>
            <p class="donation-text">DONATED</p>
        </div>
        <div class="donation-box">
            <img src="hand.png" alt="Donation Image">
            <hr>
            <p class="donation-number"><?php  echo $hands; ?></p>
            <p class="donation-text">HANDS</p>
            <p class="donation-text">DONATED</p>
        </div>
    </section>
</section>

  <hr>


<div class="merge">
    <section class="address">
        <h1>Address</h1>
        <p>4th Floor, National Institute of
            Pathology, NIOP Building,
            Safdarjung Hospital Campus
            New Delhi-110029
            dir[at]notto[dot]nic[dot]in
            Toll-Free Number : 1800-11-4770
        </p>
    </section>
    <section class="policy">
        <h1>Policies</h1>


        <ul class="no-bullets">
            <li><a href="#">Terms and condition</a></li>
            <li><a href="#">Website Policy.</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a< href="#"></a></li>
        </ul>
    </div>
    </section>
</div>






<script src="script.js"></script>
</body>
</html>