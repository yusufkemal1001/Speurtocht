<?php

include 'dbcon.php';
$sql = mysqli_query($conn, "SELECT vragen.id,vragen.vraag, vragen.type, teams.uuid, teams.speurtocht_id, teams.naam as teamName from teams inner join vragen on teams.speurtocht_id = vragen.speurtocht_id where teams.uuid = '$_GET[id]' ORDER BY RAND()");
// print_r($sql);
//

$row = mysqli_fetch_assoc($sql);


$row = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html> 
<html lang="en">
<?php $row = mysqli_fetch_assoc($sql); ?>
    <title>Document</title>
</head>
<body>
<div class="info_box">
        <div class="info_title">
            <span><?php

              echo $row['vraag'];  
            
            ?></span>
        </div>
            <div class="buttons">
                
                <a href="save-image.php">
                <button class="next">Ga verder</button>
                </a>
            </div>
            <div class="field-image">
                <label>Selecteer foto</label>
                <input type="file" name="image-name" value="insert" accept="image/jpeg,image/jpg" required>
              </div>
    </div>     
    
    <?php

function insert() {

    

    // if(isset($_FILES['image'])){
    //     $img_name = $_FILES['image-name'];
    //     $img_explode = explode('.',$img_name);
    //     $img_ext = end($img_explode);

    //     $extensions = ["jpeg", "png", "jpg"];
    //     if(in_array($img_ext, $extensions) === true){
    //         $types = ["image/jpeg", "image/jpg", "image/png"];
    //         if(in_array($img_type, $types) === true){
    //             $time = time();
    //             $new_img_name = $time.$img_name;
    //             if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
    //                 $insert_query = mysqli_query($conn, "INSERT INTO antwoorden (id, tekst, image, team_id, vraag_id, behaald) VALUES ('0','$img_name',0,0,0)");
//                 }
//             }   
//         }
//     }
}
    ?>




<!-- Form -->
<body>
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     <form action="save-image.php"
           method="post"
           enctype="multipart/form-data">

           <input type="file" 
                  name="my_image">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>
</html>