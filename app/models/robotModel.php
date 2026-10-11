<?php
require_once PATH_ROOT . '/models/sql_connection.php';


function set_robot($nom, $date_creation, $id_base, $id_tete, $id_corps, $id_bras, $id_jambes, $id_client, $description)
{

    open_connection();

    $sql = "INSERT INTO Robots (nom, date_creation, id_base, id_tete, id_corps, id_bras, id_jambes, id_client, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);

    mysqli_stmt_bind_param($stmt, "ssiiiiiis", $nom, $date_creation, $id_base, $id_tete, $id_corps, $id_bras, $id_jambes, $id_client, $description);

    $result = mysqli_stmt_execute($stmt);

    $id_robot = $result
        ? mysqli_insert_id($GLOBALS['connection'])
        : false;

    mysqli_stmt_close($stmt);
    close_connection();

    return $id_robot;
}

function get_all_robots_by_client_id($id_client)
{
    open_connection();
    $all_robots = [];


    $sql = "SELECT id, nom,  date_creation, id_base, id_tete, id_corps, id_bras, id_jambes, id_client, description FROM Robots WHERE id_client = ?";

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

function update_robot(
    $id_robot,
    $nom,
    $id_base,
    $id_tete,
    $id_corps,
    $id_bras,
    $id_jambes,
    $id_client,
    $description
) {
    open_connection();

    $sql = "UPDATE Robots
            SET nom = ?,
                id_base = ?,
                id_tete = ?,
                id_corps = ?,
                id_bras = ?,
                id_jambes = ?,
                description = ?
            WHERE id = ? AND id_client = ?";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "siiiiisii",
        $nom,
        $id_base,
        $id_tete,
        $id_corps,
        $id_bras,
        $id_jambes,
        $description,
        $id_robot,
        $id_client
    );

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    close_connection();

    return $result;
}

function get_robot_by_id($id_robot)
{
    open_connection();


    $sql = "SELECT * FROM Robots WHERE id = ?";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_robot);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $robot = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    close_connection();
    return ($robot);
}

function get_all_bases()
{
    open_connection();
    $all_bases = [];


    $sql = "SELECT * from Base";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $all_bases[] = $row;
    }

    close_connection();

    return $all_bases;
}

function get_all_heads()
{
    open_connection();
    $all_heads = [];


    $sql = "SELECT * from tete";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $all_heads[] = $row;
    }

    close_connection();

    return $all_heads;
}

function get_all_arms()
{
    open_connection();
    $all_arms = [];


    $sql = "SELECT * from bras";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $all_arms[] = $row;
    }

    close_connection();

    return $all_arms;
}

function get_all_bodies()
{
    open_connection();
    $all_bodies = [];


    $sql = "SELECT * from corps";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $all_bodies[] = $row;
    }

    close_connection();

    return $all_bodies;
}

function get_all_legs()
{
    open_connection();
    $all_legs = [];


    $sql = "SELECT * from jambes";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $all_legs[] = $row;
    }

    close_connection();

    return $all_legs;
}

function get_all_fonctionnalites()
{
    open_connection();

    $sql = "SELECT id, nom, description, prix
            FROM Fonctionnalites
            ORDER BY nom";

    $result = mysqli_query($GLOBALS['connection'], $sql);

    $fonctionnalites = mysqli_fetch_all($result, MYSQLI_ASSOC);

    close_connection();

    return $fonctionnalites;
}

function get_details_fonctionnalites_robot($id_robot)
{
    open_connection();

    $sql = "SELECT f.nom, rf.prix_applique
            FROM Robot_Fonctionnalites rf
            JOIN Fonctionnalites f
                ON f.id = rf.id_fonctionnalite
            WHERE rf.id_robot = ?
            ORDER BY f.nom";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_robot);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $fonctionnalites = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_stmt_close($stmt);
    close_connection();

    return $fonctionnalites;
}

