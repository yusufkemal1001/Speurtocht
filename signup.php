<?php
//require 'db.php';
require 'login.class.php';
if (isset($_SESSION['user_id'])){
    header("Location:dashboard.php");
}

$login = new login();


if (isset($_POST["submit"])){
    $result = $login->login($_POST['username'],$_POST['password']);

    if ($result == 1){
        $_SESSION['login']=true;
        $_SESSION['id']=$login->idUser();
        header("Location:index.html");
    }elseif ($result == 10){
        echo
        "<script>alert('Gebruiker niet gevonden');</script>";
    }elseif ($result == 100){
        echo
        "<script>alert('Gebruiker niet gevonden');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Inlog pagina door je boy</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles-light.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    

</head>
<body>
<form class="form1" action="" method="post">
    <h3>Sign Up Here</h3>

    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Username" id="username">

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Password" id="password">

    <label for="password">Name</label>
    <input type="password" name="password" placeholder="Password" id="password">

    <label for="password">Email</label>
    <input type="password" name="password" placeholder="Password" id="password">

    <button type="submit" name="submit">Log In</button>
    
    <div class="link">Already signed up? <a href="login.php">Login now</a></div>
</form>

  <script src="javascript/pass-show-hide.js"></script>

</body>
</html>