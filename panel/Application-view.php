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
<?php include_once("../config/config.php") ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8"/>
			<meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specialize in creating impressive unique Minecraft builds for all clients, and server owners.">
			<meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds">
			<meta name="author" content="TheChasoCode">
			<meta name="viewport" content="width=device-width, initial-scale=1">		
			<title>Applications | Xayden - Minecraft Buildteam</title>
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
                    <h1 class="news-box-header-text">Applications</h1>
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
                                $query1 = "SELECT * FROM applications WHERE ID = '" . $ID . "'";
                                $result1 = mysqli_query($conn, $query1);
                                $row1 = mysqli_fetch_array($result1);
                                ?>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Real name:</b>
                                        <i><?php echo $row1['realname'] ?></i></p>
                                </a>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Username:</b>
                                        <i><?php echo $row1['username'] ?></i></p>
                                </a>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Discord:</b>
                                        <i><?php echo $row1['discord'] ?></i></p>
                                </a>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Telegram:</b>
                                        <i><?php echo $row1['telegram'] ?></i></p>
                                </a>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Emailadres:</b>
                                        <i><?php echo $row1['emailadres'] ?></i></p>
                                </a>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Timezone:</b>
                                        <i><?php echo $row1['timezone'] ?></i></p>
                                </a>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Age:</b> <i><?php echo $row1['age'] ?></i>
                                    </p>
                                </a>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Reason of acception:</b>
                                        <i><?php echo $row1['textarea'] ?></i></p>
                                </a>
                                <a class="news-box-messages-application">
                                    <p class="news-box-messages-application-text"><b>Portfolio:</b>
                                        <i><?php echo $row1['portfolio'] ?></i></p>
                                </a>
                                <?php
                                if ($row1['status'] == "") {
                                    echo '
                                    <a href="#" class="news-box-messages-application-status">Accept application</a>
                                    <a href="#" class="news-box-messages-application-status">Deny application</a>
                                    The buttons are currently out of use';
                                }

                            break;

                        default:
                            echo "<i>This information is for Manager and * ranked only!</i>";
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