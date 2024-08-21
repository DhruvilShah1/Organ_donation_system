<?php
include("connection.php");
$query = "SELECT * FROM `matched` WHERE m_id = '" . $_GET['id'] . "'";
$result=mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Doctor and Hospital</title>
    <style>
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
    background: rgb(69,192,171);
background: linear-gradient(0deg, rgba(69,192,171,1) 16%, rgba(34,193,195,1) 60%, rgba(253,187,45,1) 100%);
  }
header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}

.container {
    max-width: 900px;
    margin: 20px auto;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

section {
    margin-bottom: 20px;
}

h2 {
    color: #333;
    margin-bottom: 10px;
}

.assign-form {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.input-field {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

.select-menu {
    width: 48%;
    position: relative;
}

.select-menu select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    appearance: none;
    cursor: pointer;
}

.select-menu::after {
    content: '\25BC';
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    font-size: 16px;
    color: #555;
    pointer-events: none;
}

.select-menu:hover select {
    border-color: #666;
}

.select-menu:hover::after {
    color: #333;
}

.assign-button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.assign-button:hover {
    background-color: #45a049;
}



    </style>
</head>
<body>

    <header>
        <h1>Assign Doctor and Hospital</h1>
    </header>

    <div class="container">
        <section>
            <h2>Donor and Receiver Information</h2>
            <p>Donor Name: <?php  echo $row['d_name'] ?></p>
            <p>Receiver Name: <?php  echo $row['r_name'] ?></p>
            <p>Organ: <?php  echo $row['organ'] ?></p>
            <p>Donor Number: +91<?php  echo $row['d_phone'] ?></p>
            <p>Receiver Number:  +91<?php  echo $row['r_phone'] ?></p>
            <p>City: <?php  echo $row['r_city'] ?></p>
            <p>Donor Email:  <?php  echo $row['d_email'] ?></p>
            <p>Receiver Email: <?php  echo $row['r_email'] ?></p>
        </section>

        <section>
            <h2>Assign Doctor and Hospital</h2>
            <form class="assign-form" method="post">
                <div class="select-menu">
                    <label for="doctor">Select Doctor:</label>
                    <select id="doctor" name="doctor">
    <?php
    include("connection.php");


    $query = "SELECT d_id, dd_name FROM doctor_login";
    $result = mysqli_query($conn, $query);

    if ($result) {
  
        while ($row = mysqli_fetch_assoc($result)) {
            $doctorId = $row['d_id'];
            $doctorName = $row['dd_name'];
            echo "<option value='$doctorId'>$doctorName</option>";
        }
    }
    ?>
</select>

                 
                </div>

                <div class="select-menu">
                    <label for="hospital">Select Hospital:</label>
                    <select id="doctor" name="hospital">
                    <?php
            
    $query = "SELECT d_id, dd_name, dd_hospital FROM doctor_login";
    $result = mysqli_query($conn, $query);

    if ($result) {
      
        while ($row = mysqli_fetch_assoc($result)) {
            $doctorId = $row['d_id'];
            $doctor_hospital = $row['dd_hospital'];
            echo "<option value='$doctor_hospital'>$doctor_hospital</option>";
        }
    }
    ?>
                    </select>
                </div>

                <button type="submit" class="assign-button" name="assign">Assign</button>

            </form>
        </section>
    </div>

</body>
</html>

<?php
if(isset($_POST['assign'])){
$hospital = $_POST['hospital'];
$doctor = $_POST['doctor'];
  

    $select = "UPDATE `matched` SET dd_name = '$doctor' , hospital_name = '$hospital' WHERE m_id = '" . $_GET['id'] . "'";
    $result=mysqli_query($conn,$select);

    $select1 = "UPDATE`status` SET dd_id = '$doctor' WHERE s_id = '" . $_GET['id'] . "'";
    $result1=mysqli_query($conn,$select1);
   echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Assignment Successful!',
        text: 'The doctor and hospital has been successfully assigned to the Paitent.',
        confirmButtonText: 'OK'
    }).then(() => {
        window.location.href = 'admin_sidebar.php?view_paitent_receiver'; // Redirect on click
    });
</script> ";

}
?>
