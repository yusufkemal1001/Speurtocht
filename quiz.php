<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spelers pagina || Marthijs</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
            </div>
            <div class="buttons">
                <a href="https://www.instagram.com/p/Cf5EQ6JDOWm/">
                <button class="quit">Verlaat</button>
                </a>
                <a href="speurtocht.php?id=<?php echo $_GET['id'] ;?>">
                <button  class="continue">Ga verder</button>
                </a>
            </div>
    </div>        
</body>
</html>