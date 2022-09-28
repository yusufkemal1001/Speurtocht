<?php

include "dbcon.php";

//$sql = "Update speurtochten set naam='$_GET[naam]' where id='$_GET[id]'";
$sql = "UPDATE vragen SET vraag='$_GET[vraag]', type='$_GET[radio]' WHERE id='$_GET[id]';";




$previous = "javascript:history.go(-1)";
if (mysqli_query($conn,$sql)){
    header("location:edit.speurtocht.php?id=".$_GET['speurtocht_id']);

}else{
    echo 'Er is een fout opgetreden';
}