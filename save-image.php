<?php
// Include the database configuration file
include "dbcon.php";
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);



echo $fileName;


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){


            // Insert image file name into database
			$insert = $conn->query("INSERT INTO antwoorden (tekst, image, speurtocht_id, team_id, vraag_id, behaald) VALUES ('0','$fileName','$_GET[speurtocht_id]','$_GET[id]','$_GET[vraag_id]',0)");
            if($insert){
                $sqlSelectRandomQuestion = mysqli_query($conn, "select * from vragen where not exists (select * from antwoorden where vragen.id = antwoorden.vraag_id and team_id='$_GET[id]' ) and speurtocht_id='$_GET[speurtocht_id]'  order by rand()");

// print_r($sql);
//
                $getRandomQuestion = mysqli_fetch_assoc($sqlSelectRandomQuestion);
                $randomQuestion = $getRandomQuestion['id'];
                header("Location: speurtocht.php?id=".$_GET['id']."&vraag_id=".$randomQuestion."&speurtocht_id=".$_GET['speurtocht_id']);


            }else{
                $statusMsg = "File upload failed, please try again.";

            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";

        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';

    }
}else{
    $statusMsg = 'Please select a file to upload.';

}





// Display status message
echo $statusMsg;
?>