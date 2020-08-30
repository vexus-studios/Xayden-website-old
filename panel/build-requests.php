<?php
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  if(isset($_SESSION['success'])) {
    include('../db/db.php');
    include("./functions.php");
    $conn = database();
?>
<?php include_once("../config/config.php") ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Build request | Xayden - Minecraft Buildteam</title>
        <link rel="stylesheet" href="main.css" media="screen"/>
        <link rel="shortcut icon" href="../Xayden/xayden_logo_1_250x250.jpg"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
    </head>

    <body>


    <!-- POPUP -->
<script>
    window.setTimeout(function() {
        document.getElementById('popup').style.height = '200px';
    }, 800);
</script>
    <?php

    if (isset($_SESSION['buildrequestReport1'])) {

        echo '<div class="build-request-popup" id="popup">
                <div class="popup-bar">
                    <p class="popup-title">Pop-up</p>
                    <a class="popup-close" onclick="javascript:document.getElementById(\'popup\').style.height = \'0px\';">X</a>
                </div>
                <p class="popup-text" style="color: #00cd00">'.$_SESSION['buildrequestReport1'].'</p>
            </div>';

        unset($_SESSION['buildrequestReport1']);
    }

    elseif (isset($_SESSION['buildrequestReport2'])) {

        echo '<div class="build-request-popup" id="popup">
                <div class="popup-bar">
                    <p class="popup-title">Pop-up</p>
                    <a class="popup-close" onclick="javascript:document.getElementById(\'popup\').style.height = \'0px\';">X</a>
                </div>
                <p class="popup-text" style="color: #f60000">'.$_SESSION['buildrequestReport2'].'</p>
            </div>';

        unset($_SESSION['buildrequestReport2']);
    }




    echo menu1($_SESSION['username'], $_SESSION['rank']); ?>









    <section class="news">
        <div class="news-box">
            <article class="news-box-header">
                <h1 class="news-box-header-text">Build requests</h1>
            </article>
            <div class="news-box-messages">

                <?php
                switch ($_SESSION['rank']) {

                    case 'CEO':
                    case 'Bypass':
                    case 'Web-developer':
                    case 'Owner':
                    case 'Partner':


                        if ($_SESSION['rank'] == "Partner" || "Web-developer") {
                            echo '<a class="messages-new" href="./new-build-request.php">
                                    <img class="message-new-add" src="../Images/Icons/plus.png">
                                    <p class="news-box-messages-application-text6">Request a new build...</p>
                                </a>';
                        }


                        if ($_SESSION['rank'] == "Partner") {
                            $query1 = "SELECT * FROM buildrequests WHERE username = '".$_SESSION['username']."' ORDER BY registerdate DESC";
                        }
                        else {
                            $query1 = "SELECT * FROM buildrequests ORDER BY registerdate DESC";
                        }
                        $result1 = mysqli_query($conn, $query1);

                        if (mysqli_num_rows($result1) == 0)
                        {
                            echo "<i>There are no requests yet . . .</i>";
                        }
                        else {
                            while ($row1 = mysqli_fetch_array($result1)) {
                                echo '<a class="messages" href="./build-requests-view.php?ID='.$row1['ID'].'">
                                      <img class="messages-profile-icon" src="../Images/skulls/'.$_SESSION['username'].'.png">
                                      <div class="messages-textblock">
                                          <p class="messages-text-title" id="inline">'.$row1['buildtype'].'</p>
                                          <p class="rank" id="\'.$row4[\'rank\'].\'">'.$row1['buildsize'].'</p>
                                          <p class="messages-text-message">Status: '.$row1['status'].'</p>
                                      </div>
                                  </a>';
                            }
                        }

                break;

                    default:
                        echo "<i>This intel isn't available with your rank. . .</i>";
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