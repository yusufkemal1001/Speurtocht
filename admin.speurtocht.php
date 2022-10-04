<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/output.css">
    <script src="https://kit.fontawesome.com/a5e31d35c1.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="w-3/5 m-auto" style="background-color: #161215;">
<div class="">
    <div class="text-4xl text-white m-5 text-center"></div>
    <div class="text-m text-white"><a href="logout.php" class="flex float-right items-center hover:text-gray-600"><i class="fa fa-sign-in mr-2" aria-hidden="true"></i>Uitloggen</a></div>
</div>
<div class="grid grid-cols-2">
    <?php include "show.speurtocht.php";?>
</div>
<a href="add.speurtocht.php" class="text-center color-red "><div class="text-center m-auto " style="height: 50px; width: 50%;border-radius: 10px; background-color: lightblue;display: flex;justify-content: center;align-items: center;"><i class="fa-solid fa-plus pr-2"></i>Speurtocht Aanmaken</div></a>
</body>
</html>