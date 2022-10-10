<?php

include 'dbcon.php';

$sql = mysqli_query($conn, "SELECT vragen.id as vraag_id,vragen.vraag, vragen.type, teams.uuid, teams.speurtocht_id, teams.naam as teamName from teams inner join vragen on teams.speurtocht_id = vragen.speurtocht_id where teams.uuid = '$_GET[id]' and vragen.id='$_GET[vraag_id]'");
$sql1 = mysqli_query($conn, "SELECT vragen.vraag, antwoorden.behaald FROM vragen LEFT JOIN antwoorden ON vragen.speurtocht_id=antwoorden.speurtocht_id");


$row = mysqli_fetch_assoc($sql);
$row1 = mysqli_fetch_assoc($sql1);


// print_r($sql);
//

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">

    <link rel="stylesheet" href="dist/output.css">
    <title>Document</title>

    <title>Speurtocht Pagina</title>
</head>

<!-- Het weergeven van de vragen -->
<body>
<script type="text/javascript">
    window.history.forward();

    function noBack() {
        window.history.forward();
    }
</script>
<?php if (!$_GET['vraag_id']) { ?>
    <div class="text-xl text-center text-bold  text-white p-2" style="    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 300px;
    height: 250px;">
        <?php echo "Er zijn geen vragen meer!"; ?><br><br>
        Nog even wachten op de anderen...<br> <br>
        Klik<a href="leaderboard.php?id=<?php echo $_GET['id'];?>&speurtocht_id=<?php echo $_GET['speurtocht_id'];?>" target="_blank" class="continue " style=" color: #70ABAF; " > hier</a> om de resultaten te bekijken
    </div>
    <div class="text-xl text-center text-bold text-white flex justify-center items-center p-2" style="height: 100vh; display: flex;
    align-items: center;
    justify-content: center;"></div>

<?php } else { ?>
    <div class="info_box text-2xl" style="max-width: 90% !important;">
        <div class="info_title m-auto text-center text-2xl  text-bold " style="padding: 20px;">
            <div class="m-auto text-center text-l "><?php echo $row['vraag']; ?> </div>
        </div>


        <!-- Form -->

        <?php if (isset($_GET['error'])): ?>
            <p><?php echo $_GET['error']; ?></p>
        <?php endif ?>



        <?php if ($row['type'] == 1) { ?>
            <form action="save-image.php?id=<?php echo $_GET['id']; ?>&vraag_id=<?php echo $row['vraag_id']; ?>&speurtocht_id=<?php echo $_GET['speurtocht_id'] ?>"
                  method="post" enctype="multipart/form-data" class="m-auto text-center p-5">
                <div class="m-auto">
                Selecteer uw foto:<br>
                    <input type="file" name="file" accept="image/png, image/gif, image/jpeg" class="text-center m-auto mb-5" style="max-width: 100%" required>
                </div>
                <input type="submit" name="submit" value="Upload" style="border: 1px solid; padding: 5px; border-radius: 10px;">
            </form>

        <?php } elseif ($row['type'] == 0) { ?>
            <form action="save-text.php?id=<?php echo $_GET['id']; ?>&vraag_id=<?php echo $_GET['vraag_id']; ?>&speurtocht_id=<?php echo $_GET['speurtocht_id']; ?>"
                  action="save-text.php"
                  method="post"
                  enctype="multipart/form-data"
                  class="m-auto text-center p-5">

                <input type="text"
                       name="my_text" class="w-5/5 border " style="border: solid 1px;" required><br><br>


                <input type="submit"
                       name="submit"
                       value="Upload" class="continue text-xl" style="border: 1px solid; padding: 5px; border-radius: 10px;">


            </form>

        <?php } ?>
    </div>

<?php } ?>


<!--  De Form voor het uploaden van de tekst vragen  -->


<!-- style="position: absolute; top: 150px; left: 164px; font-size: 30px;"   -->
<!-- tyle= "margin: 0 5px;
                height: 40px;
                width: 100px;
                border: 1px solid #70ABAF;
                background: #70ABAF;
                border-radius: 5px;
                color: #fff;
                font-size: 16px;
                font-weight: 500;
                cursor: pointer;
                top: 100px;
                left: 80px;
                position: absolute;">   -->
<!--  De Form voor het uploaden van de foto vragen  -->


<!--  De HTML voor het maken van de foto  -->


</body>
</html>