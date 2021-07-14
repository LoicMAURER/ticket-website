<?php

class Projet{
    private $numProjet;
    private $nomProjet;
    private $descriptionProjet;
    private $categorieProjet;



    function getInfoOneProject($idValue){
    	
	    $idValue=(int)($idValue);
	    $bdd=new BDD();
        $db=$bdd->connexion();
	    $getProject = $db->prepare('SELECT idTicket, dateCreation, titreTicket, etat FROM contenu NATURAL JOIN ticket WHERE idProjet=?;');
	    $getProject->execute(array($idValue));
	    return $getProject;
	    exit;
	}


    //Consulter liste des projets en fonction de l'utilisateurs


    function filterDate($dateTicket){        
        /* Set de la date en fonction des filtres */
        $currentDate = date("Y-m-d"); // Recupère la date courante

        if($dateTicket=="lessThanWeek"){
            $dateTicket = date('Ymd', strtotime('-7 day')); //Soustrait 7 jours à la date courante
        }
        elseif($dateTicket=="lessThanMonth"){
            $dateTicket = date('Ymd', strtotime('-30 day')); //Soustrait 30 jours à la date courante
        }
        elseif($dateTicket=="today"){
            $dateTicket=$currentDate;
        }
        return $dateTicket;
    }

    //Obtenir tout les Projets pour un admin ou un rapporteur
    function getAllProject($dateTicket){
 

	    $bdd=new BDD();
        $db=$bdd->connexion();
	    $currentDate = date("Y-m-d"); // Recupère la date courante
	    $dateTicket=$this->filterDate($dateTicket);  
	        
	    /* Si il veux afficher toutes les dates et tous les statuts*/

	    if($dateTicket=="all"){
	           try{   
	                $getAll_ticket = $db->prepare('SELECT * FROM Projet JOIN Utilisateur ON Projet.idClient=Utilisateur.idUtilisateur ORDER BY dateProjet DESC;');
	                $getAll_ticket->execute();
	                return $getAll_ticket;
	            }
	            catch (Exception $e){
	                die('Erreur requête base de donnée: ' . $e->getMessage());
	            }
	        exit;
	    }

	    /* Si il veux afficher tout les status*/

	    else{
	           try{   
	            $getAll_ticket = $db->prepare('SELECT * FROM Projet JOIN Utilisateur ON Projet.idClient=Utilisateur.idUtilisateur WHERE dateProjet>=? AND dateProjet<=? ORDER BY dateProjet DESC;');
	            $getAll_ticket->execute(array($dateTicket, $currentDate));
	            return $getAll_ticket;
	            }
	            catch (Exception $e){
	                die('Erreur requête base de donnée: ' . $e->getMessage());
	            }
	        exit;
	    }
    
	}

	//Obtenir tous les projet liés à un client
	function getAllProjectClient($dateTicket, $idUser){
 

	    $bdd=new BDD();
        $db=$bdd->connexion();
	    $currentDate = date("Y-m-d"); // Recupère la date courante
	    $dateTicket=$this->filterDate($dateTicket);  
	        
	    /* Si il veux afficher toutes les dates*/

	    if($dateTicket=="all"){
	           try{   
	                $getAll_ticket = $db->prepare('SELECT * FROM Projet JOIN Utilisateur ON Projet.idClient=Utilisateur.idUtilisateur WHERE idClient=? ORDER BY dateProjet DESC;');
	                $getAll_ticket->execute(array($idUser));
	                return $getAll_ticket;
	            }
	            catch (Exception $e){
	                die('Erreur requête base de donnée: ' . $e->getMessage());
	            }
	        exit;
	    }

	    else{
	           try{   
	            $getAll_ticket = $db->prepare('SELECT * FROM Projet JOIN Utilisateur ON Projet.idClient=Utilisateur.idUtilisateur WHERE idClient=? AND dateProjet>=? AND dateProjet<=? ORDER BY dateProjet DESC;');
	            $getAll_ticket->execute(array($idUser, $dateTicket, $currentDate));
	            return $getAll_ticket;
	            }
	            catch (Exception $e){
	                die('Erreur requête base de donnée: ' . $e->getMessage());
	            }
	        exit;
	    }
    
	}


    //Créer un projet

}

?>