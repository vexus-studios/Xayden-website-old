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
  if($_GET['ID'] && isset($_SESSION['success'])) {
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
                    case 'Admin':
                    case 'Bypass':
                    case 'Support':

                        $ID = $_GET['ID'];
                        $query1 = "SELECT * FROM mcmarket WHERE ID = '" . $ID . "'";
                        $result1 = mysqli_query($conn, $query1);
                        $row1 = mysqli_fetch_array($result1);
                        ?>
                        <a class="news-box-messages-application">
                            <p class="news-box-messages-application-text"><b>Requested by: </b>
                                <i><?php echo $row1['username'] ?></i></p>
                        </a>
                        <a class="news-box-messages-application">
                            <p class="news-box-messages-application-text"><b>Title: </b>
                                <i><?php echo $row1['title'] ?></i></p>
                        </a>
                        <a class="news-box-messages-application">
                            <p class="news-box-messages-application-text"><b>Description: </b>
                                <i><?php echo $row1['description'] ?></i></p>
                        </a>
                        <a class="news-box-messages-application">
                            <p class="news-box-messages-application-text"><b>Link to pictures: </b>
                                <i><?php echo $row1['link'] ?></i></p>
                        </a>
                        <?php
                        if ($row1['status'] == "") {
                            echo '
                                    <a href="#" class="news-box-messages-application-status">Accept request</a>
                                    <a href="#" class="news-box-messages-application-status">Deny request</a>
                                    The buttons are currently out of use';
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
    header('refresh:0; url=applications.php');
}
?>