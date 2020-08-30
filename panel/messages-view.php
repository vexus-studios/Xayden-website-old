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
  }

if(($_SESSION['messageto'] && $_SESSION['messagefrom']) OR (isset($_SESSION['login']) && isset($_POST['sendmessage'])))  {?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title> XaydenPanel | Applications </title>
        <link rel="stylesheet" href="main.css" media="screen"/>
        <link rel="shortcut icon" href="../Xayden/xayden_logo_1_250x250.jpg"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
    </head>

    <body>

    <?php echo menu1($_SESSION['username'], $_SESSION['rank']); ?>

    <section class="news">
        <div class="news-box">
            <article class="news-box-header">
                <h1 class="news-box-header-text">Messages</h1>
            </article>
            <div class="news-box-messages">

                <?php

                if (isset($_POST['message'])) {
                    $messagefrom2 = $_SESSION['username'];
                    $messageto2 = $_POST['messageto2'];
                    $messagedate = date('d-m-Y');
                    $registerdate2 = date('h:i');
                    $message = $_POST['message'];

                    if ($messageto2 != "x") {
                        $query = "INSERT INTO chat(messagefrom, messageto, registerdate2, messagedate, message)
                                  VALUES ('".$messagefrom2."', '".$messageto2."', '".$registerdate2."', '".$messagedate."', '".$message."');";

                        $result = mysqli_query($conn, $query);
                    }
                }





                if ($_SESSION['messagefrom'] == $_SESSION['username'])
                {
                    $_SESSION['messagesendto'] = $_SESSION['messageto'];

                    echo '
                    <div class="message-user">
                        <img class="messages-profile-icon" src="../Images/skulls/'.$_SESSION['messageto'].'.png">
                        <p class="message-user-name">'.$_SESSION['messageto'].'</p>
                    </div>';

                    $query1 = "SELECT messagefrom, messageto, registerdate, registerdate2, messagedate, message, ID FROM chat WHERE (messageto='".$_SESSION['messageto']."' OR messageto='".$_SESSION['messagefrom']."') AND (messagefrom='".$_SESSION['messagefrom']."' OR messagefrom='".$_SESSION['messageto']."') ORDER BY registerdate DESC;";
                    $result1 = mysqli_query($conn, $query1);

                    echo '<div class="messages-container">';
                    while ($row1 = mysqli_fetch_array($result1))
                    {
                        if ($row1['messagefrom'] == $_SESSION['username']) {
                            echo '<div class="messages-box2">'.$row1['message'].'<div class="message-box-time">'.$row1['registerdate2'].'</div></div>';
                        }
                        else {
                            echo '<div class="messages-box1">'.$row1['message'].' <div class="message-box-time">'.$row1['registerdate2'].'</div></div>';
                        }
                    }
                    echo '</div>';
                }



                else
                {
                    $_SESSION['messagesendto'] = $_SESSION['messagefrom'];

                    echo '
                    <div class="message-user">
                        <img class="messages-profile-icon" src="../Images/skulls/'.$_SESSION['messagefrom'].'.png">
                        <p class="message-user-name">'.$_SESSION['messagefrom'].'</p>
                    </div>';

                    $query1 = "SELECT messagefrom, messageto, registerdate, registerdate2, messagedate, message, ID FROM chat WHERE (messageto='".$_SESSION['messageto']."' OR messageto='".$_SESSION['messagefrom']."') AND (messagefrom='".$_SESSION['messagefrom']."' OR messagefrom='".$_SESSION['messageto']."') ORDER BY registerdate DESC;";
                    $result1 = mysqli_query($conn, $query1);

                    echo '<div class="messages-container">';
                    while ($row1 = mysqli_fetch_array($result1))
                    {
                        if ($row1['messagefrom'] == $_SESSION['username']) {
                            echo '<div class="messages-box2">'.$row1['message'].'<div class="message-box-time">'.$row1['registerdate2'].'</div></div>';
                        }
                        else {
                            echo '<div class="messages-box1">'.$row1['message'].'<div class="message-box-time">'.$row1['registerdate2'].'</div></div>';
                        }
                    }
                    echo '</div>';
                }

                ?>

                <form class="message-user2" method="POST" action="./messages-view.php">
                    <input name="messageto2" type="hidden" value="<?php echo $_SESSION['messagesendto']; ?>">
                    <input class="message-send" autofocus="autofocus" name="message" type="text" placeholder="Type your message..." required>
                    <button class="message-send-icon" name="sendmessage" type="submit">
                        <img src="../Images/Icons/send.png">
                    </button>
                </form>
            </div>
        </div>
    </section>

    <?php echo menu2(); ?>

    </body>
    </html>

    <?php
}

else {
    header('refresh:0; url=messages.php');
}
?>