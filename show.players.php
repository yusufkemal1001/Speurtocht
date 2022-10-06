<?php
include 'dbcon.php';


//require 'db.php';




$sql = "SELECT * FROM teams where speurtocht_id= '$_GET[id]' and active = 1 ";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {?>

            <?php
            $sqlAnswersCount = mysqli_query($conn,"SELECT * FROM antwoorden WHERE team_id = '$row[uuid]';");
            $countAnswers = mysqli_num_rows($sqlAnswersCount);

            $sqlCorrectAnswersCount = mysqli_query($conn,"SELECT * FROM antwoorden WHERE team_id = '$row[uuid]' and behaald=1;");
            $countCorrectAnswers = mysqli_num_rows($sqlCorrectAnswersCount);

            $sqlWrongAnswersCount = mysqli_query($conn,"SELECT * FROM antwoorden WHERE team_id = '$row[uuid]' and behaald=2;");
            $countWrongAnswers = mysqli_num_rows($sqlWrongAnswersCount);
            ?>
            <div class="w-4/4 rounded-md  bg-slate-500 text-white   p-5 m-5 ">

                <div class=" max-h-full ">
                    <div class="w-5/5 ">
                        <div class="text-center text-2xl flex justify-between ">
                            <div class="">
                            <?php echo $row["naam"];?>
                            </div>
                            <div class="flex w-2/4 items-center" style="justify-content: inherit; font-size: 20px;">
                                <div class="mr-2 ml-2">
                                <i class="fa-solid fa-check mr-2 bg-lime-500" style="color: rgb(132 204 22);"></i><?php echo $countCorrectAnswers;?>
                                </div>
                                <div class="mr-2 ml-2">
                                <i class="fa-solid fa-xmark bg-rose-500 mr-2"style="color: rgb(244 63 94);"></i><?php echo $countWrongAnswers;?>
                                </div>
                                <div>
                                    <?php echo $countAnswers;?> /
                                    <?php include 'count.questions.php';
                                    ?>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div style="font-size: 12px; float: right; font-weight: bold;">
                    <?php if ($countAnswers==$count){
                        echo "Alle vragen zijn bantwoord!";
                    }?>
                </div>
            </div>

        <?php
    }

} else {
    ?>
    <div class="bg-red-400 w-100vh m-auto p-2 rounded-md mb-5" style="display: block;
    left: 50%;
    width: 100%;
    position: relative;">
        <div class="text-center text-white text-2xl"><?php echo "Er zijn geen spelers op dit moment";?></div>
    </div>
    <?php
}
$conn->close();
?>