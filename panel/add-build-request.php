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
?>
<?php
    if (isset($_POST['submitbuild']) && isset($_SESSION['success'])) {


        if (isset($_POST['type'])) {
            if ($_POST['type'] == "Else") {
                $type = $_POST['else_type'];
            }
            else {
                $type = $_POST['type'];
            }
        }
        else {
            $type = "Unset";
        }
        if (isset($_POST['size'])) {
            if ($_POST['size'] == "Else") {
                $size = $_POST['else_size'];
            }
            else {
                $size = $_POST['size'];
            }
        }
        else {
            $size = "Unset";
        }


        $username = $_SESSION['username'];
        $description = $_POST['description'];
        $style = $_POST['style'];
        $requestdate = date('Y-m-d');
        $status = 'Pending';

        $query1 = "INSERT INTO buildrequests(username, buildtype, description, style, buildsize, requestdate, status)
                                   VALUES ('".$username."', '".$type."', '".$description."', '".$style."', '".$size."', '".$requestdate."', '".$status."')";
        $result1 = mysqli_query($conn, $query1);

        if ($result1) {
            $_SESSION['buildrequestReport1'] = "Your request is succesfully sended. We will contact you soon...";
        }
        else {
            $_SESSION['buildrequestReport2'] = "Something went wrong, please try it again";
        }

        header('refresh:0; url=build-requests.php');
    }
    else {
        header('refresh:0; url=build-requests.php');
    }
  }
?>