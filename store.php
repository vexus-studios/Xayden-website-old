<!doctype html>
<?php include_once("./config/config.php") ?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Xayden is a Minecraft buildteam and official Minecraft Partner. We specialize in creating impressive unique Minecraft builds for all clients, and server owners.">
    <meta name="keywords" content="Xayden,Buildteam,Minecraft,Builds,shop,Shop">
    <meta name="author" content="TheChasoCode">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/Images/favicon.ico" />
    <title> Store | Xayden - Minecraft Buildteam</title>
    <link rel="stylesheet" href="/css/main.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
</head>

<body>
<nav class="nav" id="nav">
    <a class="menu_a" title="Home page" href="/">Home</a>
    <a class="menu_a" title="About page" href="/about.php">About</a>
    <a id="current" class="menu_a" title="store page" href="/store.php">Store</a>
    <img class="logo" alt="Xayden minecraft buildteam logo" src="./Images/Xayden/logo.png">
    <a class="menu_a" title="Gallery page" href="/portfolio.php">Portfolio</a>
    <a class="menu_a" title="Applications page" href="/application.php">Applications</a>
    <a class="menu_a" title="Contact page" href="/contact.php">Contact</a>
    <a class="panel" title="Login landing page" target="_blank" href="panel/login.php">Login</a>
