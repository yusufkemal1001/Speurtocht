<?php 
include 'dbcon.php';

$sql = mysqli_query($conn, "SELECT antwoorden.id, antwoorden.tekst, antwoorden.image, antwoorden.behaald, teams.speurtocht_id, vragen.vraag FROM ((antwoorden INNER JOIN teams ON antwoorden.team_id = teams.id) INNER JOIN vragen ON antwoorden.vraag_id = vragen.id) WHERE behaald = 0 AND teams.speurtocht_id = 6;");
$sql1 = mysqli_query($conn, "SELECT COUNT(id) FROM antwoorden WHERE behaald = 0 AND speurtocht_id = 6;");

$row = mysqli_fetch_assoc($sql);
$row1 = mysqli_fetch_assoc($sql1);
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
          
            <h3 id="title"><?php if($row1['COUNT(id)'] != 0){ echo $row['vraag'];}else echo"De openstaande vragen zijn nagekeken" ?></h3>
          <i class="fa fa-cog" aria-hidden="true"></i>
          <i class="fa fa-comments" aria-hidden="true"></i>
          <div class="tlogo">
      
          </div>
        </div>
        <div class="tbgwrap">
          <div class="tphoto">
          <img src="uploads/<?php if($row1['COUNT(id)'] != 0){echo $row['image'];}else echo"American-psycho-patrick-bateman.jpg"?>"/>.
          <h4> <?php if($row1['COUNT(id)'] != 0){ echo $row['tekst'];}else echo"U heeft alle openstaande vragen beoordeeld"?></h4>
          
          
          </div>
          <div class="tcontrols">
            <?php //<div class="tno" aria-hidden="true">?>
              <button><a href="afkeuren.class.php?id=<?php echo $row['id']; ?>">Fout</button>
            </div>
            <?php //<div class="tyes" aria-hidden="true">?>
              <button><a href="goedkeuren.class.php?id=<?php echo $row['id']; ?>"> Goed</button>
            </div>
          </div>
        </div>
      
      </div>  
</body>
</html> 