<?php
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
<style>
  h1{
    margin-top:10px;
    position: relative;
    left:350px;
    margin-bottom:20px;
  }
table {
    margin-top:10px;
    position: relative;
    left:350px;
  border-collapse: collapse;
  width: 70%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}

.button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 8px 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<body>
<h1> Assign Donor and Receiver </h1>
<table>
  <tr>
  <th>Receiver</th>
            <th>Donor</th>
            <th>Donor Email</th>
            <th>Receiver Email</th>
            <th>Organ Needed</th>
            <th>City</th>
            <th>Donor Number</th>
            <th>Receiver Number</th>
  </tr>
  <?php
include("connection.php");
$query = "SELECT * FROM `matched` WHERE dd_name = $user_id";
$result = mysqli_query($conn , $query);
if ($result && mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){
  ?>
  <tr>
 <td><?php echo $row['r_name'] ?></td>
        <td><?php echo $row['d_name'] ?></td>
        <td><?php echo $row['d_email'] ?></td>
        <td><?php echo $row['r_email'] ?></td>
        <td><?php echo $row['organ'] ?></td>
        <td><?php echo $row['r_city'] ?></td>
        <td><?php echo $row['d_phone'] ?></td>
        <td><?php echo $row['r_phone'] ?></td>
</tr>
<?php
}
}else {
  ?>
  <tr>
      <td colspan="8" id="hello" style="text-align: center;">NOT ASSIGN ANY PAITENT</td>
  </tr>
<?php
}
?>
?>
</table>
</body>
</html> 
</body>
</html>

<style>
body{
    height: 100vh;
    background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);
}

</style>

<?php
include("connection.php");

$query = "SELECT * FROM `matched`";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   
    while ($row = mysqli_fetch_assoc($result)) {
        $d_name = $row['d_name'];
        $d_organ = $row['organ'];
        $d_city = $row['d_city'];
        $d_id = $row['donor_id'];
        $r_name = $row['r_name'];
        $r_city = $row['r_city'];
        $r_id = $row['r_id'];
        $dd_name = $row['dd_name'];

        $duplicateCheckQuery = "SELECT * FROM `status` WHERE d_id = '$d_id' AND r_id = '$r_id'";
        $duplicateCheckResult = mysqli_query($conn, $duplicateCheckQuery);

        if (mysqli_num_rows($duplicateCheckResult) == 0) {
           
            $insertQuery = "INSERT INTO `status` (d_name, r_name, organ, city, d_id, r_id, dd_id, s_donate, update_date)
                            VALUES ('$d_name', '$r_name', '$d_organ', '$r_city', '$d_id', '$r_id', '$dd_name', 'pending', 'pending')";
            $insertResult = mysqli_query($conn, $insertQuery);
        }
    }
} else {
    echo "No rows found in 'matched' table.";
}
?>
