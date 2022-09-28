<?php
include 'dbcon.php';
require 'login.class.php';

$select = new Select();
if (isset($_SESSION['id'])){
    $user = $select->selectUserById($_SESSION["id"]);
}else{
    header("location: index.php");
}


$sql = "insert into speurtochten(naam,user_id)values('Nieuw Speurtocht','$_SESSION[id]');";

if (mysqli_query($conn,$sql)){

    header("location: dashboard.php");

}else{
    echo 'Er is een fout opgetreden';
}
?>

