<?php
session_start();

if (!isset($_SESSION['active_speurtocht_id'])){
    header("location:dashboard.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <meta http-equiv="refresh" content="10">
    <script src="https://kit.fontawesome.com/a5e31d35c1.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="w-3/4 m-auto" style="background-color: #161215;">
<div class="">
    <div class="text-4xl text-white m-5 text-center"></div>
</div>
<div class="grid grid-cols-2">
    <div>
        <?php include "show.players.php";?>
    </div>
    <div>
        <?php include "test1.php";?>
    </div>

</div>

<a href="stop.speurtocht.php" onclick="return confirm('Wilt u de speurtocht stoppen?')" class="text-center text-white "><div class="text-center m-auto " style="height: 50px; width: 50%;border-radius: 10px; background-color:rgb(244 63 94); ;display: flex;justify-content: center;align-items: center;"><b>Speurtocht stoppen</b><i class="p-2 fa-solid fa-power-off"></i></div></a>
</body>
</html>


