<?php 
include 'dbcon.php';

//$sql = mysqli_query($conn, "select vragen.vraag,antwoorden.speurtocht_id, antwoorden.tekst,teams.naam, antwoorden.image,antwoorden.behaald,antwoorden.speurtocht_id from antwoorden left join teams on antwoorden.team_id = teams.uuid left join vragen on antwoorden.vraag_id = vragen.id where behaald = 0 and antwoorden.speurtocht_id= '$_GET[id]' order by antwoorden.id asc ;");

$sql = mysqli_query($conn, "SELECT antwoorden.id, antwoorden.tekst, antwoorden.image, antwoorden.behaald, vragen.vraag FROM antwoorden INNER JOIN vragen ON antwoorden.vraag_id = vragen.id WHERE behaald = 0 AND antwoorden.speurtocht_id = '$_GET[id]';" );

$sql1 = mysqli_query($conn, "SELECT COUNT(id) FROM antwoorden WHERE behaald = 0 AND speurtocht_id = '$_GET[id]';");

$row = mysqli_fetch_assoc($sql);
$row1 = mysqli_fetch_assoc($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="styles.css">

    <title>Goed/Afkeuren</title>
</head>

<body style=" margin-top:100px">
    <div class="tbg">
        <div class="theader">
          <h3 id="title" class="text-center"><?php if($row1['COUNT(id)'] != 0){ echo $row['vraag'];}else{ echo"Alles is nagekeken";} ?></h3>
          <div class="tlogo">
      
          </div>
        </div>
        <div class="tbgwrap">
          <div class="tphoto">
          <?php if($row1['COUNT(id)'] > 0) : ?>
          <?php if($row['image'] != null) : ?>
          <img src="uploads/<?php echo $row['image']?>" width="100%"/>.
          <?php endif; ?>
          <?php endif; ?>
          <?php if($row1['COUNT(id)'] > 0) : ?>
          <?php if($row['tekst'] != null) : ?>
          <h4> <?php if($row1['COUNT(id)'] != 0){ echo $row['tekst'];}else echo" "?></h4>
          <?php endif; ?>
          <?php endif; ?>
          </div>
          <div class="tcontrols">
              <button><a href="afkeuren.class.php?id=<?php echo $row['id']; ?>">Fout</button>
            </div>
              <button><a href="goedkeuren.class.php?id=<?php echo $row['id']; ?>">Goed</button>
            </div>
          </div>
        </div>
      
      </div>  
</body>
</html> 