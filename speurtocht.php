<?php
include 'dbcon.php';

$sql = mysqli_query($conn, "SELECT vragen.id,vragen.vraag, vragen.type, teams.uuid, teams.speurtocht_id, teams.naam as teamName from teams inner join vragen on teams.speurtocht_id = vragen.speurtocht_id where teams.uuid = '$_GET[id]' ORDER BY RAND()");
// print_r($sql);
//

?>

<?php

$row = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <title>Document</title>
</head>
<body>
<div class="info_box">
        <div class="info_title">
            <span><?php

              echo $row['vraag'];  
            
            ?></span>
        </div>
            <div class="buttons">
                
                <a href="">
                <button class="next">Ga verder</button>
                </a>
            </div>
            <div class="field-image">
                <label>Selecteer foto</label>
                <input type="file" name="image" accept="image/jpeg,image/jpg" required>
              </div>
    </div>     
    




</body>
</html>