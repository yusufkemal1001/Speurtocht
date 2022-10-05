<!DOCTYPE html>
<html>
<head>
    <title>WebCam jQuery and PHP script</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 
    <style>
        #camera_wrapper, #show_saved_img{float:left; width: 650px;}
    </style>
 
    <script type="text/javascript" src="scripts/webcam.js"></script>
    <script>
        $(function(){
            //give the php file path
            webcam.set_api_url( 'saveimage.php' );
            webcam.set_swf_url( 'scripts/webcam.swf' );
            webcam.set_quality( 100 ); // Image quality (1 - 100)
            webcam.set_shutter_sound( true ); // play shutter click sound
 
            var camera = $('#camera');
            camera.html(webcam.get_html(600, 460));
 
            $('#capture_btn').click(function(){
                //take snap
                webcam.snap();
            });
 
            //after taking snap call show image
            webcam.set_hook( 'onComplete', function(img){
                $('#show_saved_img').html('<img src="' + img + '">');
                //reset camera for next shot
                webcam.reset();
            });
 
        });
    </script>
</head>
<body>
    <h1>Capture photo with Web Camera - PHP Script</h1>
 
    <!-- camera screen -->
    <div id="camera_wrapper">
    <div id="camera"></div>
    <br />
    <button id="capture_btn">Capture</button>
    </div>
    <!-- show captured image -->
    <div id="show_saved_img" ></div>
</body>
</html>


Saveimage.php

<?php
 
//set random name for the image, used time() for uniqueness
 
$filename =  time() . '.jpg';
$filepath = 'uploads/';
 
 



echo $filepath.$filename;
?>