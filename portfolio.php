<!doctype html>
<?php include_once("./config/config.php") ?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specialize in creating impressive unique Minecraft builds for all clients, and server owners.">
    <meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds,Galary">
    <meta name="author" content="TheChasoCode">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/Images/favicon.ico" />
    <title> Portfolio | Xayden - Minecraft Buildteam </title>
    <link rel="stylesheet" href="/css/main.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
</head>

<body>
    <nav class="nav" id="nav">
        <a class="menu_a" href="/">Home</a>
        <a class="menu_a" href="/about.php">About</a>
        <a class="menu_a" href="/store.php">Store</a>
        <img class="logo" src="./Images/Xayden/logo.png">
        <a id="current" class="menu_a" href="/portfolio.php">Portfolio</a>
        <a class="menu_a" href="/application.php">Applications</a>
        <a class="menu_a" href="/contact.php">Contact</a>
        <a class="panel" target="_blank" href="/panel/login.php">Login</a>
    </nav>

    <?php include_once("./config/mobilenav.php") ?>


    <section class="section" id="section_special2" style="background-color: #f5f5f5">
        <article class="article" id="article_special">
            <div class="article_block">
                <h2 class="article_title">Portfolio</h2>
                <p>Your journey starts here! Enter the world of genuine art, true architecture, and unparalleled satisfaction with the builds brought to you by yours truly. The builders of Xayden would like to present to you some of the best builds anyone
                    can possibly create! We hope this inspires you to not only have us create it for you, but also have join us and learn to create like one of us! We hope you enjoy!</p>
            </div>
            <div class="article_block">
            </div>
        </article>
    </section>

    <section class="section2">
        <article class="article">
            <h3>Our builds</h3>
            <p>Let satisfaction rain upon you with the glory of our builds!</p>
            <a class="build" id="build1" onclick="javascript:document.getElementById('popup1').style.display='block';"></a>
            <a class="build" id="build2" onclick="javascript:document.getElementById('popup2').style.display='block';"></a>
            <a class="build" id="build3" onclick="javascript:document.getElementById('popup3').style.display='block';"></a>
            <a class="build" id="build4" onclick="javascript:document.getElementById('popup4').style.display='block';"></a>
            <a class="build" id="build5" onclick="javascript:document.getElementById('popup5').style.display='block';"></a>
            <a class="build" id="build6" onclick="javascript:document.getElementById('popup6').style.display='block';"></a>
            <a class="build" id="build7" onclick="javascript:document.getElementById('popup7').style.display='block';"></a>
            <a class="build" id="build8" onclick="javascript:document.getElementById('popup8').style.display='block';"></a>
            <a class="build" id="build9" onclick="javascript:document.getElementById('popup9').style.display='block';"></a>
            </ul>
        </article>
    </section>

    <?php include_once("./config/footer.php") ?>

</body>

</html>