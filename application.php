<?php
session_start();
include('./db/db.php');
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
		$realname = $_POST['realname'];
		$username = $_POST['username'];
		$discord = $_POST['discord'];
		$telegram = $_POST['telegram'];
		$emailadres = $_POST['emailadres'];
		$timezone = $_POST['timezone'];
		$age = $_POST['age'];
		$textarea = $_POST['message'];
		$portfolio = $_POST['portfolio'];
		$registerdate = date('Y-m-d H:i:s');
		$applydate = date('Y-m-d');

		$query = "INSERT INTO applications(realname, username, discord, telegram, 
				  emailadres, timezone, age, textarea, portfolio, registerdate, applydate)
				  VALUES ('".$realname."', '".$username."', '".$discord."', '".$telegram."', '".$emailadres."', 
				  '".$timezone."', '".$age."', '".$textarea."', '".$portfolio."', '".$registerdate."', '".$applydate."');";

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
	<meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds,Application,Builder Application,Apply">
	<meta name="author" content="TheChasoCode">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/Images/favicon.ico" />
    <title> Builder application | Xayden - Minecraft Buildteam </title>
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
    <a id="current" class="menu_a" href="/application.php">Applications</a>
    <a class="menu_a" href="/contact.php">Contact</a>
    <a class="panel" target="_blank" href="/panel/login.php">Login</a>
</nav>

<?php include_once("./config/mobilenav.php") ?>

<section class="section" id="section_special5">
    <article class="article" id="article_special">
        <div class="article_block">
            <h2 class="article_title">Builder application</h2>
            <p>Welcome to the Builder application, please fill in all fields.</p>
        </div>
        <div class="article_block">
        </div>
    </article>
</section>
<section class="section">
    <article class="article">
        <div class="article_block">
            <img src="./Images/Xayden/logo.png" class="article_image">
        </div>
        <div class="article_block">
            <h3>Apply form</h3>

            <form action="save-builder-application.php" method="POST">
                <table class="table_contact">
                    <tr>
                        <td>
                            <input type="text" name="realname" placeholder="Real name*" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="username" placeholder="Minecraft username*" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="emailadres" placeholder="E-mail Address*" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="discord" placeholder="Discord username*" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="telegram" placeholder="Telegram username*" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="timezone" placeholder="Timezone*" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="number" name="age" placeholder="Age in numbers*" maxlength="50" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="message" placeholder="Why should we accept you in the team? (max 500 words)*" maxlength="500" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="portfolio" placeholder="Link to portfolio (Imgur, Gyazo or something else)*" maxlength="500" required>
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
    </article>
</section>

    <?php include_once("./config/footer.php") ?>
</body>
</html>