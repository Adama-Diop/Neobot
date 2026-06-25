<?php

/** @var mysqli|null $connection */
$connection = null;

function open_connection()
{
    global $connection;
    if (! $connection) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "neobot";
        $connection = mysqli_connect($servername, $username, $password, $dbname);
        if (!$connection) {
            exit("Connexion failed: " . mysqli_connect_error());
        }
    }
}

function close_connection()
{
    global $connection;
    if ($connection) {
        mysqli_close($connection);
    }
    $connection = null;
}
