<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Nicolas Devlaeminck, Loic Maurer, Florian Bertin, Lilian Laureau">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Sign in : Ticket Manager</title>
    <script type="text/javascript" src="signInScript.js"></script>
    <link rel="icon" href="public/images/ticket.png" />
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.css" rel="stylesheet"> <!-- a delete -->
  <link href="public\css\bootstrap.css" rel="stylesheet">
  <link href="public\css\dashboard.css" rel="stylesheet">

    </style>
    <!-- Custom styles for this template -->
    <link href="public\css\signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <form class="form-signin" method="POST" action="index.php?action=testConnexion">

      <img class="mb-4" src="public/images/ticket.png" alt="" width="90" height="90">
      <h1 class="h3 mb-3 font-weight-normal" id="connexion">Connexion</h1>
      
      <label for="inputEmail" class="sr-only">Adresse mail</label>
      <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Adresse mail" required autofocus>
      
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="connectAccount">Se connecter</button>
      
      <p class="mt-3 textSignIn" >Vous n'avez pas de compte ! <a href="index.php?action=form_createAccount">Cliquez ici</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; Made in Groupe 4</p>   

    </form>

    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-muted">Vous êtes client contacter un administrateur</span>
      </div>
    </footer>

  </body>
</html>
