<?php 
    include "dbcon.php";

    $sql = "UPDATE antwoorden SET behaald='1', WHERE id='$_GET[id]';";
    
?>