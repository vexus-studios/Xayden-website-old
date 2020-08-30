<?php include_once("../config/config.php") ?>
<?php


if (isset($_POST['submit'])) {

    session_start();
    include('../db/db.php');
    $conn = database();

    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $newpassword = md5($newpassword);
    $confirmpassword = md5($confirmpassword);  

    $query1 = "SELECT password from users where username = '".$_SESSION['username']."';";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);

    if ($row1['password'] == $oldpassword) {
        if ($newpassword == $confirmpassword) {
            $query2 = "UPDATE users SET password = '". md5($newpassword)."' WHERE username = '".$_SESSION['username']."';";
            $result2 = mysqli_query($conn, $query2);
            if ($result2) {
                $_SESSION['report1'] = "Password succesfully changed to '" . md5($newpassword)."'.";
                header('refresh:0; url=settings.php');
            }
            else {
                $_SESSION['report2'] = "Something went wrong, please try it again.";
                header('refresh:0; url=settings.php');
            }
        }
        else {
            $_SESSION['report2'] = "Something went wrong, please try it again.";
            header('refresh:0; url=settings.php');
        }
    }
    else {
        $_SESSION['report2'] = "Something went wrong, please try it again.";
        header('refresh:0; url=settings.php');
    }
}

else {
    header('refresh:0; url=settings.php');
}

?>