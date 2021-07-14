<?php

class Contenu{
    private $idProjet;
    private $idTicket;


    function addTicketToProject($idProjet, $idTicket){
        $bdd=new BDD();
        $db=$bdd->connexion();

            try{   
                $add_ticketToProject = $db->prepare('INSERT INTO contenu VALUES (?,?)');
                $add_ticketToProject->execute(array($idProjet, $idTicket));
            }
            catch (Exception $e){
                die('Erreur requête base de donnée: ' . $e->getMessage());
            }
	}

}
   