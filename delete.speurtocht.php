<?php
include "dbcon.php";


$sql = "delete  FROM speurtochten where id='$_GET[id]';";

if (mysqli_query($conn,$sql)){
    header('Location: dashboard.php');

}else{
    echo 'Er is een fout opgetreden';
}
$result = $conn->query($sql);