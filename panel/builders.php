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
			<meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specialize in creating impressive unique Minecraft builds for all clients, and server owners.">
			<meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds">
			<meta name="author" content="TheChasoCode">
			<meta name="viewport" content="width=device-width, initial-scale=1">		
			<title>Information | Xayden - Minecraft Buildteam</title>
            <link rel="stylesheet" href="main.css" media="screen"/>
            <link rel="shortcut icon" href="../Xayden/xayden_logo_1_250x250.jpg"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
            <script type="text/javascript" src="../js/main.js"></script>
        </head>

        <body>

        <?php echo menu1($_SESSION['username'], $_SESSION['rank']); ?>


        <section class="news">
            <div class="news-box">
                <article class="news-box-header">
                    <h1 class="news-box-header-text">Builder information</h1>
                </article>
                <div class="news-box-messages">
                    <div class="news-box-messages-application">
                        <p class="news-box-messages-application-builder-title">Buildserver IP:</p>
                        <p class="news-box-messages-application-builder-text">Build.Xayden.Net</p>
                        <p class="news-box-messages-application-builder-title">Public Discord:</p>
                        <p class="news-box-messages-application-builder-text">Https://Discord.Xayden.Net</p>
                        <p class="news-box-messages-application-builder-title"> < Rules > </p>
                        <ol class="news-box-messages-application-builder-list">
                            <li>Official Xayden Build Team members must get permission from Build Team Officers to do
                                specific highlighted commissions from the Trello boards. Constant ignorance and lack of
                                permission will result in a termination from the Xayden Build Team, Xayden Staff Team,
                                and result in a blacklist from Xayden and all Xayden affiliated networks.
                            </li>
                            <li>The Official Xayden Build Team Trello is to stay confidential at all times. The Official
                                Xayden Build Team Trello, if leaked, will result in a termination of the culprit from
                                the Xayden Build Team, Xayden Staff Team, and result in a blacklist from Xayden and all
                                Xayden affiliated networks.
                            </li>
                            <li>Respect towards higher members of Build Team / Staff Members is required; respect the
                                ones that have gone through your role. Constant disrespect to superiors will result in a
                                termination the Xayden Build Team, Xayden Staff Team, and result in a blacklist from
                                Xayden and all Xayden affiliated networks.
                            </li>
                            <li>Never recycle builds or plagiarize builds from fellow or non-affiliated builders, even
                                with permission. At Xayden we represent quality and creative, we do not constitute
                                repetitive or fraudulent builds. Plagiarism or constant recycling of builds will result
                                in a termination of the culprit from the Xayden Build Team, Xayden Staff Team, and
                                result in a blacklist from Xayden and all Xayden affiliated networks.
                            </li>
                            <li>Never others builds or commissioned builds to other 3rd parties for higher income.
                                Release of commissioned builds will result in a termination of the culprit from the
                                Xayden Build Team, Xayden Staff Team, and result in a blacklist from Xayden and all
                                Xayden affiliated networks.
                            </li>
                            <li>Any form of intoxication on the job will result in a warning. Intoxication can be
                                associated with consumption of alcohol, marijuana, under-the-counter drugs, etc. (If
                                drug is for medicinal purposes you will be put on Medical Leave.)
                            </li>
                            <li>Racism or provocative language is unacceptable on Xayden. Depending on the leave of
                                disrespect, the warnings could be bypassed to immediate termination.
                            </li>
                            <li>Disrespect to players / members of the Xayden or any partnered or affiliated networks is
                                intolerable.
                            </li>
                            <li>Social Media uncivil or ill - mannered comments, posts, or videos could result in a
                                bypass of warnings and to immediate termination due to the degree of disrespect ( Falls
                                under racism and provocative category)
                            </li>
                        </ol>
                        <p class="news-box-messages-application-builder-title">Warning system</p>
                        <ul class="news-box-messages-application-builder-list2">
                            <li>First Offense: Warning I: Verbal Warning</li>
                            <li>Second Offense: Warning II: Written Warning (Draft for Written Warning linked in Table
                                of Contents)
                            </li>
                            <li>Final Offense: Warning III: Termination</li>
                        </ul>
                        <p class="news-box-messages-application-builder-title">Other information</p>
                        <p class="news-box-messages-application-builder-text">Build quality is priority<br>
                            Do not free load<br>
                            Respect teammates and their respective ranks<br>
                            Always keep the rule book in mind.<br>
                            We hope you enjoy your time at Xayden!</p>
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