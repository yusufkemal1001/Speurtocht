<?php 
    include "dbcon.php";
    $sql = "UPDATE antwoorden SET behaald='1' WHERE id='$_GET[id]';";

    $previous = "javascript:history.go(-1)";



    if (mysqli_query($conn,$sql)){
        header("location:admin.speurtocht.php?id=".$_GET['speurtocht_id']);

    }else{
        echo 'Er is een fout opgetreden';
    }
    ?>