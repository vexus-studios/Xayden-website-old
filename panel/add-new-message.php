<?php
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	header("location: login.php");
  }
  if(isset($_SESSION['success'])) {
    include('../db/db.php');
    include("./functions.php");
    $conn = database();


    $messagefrom = $_SESSION['username'];
    $messageto = $_POST['name'];
    $messagedate = date('d-m-Y');
    $registerdate2 = date('h:i');
    $message = $_POST['message'];

    if ($messageto != "x") {
        header('refresh:10; url=messages.php');
        $query = "INSERT INTO chat(messagefrom, messageto, registerdate2, messagedate, message)
              VALUES ('".$messagefrom."', '".$messageto."', '".$registerdate2."', '".$messagedate."', '".$message."');";

        $result = mysqli_query($conn, $query);
        header('refresh:0; url=messages.php');
    }
    else {
        header('refresh:0; url=messages.php');
    }
}

else {
    header('refresh:0; url=messages.php');
}

?>