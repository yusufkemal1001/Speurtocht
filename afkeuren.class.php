<?php 
    include "dbcon.php";
    
    $sql = "UPDATE antwoorden SET behaald='2' WHERE id='$_GET[id]';";

    $previous = "javascript:history.go(-1)";

    if (mysqli_query($conn,$sql)){
        header("location:test1.php");

    }else{
        echo 'Er is een fout opgetreden';
    }
?>