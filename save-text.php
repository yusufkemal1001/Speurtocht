<?php 

if (isset($_POST['submit']) && isset($_FILES['my_text'])) {
	include "dbcon.php";


	$text_name = $_FILES['my_text'];


				// Insert into Database
				$sql = "INSERT INTO antwoorden (tekst, image, team_id, vraag_id, behaald) VALUES ('$img_name','0',0,0,0)";
				mysqli_query($conn, $sql);
				header("Location: speurtocht.php


                ");
}else {

    echo "Dit is niet gelukt!";}


?>