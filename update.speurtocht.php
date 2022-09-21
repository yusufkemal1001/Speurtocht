<?php
include 'dbcon.php';

$sql = "Update speurtochten set naam='$_GET[naam]' where id='$_GET[sid]'";

//$previous = "javascript:history.go(-1)";
//if(isset($_SERVER['HTTP_REFERER'])) {
//    $previous = $_SERVER['HTTP_REFERER'];
//}


    if (mysqli_query($conn,$sql)){
        //header("location:dashboard.php");
    }else{
        echo 'Er is een fout opgetreden';
    }
