<?php
include 'dbcon.php';



function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

//for ($i=0; $i< as $email){
//    $sql = "insert into teams(naam,email,speurtocht_id,uuid)values('$_POST[group]','$email','$_GET[id]','$uuid');";
//}
foreach ($_POST['groups'] as $group) {
    $uuid=guidv4();
    $sql = "insert into teams(naam,email,speurtocht_id,uuid)values('".$group['group']."','".$group['email']."','".$_GET['id']."','$uuid');";
if (mysqli_query($conn,$sql)){

    header("location:speurtocht.php");

}else{
    echo 'Er is een fout opgetreden';
}




}
?>

