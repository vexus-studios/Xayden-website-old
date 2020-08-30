<!doctype html>
<html lang="en">
<?php
session_start();
include("./db/db.php");
$conn = database();
?>
<?php include_once("./config/config.php") ?>
<head>
    <meta charset="utf-8" />
	<meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specialize in creating impressive unique Minecraft builds for all clients, and server owners.">
	<meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds">
	<meta name="author" content="TheChasoCode">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/Images/favicon.ico" />
    <title> Home | Xayden - Minecraft Buildteam </title>
    <link rel="preload" as="font" href="/Fonts/Montserrat-ExtraLight.otf" type="font/Montserrat-ExtraLight" crossorigin="anonymous">
    <link async rel="stylesheet" href="/css/main.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script async type="text/javascript" src="/js/main.js"></script>
</head>

<body>
<nav class="nav" id="nav">
    <a id="current" title="Home page" class="menu_a" href="/">Home</a>
    <a class="menu_a" title="About page" href="/about.php">About</a>
    <a class="menu_a" title="store page" href="/store.php">Store</a>
    <img class="logo" alt="Xayden minecraft buildteam logo" src="./Images/Xayden/logo.png">
    <a class="menu_a" title="Gallery page" href="/portfolio.php">Portfolio</a>
    <a class="menu_a" title="Applications page" href="/application.php">Applications</a>
    <a class="menu_a" title="Contact page" href="/contact.php">Contact</a>
    <a class="panel" title="Login landing page" target="_blank" href="panel/login.php">Login</a>
</nav>

<?php include_once("./config/mobilenav.php") ?>

    <header class="header">
        <div id="slideshow">
            <div class="slide active" id="picture1">
                <div class="header_overlay">
                </div>
            </div>
            <div class="slide active" id="picture2">
                <div class="header_overlay">
                </div>
            </div>
            <div class="slide active" id="picture3"> 
                <div class="header_overlay">
                </div>
            </div>
                <div class="slide active" id="picture4">
                <div class="header_overlay">
                </div>
            </div>
            <div class="slide active" id="picture5">
                <div class="header_overlay">
                </div>
            </div>
            <div class="slide active" id="picture6">
                <div class="header_overlay">
                </div>
            </div>
        </div>
        <div class="header_block">
                        <h1 style="font-weight:bold;" itemprop="name">Xayden Buildteam</h1>
                        <p>We have come together from different backgrounds, languages, and cultures to teach you how to build the right way! 
                        We plan on creating the most satisfying and creative builds to date for you our user. We are here for fixed and custom commissions, but the best part is, you are the one that tells us what to do! 
                        We want you to enjoy your time here by not only receiving pieces of greatness from us but also being able to create them yourself. 
                        We hope you enjoy everything and welcome to Xayden.</p>
                        <a class="header_button" href="#hire">Hire us now!</a>
                    </div>
                    <div class="header_block">
                        <img src="Images/Xayden/logo.png" alt="Xayden build team logo." class="header_image">
                    </div>
        <div class="scrolldown">
            <a class="scrolldown_pijl" href="#hire"> </a>
        </div>
    </header>

    <section class="section" style="padding-bottom: 2%" id="hire">
        <article class="article" style="padding-bottom: 0px">
            <div class="article_block">
                <img src="./Images/Xayden/logo.png" alt="Xayden build team logo." class="article_image">
            </div>
            <div class="article_block">
                <h3>Commissions</h3>
                <p>Minecraft commissions to us can either be a planned set up or entirely custom! 
                There is no specific amount when it comes to commissions. You choose, we build.
                If you are looking to purchase a unique custom build please contact us under the Contact tab, so that we may discuss the details of your minecraft build(s). 
                In the store tab you may purchase previously constrained minecraft builds, meaning they have fixed dimensions and a select style of build such as a koth, spawn or hub.
                </p>
                <a class="header_button" href="gallery">Contact</a>
            </div>
        </article>
    </section>

    <section class="section2">
        <article class="article"> 
            <div class="article_block">
                <h3>Notable Clients</h3>
                <p>Something to show our reputation. 
                We have worked with all of the following networks and more to come. 
                With great feedback from all of our partners and clients, we are prepared to take your commission on!</p>
            </div>
            <div class="article_block">
            </div>
            <div class="companies">

                <?php
                    $query1 = "SELECT * FROM partners";
                    $result1 = mysqli_query($conn, $query1);

                    while ($row1 = mysqli_fetch_array($result1)) {
                        echo '<div class="companie">
                                <img class="companie-logo" alt="Partner
                                " src="./Images/companies/'.$row1['partnername'].'.png">
                                <div class="companie-hover">
                                    <div class="companie-hover2">
                                        <h2><b>'.$row1['partnername'].'</b></h2>
                                        <p>Server IP:<br>'.$row1['ip'].'</p>
                                    </div>
                                </div>
                            </div>';
                    }
                ?>


                <div class="companie-special">
                    <a class="companie-special2" href="https://discord.gg/5Bwuauw">Want your server here? Click here!</a>
                </div>
            </div> 
        </article>
    </section>
    <?php include_once("./config/footer.php") ?>
</body>
</html>