</nav>

    <?php include_once("./config/mobilenav.php") ?>


    <section class="section" id="section_special2">
        <article class="article" id="article_special">
            <div class="article_block">
                <h2 class="article_title">Store</h2>
                <p>If you are in search of magnificent builds at a great price then this is the place to be! In our shop you can purchase dimension and style fixed builds for the listed prices. We have Koths, Spawns, Hubs, Islands, etc., anything you could
                    really ask for. If you are looking for something entirely custom then you must go to the Contact tab of the website and contact us through one of the listed addresses. Once received, we will respond to your message within a 24 hour
                    span.
                </p>
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
                <h3>Offers</h3>
                <p>We offer all types of builds from Koths to Spawns to Hubs & much more! You can select the size you may like & the price change will follow. If you fail to find what you are searching for, feel free to contact us.</p>
            </div>
            <a class="picture" onclick="javascript:document.getElementById('popup1').style.display='block';">
                <img class="shop_picture" src="./Images/shop/1/1.png">
            </a>
            <a class="picture" onclick="javascript:document.getElementById('popup2').style.display='block';">
                <img class="shop_picture" src="./Images/shop/2/main.jpg">
                <h4>Koth</h4>
                <p>$ ??? USD</p>
            </a>
            <a class="picture" onclick="javascript:document.getElementById('popup3').style.display='block';">
                <img class="shop_picture" src="./Images/shop/3/main.jpg">
                <h4>Practice lobby</h4>
                <p>FREE</p>
            </a>
            <a class="picture" onclick="javascript:document.getElementById('popup4').style.display='block';">
                <img class="shop_picture" src="./Images/shop/4/main.jpg">
                <h4>HCF Spawn</h4>
                <p>$ ??? USD</p>
            </a>
            <a class="picture" onclick="javascript:document.getElementById('popup5').style.display='block';">
                <img class="shop_picture" src="./Images/shop/5/main.jpg">
                <h4>Sumo pack</h4>
                <p>$ ??? USD</p>
            </a>
            <a class="picture" onclick="javascript:document.getElementById('popup6').style.display='block';">
                <img class="shop_picture" src="./Images/shop/6/main.png">
                <h4>Koth Pack</h4>
                <p>$ ??? USD</p>
            </a>

        </article>
    </section>

    <section>
        <div class="picture-popup" id="popup1">
            <div class="popupcontent">
                <img class="sale-images" src="./Images/shop/1/1.png">
                <h2>Samurai HCF Spawn</h2>
                <p class="price">Price: 4.99 USD</p>
                <p class="shop-paragraph">Detailed HCF Spawn with the following features:<br/><br/> - Clean terrain Ultimate for pvp<br/> - Samurai Organic<br/> - 4 spawner pits<br/> - Sign shop area<br/> - Crates area<br/>
                </p>
                <a class="shop_button" target="_blank" href="https://www.mc-market.org/resources/13437/">Buy</a>
                <a class="close" onclick="javascript:document.getElementById('popup1').style.display='none';">
                    <p>X</p>
                </a>
            </div>
        </div>

        <div class="picture-popup" id="popup2">
            <div class="popupcontent">
                <img class="sale-images" src="./Images/shop/2/1.jpg">
                <div class="sales-image">
                    <a target="_blank" href="https://www.mc-market.org/attachments/119997/"><img src="./Images/shop/2/1.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/119998/"><img src="./Images/shop/2/2.png"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/119999/"><img src="./Images/shop/2/3.png"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120000/"><img src="./Images/shop/2/4.jpg"></a>
                </div>
                <h2>Koth</h2>
                <p class="price">Price: 2.99 USD</p>
                <p class="shop-paragraph">Detailed Koth with the following things included:<br/><br/> - Organics<br/> - 4 Paths<br/> - Capture Point<br/> - Flat pvp terrain<br/>
                </p>
                <a class="shop_button" target="_blank" href="https://www.mc-market.org/resources/6806/">Buy</a>
                <a class="close" onclick="javascript:document.getElementById('popup2').style.display='none';">
                    <p>X</p>
                </a>
            </div>
        </div>

        <div class="picture-popup" id="popup3">
            <div class="popupcontent">
                <img class="sale-images" src="./Images/shop/3/1.jpg">
                <div class="sales-image">
                    <a target="_blank" href="https://www.mc-market.org/attachments/120093/"><img src="./Images/shop/3/1.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120095/"><img src="./Images/shop/3/2.png"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120097/"><img src="./Images/shop/3/3.png"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120103/"><img src="./Images/shop/3/4.jpg"></a>
                </div>
                <h2>Practice Lobby</h2>
                <p class="price">Price: FREE</p>
                <p class="shop-paragraph">Detailed Practice Lobby with the following things included:<br/><br/> - Jump parkours<br/> - A lot of player space<br/> - Explorable details<br/> - Organics<br/> - Structures<br/> - Player Hangouts<br/>
                </p>
                <a class="shop_button" target="_blank" href="https://www.mc-market.org/resources/6813/">Buy</a>
                <a class="close" onclick="javascript:document.getElementById('popup3').style.display='none';">
                    <p>X</p>
                </a>
            </div>
        </div>

        <div class="picture-popup" id="popup4">
            <div class="popupcontent">
                <img class="sale-images" src="./Images/shop/4/1.jpg">
                <div class="sales-image">
                    <a target="_blank" href="https://www.mc-market.org/attachments/120591/"><img src="./Images/shop/4/1.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120592/"><img src="./Images/shop/4/2.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120594/"><img src="./Images/shop/4/4.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120595/"><img src="./Images/shop/4/5.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120596/"><img src="./Images/shop/4/6.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120597/"><img src="./Images/shop/4/7.jpg"></a>
                </div>
                <h2>HCF Spawn</h2>
                <p class="price">Price: $4.99 USD</p>
                <p class="shop-paragraph">Detailed HCF Spawn with the following things included:<br/><br/> - 4x MobFarm<br/> - Shop<br/> - Crates<br/> - Koth Loot<br/> - Fishing pools<br/> - Lots of open space!<br/>
                </p>
                <a class="shop_button" target="_blank" href="https://www.mc-market.org/resources/6832/">Buy</a>
                <a class="close" onclick="javascript:document.getElementById('popup4').style.display='none';">
                    <p>X</p>
                </a>
            </div>
        </div>

        <div class="picture-popup" id="popup5">
            <div class="popupcontent">
                <img class="sale-images" src="./Images/shop/5/1.jpg">
                <div class="sales-image">
                    <a target="_blank" href="https://www.mc-market.org/attachments/120604/"><img src="./Images/shop/5/1.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120605/"><img src="./Images/shop/5/2.jpg"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/120606/"><img src="./Images/shop/5/3.jpg"></a>
                </div>
                <h2>Sumo pack</h2>
                <p class="price">Price: $2.00 USD</p>
                <p class="shop-paragraph">Detailed Sumo Maps with the following things included:<br/><br/> - Spawn points<br/> - Platforms<br/> - Custom Design x1<br/> - Nether Design x1<br/> - Snow Design x1<br/> - Eye-Candy!<br/>
                </p>
                <a class="shop_button" target="_blank" href="https://www.mc-market.org/resources/6833/">Buy</a>
                <a class="close" onclick="javascript:document.getElementById('popup5').style.display='none';">
                    <p>X</p>
                </a>
            </div>
        </div>

        <div class="picture-popup" id="popup6">
            <div class="popupcontent">
                <img class="sale-images" src="./Images/shop/6/1.png">
                <div class="sales-image">
                    <a target="_blank" href="https://www.mc-market.org/attachments/150830/"><img src="./Images/shop/6/1.png"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/150832/"><img src="./Images/shop/6/2.png"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/150834/"><img src="./Images/shop/6/3.png"></a>
                    <a target="_blank" href="https://www.mc-market.org/attachments/150835/"><img src="./Images/shop/6/4.jpg"></a>
                </div>
                <h2>Koth Pack</h2>
                <p class="price">Price: $2.50 USD</p>
                <p class="shop-paragraph">Detailed Kothpack with the following things included:<br/><br/> - 4 Roads​<br/> - Organics<br/> - Capture Point<br/> - Details<br/> - Structures<br/>
                </p>
                <a class="shop_button" target="_blank" href="https://www.mc-market.org/resources/8239/">Buy</a>
                <a class="close" onclick="javascript:document.getElementById('popup6').style.display='none';">
                    <p>X</p>
                </a>
            </div>
        </div>
    </section>

    <?php include_once("./config/footer.php") ?>

</body>

</html>