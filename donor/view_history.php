<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1{
            position: relative;
            left:300px;
            padding:20px;
        }
        .box-container {
            position: relative;
            left:310px;
            display: grid;
  column-gap: 50px;
  grid-template-columns: 80px 700px auto;
           gap: 20px;
        }

        .box {
          width: 390px;
            padding: 15px;
            border: 1px solid #dddddd;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        .box h3 {
            margin-top: 0;
            color: #333333;
        }
        .box p {
            margin: 0;
            color: #666666;
        }
        #donate{
            color:red;
        }
        .status-box {
            position:relative;
            width: 600px;
            padding: 15px;
            background-color: #ffc107; 
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            margin: 170px 550px; 
        }
        .status-box strong {
    font-size: 1.2em;
    margin-bottom: 10px;
    display: block;
}

.status-box p {
    font-size: 1em;
    line-height: 1.5;
    margin-bottom: 15px;
    text-align: justify;
}
.status-box a {
    font-size: 1.1em; 
    color: #800020; 
    font-weight: bold;
}

    </style>
    <title>Organ Donation Information</title>
</head>
<body>
    <h1>View History</h1>


    <?php
include("connection.php");

$qury = "SELECT * FROM `status` WHERE s_donate = 'donated'";
$result = mysqli_query($conn, $qury);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="box-container">
            <div class="box">
                <h3>Donor</h3>
                <p><?php echo $row['d_name'] ?></p>
                <h3>Receiver</h3>
                <p><?php echo $row['r_name'] ?></p>
                <h3>Organ</h3>
                <p><?php echo $row['organ'] ?></p>
                <h3>Status</h3>
                <p id="donate"><?php echo $row['s_donate'] ?></p>
                <h3>Update Dates</h3>
                <p><?php echo $row['update_date'] ?></p>
            </div>
        <?php
    }
} else {
    echo '<div class="status-box">
    <strong>Status: No Donation History</strong> 
    <p>
    There are currently no records of past donations in the system. 
    Once donations are made, they will be shown here. 
</p>
<p id="red">Please refresh the page for the most up-to-date information. If you encounter any issues, please <a href="contact.php">contact support</a>.</p>
</div>';
}

?>

    </div>
   


</body>
</html>
