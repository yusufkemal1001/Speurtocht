<?php
include 'dbcon.php';
require 'login.class.php';

//require 'db.php';
if (isset($_SESSION['active_speurtocht_id'])){
    header('location:admin.speurtocht.php?id='.$_GET['id']);
}
$select = new Select();

if (isset($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
}else{
    header("location: index.php");
}

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $query_fetch = mysqli_query($conn,"SELECT * FROM speurtochten WHERE id = $id");
    $query_fetch1 = mysqli_query($conn,"SELECT * FROM vragen WHERE speurtocht_id = $id");
    while($row = mysqli_fetch_array($query_fetch)){ ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <script src="https://kit.fontawesome.com/a5e31d35c1.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
            <link href="dist/output.css" rel="stylesheet">
            <title>Document</title>
        </head>
        <body style="background-color: #161215;">
        <div class="flex">

        <div class="m-auto w-3/5 p-5 rounded-md max-h-screen " >
            <div class=" rounded-md" style="min-height: 400px;">
                <div>
                <div class=" flex items-center mb-5  " style="color: #F0F7F4">
                    <a href="dashboard.php" class="w-2/5 item-center"><i class="m-2 fa-solid fa-arrow-left"></i>Terug</a>
                    <div class="m-auto justify-center text-center text-4xl w-3/5 mr-1/5"><?php echo $row['naam'];?></div>


                </div>

                <div class="w-full  max-h-screen ">
                    <div class="w-4/4 rounded-md min-h-60    items-center m-auto p-5 mb-5" style="background-color: #7CB3B6;">
                        <div class="max-w-full">
                            <div class="w-5/5 max-h-full">
                                <div class="text-xl ">
                                    <form action="update.speurtocht.php" method="get">
                                        <input type="hidden" name="id" value="<?= $row["id"]; ?>" />
                                        <div class="flex p-2 justify-between">
                                            <b><label>Speurtocht Naam</label></b>&nbsp;&nbsp;
                                            <input type="text" class=" rounded-md w-3/5 pl-2" style="background-color: #1D3334;color: white;" value="<?php echo $row['naam'];?>" name="name" required /><br>
                                            <button><a href="update.speurtocht.php?id=<?php echo $row['id']; ?>"><i class="fa-regular fa-floppy-disk m-2"></i></a></button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (mysqli_num_rows($query_fetch1)!= 0){ ?>
                <div class="text-2xl text-center mt-10 mb-5" style="color: #F0F7F4">
                    Vragen
                </div>
                <?php
                }

                while ($row1 = mysqli_fetch_array($query_fetch1)){?>
                    <style>
                        body {
                            /* Set "my-sec-counter" to 0 */
                            counter-reset: my-sec-counter;
                        }

                        .vraag-counter::before {
                            /* Increment "my-sec-counter" by 1 */
                            counter-increment: my-sec-counter;
                            content: "Vraag " counter(my-sec-counter) ".";
                        }
                    </style>
                    <div class="w-full  max-h-screen ">
                        <div class="w-4/4 rounded-md min-h-60    items-center m-auto p-2 mb-5"style="background-color: #D0F1ED;">
                            <div class="max-w-full">
                                <div class="w-5/5 max-h-full">
                                    <div class="text-xl ">
                                        <form action="update.vraag.php" method="get">
                                            <input type="hidden" name="speurtocht_id" value="<?= $row["id"]; ?>" />
                                            <input type="hidden" name="id" value="<?= $row1["id"]; ?>" />

                                            <div class="vraag-counter flex p-2 justify-between items-center">
                                                <textarea type="text" class="bg-white rounded-md w-3/6 pl-2" value="<?php echo $row1['vraag'];?>" name="vraag" required rows="2" ><?php echo $row1['vraag'];?></textarea>
                                                <input type="radio" id="Tekst" name="radio" value="0"<?php if ($row1['type']=='0'){?> checked="true"<?php }?>  >

                                                <label for="Tekst">Tekst</label><br>
                                                <input type="radio" id="Tekst" name="radio" value="1" <?php if ($row1['type']=='1'){?> checked="true"<?php }?> >
                                                <label for="css">Foto</label><br>
                                                <button><a href="update.vraag.php?id=<?php echo $row1['id']; ?>"><i class="fa-regular fa-floppy-disk"></i></a></button>
                                                <a href="delete.question.php?id=<?php echo $row1['id']; ?>&speurtocht_id=<?php echo $row['id']?>"><i class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







<?php
    } // while loop brace
                }

} // isset brace

else{
    echo "It is not set.";
}



?>
                <a href="add.new.question.php?id=<?php echo $_GET['id']; ?>" class="text-center color-red "><div class="text-center ml-auto mr-auto m-5 mt-10 " style="height: 50px; width: 50%;border-radius: 10px; background-color: #D6F094;display: flex;justify-content: center;align-items: center;"><i class="fa-solid fa-plus pr-2"></i>Vraag Aanmaken</div></a>
                <a href="teams.php?id=<?php echo $_GET['id']; ?>" class="text-center  "><div class="text-center ml-auto mr-auto m-5 mt-10 " style="height: 50px; width: 50%;border-radius: 10px; background-color: #78A300;color:white; display: flex;justify-content: center;align-items: center;">Groepen Aanmaken<i class="fa-solid fa-arrow-right m-2"></i></div></a>
                <a onclick="return confirm('Wilt u deze speurtocht verwijderen?')" href="delete.speurtocht.php?id=<?php echo $_GET['id']; ?>"class="m-auto text-center"><div class="m-auto text-center flex items-center justify-center w-2/4 mt-20" style="height: 50px; border-radius: 10px; background-color: tomato; color: white; ">Speurtocht Verwijderen<i class="fa-solid fa-arrow-right m-2"></i></div></a>
        </body>
</html>