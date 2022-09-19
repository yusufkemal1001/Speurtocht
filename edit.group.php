<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "afspraak_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $query_fetch = mysqli_query($conn,"SELECT * FROM teams WHERE group_id = $id");

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
            <link href="/css/style.css" rel="stylesheet">
            <title>Document</title>
        </head>
        <body>
        <div class="flex">
        <div class="w-2/4 p-5 rounded-md max-h-screen " >
            <div class="bg-gray-300 rounded-md" style="min-height: 400px;">
                <div class="text-4xl text-center  p-5 ">
                    Geselecteerde Groep
                </div>
                <div class="w-full overflow-scroll max-h-screen ">
                    <div class="w-3/4 rounded-md min-h-60  bg-white flex items-center m-auto p-5 mb-5">
                        <div class="">

                            <div class="w-5/5 max-h-full  ">
                                <div class="text-xl ">
                                    <b>Groep naam :</b> <?php echo $row["name"];?>
                                </div>
                                <div class="text-xl  p-1">
                                    <b>Klas :</b> <?php echo $row["class"] ?><br>
                                    <b>Aantal Leden :</b> <?php echo $row["members"] ?><br>
                                </div>
                            </div>
                            <div class="w-5/5 items-center text-xl ">
                                <b>Afbeelding : </b>   <img src="<?php echo $row["image"];?>" class=" w-2/5 m-2"  alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-2/4 p-5 rounded-md max-h-screen " >
            <div class="bg-gray-300 rounded-md" style="min-height: 400px;">
                <div class="text-4xl text-center  p-5 ">
                    Groep Aanpassen
                </div>
                <div class="w-full overflow-scroll max-h-screen ">
                    <div class="w-3/4 rounded-md min-h-60  bg-white flex items-center m-auto p-5 mb-5">
                        <div class="max-w-full">

                            <div class="w-5/5 max-h-full  ">
                                <div class="text-xl ">
                                    <form action="update.group.php" method="get">
                                        <input type="hidden" name="id" value="<?= $row["group_id"]; ?>" />
                                        <div class="flex p-2 ">
                                            <b><label>Groep Naam</label></b>&nbsp;&nbsp;
                                            <input type="text" class="bg-gray-300 rounded-md pl-2" value="<?php echo $row['name'];?>" name="name" required /><br>
                                        </div>
                                        <div class="flex p-2">
                                            <b><label>Klas</label></b>&nbsp;&nbsp;
                                            <input class="bg-gray-300 rounded-md pl-2" value="<?php echo $row['class'];?>" type="text" name="class" required /><br>
                                        </div>
                                        <div class="flex p-2">
                                            <b><label>Aantal leden</label></b>&nbsp;&nbsp;
                                            <input type="number" class="rounded-md bg-gray-300 pl-2" value="<?php echo $row['members'];?>" min="1" name="members" required /><br>
                                        </div>
                                        <div class="flex p-2">
                                            <b><label>Afbeelding</label></b>&nbsp;&nbsp;
                                        <input type="file" class="pl-2" value="<?php echo $row['image'];?>" name="image" required /><br>

                                        </div>
                                        <div class="text-xs m-2"><b>Belangrijk!</b> Alle afbeeldingen moeten in het mapje "groep-images" opgeslagen worden</div>
                                        <div class="w-full p-2 ">
                                            <input type="submit" value="Verstuur"  name="submit" class="bg-green-400 p-2 text-white rounded-md" >
                                            <a href="delete.group.php?id=<?php echo $row['group_id'];?>" class="bg-red-400 p-2 text-white rounded-md float-right">Groep Verwijderen</a>
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



