<?php
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

function menu1($username, $rank) {
    if (file_exists("../Images/skulls/".$username.".png")) {

    }
    else {
        $filepath = "../Images/skulls/Default.png";
    }

    echo '
    <section class="menu-navigation">
            <div class="menu-navigation-userdata">
                <div class="menu-navigation-userdata-icon" style="background: none">
                    <img src="https://minotar.net/avatar/'.$username.'.png" class="profile-picture">
                </div>
                <div class="menu-navigation-userdata-name">
                    <p class="menu-navigation-userdata-name-1">Logged in as:</p>
                    <span class="menu-navigation-userdata-name-2">'.$username.'<p class="rank" id="'.$rank.'">['.$rank.']</p></span>
                    <a href="./login.php" class="menu-navigation-userdata-name-3">Logout</a>
                </div>
            </div>
            <ul class="menu-navigation-link">';

    switch ($rank) {
        case 'Partner':

            echo '
                <li class="menu-navigation-link-list">
                    <a href="./dashboard.php" class="menu-navigation-link-list-name">Dashboard</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./build-requests.php" class="menu-navigation-link-list-name">Build requests</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./messages.php" class="menu-navigation-link-list-name">Messages</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./settings.php" class="menu-navigation-link-list-name">Settings</a>
                </li>';

            break;

        case 'Default':

            echo '
                <li class="menu-navigation-link-list">
                    <a href="/dashboard.php" class="menu-navigation-link-list-name">Dashboard</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="/rank_request.php" class="menu-navigation-link-list-name">Rank request</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="/settings.php" class="menu-navigation-link-list-name">Settings</a>
                </li>';

            break;

        default:
            echo '
                <li class="menu-navigation-link-list">
                    <a href="./dashboard.php" class="menu-navigation-link-list-name">Dashboard</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./builders.php" class="menu-navigation-link-list-name">Builder information</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./tasks.php" class="menu-navigation-link-list-name">Tasks</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./messages.php" class="menu-navigation-link-list-name">Messages</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./mcmarket.php" class="menu-navigation-link-list-name">McMarket requests</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./build-requests.php" class="menu-navigation-link-list-name">Requests from partners</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./applications.php" class="menu-navigation-link-list-name">Applications</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./customer-messages.php" class="menu-navigation-link-list-name">Customer Messages</a>
                </li>
                <li class="menu-navigation-link-list">
                    <a href="./settings.php" class="menu-navigation-link-list-name">Settings</a>
                </li>';
    }

    echo '
            </ul>
        </section>
    ';
}

function menu2() {
    echo '
    <section class="stats">
            <div class="stats-logo">
                <img class="stats-logo-img" src="../Images/Xayden/logo.png">
            </div>
           <!-- <ul class="stats-statistics">
                <li class="stats-statistics-list">
                    <a class="stats-statistics-list-name">Your tasks:
                        <div class="stats-statistics-list-name-status">1</div>
                    </a>
                </li>
                <li class="stats-statistics-list">
                    <a class="stats-statistics-list-name">Unread applications:
                        <div class="stats-statistics-list-name-status">5</div>
                    </a>
                </li>
                <li class="stats-statistics-list">
                    <a class="stats-statistics-list-name">Unread McMarket requests:
                        <div class="stats-statistics-list-name-status">2</div>
                    </a>
                </li>
                <li class="stats-statistics-list">
                    <a class="stats-statistics-list-name">Unread customer messages:
                        <div class="stats-statistics-list-name-status">7</div>
                    </a>
                </li>
            </ul>-->
            <div class="stats-statistics">
                <p class="stats-statistics-list-title">Support Members:</p>
                <img src="https://minotar.net/avatar/ChaosJumper8.png" class="xayden-member">
                <img src="https://minotar.net/avatar/Lilaaa_.png" class="xayden-member">
                <img src="https://minotar.net/avatar/Pallets.png" class="xayden-member">
                <img src="https://minotar.net/avatar/Cvbble.png" class="xayden-member">
                <img src="https://minotar.net/avatar/CommonUwU.png" class="xayden-member">
                <img src="https://minotar.net/avatar/Flapo.png" class="xayden-member">
                <img src="https://minotar.net/avatar/Calvina.png" class="xayden-member">
                <img src="https://minotar.net/avatar/CianVerx.png" class="xayden-member">
                <img src="https://minotar.net/avatar/Spyno.png" class="xayden-member">
                <img src="https://minotar.net/avatar/E_Catherine_C.png" class="xayden-member">
            </div>
                    
        </section>
    ';
}

?>