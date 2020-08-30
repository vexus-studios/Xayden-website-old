<?php
session_start();
include("./db/db.php");
$conn = database();

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $emailadres = $_POST['emailadres'];
    $message = $_POST['message'];
    $title = $_POST['title'];
    $date = date('Y-m-d');
    $registerdate = date('Y-m-d H:i:s');

    $query = "INSERT INTO messages(customername, emailadres, message, questiondate, registerdate, title) 
              VALUES ('".$name."', '".$emailadres."', '".$message."', '".$date."', '".$registerdate."', '".$title."');";
    $result = mysqli_query($conn, $query);

    header("refresh:0; url=contact.php");
}

else {
    header("refresh:0; url=contact.php");
}
?>