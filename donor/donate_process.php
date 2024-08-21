<?php
include("connection.php");
$select = "UPDATE `status` SET s_donate = 'donated' , update_date = NOW() WHERE s_id = '" . $_GET['id'] . "'";
$result=mysqli_query($conn,$select);
header("Location: doctor_sidebar.php?doctor_status");
?>