<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="<?= URL ?>/view/css/connexion.css">
</head>

<body>
    <h1>Créer un compte</h1>
    <p> <?= $msg ?> </p>
    <form method="POST" action="">

        <img src="<?= URL ?>/view/img/logoNeo.png" alt="" width="50px" height="60px">
        <label>Pseudo</label>
        <input type="text" name="pseudo" value="<?= $username ?>">

        <label>Email</label>
        <input type="email" name="email" placeholder="exemple@gmail.com" required value="<?= $email ?>">

        <label>Mot de passe</label>
        <input type="password" name="mdp" required>

        <button id="submit" type="submit" name="update" value="S'inscrire">S'inscrire</button>
        <a href="<?= URL ?>?action=login">J'ai déjà un compte</a>
    </form>
    <br>
</body>

</html>