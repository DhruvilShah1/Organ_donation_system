<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver Table</title>
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
          display: flex;
         margin-left:350px;
            border-collapse: collapse;
            width: 75%;
            font-family: sans-serif;
        }

        table th, table td {
            text-align: left;
            padding: 8px;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        #image {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
        }
        #upload{
            width: 100px;
            height: 100px;
            object-fit: contain;
            cursor: pointer;
        }
        #fullview{
            display: none;
            position: absolute;
            left:0px;
            top:0px;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            text-align :center;
        }
        #fullimage{
            padding: 24px;
            width: 98%;
            height: 98%;
            object-fit: contain;
        }
        #CloseButton{
            position: absolute;
            top:12px;
            right:12px;
            font-size:2rem;
            color:white;
            cursor: pointer;
        }
        input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}form{
    display:flex;
    gap: 10px;
}


    </style>
</head>

<body>
    <h1>Receiver Approval</h1>
    <table>

        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Email</th>
            <th>City</th>
            <th>Organ NEEDED</th>
            <th>Date</th>
            <th>Upload Document</th>
            <th>Status</th>
            
            <th>Action</th>
        </tr>


        <?php
  include("connection.php");
  $query = "SELECT * FROM `receiver_register` as dr, `receiver_login` as dl WHERE dl.r_id = dr.receiver_id";

  $result=mysqli_query($conn,$query);
  while( $row = mysqli_fetch_assoc($result)){
    ?>

        <tr>
        <td>
            <?php
echo'
<img src="../uploads/' .$row['r_photo'] . '" alt="Donor Photo" id="image">';
        ?>
        </td>    

            <td><?php echo $row['r_name'] ?></td>
            <td><?php echo $row['r_dateofbirth'] ?></td>
            <td><?php echo $row['r_email'] ?></td>
            <td><?php echo $row['r_city'] ?></td>
            <td><?php echo $row['r_organ'] ?></td>
            <td><?php echo $row['r_dates'] ?></td>
            <td>
    <?php
echo' <div class="gallery">
<img src="../uploads/' .$row['r_upload'] . '"   onclick="fullview(this.src)"   alt="Donor Photo" id="upload">
</div>';
?>
</td>
<td ><?php echo $row['r_status'] ?></td>
<td>
    <form  method="post">
        <input type="hidden" name="receiver_id" value="<?php echo $row['id']; ?>">
        <input type="submit" name ="approve" value="Approve">
        <input type="submit" name ="pending" value="Pending">
    </form>

</td>

        </tr>
        <?php
  }
?>
        </table>
        <div id="fullview">
         <img id="fullimage" >
         <span id="CloseButton" onclick="closs()">&times;</span>
</div>
</body>
</html>
<script>
function fullview(imagelink){
     document.getElementById("fullimage").src = imagelink;
     document.getElementById("fullview").style.display = "block";

}
function closs(){
    document.getElementById("fullview").style.display = "none";
}

</script>
<?php
include("connection.php");
if(isset($_POST['approve'])){
    $id = $_POST['receiver_id'];
    $select = "UPDATE receiver_register SET r_status = 'approve' WHERE id =$id";
    $result=mysqli_query($conn,$select);

    echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Approve Successful!',
        text: 'Verify Again',
        confirmButtonText: 'OK'
    }). then(() => {
                window.location.href = 'admin_sidebar.php?view_receiver_approval';
            });
</script>
";
}

if(isset($_POST['pending'])){
    $id = $_POST['receiver_id'];
    $select = "UPDATE receiver_register SET r_status = 'pending' WHERE id =$id";
    $result=mysqli_query($conn,$select);
    echo "<script>
    Swal.fire({
        icon: 'info',
        title: 'Pending Approval',
        text: 'Your approval is pending. Additional Message for Pending Approval.',
        confirmButtonText: 'OK'
    }).then(() => {
        window.location.href = 'admin_sidebar.php?view_receiver_approval';
    });
</script>

    ";
}

?>

