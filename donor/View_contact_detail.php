<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Table</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Contact Detial</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
  <?php
include("connection.php");
$query = "SELECT * FROM `contact`";
$result = mysqli_query($conn , $query);
while($row = mysqli_fetch_assoc($result)){

?>

                <tr>
                    <td><?php  echo $row['name'];   ?></td>
                    <td><?php  echo $row['p_number'];   ?></td>
                    <td><?php  echo $row['email'];   ?></td>
                    <td><?php  echo $row['role'];   ?></td>
                    <td><?php  echo $row['message'];   ?></td>
                    <td><?php  echo $row['dates'];   ?></td>
                </tr>
        <?php
}
        ?>
            </tbody>
        </table>
    </div>
</body>
</html>


<style>
  body {
        height: 100vh;
    }

    h1 {
        position: relative;
        left: 330px;
        margin-bottom: 10px;
    }

    table {
        position: relative;
        left: 330px;
        top: 20px;
        border-collapse: collapse;
        width: 75%;
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