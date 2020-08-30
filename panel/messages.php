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

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title> XaydenPanel | Dashboard </title>
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
                <a class="messages-new" href="./new-message.php">
                    <img class="message-new-add" src="../Images/Icons/plus.png">
                    <p class="news-box-messages-application-text6">Start new conversation...</p>
                </a>

                <?php

                $query2 = "SELECT DISTINCT messagefrom, messageto, IF(messagefrom != '".$_SESSION['username']."', 'YES', 'NO') FROM chat WHERE messageto = '".$_SESSION['username']."' OR messagefrom = '".$_SESSION['username']."';";
                $result2 = mysqli_query($conn, $query2);


                // ARRAY COLUMN MESSAGEFROM
                $query3 = "SELECT DISTINCT messageto FROM chat WHERE messagefrom = '".$_SESSION['username']."'";
                $result3 = mysqli_query($conn, $query3);
                $array = array();
                $i = 0;
                while ($row3 = mysqli_fetch_array($result3))
                {
                    $array[] = $row3['messageto'];
                }





                while ($row2 = mysqli_fetch_array($result2))
                {
                    // SELECTS LATEST DATE AND MESSAGE
                    $query5 = "SELECT max(registerdate) as registerdate FROM chat WHERE messageto = '".$row2['messageto']."' AND messagefrom = '".$row2['messagefrom']."' ;";
                    $result5 = mysqli_query($conn, $query5);
                    $row5 = mysqli_fetch_array($result5);
                    $query6 = "SELECT message FROM chat WHERE registerdate = '".$row5['registerdate']."'";
                    $result6 = mysqli_query($conn, $query6);
                    $row6 = mysqli_fetch_array($result6);






                    if ($row2["IF(messagefrom != '".$_SESSION['username']."', 'YES', 'NO')"] == 'NO')
                    {

                        // SELECTS RANK FROM THE ONE YOU CHAT WITH
                        $query4 = "SELECT rank FROM users WHERE username='".$row2['messageto']."';";
                        $result4 = mysqli_query($conn, $query4);
                        $row4 = mysqli_fetch_array($result4);


                        echo '<a class="messages" href="./messages-controle.php?messageto='.$row2['messageto'].' &messagefrom='.$row2['messagefrom'].'">
                                    <img class="messages-profile-icon" src="../Images/skulls/'.$row2['messageto'].'.png">
                                    <div class="messages-textblock">
                                        <p class="messages-text-title" id="inline">'.$row2['messageto'].'</p>
                                        <p class="rank" id="'.$row4['rank'].'">['.$row4['rank'].']</p>
                                        <p class="messages-text-message">'.$row6['message'].'</p>
                                    </div>
                                </a>';
                    }






                    elseif ($row2["IF(messagefrom != '".$_SESSION['username']."', 'YES', 'NO')"] == 'YES')
                    {
                        if (in_array($row2['messagefrom'], $array))
                        {
                            // NOTHING HAPPENS
                        }
                        else
                        {

                            // SELECTS RANK FROM THE ONE YOU CHAT WITH
                            $query4 = "SELECT rank FROM users WHERE username='".$row2['messagefrom']."';";
                            $result4 = mysqli_query($conn, $query4);
                            $row4 = mysqli_fetch_array($result4);


                            echo '<a class="messages" href="./messages-controle.php?messageto='.$row2['messageto'].' &messagefrom='.$row2['messagefrom'].'">
                                    <img class="messages-profile-icon" src="../Images/skulls/'.$row2['messagefrom'].'.png">
                                    <div class="messages-textblock">
                                        <p class="messages-text-title" id="inline">'.$row2['messagefrom'].'</p>
                                        <p class="rank" id="'.$row4['rank'].'">['.$row4['rank'].']</p>
                                        <p class="messages-text-message">'.$row6['message'].'</p>
                                    </div>
                                </a>';
                        }
                    }





                }

                ?>


            </div>
        </div>
    </section>

    <?php echo menu2(); ?>

    </body>
    </html>
    <?php
}

else {
    header('refresh:0; url=login.php');
}
?>