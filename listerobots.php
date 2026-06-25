<?php

session_start();

// Initialiser le panier si inexistant
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}


// Liste des produits
$all_robots = [
    1 => ['nom' => 'Robot1', 'prix' => 899.99],
    2 => ['nom' => 'Robot2', 'prix' => 19.99],
    3 => ['nom' => 'Robot3', 'prix' => 89.50],
    4 => ['nom' => 'Robot4', 'prix' => 45.00]
];

// Ajouter un produit au panier
if (isset($_GET['ajouter'])) {
    $id_produit = (int)$_GET['ajouter'];
    if (isset($all_robots[$id_produit])) {
        // Si le produit existe déjà dans le panier, augmenter la quantité
        if (isset($_SESSION['panier'][$id_produit])) {
            $_SESSION['panier'][$id_produit]['quantite']++;
        } else {
            // Sinon, ajouter le produit avec quantité 1
            $_SESSION['panier'][$id_produit] = [
                'nom' => $all_robots[$id_produit]['nom'],
                'prix' => $all_robots[$id_produit]['prix'],
                'quantite' => 1
            ];
        }
    }
    header('Location: listerobots.php');
    exit;
}

// Calculer le nombre total d'articles
$total_articles = 0;
foreach ($_SESSION['panier'] as $article) {
    $total_articles += $article['quantite'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Notre boutique</title>
</head>

<body>
    <div class="en-tete">
        <a href="">Produits</a>
        <a href="panier.php">Panier (<?= $total_articles ?>)</a>
    </div>

    <h1>Nos produits</h1>

    <div id="achat-robot">
        <?php foreach ($all_robots as $id => $robot) : ?>
            <em><?= $robot['nom'] ?></em>
            <p><?= $robot['prix'] ?></p>
            <a href="?ajouter=<?= $id ?>">Ajouter au panier</a>
            <br>
        <?php endforeach; ?>
    </div>
</body>

</html>