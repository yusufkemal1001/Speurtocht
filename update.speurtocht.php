<?php

include "dbcon.php";

//$sql = "Update speurtochten set naam='$_GET[naam]' where id='$_GET[id]'";
$sql = "UPDATE speurtochten SET naam='$_GET[name]' WHERE id='$_GET[id]';";

$previous = "javascript:history.go(-1)";



    if (mysqli_query($conn,$sql)){
        header("location:$previous");

    }else{
        echo 'Er is een fout opgetreden';
    }
