   <!DOCTYPE html>
   <html>

   <head>
       <title>Page de connexion NeoBot</title>
       <link rel="stylesheet" href="<?= URL ?>/view/css/connexion.css">
   </head>

   <body>
       <h1>Bienvenue sur NeoBot</h1>
       <p> <?= $error_msg ?> </p>

       <form method="POST" action="">
           <img src="<?= URL ?>/view/img/logoNeo.png" alt="" width="50px" height="60px">

           <label>Pseudo</label>
           <input class="input" type="text" name="pseudo" value="<?= $username ?>">

           <label>Mot de passe</label>
           <input class="input" type="password" name="mdp">

           <button id="submit" name="update" value="Se connecter">Se connecter</button>
           <a href="<?= URL ?>/?action=signin">Créer un compte</a>
       </form>

   </body>

   </html>