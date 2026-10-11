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

        <img src="./img/logo neobot.png" alt="" width="50px" height="60px">
        <h2>NEOBOT</h2>
        <label>Pseudo</label>
        <input type="text" name="pseudo" value="<?= $username ?>"><br><br>

        <label>Email</label>
        <input type="email" name="email" placeholder="exemple@gmail.com" required value="<?= $email ?>"><br><br>

        <label>Mot de passe</label>
        <input type="mdp" name="mdp" required><br><br>

        <input id="submit" type="submit" name="update" value="S'inscrire">
        <a href=<?= URL ?>"?action=login">J'ai déjà un compte</a>
    </form>
    <br>
</body>

</html>