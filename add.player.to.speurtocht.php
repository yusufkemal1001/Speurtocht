<?php

include "dbcon.php";

//$sql = "Update speurtochten set naam='$_GET[naam]' where id='$_GET[id]'";
$sql = "UPDATE teams SET naam='$_POST[newName]', active='1' WHERE uuid='$_GET[id]';";





if (mysqli_query($conn,$sql)){
    header("location:speurtocht.php?id=".$_GET['id']);

}else{
    echo 'Er is een fout opgetreden';
}