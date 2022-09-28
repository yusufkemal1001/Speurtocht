<?php
//require 'db.php';
require 'login.class.php';
if (isset($_SESSION['id'])){
    header("Location:dashboard.php");
}

    $login = new login();


if (isset($_POST["submit"])){
    $result = $login->login($_POST['email'],$_POST['password']);

    if ($result == 1){
        $_SESSION['login']=true;
        $_SESSION['id']=$login->idUser();
        header("Location:dashboard.php");
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
<form action="" method="post">
    <h3>Login Here</h3>

<div class="field input">    
    <label for="username">Email</label>
    <input type="text" name="email" placeholder="Enter email" id="email">
</div>


<div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter password" required>
          
        </div>

    <button type="submit" name="submit">Log In</button>
    <div class="link">Not yet signed up? <a href="signup.php">Signup now</a></div>
</form>

<script src="javascript/pass-show-hide.js"></script>

</body>
</html>