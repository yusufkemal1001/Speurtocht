<?php 
include 'dbcon.php';
$query_fetch = mysqli_query($conn,"SELECT * FROM antwoorden WHERE behaald = 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Goed/Afkeuren</title>
</head>
<a href="index.php" class="back-button">←</a>
<body style=" margin-top:100px">
    <div class="tbg">
        <div class="theader">
          
            <h3 id="title">Vragen goed of afkeuren</h3>
          <i class="fa fa-cog" aria-hidden="true"></i>
          <i class="fa fa-comments" aria-hidden="true"></i>
          <div class="tlogo">
      
          </div>
        </div>
        <div class="tbgwrap">
          <div class="tphoto">
            <img src="American-psycho-patrick-bateman.jpg" id="image-photo" title="tphoto" alt="Tinder Photo" />
          
          
          </div>
          <div class="tcontrols">
            <div class="tno" aria-hidden="true">
              <button type="button">Foute shit</button>
            </div>
            <div class="tyes" aria-hidden="true">
              <button type="button">goed spul
              </button>
            </div>
          </div>
        </div>
      
      </div>  
</body>
</html>
