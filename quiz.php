<?php
include 'dbcon.php';

$sql = mysqli_query($conn,"SELECT naam FROM teams WHERE uuid = '$_GET[id]';");
$sql1 = mysqli_query($conn, "SELECT vragen.id as vraag_id,vragen.vraag, vragen.type, teams.uuid, teams.speurtocht_id, teams.naam as teamName from teams inner join vragen on teams.speurtocht_id = vragen.speurtocht_id where teams.uuid = '$_GET[id]' ORDER BY RAND()");


$result = mysqli_fetch_assoc($sql);
$result1 = mysqli_fetch_assoc($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spelers pagina || Marthijs</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="styles1.css">

</head>
<body>
    <div class="start_btn"><button>Spelen!</button></div>

    <div class="info_box">
        <div class="info_title">
            <span>Regels van deze Speurtocht</span>
        </div>
            <div class="info_list">
                <div class="info">1. Je mag niet samenwerken met andere teams</div>
                <div class="info">2. Log niet met meer dan <span>2 apparaten</span> in op hetzelfde account</div>
                <div class="info">3. Wanneer je een vraag hebt beantwoord, kan je <span>niet</span> meer terug</div>
                <div class="info">4. Je mag je groepsnaam aanpassen door het inputveld <span>hieronder</span> in te vullen</div>
            </div>
        <form action="add.player.to.speurtocht.php?id=<?php echo $_GET['id'];?>" method="post" class="teamNameForm buttons">
            <div class="buttons">
                <b class="mr-2">Uw groepsnaam is : </b> <input type="text" name="newName" class="teamNameInput pr-2 ml-2 border" required value="<?php echo $result['naam']; ?>">
            </div>
            <div class="buttons">


                <a href="https://www.instagram.com/p/Cf5EQ6JDOWm/">
                <button class="quit">Verlaat</button>
                </a>
                <a href="speurtocht.php?id=<?php echo $_GET['id'] ;?>&vraag_id=<?php echo $result1['vraag_id']; ?>">
                <button  class="continue">Ga verder</button>
                </a>
            </div>
        </form>
    </div>        
</body>
</html>