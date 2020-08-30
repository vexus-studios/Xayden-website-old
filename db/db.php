<?php
function database()
{

    $host = 'Localhost:3306';
    $database = 'xayden';
    $user = 'xayden';
    $wachtwoord = 'password';
    //$host = 'Localhost';
    //$database = 'xayden';
    //$user = 'root';
    //$wachtwoord = '';

    $connectie = mysqli_connect($host, $user, $wachtwoord, $database);

    if ($connectie) {
        return $connectie;
    } else {
        return die(mysqli_connect_error());
    }
}

?>