function enregistrer_fonctionnalites_robot(
    $id_robot,
    $fonctionnalites
) {
    open_connection();

    $connection = $GLOBALS['connection'];

    mysqli_begin_transaction($connection);

    try {
        // Supprimer les anciennes associations
        $sql = "DELETE FROM Robot_Fonctionnalites
                WHERE id_robot = ?";

        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_robot);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Ajouter les fonctionnalités sélectionnées
        $sql = "INSERT INTO Robot_Fonctionnalites
                    (id_robot, id_fonctionnalite, prix_applique)
                SELECT ?, id, prix
                FROM Fonctionnalites
                WHERE id = ?";

        $stmt = mysqli_prepare($connection, $sql);

        foreach ($fonctionnalites as $id_fonctionnalite) {
            $id_fonctionnalite = (int)$id_fonctionnalite;

            mysqli_stmt_bind_param(
                $stmt,
                "ii",
                $id_robot,
                $id_fonctionnalite
            );

            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception(
                    "Impossible d'enregistrer une fonctionnalité."
                );
            }

            if (mysqli_stmt_affected_rows($stmt) !== 1) {
                throw new Exception(
                    "Fonctionnalité inconnue."
                );
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_commit($connection);

        close_connection();

        return true;
    } catch (Throwable $e) {
        mysqli_rollback($connection);
        close_connection();

        return false;
    }
}

function get_prix_pieces_robot($id_robot)
{
    open_connection();

    $sql = "
        SELECT
            b.prix AS prix_base,
            h.prix AS prix_tete,
            c.prix AS prix_corps,
            a.prix AS prix_bras,
            j.prix AS prix_jambes
        FROM Robots r
        JOIN Base b ON r.id_base = b.id
        JOIN Tete h ON r.id_tete = h.id
        JOIN Corps c ON r.id_corps = c.id
        JOIN Bras a ON r.id_bras = a.id
        JOIN Jambes j ON r.id_jambes = j.id
        WHERE r.id = ?
    ";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_robot);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $prix = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    close_connection();

    return $prix;
}

function get_fonctionnalites_robot($id_robot)
{
    open_connection();

    $sql = "SELECT id_fonctionnalite
            FROM Robot_Fonctionnalites
            WHERE id_robot = ?";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_robot);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $ids = [];

    while ($ligne = mysqli_fetch_assoc($result)) {
        $ids[] = (int)$ligne['id_fonctionnalite'];
    }

    mysqli_stmt_close($stmt);
    close_connection();

    return $ids;
}

function get_prix_fonctionnalites_robot($id_robot)
{
    open_connection();

    $sql = "
        SELECT COALESCE(SUM(prix_applique), 0) AS total
        FROM Robot_Fonctionnalites
        WHERE id_robot = ?
    ";

    $stmt = mysqli_prepare($GLOBALS['connection'], $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_robot);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $ligne = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    close_connection();

    return (float) $ligne['total'];
}

function supprimer_robot($id_robot, $id_client)
{
    open_connection();
    $connection = $GLOBALS['connection'];

    try {
        mysqli_begin_transaction($connection);

        // 1. Supprimer les fonctionnalités associées
        $sql = "DELETE FROM Robot_Fonctionnalites
                WHERE id_robot = ?";

        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_robot);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Erreur lors de la suppression des fonctionnalités.");
        }

        mysqli_stmt_close($stmt);

        // 2. Supprimer le robot uniquement s'il appartient au client
        $sql = "DELETE FROM Robots
                WHERE id = ? AND id_client = ?";

        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $id_robot, $id_client);

        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Erreur lors de la suppression du robot.");
        }

        $supprime = mysqli_stmt_affected_rows($stmt) === 1;

        mysqli_stmt_close($stmt);

        if (!$supprime) {
            throw new Exception("Robot introuvable ou accès refusé.");
        }

        mysqli_commit($connection);
        close_connection();

        return true;
    } catch (Throwable $e) {
        mysqli_rollback($connection);
        close_connection();

        return false;
    }
}
