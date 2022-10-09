<?php

include "dbcon.php";

//$sql = "Update speurtochten set naam='$_GET[naam]' where id='$_GET[id]'";
$sql = "UPDATE teams SET naam='$_POST[newName]', active='1' WHERE uuid='$_GET[id]';";



session_start();
$_SESSION['speurtocht_questions'] = $_GET['vraag_id'];

if (mysqli_query($conn,$sql)){
    header("location:speurtocht.php?id=".$_GET['id']."&vraag_id=".$_GET['vraag_id']."&speurtocht_id=".$_GET['speurtocht_id']);

}else{
    echo 'Er is een fout opgetreden';
}