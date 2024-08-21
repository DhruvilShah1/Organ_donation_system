<!DOCTYPE html>
<html lang="en">
<head>
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
         margin-left:400px;
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


    </style>
</head>

    </style>
</head>
<body>
    <h1>Receiver Approval</h1>
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
            <th>Organ NEEDED</th>
            <th>Date</th>
            <th>Upload Document</th>
            <th>Status</th>
        </tr>


        <?php
  include("connection.php");
  $query = "SELECT * FROM `receiver_register` as dr, `receiver_login` as dl WHERE dl.r_id = dr.receiver_id AND dr.r_status ='approve'";

  if(isset($_POST['button'])){
    $search = $_POST['search'];
    $query = "SELECT * FROM `receiver_register` as dr, `receiver_login` as dl WHERE dl.r_id = dr.receiver_id AND dr.r_status ='approve' AND (dr.r_name LIKE '%$search%' OR dr.r_organ LIKE '%$search%')";
}

  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result) > 0) {
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
<td><?php echo $row['r_status'] ?></td>

        </tr>
        <?php
  }}else{
    echo '
    <tr>
    <td colspan="6">No records found</td>
</tr> ';
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


