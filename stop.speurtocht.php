<?php
include "delete.all.teams.php";
include "delete.all.questions.php";
session_start();


unset($_SESSION['active_speurtocht_id']);

header("location:dashboard.php");

?>