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
      
        .search-form {
            position: relative;
          right:80px;
    display: flex;
    justify-content: center;

    align-items: center;
    margin-bottom:20px; 
}

.search-input {
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-right: 5px;
    width: 30%;
}

.search-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.search-button:hover {
    background-color: #0056b3;
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
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <h1>Donor Information</h1>
    <form method="post" class="search-form">
    <input type="text" name="search" class="search-input" placeholder="Search by name or organ" autocomplete="off">
    <button type="submit" name="button" class="search-button">Search</button>
</form>


    <table>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Email</th>
            <th>City</th>
            <th>Organ</th>
            <th>Cause</th>
            <th>Date</th>
        </tr>


        <?php
include("connection.php");

$query ="SELECT * FROM `donor_register` as dr, `donor_login` as dl WHERE dl.id = dr.R_id";

if(isset($_POST['button'])){
    $search = $_POST['search'];

    $query ="SELECT * FROM `donor_register` as dr, `donor_login` as dl WHERE dl.id = dr.R_id AND (dr.d_name LIKE '%$search%' OR dr.d_organ LIKE '%$search%')";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td>
            <?php echo '<img src="../uploads/' . $row['d_photo'] . '" alt="Donor Photo">'; ?>
        </td>
        <td><?php echo $row['d_name'] ?></td>
        <td><?php echo $row['d_dateofbirth'] ?></td>
        <td><?php echo $row['d_email'] ?></td>
        <td><?php echo $row['d_city'] ?></td>
        <td><?php echo $row['d_organ'] ?></td>
        <td><?php echo $row['d_cause'] ?></td>
        <td><?php echo $row['d_dates'] ?></td>
    </tr>
    <?php
}
}else{
    echo '
    <tr>
    <td colspan="8">No records found</td>
</tr> ';
}

?>
</table>
</body>
</html>

        </table>
</body>
</html>
