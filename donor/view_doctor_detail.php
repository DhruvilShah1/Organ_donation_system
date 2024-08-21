<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
  <h1>Doctor Register</h1>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Hospital/Clinic Affiliation</th>
      <th>Specialization</th>
      <th>City</th>
      <th>Register_Number</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include("connection.php");
  $query ="SELECT * FROM `doctor_login`";
  $result=mysqli_query($conn,$query);
  while( $row = mysqli_fetch_assoc($result)){
    ?>

        <tr>
        </td>    

            <td><?php echo $row['dd_name'] ?></td>
            <td><?php echo $row['dd_email'] ?></td>
            <td><?php echo $row['dd_hospital'] ?></td>
            <td><?php echo $row['dd_special'] ?></td>
            <td><?php echo $row['dd_city'] ?></td>
            <td><?php echo $row['dd_registernumber'] ?></td>
    
        </tr>
        <?php
  }
?>
    </tbody>
</table>
</body>
</html>
<style>
        body{
            height: 100vh;
        }
        h1{
            position: relative;
            left:400px;
            margin-top:20px;
            margin-bottom:20px; 
        }
        table {
            position: relative;
            left:400px;
            top:20px;
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
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
        }
    </style>
