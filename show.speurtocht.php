<?php
include 'dbcon.php';

$sql = "SELECT * FROM speurtochten ORDER BY id desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {?>

        <a href="edit.speurtocht.php?id=<?php echo $row['id'];?>">
        <div class="w-4/4 rounded-md  bg-slate-500 text-white  max-h-80 h-48 p-5 m-5 flex justify-center items-center">

            <div class="flex max-h-full items-center">
                <div class="w-5/5 m-auto">
                    <div class="text-center flex items-center text-2xl ">
                        <?php echo $row["naam"];?>
                    </div>
                </div>
            </div>

        </div>
        </a>
        <?php
    }

} else {
    ?>
    <div class="bg-red-400 w-3/4 m-auto p-2 rounded-md mb-5">
        <div class="text-center text-white text-2xl"><?php echo "Er zijn geen groepen";?></div>
    </div>
    <?php
}
$conn->close();
?>