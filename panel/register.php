<?php include('controle.php') ?>
<?php include_once("../config/config.php") ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specialize in creating impressive unique Minecraft builds for all clients, and server owners.">
	<meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds,login,Register">
	<meta name="author" content="TheChasoCode">
	<meta name = "robots" content = "noindex, follow" />
    <title> Register | Xayden - Minecraft Buildteam </title>
    <link rel="stylesheet" href="panel.css" media="screen" />
    <link rel="icon" type="image/x-icon" href="/Images/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
</head>

<body class="panel">

<div class="body">



    <img class="logo" src="../Images/Xayden/logo.png">

    <section class="sectionspecial">
        <div class="table">
            <table class="login">
                <form action="register.php" method="post">
                <?php include('errors.php'); ?>
                    <tr class="tr1">
                        <td style="width: 100%"><h1>Register Form</h1></td>
                    </tr>
                    <tr>
                            <td><a href="login.php" class="registerbutton">already have a account? <u>login</u>.</a></td>
                        </tr>
                    <tr class="tr1">
                        <td>Minecraft username</td>
                    </tr>
                    <tr class="tr2">
                        <td class="tdspecial"><input minlength="4" maxlength="16" type="text" name="username" value="" required></td>
                    </tr>
                    <tr class="tr1">
                        <td>Email</td>
                    </tr>
                    <tr class="tr2">
                        <td class="tdspecial"><input minlength="10" maxlength="26" type="email" name="email" value="" required></td>
                    </tr>
                    <tr class="tr1">
                        <td>Password</td>
                    </tr>
                    <tr class="tr2">
                        <td class="tdspecial"><input minlength="7" maxlength="30" type="password" name="password_1" required></td>
                    </tr>
                    <tr class="tr1">
                        <td>Repeat password</td>
                    </tr>
                    <tr class="tr2">
                        <td class="tdspecial"><input minlength="7" maxlength="30" type="password" name="password_2" required></td>
                    </tr>
                    <tr class="tr1">
                        <td style="width: 100%"><button class="login-button" type="submit" name="reg_user">Register</button></td>
                    </tr>
                </form>
            </table>
        </div>
    </section>
</div>
<footer class="footer">
    <div class="footer_main">
        <div class="footer_block" id="footer-logo">
            <div class="footer_center">
                <img class="footer-logo" alt="Xayden Minecraft buildteam logo." src="../Images/Xayden/logo.png">
            </div>
        </div>

        <div class="footer_block">
            <div class="footer_center">
                <h5>Links</h5>
                <table class="table1">
                    <tr>
                        <td><img class="socialmedia_logo" alt="Home button" src="../Images/Icons/footer-icon.png"></td>
                        <td><a href="/">Home</a></td>
                    </tr>
                    <tr>
                        <td><img class="socialmedia_logo" alt="About button" src="../Images/Icons/footer-icon.png"></td>
                        <td><a href="/about.php">About us</a></td>
                    </tr>
                    <tr>
                        <td><img class="socialmedia_logo" alt="store button" src="../Images/Icons/footer-icon.png"></td>
                        <td><a href="/store.php">Store</a></td>
                    </tr>
                    <tr>
                        <td><img class="socialmedia_logo" alt="Gallery button" src="../Images/Icons/footer-icon.png"></td>
                        <td><a href="/portfolio.php">Portfolio</a></td>
                    </tr>
                    <tr>
                        <td><img class="socialmedia_logo" alt="Applications button" src="../Images/Icons/footer-icon.png"></td>
                        <td><a href="/application.php">Applications</a></td>
                    </tr>
                    <tr>
                        <td><img class="socialmedia_logo" alt="Contact button" src="../Images/Icons/footer-icon.png"></td>
                        <td><a href="/contact.php">Contact</a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer_block">
            <div class="footer_center">
                <h5>Minecraft</h5>
                <table class="table1">
                    <tr>
                        <td><img class="socialmedia_logo" alt="The logo of planetminecraft.com" src="../Images/Icons/pmc.png"></td>
                        <td><a target="_blank" href="https://www.planetminecraft.com/member/xayden_buildteam/">PlanetMinecraft</a></td>
                    </tr>
                    <tr>
                        <td><img class="socialmedia_logo" alt="The logo of mcmarket.com" src="../Images/Icons/mcm.png"></td>
                        <td><a target="_blank" href="https://www.mc-market.org/members/115151/">McMarket</a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer_block">
            <div class="footer_center">
                <h5>Contact</h5>
                <table class="table1">
                    <tr>
                        <td><img class="socialmedia_logo" alt="Email icon" src="../Images/Icons/Mail_Icon.png"></td>
                        <td><a href="#">Contact@xayden.net</a></td>
                    </tr>
                    <tr>
                        <td><img class="socialmedia_logo" alt="Discord icon" src="../Images/Icons/discord.png"></td>
                        <td><a target="_blank" href="https://Discord.Xayden.net">Discord</a></td>
                    </tr>
                    <tr>
                        <td><img class="socialmedia_logo" alt="Telegram icon" src="../Images/Icons/telegram.png"></td>
                        <td><a target="_blank" href="https://web.telegram.org">Telegram</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <p class="footer_small_text">© Copyright 2020 Xayden</p>
    </div>
</footer>
</body>
</html>