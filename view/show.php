<?php

	try{

      $bdd = new PDO('mysql:host=localhost; dbname=projet_ticketing; charset=utf8', 'root', 'root');
  }
    catch(exception $e) {
      die('Erreur '.$e->getMessage());
  }
	
  if(isset($_POST['nom']) && !empty($_POST['nom'])){
    
      
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      
      $requeteNbTicketCollab = $bdd->query('SELECT COUNT(idTicket) AS nbTicket FROM Utilisateur AS U, Ticket AS T WHERE U.idUtilisateur = T.idClient AND U.nomUtilisateur =\''.$nom.'\' AND U.prenomUtilisateur = \''.$prenom.'\'');
      $requeteNbTicketCollabResolu = $bdd->query('SELECT COUNT(idTicket) AS nbTicket FROM Utilisateur AS U, Ticket AS T WHERE U.idUtilisateur = T.idClient AND U.nomUtilisateur =\''.$nom.'\' AND U.prenomUtilisateur = \''.$prenom.'\' AND T.etat=\'finish\'');
      $requeteNbTicketCollabNonRes = $bdd->query('SELECT COUNT(idTicket) AS nbTicket FROM Utilisateur AS U, Ticket AS T WHERE U.idUtilisateur = T.idClient AND U.nomUtilisateur =\''.$nom.'\' AND U.prenomUtilisateur = \''.$prenom.'\' AND T.etat<>\'finish\'');

      
      $nbTicketCollab = $requeteNbTicketCollab->fetch();
      $nbTicketCollabResolu = $requeteNbTicketCollabResolu->fetch();
      $nbTicketCollabNonRes = $requeteNbTicketCollabNonRes->fetch();
      
      echo "<p>"."Nombre de tickets total généré par le collaborateur : ".$nbTicketCollab['nbTicket']."</p>";
      echo "<p>"."Nombre de tickets résolu généré par le collaborateur : ".$nbTicketCollabResolu['nbTicket']."</p>";
      echo "<p>"."Nombre de tickets non resolu généré par le collaborateur : ".$nbTicketCollabNonRes['nbTicket']."</p>";
  }

?>