<?php
include 'dbcon.php';
require 'login.class.php';

$select = new Select();
if (isset($_SESSION['id'])){
    $user = $select->selectUserById($_SESSION["id"]);
}else{
    header("location: index.php");
}

    $sql = "insert into vragen(vraag,speurtocht_id,type)values('Nieuw Vraag','$_GET[id]','0');";
    if (mysqli_query($conn,$sql)){

        header("location:edit.speurtocht.php?id=".$_GET['id']);

    }else{
        echo 'Er is een fout opgetreden';

}






?>

