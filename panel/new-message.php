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
                <div class="news-box-messages-application">
                    <form action="./add-new-message.php" method="POST">
                        <p class="news-box-messages-application-builder-title">Contact name: </p>
                        <Select name="name" class="news-box-messages-mcmarket-request-input">
                            <option value="x">Select a name...</option>

                            <?php
                            $query1 = "SELECT username FROM users /*ORDER BY (
                                                                            CASE rank
                                                                            
                                                                            WHEN 'Director' THEN 1
                                                                            WHEN 'Manager' THEN 2
                                                                            WHEN 'SalesManager' THEN 3
                                                                            WHEN 'Admin' THEN 4
                                                                            WHEN 'Builder' THEN 6
                                                                            WHEN 'Trial' THEN 
                                                                            
                                                                            END 
                                                                            
                                                                            ) ASC */
                                       WHERE username != '".$_SESSION['username']."';";
                            $result1 = mysqli_query($conn, $query1);

                            while ($row1 = mysqli_fetch_array($result1)) {
                                echo '<option value="'.$row1['username'].'">'.$row1['username'].'</option>';
                            }
                            ?>

                        </Select>
                        <p class="news-box-messages-application-builder-title">Your message:</p>
                        <textarea class="news-box-messages-mcmarket-request-textarea" name="message" placeholder="Description..." maxlength="500" required></textarea>
                        <input type="submit" name="submit" class="news-box-messages-mcmarket-request-submit" value="Send message">
                    </form>
                </div>
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