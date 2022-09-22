<?php

include "dbcon.php";

$sql = "delete FROM vragen where id='$_GET[id]';";
$previous = "javascript:history.go(-1)";
if (mysqli_query($conn,$sql)){
    header("location:edit.speurtocht.php?id=".$_GET['speurtocht_id']);

}else{
    echo 'Er is een fout opgetreden';
}
$result = $conn->query($sql);


