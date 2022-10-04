<?php

          if(isset($_FILES['image'])){
             $img_name = $_FILES['image-name'];
             $img_explode = explode('.',$img_name);
             $img_ext = end($img_explode);

             $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                 $types = ["image/jpeg", "image/jpg", "image/png"];
                     if(in_array($img_type, $types) === true){
                         $time = time();
                        $new_img_name = $time.$img_name;
                             if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                              $insert_query = mysqli_query($conn, "INSERT INTO antwoorden (id, tekst, image, team_id, vraag_id, behaald) VALUES ('0','$img_name',0,0,0)");}
                 }
             }   
         }else {

            echo "Dit is helaas niet gelukt!";


         }
     


?>