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
		<meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specializes in creating impressive Minecraft builds for all clients, and server owners.">
		<meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds">
		<meta name="author" content="TheChasoCode">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<title>Settings | Xayden - Minecraft Buildteam </title>
        <link rel="stylesheet" href="main.css" media="screen"/>
        <link rel="icon" type="image/x-icon" href="/Images/favicon.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
    </head>

    <body>
    <script>
        window.setTimeout(function () {
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
                <p class="popup-text" style="color: #00cd00">' . $_SESSION['buildrequestReport1'] . '</p>
            </div>';

    unset($_SESSION['buildrequestReport1']);
} elseif (isset($_SESSION['buildrequestReport2'])) {

    echo '<div class="build-request-popup" id="popup">
                <div class="popup-bar">
                    <p class="popup-title">Pop-up</p>
                    <a class="popup-close" onclick="javascript:document.getElementById(\'popup\').style.height = \'0px\';">X</a>
                </div>
                <p class="popup-text" style="color: #f60000">' . $_SESSION['buildrequestReport2'] . '</p>
            </div>';

    unset($_SESSION['buildrequestReport2']);
}


echo menu1($_SESSION['username'], $_SESSION['rank']); ?>


    <section class="news">
    <div class="news-box">
    <article class="news-box-header">
        <h1 class="news-box-header-text">Settings</h1>
    </article>
    <div class="news-box-messages">
    <div class="news-box-messages-application2">
        <?php
        if (isset($_SESSION['report1'])) {
            echo '<p class="news-box-messages-report1">' . $_SESSION['report1'] . '</p>';
            unset($_SESSION['report1']);
        } elseif (isset($_SESSION['report2'])) {
            echo '<p class="news-box-messages-report2">' . $_SESSION['report2'] . '</p>';
            unset($_SESSION['report2']);
        }
        ?>
        <form method="POST" action="./change-password.php">

            <p class="news-box-messages-application-builder-title">Change password</p>
            <p class="news-box-messages-application-builder-text3">Old password:</p>
            <input type="password" class="news-box-messages-mcmarket-request-input" name="oldpassword"
                   placeholder="Old password" maxlength="50" required>

            <p class="news-box-messages-application-builder-text3">New password:</p>
            <input type="password" name="newpassword" class="news-box-messages-mcmarket-request-input"
                   placeholder="New password" maxlength="50" required>

            <p class="news-box-messages-application-builder-text3">Confirm new password:</p>
            <input type="password" name="confirmpassword" class="news-box-messages-mcmarket-request-input"
                   placeholder="Confirm password" maxlength="50" required>

            <input type="submit" name="submit" class="news-box-messages-mcmarket-request-submit" value="Confirm">
        </form>
    </div>

                    <?php

                    switch ($_SESSION['rank']) {
                        case 'Director':
                        case 'Manager':
                        case 'SalesManager':
                        case 'Admin':
                        case 'Bypass':
                    echo '<div class="news-box-messages-application2">
                            <form method="POST" action="./partner-new.php" enctype="multipart/form-data">
                    
                                <p class="news-box-messages-application-builder-title">Add partner</p>
                                <p class="news-box-messages-application-builder-text3">Name:</p>
                                <input type="text" class="news-box-messages-mcmarket-request-input" name="name" placeholder="Name..."
                                       maxlength="50" required>
                    
                                <p class="news-box-messages-application-builder-text3">Description:</p>
                                <textarea class="news-box-messages-mcmarket-request-textarea" name="description"
                                          placeholder="Description..." maxlength="500" required></textarea>
                    
                                <p class="news-box-messages-application-builder-text3">Ip adres:</p>
                                <input type="text" name="ip" class="news-box-messages-mcmarket-request-input"
                                       placeholder="Server IP-adres..." maxlength="50" required>
                    
                                <p class="news-box-messages-application-builder-text3">Logo:</p>
                                <input type="file" name="file" class="news-box-messages-mcmarket-request-file" required>
                    
                                <input type="submit" name="submit" class="news-box-messages-mcmarket-request-submit" value="Confirm">
                            </form>
                        </div>';

                        echo '<div class="news-box-messages-application2">
                        <form method="POST" action="./youtuber-new.php" enctype="multipart/form-data">
                
                            <p class="news-box-messages-application-builder-title">Add youtuber</p>
                            <p class="news-box-messages-application-builder-text3">Name:</p>
                            <input type="text" class="news-box-messages-mcmarket-request-input" name="name" placeholder="Name..."
                                   maxlength="50" required>
                
                            <p class="news-box-messages-application-builder-text3">Link:</p>
                            <input type="text" name="link" class="news-box-messages-mcmarket-request-input"
                                   placeholder="channel link..." maxlength="50" required>
                
                            <p class="news-box-messages-application-builder-text3">Logo:</p>
                            <input type="file" name="file" class="news-box-messages-mcmarket-request-file" required>
                
                            <input type="submit" name="submit2" class="news-box-messages-mcmarket-request-submit" value="Confirm">
                        </form>
                    </div>';
                        break;

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