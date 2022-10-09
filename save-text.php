<?php 

    include "dbcon.php";
	$text_name = $_POST['my_text'];






				// Insert into Database
				$sql = "INSERT INTO antwoorden (tekst, image,speurtocht_id, team_id, vraag_id, behaald) VALUES ('$text_name','0','$_GET[speurtocht_id]','$_GET[id]','$_GET[vraag_id]',0)";
				mysqli_query($conn, $sql);
$sqlSelectRandomQuestion = mysqli_query($conn, "select * from vragen where not exists (select * from antwoorden where vragen.id = antwoorden.vraag_id ) and speurtocht_id='$_GET[speurtocht_id]'  order by rand()");

// print_r($sql);
//
$getRandomQuestion = mysqli_fetch_assoc($sqlSelectRandomQuestion);
$randomQuestion = $getRandomQuestion['id'];
				header("Location: speurtocht.php?id=".$_GET['id']."&vraag_id=".$randomQuestion."&speurtocht_id=".$_GET['speurtocht_id']);



?>