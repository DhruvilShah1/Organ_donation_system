<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organ_donation";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    echo "UNconnected";
}

?>
