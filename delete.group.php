<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "afspraak_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "delete  FROM teams where group_id='$_GET[id]';";

if (mysqli_query($conn,$sql)){
    header('Location: dashboard.php');

}else{
    echo 'Er is een fout opgetreden';
}
$result = $conn->query($sql);


