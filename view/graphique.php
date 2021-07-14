<?php
  
  try{

    $bdd = new PDO('mysql:host=localhost; dbname=projet_ticketing; charset=utf8', 'root', 'root');
  }
  catch(exception $e) {
    die('Erreur '.$e->getMessage());
  }

  //run sql query and store into variable
  $Rticket_en_cours = $bdd->query('SELECT COUNT(idTicket) AS nbTicket FROM Ticket AS T WHERE T.etat<>\'finish\'');
  $Rticket_fini = $bdd->query('SELECT COUNT(idTicket) AS nbTicket FROM Ticket AS T WHERE T.etat=\'finish\'');

  $data = array();

  $ticket_en_cours = $Rticket_en_cours->fetch();
  $ticket_fini = $Rticket_fini->fetch();

  echo "data: [".$ticket_en_cours['nbTicket'].",".$ticket_fini['nbTicket']."],";
?>