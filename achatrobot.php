<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/sql_connection.php';

session_start();

if (!isset($_SESSION['client_id'])) {
    // Pas connecté -> redirection vers la page de connexion
    header('Location: ' . URL . '/?action=login');
    exit();
};

$idClient = $_SESSION['client_id'];
$pseudo = $_SESSION['pseudo'];

open_connection();

$all_robots = [];

$sql = "SELECT c.pseudo, r.nom, r.date_creation, a.date_achat FROM achats a INNER JOIN clients c ON a.id_client = c.id INNER JOIN robots r ON a.id_robot = r.id WHERE c.id = ? ORDER BY a.date_achat DESC ";

$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $idClient);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $all_robots[] = $row;
    return $all_robots;
}

close_connection()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/connexion.css">
</head>

<body>

    <!-- <h1>Acheter un robot</h1>

    <div class="card">
        <img src="./img/rendu-robot-final.png" alt="robot" width="200px" height="230px">
        <div class="actions">
            <br>
            <a href="#achat-robot">
                💲
                <span>Acheter ce robot</span>
            </a>
        </div>
    </div> -->

    <h2>Les robots que vous avez récemment achetés</h2>

    <div id="achat-robot">
        <?php foreach ($all_robots as $robot) : ?>
            <h3><?= $robot['pseudo'] ?></h3>
            <em><?= $robot['nom'] ?></em>
            <p><?= $robot['date_creation'] ?></p>
            <p><?= $robot['date_achat'] ?></p>
            <br>
        <?php endforeach; ?>
    </div>

    </table>
</body>

</html>