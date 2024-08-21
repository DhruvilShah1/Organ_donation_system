<?php
include("connection.php");

$query = "SELECT rr.*, dr.*, dl.*
          FROM `receiver_register` as rr
          JOIN `donor_register` as dr ON rr.r_organ = dr.d_organ
          JOIN `doctor_login` as dl ON rr.r_status = 'approve'";

$outerResult = mysqli_query($conn, $query);


if (!$outerResult) {
    die("Query failed: " . mysqli_error($conn));
}

$uniqueDonorIds = array();
$uniqueReceiverIds = array();

while ($row = mysqli_fetch_assoc($outerResult)) {
    $d_name = $row['d_name'];
    $d_phone = $row['d_phone'];
    $d_city = $row['d_city'];
    $d_email = $row['d_email'];
    $d_id = $row['d_id'];
    $id = $row['donor_id'];
    $d_organ = $row['d_organ'];
    $r_name = $row['r_name'];
    $r_city = $row['r_city'];
    $r_phone = $row['r_phone'];
    $r_email = $row['r_email'];
    $receiver_id = $row['receiver_id'];
    $dd_name = $row['dd_name'];
    $dd_hospital = $row['dd_hospital'];

    if (!in_array($id, $uniqueDonorIds) && !in_array($receiver_id, $uniqueReceiverIds)) {
        $uniqueDonorIds[] = $id;
        $uniqueReceiverIds[] = $receiver_id;

        
        $duplicateCheckQuery = "SELECT * FROM `matched` WHERE donor_id = '$id' AND r_id = '$receiver_id'";
        $duplicateCheckResult = mysqli_query($conn, $duplicateCheckQuery);

        if (mysqli_num_rows($duplicateCheckResult) == 0) {
          
            $insertQuery = "INSERT INTO `matched` (d_name, d_phone, d_city, d_email, donor_id, organ, r_name, r_city, r_phone, r_email, r_id,dd_name , hospital_name)
                            VALUES ('$d_name', '$d_phone', '$d_city', '$d_email', '$id', '$d_organ', '$r_name', '$r_city', '$r_phone', '$r_email', '$receiver_id','pending','pending')";

            $innerResult = mysqli_query($conn, $insertQuery);

            
            if (!$innerResult) {
                die("Insert query failed: " . mysqli_error($conn));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matched Patients Detail</title>
 
</head>
<body>
    <h1>Match Donor and Receiver Organ </h1>
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
            <th>Doctor Name</th>
            <th>Hospital Name</th>
            <th>Action</th>
        </tr>
        <?php

$queryDistinctReceivers = "SELECT * FROM `matched`";
$distinctReceiversResult = mysqli_query($conn, $queryDistinctReceivers);

if (!$distinctReceiversResult) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<?php
while ($rowDistinctReceiver = mysqli_fetch_assoc($distinctReceiversResult)) {
    ?>
    <tr>
        <td><?php echo $rowDistinctReceiver['r_name'] ?></td>
        <td><?php echo $rowDistinctReceiver['d_name'] ?></td>
        <td><?php echo $rowDistinctReceiver['d_email'] ?></td>
        <td><?php echo $rowDistinctReceiver['r_email'] ?></td>
        <td><?php echo $rowDistinctReceiver['organ'] ?></td>
        <td><?php echo $rowDistinctReceiver['r_city'] ?></td>
        <td><?php echo $rowDistinctReceiver['d_phone'] ?></td>
        <td><?php echo $rowDistinctReceiver['r_phone'] ?></td>
        <?php
$id = $rowDistinctReceiver['dd_name'];
include("connection.php");

// Use prepared statement to avoid SQL injection
$query = "SELECT dd_name FROM `doctor_login` WHERE d_id = '$id' AND dd_name != 'pending'";
$result = mysqli_query($conn , $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $doctorName = $row['dd_name'];
    echo "<td>$doctorName</td>";
} else {
    // If no rows are found, display "Pending"
    echo "<td>Pending</td>";
}

?>

        <td><?php echo $rowDistinctReceiver['hospital_name'] ?></td>
        <td>        
        <a href="assign_update_process.php?id=<?php echo $rowDistinctReceiver['m_id']; ?>" class="assign-button">Assign</a>
        </td>
    </tr>
    <?php
}

?>
</table>
    

</body>
</html>

    </table>
</body>
</html>
        

    </table>
</body>
</html>


<style>
a.assign-button {
    display: inline-block;
    padding: 10px 15px;
    background-color: #4CAF50; 
    color: #fff; 
    text-decoration: none;
    border-radius: 5px;
    border: 1px solid #4CAF50; 
    transition: background-color 0.3s;
}

a.assign-button:hover {
    background-color: #45a049; 
}

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


<script>



</script>