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
        <title> XaydenPanel | McMarket </title>
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
                <h1 class="news-box-header-text">Build request</h1>
            </article>
            <div class="news-box-messages">
                <?php

                switch ($_SESSION['rank']) {
                case 'Support':
                case 'Partner':

                echo '
                                    <div class="news-box-messages-application2">';

                if (isset($_SESSION['report1'])) {
                    echo '<p class="news-box-messages-report3">'.$_SESSION['report1'].'</p>';
                    unset($_SESSION['report1']);
                }
                elseif (isset($_SESSION['report2'])) {
                    echo '<p class="news-box-messages-report4">'.$_SESSION['report2'].'</p>';
                    unset($_SESSION['report2']);
                }
                ?>
                <form method="POST" action="./add-build-request.php">
                    <p class="news-box-messages-application-builder-title">Type</p>
                    <p class="news-box-messages-application-builder-text">Tell us the type build you want.</p>
                    <input type="radio" id="radio1"  name="type" value="Hub"> Hub<br/>
                    <input type="radio" id="radio2"  name="type" value="Lobby"> Lobby<br/>
                    <input type="radio" id="radio3"  name="type" value="Spawn"> Spawn<br/>
                    <input type="radio" id="radio4"  name="type" value="Koth"> Koth<br/>
                    <input type="radio" id="radio5"  name="type" value="Minigame-map"> Minigame-map<br/>
                    <input type="radio" id="radio12" name="type" value="Else"> Other, <input type="text" name="else_type" class="radio_else" maxlength="50" placeholder="Type...">

                    <p class="news-box-messages-application-builder-title">Description</p>
                    <p class="news-box-messages-application-builder-text">Please give us a description about the build you want. Think about things it should include(max 500 words)...</p>
                    <textarea class="news-box-messages-mcmarket-request-textarea" name="description" placeholder="Please describe your build..." maxlength="500" required></textarea>

                    <p class="news-box-messages-application-builder-title">BuildStyle</p>
                    <p class="news-box-messages-application-builder-text">Tell us what style you want, leave this field empty if it doesn't matter.</p>
                    <input type="text" name="style" class="news-box-messages-mcmarket-request-input" maxlength="50" placeholder="Please describe the buildstyle..." required>

                    <p class="news-box-messages-application-builder-title">Size</p>
                    <p class="news-box-messages-application-builder-text">Tell us the size you want.</p>
                    <input type="radio" id="radio1"  name="size" value="50 x 50"> 50 x 50<br/>
                    <input type="radio" id="radio2"  name="size" value="75 x 75"> 75 x 75<br/>
                    <input type="radio" id="radio3"  name="size" value="125 x 125"> 125 x 125<br/>
                    <input type="radio" id="radio4"  name="size" value="150 x 150"> 150 x 150<br/>
                    <input type="radio" id="radio5"  name="size" value="175 x 175"> 175 x 175<br/>
                    <input type="radio" id="radio6"  name="size" value="200 x 200"> 200 x 200<br/>
                    <input type="radio" id="radio7"  name="size" value="250 x 250"> 250 x 250<br/>
                    <input type="radio" id="radio8"  name="size" value="300 x 300"> 300 x 300<br/>
                    <input type="radio" id="radio9"  name="size" value="400 x 400"> 400 x 400<br/>
                    <input type="radio" id="radio10" name="size" value="500 x 500"> 500 x 500<br/>
                    <input type="radio" id="radio11" name="size" value="1000 x 1000"> 1000 x 1000<br/>
                    <input type="radio" id="radio12" name="size" value="Else"> Other, <input type="text" name="else_size" class="radio_else" maxlength="50" placeholder="Size...">

                    <input type="submit" name="submitbuild" class="news-box-messages-mcmarket-request-submit" value="Submit">
                </form>
            </div>
            <?php

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