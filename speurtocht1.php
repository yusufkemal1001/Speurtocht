<?php

include 'dbcon.php';

$sql = mysqli_query($conn, "SELECT vragen.id as vraag_id,vragen.vraag, vragen.type, teams.uuid, teams.speurtocht_id, teams.naam as teamName from teams inner join vragen on teams.speurtocht_id = vragen.speurtocht_id where teams.uuid = '$_GET[id]' ORDER BY RAND()");
$sql1 = mysqli_query($conn, "SELECT vragen.vraag, antwoorden.behaald FROM vragen LEFT JOIN antwoorden ON vragen.speurtocht_id=antwoorden.speurtocht_id");



include 'dbcon.php';
$sql = mysqli_query($conn, "SELECT vragen.id,vragen.vraag, vragen.type, teams.uuid, teams.speurtocht_id, teams.naam as teamName from teams inner join vragen on teams.speurtocht_id = vragen.speurtocht_id where teams.uuid = '$_GET[id]' ORDER BY RAND()");

// print_r($sql);
//

$row = mysqli_fetch_assoc($sql);


echo $_GET['vraag_id'];

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


<!-- Form -->
<body>
<?php if (isset($_GET['error'])): ?>
    <p><?php echo $_GET['error']; ?></p>
<?php endif ?>
<form action="save-image.php?id=<?php echo $_GET['id'] ; ?>&vraag_id=<?php echo $row['vraag_id'];?>"
      method="post"
      enctype="multipart/form-data">

    <input type="file"
           name="my_image" accept="image/*;capture=camera">

    <input type="submit"
           name="submit"
           value="Upload">
</form>
<script lang="javascript">
    window.addEventListener('loadCamera', _ => {
        loadCamera()
    })

    let controls
    let cameraOptions
    let video
    let canvas
    let screenshotImage
    let streamStarted

    let startCameraButton
    let screenshotButton
    let newPhotoButton
    const constraints = {
        video: {
            facingMode: "environment",
            width: {
                min: 1280,
                max: 1920,
                ideal: 1920,
            },
            height: {
                min: 720,
                max: 1080,
                ideal: 1080,
            },
        }
    };

    function loadCamera() {
        if (document.getElementById('video-input') == null) {
            return
        }


        if ('mediaDevices' in navigator && 'getUserMedia' in navigator.mediaDevices) {
            document.getElementById('video-input').classList.remove('hidden')
        }


        controls = document.querySelector('.controls');
        cameraOptions = document.getElementById('cameraOptions')
        video = document.querySelector('video');
        canvas = document.querySelector('canvas');
        screenshotImage = document.querySelector('img');
        streamStarted = false;

        startCameraButton = document.getElementById('start-camera-button')
        screenshotButton = document.getElementById('screenshot-button')
        newPhotoButton = document.getElementById('try-again-button')

        cameraOptions.onchange = () => {
            const updatedConstraints = {
                ...constraints,
                deviceId: {
                    exact: cameraOptions.value
                }
            };

            startStream(updatedConstraints);
        };
        getCameraSelection();
    }

    function startCamera() {
        if (streamStarted) {
            video.play();
            return;
        }
        if ('mediaDevices' in navigator && navigator.mediaDevices.getUserMedia) {
            const updatedConstraints = {
                ...constraints,
                deviceId: {
                    exact: cameraOptions.value
                }
            };
            startStream(updatedConstraints);
            screenshotButton.classList.remove('hidden')


        }
    }

    function takeScreenshot() {
        video.classList.add('hidden')
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0);
        screenshotImage.src = canvas.toDataURL('image/webp');
        screenshotImage.classList.remove('hidden');
        screenshotButton.classList.add('hidden')
        newPhotoButton.classList.remove('hidden')

        let imageFile
        //   canvas.toBlob(function (blob) {
        //       imageFile = new File([blob], 'photo.png', blob)
        //   @this.upload('photoInput', imageFile, (uploadedFilename) => {
        //       console.log("Goed!");
        //   }, () => {
        //       console.log("Fout!");
        //   })
        //   }, 'image/jpeg', 0.95)
    }

    function newPhoto() {
        video.classList.remove('hidden')
        screenshotImage.classList.add('hidden')
        screenshotButton.classList.remove('hidden')
        newPhotoButton.classList.add('hidden')

    }

    async function startStream(constraints) {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        video.srcObject = stream;
    }

    function handleStream(stream) {
        video.srcObject = stream;
    }


    async function getCameraSelection() {
        const devices = await navigator.mediaDevices.enumerateDevices();
        const videoDevices = devices.filter(device => device.kind === 'videoinput');
        const options = videoDevices.map(videoDevice => {
            return `<option value="${videoDevice.deviceId}">${videoDevice.label.length === 0 ? 'Camera' : videoDevice.label}</option>`;
        });
        cameraOptions.innerHTML = options.join('');
    }

    loadCamera()
</script>
<?php echo $row['vraag']; ?>

<?php if ($row['type']==1){?>
    <div id="video-input" wire:ignore class="hidden">
        <video id="video-playback" autoplay></video>
        <canvas class="hidden"></canvas>
        <img class="hidden" alt="">

        <div class="flex flex-row gap-2 pt-2">
            <select name="" id="cameraOptions" class="bg-neutral-600 rounded-md">
                <option value="">Selecteer camera</option>
            </select>
            <button id="start-camera-button" onclick="startCamera()"
                    class="bg-green-600 p-2 rounded-md">Selecteer camera
            </button>
            <button id="screenshot-button" onclick="takeScreenshot()"
                    class="bg-green-600 p-2 rounded-md hidden">Maak foto
            </button>
            <button id="try-again-button" onclick="newPhoto()"
                    class="bg-green-600 p-2 rounded-md hidden">Nieuwe foto
            </button>
        </div>

    </div>
<?php }elseif ($row['type']==0){?>
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

<?php }?>







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