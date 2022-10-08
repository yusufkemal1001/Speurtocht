<?php
 include 'dbcon.php';

 $sql = mysqli_query($conn, "SELECT vragen.id as vraag_id,vragen.vraag, vragen.type, teams.uuid, teams.speurtocht_id, teams.naam as teamName from teams inner join vragen on teams.speurtocht_id = vragen.speurtocht_id where teams.uuid = '$_GET[id]' ORDER BY RAND()");
 $sql1 = mysqli_query($conn, "SELECT vragen.vraag, antwoorden.behaald FROM vragen LEFT JOIN antwoorden ON vragen.speurtocht_id=antwoorden.speurtocht_id;");

 $row = mysqli_fetch_assoc($sql);
 $row1 = mysqli_fetch_assoc($sql1);

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <title>Speurtocht Pagina</title>
</head>

<!-- Het weergeven van de vragen -->
<body>
<div class="info_box">   
    <div class="info_title">    
        <?php
        echo $row['vraag'];
        ?>
    </div>


 <!--  De Form voor het uploaden van de tekst vragen  -->
<form action="save-text.php?id=<?php echo $_GET['id'] ; ?>&vraag_id=<?php echo $row['vraag_id'];?>"
           
              action="save-text.php"
              method="post"
              enctype="multipart/form-data">

              <input type="text" 
                  name="my_text">
            
              <input type="submit" 
              style= "margin: 0 5px;
                height: 40px;
                width: 100px;
                position: relative;
                border: 1px solid #70ABAF;
                background: #70ABAF;
                border-radius: 5px;
                color: #fff;
                font-size: 16px;
                font-weight: 500;
                cursor: pointer;"

                  name="submit"
                  value="Upload">
             
</form>


<!-- style="position: absolute; top: 150px; left: 164px; font-size: 30px;"   -->
<!-- tyle= "margin: 0 5px;
                height: 40px;
                width: 100px;
                border: 1px solid #70ABAF;
                background: #70ABAF;
                border-radius: 5px;
                color: #fff;
                font-size: 16px;
                font-weight: 500;
                cursor: pointer;
                top: 100px;
                left: 80px;
                position: absolute;">   -->
 <!--  De Form voor het uploaden van de foto vragen  -->
<form action="save-image.php?id=<?php echo $_GET['id'] ; ?>&vraag_id=<?php echo $row['vraag_id'];?>" method="post" enctype="multipart/form-data">
    Selecteer uw foto:
    <input type="file" name="file">
    <input type="submit" name= "submit" value="Upload">
</form>                           

         
 <!--  De HTML voor het maken van de foto  -->

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
    </div>


    <!--  De javascript voor het maken van de foto  -->
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
              
</body>
</html>