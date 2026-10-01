<?php

/** @var mysqli|null $connection */
$GLOBALS['connection'] = null;

function open_connection()
{
    if (!$GLOBALS['connection']) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "neobot";
        $GLOBALS['connection'] = mysqli_connect($servername, $username, $password, $dbname);
        if (!$GLOBALS['connection']) {
            exit("Connexion failed: " . mysqli_connect_error());
        }
    }
}

function close_connection()
{
    if ($GLOBALS['connection']) {
        mysqli_close($GLOBALS['connection']);
    }
    $GLOBALS['connection'] = null;
}
