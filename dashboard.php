<?php
require 'login.class.php';

//require 'db.php';

$select = new Select();

if (isset($_SESSION["ID"])){
    $user = $select->selectUserById($_SESSION["ID"]);
}else{
    header("location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="text-m"><a href="logout.php" class="flex  text-white items-center hover:text-gray-600"><i class="fa fa-sign-in mr-2" aria-hidden="true"></i>Uitloggen</a></div>
<p>Je bent ingelogt</p>
</body>
</html>