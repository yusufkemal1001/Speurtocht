<?php 

    include "dbcon.php";
	$text_name = $_POST['my_text'];


				// Insert into Database
				$sql = "INSERT INTO antwoorden (tekst, image, team_id, vraag_id, behaald) VALUES ('$text_name','0','$_GET[id]','$_GET[vraag_id]',0)";
				mysqli_query($conn, $sql);
				header("Location: speurtocht.php?id=".$_GET['id']);



?>