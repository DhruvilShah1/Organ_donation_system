<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Beautiful Table</title>
</head>
<body>
    <h1>View Status</h1>
    <table class="beautiful-table">
        <thead>
            <tr>
            <th>Doctor</th>
                <th>Donor</th>
                <th>Receiver</th>
                <th>Status</th>
                <th>Update_Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
    include("connection.php");
    $query = "SELECT * FROM `status`";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){

?>
            <tr>
            <?php
$id = $row['dd_id'];
include("connection.php");

$query2 = "SELECT dd_name FROM `doctor_login` WHERE d_id = '$id' AND dd_name != 'pending'";
$result2 = mysqli_query($conn , $query2);
$rowsss = mysqli_fetch_assoc($result2);
?>
                  <td>Dr.<?php  echo $rowsss['dd_name']   ?></td>
                <td><?php  echo $row['d_name']   ?></td>
                <td><?php  echo $row['r_name']   ?></td>
                <td><?php  echo $row['s_donate']   ?></td>
                <td><?php  echo $row['update_date']   ?></td>
            </tr>

            <?php
    }
            ?>
        </tbody>
    </table>
</body>
</html>
<style>
body {
    font-family: 'Arial', sans-serif;
    height: 100vh;
}

.beautiful-table {
    position: relative;
    left:400px;
    width: 70%;
    border-collapse: collapse;
    margin: 20px 0;
}
h1{
    margin-top:20px;
    position: relative;
    left:400px;
    margin-bottom:20px;
}

.beautiful-table th, .beautiful-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.beautiful-table th {
    background-color: #f2f2f2;
}

.beautiful-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.beautiful-table tbody tr:hover {
    background-color: #e0e0e0;
}


</style>