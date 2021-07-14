<?php
  
  try{
      $bdd = new PDO('mysql:host=localhost; dbname=projet_ticketing; charset=utf8', 'root', 'root');
  }
    catch(exception $e) {
      die('Erreur '.$e->getMessage());
    }


  if(isset($_POST['search']) && !empty($_POST['search'])){

      $search = $_POST['search'];
      
      $reponse = $bdd->query("SELECT nomUtilisateur, prenomUtilisateur FROM Utilisateur WHERE nomUtilisateur LIKE '$search%'");

      while ($donnees = $reponse->fetch()){
        echo "<li><a href='#'>",$donnees['nomUtilisateur']," ",$donnees['prenomUtilisateur'],"</a></li>";
      }
    }
?>