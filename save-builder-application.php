<?php

session_start();
include('./db/db.php');
$conn = database();

if (isset($_POST['submit'])) {

    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $discord = $_POST['discord'];
    $telegram = $_POST['telegram'];
    $emailadres = $_POST['emailadres'];
    $timezone = $_POST['timezone'];
    $age = $_POST['age'];
    $textarea = $_POST['message'];
    $portfolio = $_POST['portfolio'];
    $registerdate = date('Y-m-d H:i:s');
    $applydate = date('Y-m-d');

    $query = "INSERT INTO applications(realname, username, discord, telegram, 
              emailadres, timezone, age, textarea, portfolio, registerdate, applydate)
              VALUES ('".$realname."', '".$username."', '".$discord."', '".$telegram."', '".$emailadres."', 
              '".$timezone."', '".$age."', '".$textarea."', '".$portfolio."', '".$registerdate."', '".$applydate."');";

    $result = mysqli_query($conn, $query);

    header('refresh:0; url=application.php');
}

else {
    header('refresh:0; url=application.php');
}

?>