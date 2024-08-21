<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Table</title>
    <style>
        body{
            height: 100vh;
        }
        h1{
            position: relative;
            left:400px;
            margin-bottom:20px; 
        }
        table {
            position: relative;
            left:400px;
            border-collapse: collapse;
            width: 70%;
            font-family: sans-serif;
        }

        table th, table td {
            text-align: left;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <h1>Login-User</h1>
    <table>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            
        </tr>

        <?php
  include("connection.php");
  $query ="SELECT * FROM `donor_login`";
  $result=mysqli_query($conn,$query);
  while( $row = mysqli_fetch_assoc($result)){
    ?>

        <tr>
        <td>
            <?php
echo'
<img src="../uploads/' .$row['d_photo'] . '" alt="Donor Photo">';
        ?>
        </td>    

            <td><?php echo $row['d_name'] ?></td>
            <td><?php echo $row['d_email'] ?></td>
            <td><?php echo $row['d_password'] ?></td>
            <td>Donor</td>
        </tr>
        <?php
  }
?>
<?php
  $receiver_query = "SELECT * FROM `receiver_login`";
        $receiver_result = mysqli_query($conn, $receiver_query);
        while($receiver_row = mysqli_fetch_assoc($receiver_result)) {
            ?>
            <tr>
                <td><img src="../uploads/<?php echo $receiver_row['r_photo']; ?>" alt="Receiver Photo"></td>
                <td><?php echo $receiver_row['r_name']; ?></td>
                <td><?php echo $receiver_row['r_email']; ?></td>
                <td><?php echo $receiver_row['r_password']; ?></td>
                <td>Receiver</td>
            </tr>
            <?php
        }
        ?>
        </table>
</body>
</html>

