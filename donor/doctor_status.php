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
<html>
<head>
<style>
    body{
        height: 100vh;
    }
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
button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
        #hello{
          background-color: white;
        }

.assign-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    border-radius: 5px;
    background-color: #4CAF50;
    color: #ffffff; 
    border: 2px solid #4CAF50; 
    transition: background-color 0.3s, color 0.3s;
}


.assign-button:hover {
    background-color: #45a049;
    color: #ffffff;
    border: 2px solid #45a049; 
}

</style>
</head>
<body>
<h1> Update Status Donor and Receiver </h1>
  <?php
include("connection.php");
$query = "SELECT * FROM `status` WHERE dd_id = $user_id";
$result = mysqli_query($conn, $query);
?>

<table>
    <thead>
        <tr>
            <th>Doctor Name</th>
            <th>Receiver Name</th>
            <th>Organ</th>
            <th>City</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row['d_name'] ?></td>
                    <td><?php echo $row['r_name'] ?></td>
                    <td><?php echo $row['organ'] ?></td>
                    <td><?php echo $row['city'] ?></td>
                    <td>  
        <a href="donate_process.php?id=<?php echo $row['s_id']; ?>" class="assign-button">Donated</a>
        </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5" id="hello" style="text-align: center;">NOT ASSIGN ANY PAITENT</td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>

</table>
</body>
</html>