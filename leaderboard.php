<?php
include "dbcon.php";
$sql = mysqli_query($conn, "SELECT * FROM teams where uuid= '$_GET[id]' and active = 1");

$sqlAnswersCount = mysqli_query($conn,"SELECT * FROM antwoorden WHERE team_id = '$_GET[id]';");
$countAnswers = mysqli_num_rows($sqlAnswersCount);

$sqlCorrectAnswersCount = mysqli_query($conn,"SELECT * FROM antwoorden WHERE team_id = '$_GET[id]' and behaald=1;");
$countCorrectAnswers = mysqli_num_rows($sqlCorrectAnswersCount);

$sqlCountQuestions = mysqli_query($conn,"SELECT * FROM vragen WHERE speurtocht_id = '$_GET[speurtocht_id]';");
$countQuestions = mysqli_num_rows($sqlCountQuestions);



$sqlWrongAnswersCount = mysqli_query($conn,"SELECT * FROM antwoorden WHERE team_id = '$_GET[id]' and behaald=2;");
$countWrongAnswers = mysqli_num_rows($sqlWrongAnswersCount);

$result = mysqli_fetch_assoc($sql);

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
<body class="w-4/4 m-auto" style="background-color: #161215;">
<div class="">
    <div class="text-4xl text-white m-5 text-center"></div>
</div>
<div class="">
    <div id="main">
        <?php include "resultaten.php";?>
    </div>
</div>
<script>
    var main = document.getElementById( 'main' );

    [].map.call( main.children, Object ).sort( function ( b, a ) {
        return +a.id.match( /\d+/ ) - +b.id.match( /\d+/ );
    }).forEach( function ( elem ) {
        main.appendChild( elem );
    });
</script>

</body>
</html>


