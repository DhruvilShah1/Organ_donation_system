<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <title>Contact Us - Organ Donation System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Contact Us</h1>
    <p>If you have any questions or concerns, feel free to reach out to us.</p>

    <form  method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="name">Your PhoneNumber:</label>
        <input type="number" id="name" name="phone" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="role">Your Role:</label>
        <div class="radio-group">
            <label><input type="radio" name="role" value="donor" checked> Donor</label>
            <label><input type="radio" name="role" value="receiver"> Receiver</label>
            <label><input type="radio" name="role" value="doctor"> Doctor</label>
        </div>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit" name="submit">Submit</button>
    </form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $message = $_POST['message'];

   $query =  "INSERT INTO `contact` (name, p_number, email, role, message , dates)  VALUES ('$name' , '$phone' , '$email', '$role','$message', NOW()) ";

   $result = mysqli_query($conn , $query);
   echo "<script>
   Swal.fire({
     title: 'Thank you!',
     text: 'Your information has been saved.',
     icon: 'success',
     confirmButtonText: 'OK'
   }).then((result) => {
     if (result.isConfirmed) {
       window.location.href = 'layout.php'; 
     }
   });
 </script>";
}



?>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
 
    background: rgb(133,180,243);
background: linear-gradient(124deg, rgba(133,180,243,1) 0%, rgba(248,222,193,1) 60%, rgba(242,173,165,1) 100%);
  
}

.container {
    max-width: 600px;
    margin: 30px auto;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    
}
 form{
    height: 70vh;
 }
h1 {
    text-align: center;
    color: black;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input,
textarea {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
.radio-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 16px;
}

.radio-group label {
    margin-bottom: 8px;
}


</style>