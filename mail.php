<?php
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
    ini_set('display_errors', 1);
    require "classes/PHPMailer-master/src/PHPMailer.php";

    //Receiver Info
     $email = "232710@edu.rocfriesepoort.nl";
     $name = "Gebruiker";

    //Sender Info
     $sender_name = "p11k3t2@lesonline.nu"; //naam van de 
     $sender_email = "p11k3t2@lesonline.nu";
     $sender_password = "if3xNdl658";

     $mail_subject = "Deelnemen aan de speurtocht";
     $message = '<html>

     <p><strong>Uw uitnodiging voor de Speurtocht!</strong></p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p><strong>Link : https://www.youtube.com/watch?v=dQw4w9WgXcQ</strong></p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>Veel plezier en we hopen dat u een goeie tijd heeft!</p>
     <p>&nbsp;</p>
     <p>Scrumgroep 2</p>
     </html>'; 

     $mail = new PHPMailer();
     $mail->IsSMTP();
      $mail->Host = "mail.antagonist.nl";
     $mail->Port = 465;
     $mail->SMTPAuth = true;
     $mail->SMTPDebug = 1;
     $mail->SMTPSecure = "ssl";
     $mail->Username = $sender_email;
     $mail->Password = $sender_password;
     $mail->AddReplyTo($sender_email, $sender_name);
     $mail->SetFrom($sender_email,$sender_name);
     $mail->Subject = $mail_subject;
     $mail->AddAddress($email, $name);
     $mail->MsgHTML($message);
     $send = $mail->Send();
?>