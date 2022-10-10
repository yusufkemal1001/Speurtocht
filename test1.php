<?php
include 'dbcon.php';

//$sql = mysqli_query($conn, "select vragen.vraag,antwoorden.speurtocht_id, antwoorden.tekst,teams.naam, antwoorden.image,antwoorden.behaald,antwoorden.speurtocht_id from antwoorden left join teams on antwoorden.team_id = teams.uuid left join vragen on antwoorden.vraag_id = vragen.id where behaald = 0 and antwoorden.speurtocht_id= '$_GET[id]' order by antwoorden.id asc ;");

$sql = mysqli_query($conn, "SELECT antwoorden.id, antwoorden.tekst, antwoorden.image, antwoorden.behaald, vragen.vraag FROM antwoorden INNER JOIN vragen ON antwoorden.vraag_id = vragen.id WHERE behaald = 0 AND antwoorden.speurtocht_id = '$_GET[id]';");

$sql1 = mysqli_query($conn, "SELECT COUNT(id) FROM antwoorden WHERE behaald = 0 AND speurtocht_id = '$_GET[id]';");

$row = mysqli_fetch_assoc($sql);
$row1 = mysqli_fetch_assoc($sql1);
$checkTeams = "SELECT * FROM teams where speurtocht_id= '$_GET[id]' and active = 1 ";


$result = $conn->query($checkTeams);
// output data of each row
if ($result->num_rows > 0) {?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="styles.css">

    <title>Goed/Afkeuren</title>
</head>

<body style=" margin-top:100px">
<div class="tbg " style="margin-bottom: 20px;margin-top: 1.25rem; ">
    <div class="theader" style="border-bottom: 1px solid;">
        <h3 id="title" class="text-center m-5"><?php if ($row1['COUNT(id)'] != 0) {
                echo $row['vraag'];
            } else {
                echo "Alles is nagekeken";
            } ?></h3>
    </div>
    <?php if ($row1['COUNT(id)'] > 0) : ?>
    <div class="tbgwrap">

        <?php if ($row['image']!= 0){ ?>
        <div class="w-4/4 m-auto p-2 " style="">
            <?php if ($row1['COUNT(id)'] > 0) : ?>
                <?php if ($row['image'] != null) : ?>
                    <img src="uploads/<?php echo $row['image'] ?>" width="100%"/>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php } else { ?>
        <div class="text-2xl text-center m-auto " style="margin-top: 10px; margin-bottom: 20px;">
        <?php if ($row1['COUNT(id)'] > 0) : ?>
            <?php if ($row['tekst'] != null) : ?>
                <h4> <b>Antwoord: </b><?php if ($row1['COUNT(id)'] != 0) {
                        echo $row['tekst'];
                    } else echo " " ?></h4>
            <?php endif; ?>
        <?php endif; ?>
        </div>
        <?php } ?>
        <div class=" flex p-5 " style="justify-content: space-around; border-top: black solid 1px;">
            <a href="goedkeuren.class.php?id=<?php echo $row['id']; ?>&speurtocht_id=<?php echo $_GET['id']; ?>" class="text-2xl"><i class="fa-solid fa-check mr-2 bg-lime-500" style="color: rgb(132 204 22);"></i>Goed
                </a>
            <a href="afkeuren.class.php?id=<?php echo $row['id']; ?>&speurtocht_id=<?php echo $_GET['id']; ?>" class="text-2xl"><i class="fa-solid fa-xmark bg-rose-500 mr-2"style="color: rgb(244 63 94);"></i>Fout
                </a>

        </div>

    </div>

</div>
<?php endif; ?>
</div>

</div>
</body>
</html>
<?php } ?>