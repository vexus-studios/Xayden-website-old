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
                <h1 class="news-box-header-text">McMarket requests</h1>
            </article>
            <div class="news-box-messages">
                <?php

                switch ($_SESSION['rank'])
                {

                    case 'Director':
                    case 'Manager':
                    case 'SalesManager':





                            $query1 = "SELECT * FROM mcmarket ORDER BY registerdate DESC";
                            $result1 = mysqli_query($conn, $query1);

                            echo '
                                    <div class="news-box-messages-application">
                                            <p class="news-box-messages-application-builder-title">Requests from Xayden members: </p>
                                            </div>';

                            if (mysqli_num_rows($result1) == 0)
                            {
                                echo "<div class='news-box-messages-application'><i class='news-box-messages-application-builder-text2'>There are no Requests yet . . .</i></div>";
                            }

                            else
                            {
                                while ($row1 = mysqli_fetch_array($result1))
                                {
                                    echo '
                                            <a class="news-box-messages-application" href="./mcmarket-request-view.php?ID=' . $row1['ID'] . '">
                                                <p class="news-box-messages-application-text">' . $row1['username'] . '</p>
                                                ';

                                    if ($row1['status'] == "accepted") {
                                        echo '<p class="news-box-messages-application-text4">Accepted</p>';
                                    }
                                    elseif ($row1['status'] == "denied") {
                                        echo '<p class="news-box-messages-application-text3">Denied</p>';
                                    }
                                    else {
                                        echo '<p class="news-box-messages-application-text">Undecided</p>';
                                    }

                                    echo '
                                                <p class="news-box-messages-application-text2">' . $row1['requestdate'] . '</p>
                                            </a>';
                                }
                            }

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
                            echo '
                                    <form method="POST" action="./add-mcmarket-request.php">
                                        <p class="news-box-messages-application-builder-title">Title</p>
                                        <p class="news-box-messages-application-builder-text">The title should describe the build (HCF spawn, Skywars lobby, Hub...)</p>
                                        <input type="text" name="title" class="news-box-messages-mcmarket-request-input" maxlength="50" placeholder="Title..." required>
                                        <p class="news-box-messages-application-builder-title">Description</p>
                                        <p class="news-box-messages-application-builder-text">The description should include what\'s inside the map and what type map it is (Hub, Practice Lobby, skywars map...)</p>
                                        <textarea class="news-box-messages-mcmarket-request-textarea" name="description" placeholder="Description..." maxlength="500" required></textarea>
                                        <p class="news-box-messages-application-builder-title">Pictures</p>
                                        <p class="news-box-messages-application-builder-text">Please upload your pictures to the internet and put the link below here (Imgur, Gyazo...)</p>
                                        <input type="text" name="link" class="news-box-messages-mcmarket-request-input" maxlength="50" placeholder="Link to pictures..." required>
                                        <input type="submit" name="submit" class="news-box-messages-mcmarket-request-submit" value="Submit">
                                    </form>
                                </div>';

                        break;






                        case 'Admin':
                        case 'Bypass':
                        case 'Support':

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
                            echo '
                                        <form method="POST" action="./add-mcmarket-request.php">
                                            <p class="news-box-messages-application-builder-title">Title</p>
                                            <p class="news-box-messages-application-builder-text">The title should describe the build (HCF spawn, Skywars lobby, Hub...)</p>
                                            <input type="text" name="title" class="news-box-messages-mcmarket-request-input" maxlength="50" placeholder="Title..." required>
                                            <p class="news-box-messages-application-builder-title">Description</p>
                                            <p class="news-box-messages-application-builder-text">The description should include what\'s inside the map and what type map it is (Hub, Practice Lobby, skywars map...)</p>
                                            <textarea class="news-box-messages-mcmarket-request-textarea" name="description" placeholder="Description..." maxlength="500" required></textarea>
                                            <p class="news-box-messages-application-builder-title">Pictures</p>
                                            <p class="news-box-messages-application-builder-text">Please upload your pictures to the internet and put the link below here (Imgur, Gyazo...)</p>
                                            <input type="text" name="link" class="news-box-messages-mcmarket-request-input" maxlength="50" placeholder="Link to pictures..." required>
                                            <input type="submit" name="submit" class="news-box-messages-mcmarket-request-submit" value="Submit">
                                        </form>
                                    </div>';

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