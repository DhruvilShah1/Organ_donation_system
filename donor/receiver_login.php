<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Receiver Login</h2>
        <form method="post">
            <label>Email:</label>
            <input type="email" placeholder="Email" name="r_email" required>
            <label>Password:</label>
            <input type="password" placeholder="Password" name="r_password"required>
            <button type="submit" class="register-button" name="submit">Login</button>
        </form>
        <p>Already Not have an account? <a href="receiver_register.php">Register Here</a></p>
    </div>
</body>
</html>

<style>

body {
    font-family: Arial, sans-serif;
    background-image: linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%);
    margin: 0;
    height: 85vh;
    padding: 0;
}

.container {
    width: 300px;
    margin: 150px auto;
    background:rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px;
    border:1px solid rgba(255, 255, 255, 0.18);
    box-shadow: 0 0px 16px 0 rgba(0, 0, 0, 0.5);
    padding: 50px;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
label{
    float:left;
}
h2 {
    color: #333333;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #cccccc;
}

.register-button {
    width: 100%;
    background-color: #4CAF50;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.register-button:hover {
    background-color: #45a049;
}

p {
    width: 100%;
    margin-top: 20px;
    font-size: 14px;
    word-spacing:5px
}
</style>
<?php
include('connection.php');
session_start();

if (isset($_POST["submit"])) {
    // Prevent SQL injection
    $email = $_POST["r_email"]; 
    $password =  $_POST["r_password"];

    // Prepare query
    $query = "SELECT * FROM receiver_login WHERE r_email = '$email' AND r_password = '$password'";
    
    // Execute query
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Query execution failed
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Database query failed: " . mysqli_error($conn) . "'
            });
        </script>";
    } else {
        if (mysqli_num_rows($result) == 1) {
            // Login successful
            $row = mysqli_fetch_assoc($result);
            $_SESSION['r_id'] = $row['r_id'];
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sign Successful!',
                    text: 'You have been successfully signed in.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'receiver_siderbar.php?receiver_siderbar_register'; // Redirect on 
                });
            </script>";
        } else {
            // Invalid email or password
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed!',
                    text: 'Invalid email or password.'
                });
            </script>";
        }
    }
}
?>
