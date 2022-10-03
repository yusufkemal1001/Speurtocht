<?php
include 'dbcon.php';
$sql = mysqli_query($conn, "SELECT vraag FROM vragen WHERE vraag IS NOT NULL");
// print_r($sql);

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
                
                <a href="speurtocht.html">
                <button class="next">Ga verder</button>
                </a>
            </div>
            <div class="field-image">
                <label>Selecteer foto</label>
                <input type="file" name="image" accept="image/jpeg,image/jpg" required>
              </div>
    </div>     
    
    
<?php


$sql2 = mysqli_query($conn, "INSERT INTO antwoorden (image) VALUES ()");
          exec($sql2);

?>

</body>
</html>