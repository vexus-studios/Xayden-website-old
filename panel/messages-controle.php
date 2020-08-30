<?php

if(isset($_GET['messageto']) && isset($_GET['messagefrom'])) {
session_start();

    $_SESSION['messageto'] = $_GET['messageto'];
    $_SESSION['messagefrom'] = $_GET['messagefrom'];

    if (isset($_SESSION['messageto']) && isset($_SESSION['messagefrom'])) {
        header('refresh:0; url=messages-view.php');
    }
    else {
        header('refresh:0; url=messages.php');
    }
}
else {
    header('refresh:0; url=messages.php');
}

?>