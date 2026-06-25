<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if (isset($_POST['vider'])) {
    $_SESSION['panier'] = [];
    header('Location: panier.php');
    exit;
}

if (isset($_GET['supprimer'])) {
    $id_produit = (int)$_GET['supprimer'];
    unset($_SESSION['panier'][$id_produit]);
    header('Location: panier.php');
    exit;
}

if (isset($_POST['modifier']) && isset($_POST['quantites'])) {
    foreach ($_POST['quantites'] as $id => $quantite) {
        $quantite = (int)$quantite;
        if ($quantite <= 0) {
            unset($_SESSION['panier'][$id]);
        } elseif (isset($_SESSION['panier'][$id])) {
            $_SESSION['panier'][$id]['quantite'] = $quantite;
        }
    }
    header('Location: panier.php');
    exit;
}

if (isset($_GET['acheter'])) {
    $id_produit = (int)$_GET['acheter'];
    header('Location: achatrobot.php');
    exit;
}

$total_articles = 0;
foreach ($_SESSION['panier'] as $article) {
    $total_articles += $article['quantite'];
}

$total_general = 0;
?>


<!DOCTYPE html>
<html>

<head>
    <title>Mon panier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .en-tete {
            background-color: #333;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
        }

        .en-tete a {
            color: white;
            margin-right: 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="en-tete">
        <a href="listerobots.php">Produits</a>
        <a href="panier.php">Panier (<?= $total_articles ?>)</a>
    </div>

    <h1>Mon panier</h1>

    <?php if (empty($_SESSION['panier'])): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <form method="post" action="">
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['panier'] as $id => $article):
                        $total_ligne = $article['prix'] * $article['quantite'];
                        $total_general += $total_ligne;
                    ?>
                        <tr>
                            <td><?= $article['nom'] ?></td>
                            <td><?= number_format($article['prix'], 2) ?> €</td>
                            <td>
                                <input type="number" name="quantites[<?= $id ?>]"
                                    value="<?= $article['quantite'] ?>" min="0" style="width: 60px;">
                            </td>
                            <td><?= number_format($total_ligne, 2) ?> €</td>
                            <td>
                                <a href="?supprimer=<?= $id ?>" onclick="return confirm('Supprimer cet article ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total">
                Total général : <?= number_format($total_general, 2) ?> €
            </div>

            <p>
                <input type="submit" name="modifier" value="Mettre à jour les quantités">
                <input type="submit" name="vider" value="Vider le panier" onclick="return confirm('Vider le panier ?')">
                <input type="submit" name="acheter" value="Valider vos achats">
            </p>
        </form>
    <?php endif; ?>
</body>

</html>