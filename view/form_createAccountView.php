<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>MyTicket</title>
    <script type='text/javascript' src='view\js\fonctions.js'></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <link rel="icon" href="public/images/ticket.png" />

    <!-- Bootstrap core CSS -->
    <link href="public\css\bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public\css\signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    
    <form class="form-signin2" method="POST" action="index.php?action=createAccount">
      
      <a href="index.php"><img class="mb-4" src="public/images/ticket.png" alt="" width="90" height="90"></a>
      <h1 class="h3 mb-3 font-weight-normal" id="connexion">Création de compte</h1>
      
      <label for="inputEmail" class="sr-only">Nom</label>
      <input type="text" id="nom" name="inputName" class="form-control" placeholder="Nom" required autofocus><br>
      
      <label for="inputEmail" class="sr-only">Prénom</label>
      <input type="text" id="prenom" name="inputShortName" class="form-control" placeholder="Prénom" required autofocus><br>
      
      <label for="inputEmail" class="sr-only">Adresse mail</label>
      <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Adresse mail" required autofocus><br>
      
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input onkeyup='testMDPCaracteristiques()' type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required pattern=".{8,}"><br>
      
      
      <label for="inputPassword" class="sr-only">Confirmer mot de passe</label>
      <input onkeyup='testMDPIdentique()' type="password" id="inputPassword2" class="form-control" placeholder="Confirmer mot de passe" required>

      <label id='txtErreurLongueur'></label>
      <label id='txtErreurIdentique'></label>
      
      <button id="btnCreateAccount" class="btn btn-lg btn-primary btn-block" type="submit" name="createAccount">Créer compte</button>
      <p class="mt-5 mb-3 text-muted">&copy; Made by Groupe 4</p>
  
    </form>
  </body>
</html>
