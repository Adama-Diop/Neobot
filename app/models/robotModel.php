<?php
require_once PATH_ROOT . '/models/sql_connection.php';


function set_robot($nom, $date_creation, $id_base, $id_tete, $id_corps, $id_bras, $id_jambes, $id_client, $description)
{

    open_connection();

    $sql = "INSERT INTO Robots (nom, date_creation, id_base, id_tete, id_corps, id_bras, id_jambes, id_client, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);

    mysqli_stmt_bind_param($stmt, "ssiiiiiis", $nom, $date_creation, $id_base, $id_tete, $id_corps, $id_bras, $id_jambes, $id_client, $description);

    $result = mysqli_stmt_execute($stmt);

    close_connection();
    return $result;
}

function get_all_robots_by_client_id($id_client)
{
    open_connection();
    $all_robots = [];


    $sql = "SELECT r.nom,  r.date_creation, r.id_base, r.id_tete, r.id_corps, r.id_bras, r.id_jambes, r.id_client, description FROM Robots r WHERE r.id_client = ?";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_client);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $all_robots[] = $row;
    }

    close_connection();

    return $all_robots;
}
