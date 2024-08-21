<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h2>Doctor Login</h2>
        <form method="post">
            <label>Email:</label>
            <input type="email" placeholder="email" name="dd_email" required>
            <label>Password:</label>
            <input type="password" placeholder="password" name="dd_password"required>
            <button type="submit" class="register-button" name="submit">Login</button>
        </form>
        <p>Contact  Admin  If  You  are  not  Register <a href="contact.php">Contact US</a></p>
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
    $email = $_POST['dd_email'];
    $password = $_POST["dd_password"];

    $query = "SELECT * FROM doctor_login WHERE dd_email = '$email' AND dd_password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['d_id'] = $row['d_id'];

            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sign Successful!',
                    text: 'You have been successfully signed in.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'doctor_sidebar.php?doctor_paitent'; // Redirect on click
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed!',
                    text: 'Invalid email or password.'
                });
            </script>";
        }
    } else {
        // Handle database error
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Database Error!',
                text: 'Error: " . mysqli_error($conn) . "'
            });
        </script>";
    }
}
?>
