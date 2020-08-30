<?php
session_start();
include("./db/db.php");
$conn = database();

define('SITE_KEY', '6LfN97cUAAAAAJ7oy2C4di1nnksn58Hd5ewC3541');
define('SECRET_KEY', '6LfN97cUAAAAAAtMT0guQaC_-jeht33xP2FnFERd');

if (isset($_POST['submit'])) {
    function getCaptcha($SecretKey){
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }
    $Return = getCaptcha($_POST['g-recaptcha-response']);
    //var_dump($Return);
    if($Return->success == true && $Return->score > 0.5){
		$name = $_POST['name'];
		$emailadres = $_POST['emailadres'];
		$message = $_POST['message'];
		$title = $_POST['title'];
		$date = date('Y-m-d');
		$registerdate = date('Y-m-d H:i:s');

		$query = "INSERT INTO messages(customername, emailadres, message, questiondate, registerdate, title) 
				  VALUES ('".$name."', '".$emailadres."', '".$message."', '".$date."', '".$registerdate."', '".$title."');";
		$result = mysqli_query($conn, $query);

		echo "Your message has been send succsesfully!";
    }else{
		echo "Something went wrong!";
    }
}
?>
<?php include_once("./config/config.php") ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specialize in creating impressive unique Minecraft builds for all clients, and server owners.">
	<meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds,Contact,Discord">
	<meta name="author" content="TheChasoCode">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/Images/favicon.ico" />
    <title> Contact | Xayden - Minecraft Buildteam </title>
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
    <a class="menu_a" href="/portfolio.php">Portfolio</a>
    <a class="menu_a" href="/application.php">Applications</a>
    <a id="current" class="menu_a" href="/contact.php">Contact</a>
    <a class="panel" target="_blank" href="/panel/login.php">Login</a>
</nav>

<?php include_once("./config/mobilenav.php") ?>


<section class="section" id="section_special6">
    <article class="article" id="article_special">
        <div class="article_block">
            <h2 class="article_title">Contact</h2>
            <p>Interested in purchasing a build? If you have an idea or purchase plan you would like to have us create, our contact information is down below. Once you have made contact with us we will discuss the technicalities of the build and how we see the build resulting. We hope you enjoyed our website and we hope you enjoy your commission even more so!</p>
        </div>
        <div class="article_block"></div>
    </article>
</section>

<section class="section">
    <article class="article">
        <div class="article_block">
            <img src="./Images/Xayden/logo.png" class="article_image">
        </div>
        <div class="article_block">
            <h3>Contact information</h3>
            <p class="contact_title">Contact us by Email: <i>Contact@Xayden.net</i></p>
            <p class="contact_title">Contact us on Telegram: <i>TheChaosCode</i></p>
            <p class="contact_title">Contact us on Discord: <a target="_blank" href="https://discord.gg/a9b4Zf8" class="discord">Click here to join the Discord server</a></p>
        </div>
    </article>
</section>
<section class="section2">
    <article class="article">
        <div class="article_block">
            <h3>Message us</h3>
            <p>If you are interested in a custom commission of any kind, please be sure to contact us at Contact@Xayden.net . We will respond to your message within a 24 hour period as well, so there is no need to wait! We hope you enjoyed our website, network, and service. Have a nice day!</p>

            <form action="contact" method="POST">
                <table class="table_contact">
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Name*" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="emailadres" placeholder="E-mail Address*" minlength="10" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="title" placeholder="Title*" minlength="10" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="message" placeholder="Message (max 500 words)*" maxlength="500" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="button" id="button_special" type="submit" name="submit">Send</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="article_block">
        </div>
    </article>
</section>

    <?php include_once("./config/footer.php") ?>

</body>
</html>