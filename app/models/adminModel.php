<?php

require_once PATH_ROOT . '/models/sql_connection.php';

function getTousLesClients()
{
    open_connection();

    $sql = "SELECT id, pseudo, email, date_inscription
            FROM Clients
            WHERE role = 'client'
            ORDER BY date_inscription DESC";

    $result = mysqli_query($GLOBALS['connection'], $sql);

    if (!$result) {
        close_connection();
        return false;
    }

    $clients = mysqli_fetch_all($result, MYSQLI_ASSOC);

    close_connection();

    return $clients;
}

function getRobotsParClient($id_client)
{
    open_connection();

    $sql = "SELECT id, nom, date_creation, description
            FROM Robots
            WHERE id_client = ?
            ORDER BY date_creation DESC";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);

    if (!$stmt) {
        close_connection();
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $id_client);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $robots = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_stmt_close($stmt);
    close_connection();

    return $robots;
}

function getDetailsRobotsParClient($id_client)
{
    open_connection();

    $sql = "SELECT
                r.id,
                r.nom,
                r.date_creation,
                r.description,
                c.pseudo,
                b.locomotion AS nom_base,
                t.ref AS nom_tete,
                co.ref AS nom_corps,
                br.ref AS nom_bras,
                j.ref AS nom_jambes,
                b.prix AS prix_base,
                t.prix AS prix_tete,
                co.prix AS prix_corps,
                br.prix AS prix_bras,
                j.prix AS prix_jambes
            FROM robots r
            JOIN clients c ON c.id = r.id_client
            LEFT JOIN base b ON b.id = r.id_base
            LEFT JOIN tete t ON t.id = r.id_tete
            LEFT JOIN corps co ON co.id = r.id_corps
            LEFT JOIN bras br ON br.id = r.id_bras
            LEFT JOIN jambes j ON j.id = r.id_jambes
            WHERE r.id_client = ?
            ORDER BY r.date_creation DESC";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);

    if (!$stmt) {
        close_connection();
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $id_client);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $robots = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_stmt_close($stmt);
    close_connection();

    return $robots;
}

function getPrixFonctionnalitesAdmin($id_robot)
{
    open_connection();

    $sql = "SELECT COALESCE(SUM(prix_applique), 0) AS total
            FROM robot_fonctionnalites
            WHERE id_robot = ?";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);

    if (!$stmt) {
        close_connection();
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $id_robot);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    close_connection();

    return (float)($row['total'] ?? 0);
}
