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

    $username = $_SESSION['username'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');
    $date2 = date('d-m-Y');

    $query = "INSERT INTO forum(username, message, registerdate, messagedate)
              VALUES ('".$username."', '".$message."', '".$date."', '".$date2."');";

    $result = mysqli_query($conn, $query);

    header('refresh:0; url=dashboard.php');
}

else {
    header('refresh:0; url=dashboard.php');
}

?>