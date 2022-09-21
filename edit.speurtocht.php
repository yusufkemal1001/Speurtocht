<?php
include 'dbcon.php';
require 'login.class.php';

//require 'db.php';

$select = new Select();

if (isset($_SESSION["id"])){
    $user = $select->selectUserById($_SESSION["id"]);
}else{
    header("location: index.php");
}

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $query_fetch = mysqli_query($conn,"SELECT * FROM speurtochten WHERE id = $id");

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
            <link href="/dist/output.css" rel="stylesheet">
            <title>Document</title>
        </head>
        <body>
        <div class="flex">

        <div class="m-auto w-3/5 p-5 rounded-md max-h-screen " >
            <div class=" rounded-md" style="min-height: 400px;">
                <div class="text-4xl text-center  p-5 ">
                    Speurtocht
                </div>
                <div class="w-full overflow-scroll max-h-screen ">
                    <div class="w-4/4 rounded-md min-h-60  bg-white  items-center m-auto p-5 mb-5">
                        <div class="max-w-full">
                            <div class="w-5/5 max-h-full">
<!--                                <div class="text-xl ">-->
<!--                                    <form action="update.speurtocht.php" method="GET">-->
<!--                                        <input type="hidden" name="id" value="--><?//= $row["id"]; ?><!--" />-->
<!--                                        <div class="flex p-2 justify-between">-->
<!--                                            <b><label>Speurtocht Naam</label></b>&nbsp;&nbsp;-->
<!--                                            <input type="text" class="bg-gray-300 rounded-md w-3/6 pl-2" value="--><?php //echo $row['naam'];?><!--" name="naam" required /><br>-->
<!--                                            <a href="update.speurtocht.php"><i class="fa-regular fa-pen-to-square m-2"></i></a>-->
<!--                                            <a href=""><i class="fa-solid fa-trash m-2"></i></a>-->
<!--                                        </div>-->
<!--                                    </form>-->
<!--                                </div>-->

                                <div class="text-xl ">
                                    <form action="update.speurtocht.php" method="get">
                                        <input type="hidden" name="id" value="<?= $row["id"]; ?>" />
                                        <div class="flex p-2 justify-between">
                                            <b><label>Speurtocht Naam</label></b>&nbsp;&nbsp;
                                            <input type="text" class="bg-gray-300 rounded-md w-3/6 pl-2" value="<?php echo $row['naam'];?>" name="name" required /><br>
                                            <button><a href="update.speurtocht.php?id=<?php echo $row['id']; ?>"><i class="fa-regular fa-pen-to-square m-2"></i></a></button>
                                            <a href="delete.speurtocht.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-trash m-2"></i></a>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </body>
        </html>

<?php
    } // while loop brace

} // isset brace

else{
    echo "It is not set.";
}



?>



