       <?php
       include 'dbcon.php';

       $sql = mysqli_query($conn, "SELECT vragen.id as vraag_id,vragen.vraag, vragen.type, teams.uuid, teams.speurtocht_id, teams.naam as teamName from teams inner join vragen on teams.speurtocht_id = vragen.speurtocht_id where teams.uuid = '$_GET[id]' ORDER BY RAND()");


       // print_r($sql);
       //

       $row = mysqli_fetch_assoc($sql);

       echo $row['vraag_id'];
       ?>



<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <title>Document</title>
</head>
<body>

<!-- Form -->
<body>
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     <form action="save-image.php?id=<?php echo $_GET['id'] ; ?>&vraag_id=<?php echo $row['vraag_id'];?>"
           method="post"
           enctype="multipart/form-data">

           <input type="file" 
                  name="my_image">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>

     <form action="save-text.php?id=<?php echo $_GET['id'] ; ?>&vraag_id=<?php echo $row['vraag_id'];?>"
              action="save-text.php"
              method="post"
              enctype="multipart/form-data">

              <input type="text" 
                  name="my_text">


              <input type="submit" 
                  name="submit"
                  value="Upload">



              </form>

              
</body>
</html>