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


$sql = "insert into teams(name,members,class,image)values('$_POST[name]','$_POST[members]','$_POST[class]','group-images/$_POST[image]');";

if (mysqli_query($conn,$sql)){
    header("location:dashboard.php");
}else{
    echo 'Er is een fout opgetreden';
}


?>