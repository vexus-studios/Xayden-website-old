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


    $title = $_POST['title'];
    $description = $_POST['description'];
    $username = $_SESSION['username'];
    $link = $_POST['link'];
    $date = date('Y-m-d H:i:s');
    $date2 = date('d-m-Y');

    $query = "INSERT INTO mcmarket(title, description, username, link, registerdate, requestdate)
              VALUES ('".$title."', '".$description."', '".$username."', '".$link."', '".$date."', '".$date2."');";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['report1'] = "Your build was succesfully requested!";
    }
    else {
        $_SESSION['report2'] = "Something went wrong, please try it again.";
    }

    header('refresh:0; url=mcmarket.php');
}

else {
    header('refresh:0; url=mcmarket.php');
}
?>