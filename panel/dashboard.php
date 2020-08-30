<?php include_once("../config/config.php") ?>
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
<?php include_once("../config/config.php") ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8"/>
			<meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specialize in creating impressive unique Minecraft builds for all clients, and server owners.">
			<meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds">
			<meta name="author" content="TheChasoCode">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Dashboard | Xayden - Minecraft Buildteam</title>
            <link rel="stylesheet" href="main.css" media="screen"/>
            <link rel="icon" type="image/x-icon" href="/Images/favicon.ico" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
            <script type="text/javascript" src="/js/main.js"></script>
        </head>

        <body>

        <?php echo menu1($_SESSION['username'], $_SESSION['rank']); ?>

        <section class="news">
            <div class="news-box">
                <article class="news-box-header">
                    <h1 class="news-box-header-text">Dashboard</h1>
                </article>
                <div class="news-box-messages">

                    <?php

                    switch ($_SESSION['rank']) {

                        case 'Director':
                        case 'Manager':
                        case 'SalesManager':
                        case 'Admin':
                        case 'Bypass':
                        case 'Support':

                            echo "
                            <form action='./add-forum-message.php' method='POST'>
                              <textarea class='forum-message' name='message' placeholder='Write a new message to everyone (max 500 words)' maxlength='500' required></textarea>
                              <button class='forum-message-button' type='submit' name='submit'>Add message</button>
                            </form>";
                            break;
                    }

                    $query2 = "SELECT * FROM forum ORDER BY registerdate DESC";
                    $result2 = mysqli_query($conn, $query2);

                    if (mysqli_num_rows($result2) == 0) {
                        echo "<i>There are no messages yet . . .</i>";
                    }
                    else {
                        while ($row2 = mysqli_fetch_array($result2)) {

                            $query3 = "SELECT rank FROM users WHERE username='".$row2['username']."'";
                            $result3 = mysqli_query($conn, $query3);
                            $row3 = mysqli_fetch_array($result3);

                            $filepath = "../Images/skulls/".$row2['username'].".png";
                            echo '
                    <article class="news-box-message">
                        <div class="news-box-message-bar" id="upper-bar">
                            <div class="new-box-message-bar-icon">
                                <img src="'.$filepath.'" class="profile-picture">
                            </div>
                            <div class="new-box-message-bar-username">
                            <span class="new-box-message-bar-username-text">' . $row2['username'] . '<p class="rank" id="'.$row3['rank'].'">['.$row3['rank'].']</p></span>
                            </div>
                        </div>
                        <div class="news-box-message-bar">
                            <p class="news-box-message-bar-content">' . $row2['message'] . '</p>
                        </div>
                        <div class="news-box-message-bar" id="lower-bar">
                            <p class="news-box-message-bar-date">' . $row2['messagedate'] . '</p>
                        </div>
                    </article>
                    ';
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