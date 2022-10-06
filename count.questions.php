<?php
include 'dbcon.php';


$sql = mysqli_query($conn,"SELECT * FROM vragen WHERE speurtocht_id = '$_GET[id]';");



$count = mysqli_num_rows($sql);


if ($count > 0) {
    echo $count;
} else {
    echo "Er zijn geen vragen";
}


?>