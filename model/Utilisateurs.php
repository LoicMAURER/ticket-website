<?php


class Utilisateur{
    protected $numUtilisateur;
    protected $nomUtilisateur;
    protected $prenomUtilisateur;
    protected $emailUtilisateur;
    protected $type;

    function __construct() {

    }

    //Se connecter

    function connexionUser($login, $pass){


        $bdd=new BDD();
        $db=$bdd->connexion();
        
            try{
                
                $res = $db->prepare('select count(*) as nbr from utilisateur where emailUtilisateur = ? and mdpUtilisateur = ?');

                $res->execute(array($login, $pass));
                $data = $res->fetch();
            
                if($data["nbr"] == 1){ // Teste si l'utilisateur existe 
                    $type = $db->prepare('select * from utilisateur where emailUtilisateur = ?');
                    $type->execute(array($login)); 
                    $resultType = $type->fetch();
                    switch($resultType["status"]){

                        case 0:
                            $_SESSION["is_loged"] = true;
                            $_SESSION["is_type"] = "admin";
                            $_SESSION["is_id"] = $resultType["idUtilisateur"];
                            $_SESSION["is_name"] = $resultType["nomUtilisateur"];
                            $_SESSION["is_short_name"] = $resultType["prenomUtilisateur"];
                            $_SESSION["is_mail"] = $resultType["emailUtilisateur"];
                        break;

                        case 1:
                            $_SESSION["is_loged"] = true;
                            $_SESSION["is_type"] = "client";
                            $_SESSION["is_id"] = $resultType["idUtilisateur"];
                            $_SESSION["is_name"] = $resultType["nomUtilisateur"];
                            $_SESSION["is_short_name"] = $resultType["prenomUtilisateur"];
                            $_SESSION["is_mail"] = $resultType["emailUtilisateur"];
                        break;

                        case 2:
                            $_SESSION["is_loged"] = true;
                            $_SESSION["is_type"] = "report";
                            $_SESSION["is_id"] = $resultType["idUtilisateur"];
                            $_SESSION["is_name"] = $resultType["nomUtilisateur"];
                            $_SESSION["is_short_name"] = $resultType["prenomUtilisateur"];
                            $_SESSION["is_mail"] = $resultType["emailUtilisateur"];
                        break;
                    }

                }

            }
            catch (Exception $e){
                die('Erreur requête base de donnée: ' . $e->getMessage());
            }
    }

    //Consulter ses informations

    function consultInfoUser($id){
        $bdd=new BDD();
        $db=$bdd->connexion();
        $getInfoUser = $db->prepare('SELECT * FROM Utilisateur WHERE idUtilisateur=?');
        $getInfoUser->execute(array($id));
        return $getInfoUser;
    }
    //Consulter, modifier ses informations

}

//Utilisateur avec des droits maximum
class Administrateur extends Utilisateur{


    function __construct($id) {
        parent::__construct($id);
        $bdd=new BDD();
        $db=$bdd->connexion();
        $getInfoUser = $db->prepare('SELECT * FROM Utilisateur WHERE idUtilisateur=?');
        $getInfoUser->execute(array($id));
        $data=$getInfoUser->fetch();

        $this->numUtilisateur = $id;
        $this->nomUtilisateur = $data['nomUtilisateur'];
        $this->prenomUtilisateur = $data['prenomUtilisateur'];
        $this->emailUtilisateur = $data['emailUtilisateur'];
        $this->mdpUtilisateur = $data['mdpUtilisateur'];
        $this->type = $data['status'];        
    }

    //Créer un administrateur

    //Créer un rapporteur

    //Créer un client

    function getMyCustumers($idCurrentUser){
        $bdd=new BDD();
        $db=$bdd->connexion();
        $getInfoUser = $db->prepare('SELECT distinct idUtilisateur, nomUtilisateur, prenomUtilisateur, emailUtilisateur, status FROM Utilisateur LEFT JOIN Ticket ON Utilisateur.idUtilisateur = Ticket.idClient WHERE Ticket.idCreateur=?');
        $getInfoUser->execute(array($idCurrentUser));
        return $getInfoUser;
    }

    //Créer, modifier, consulter un/plusieurs ticket (appel a la classe ticket)

    function getMyTicket($statusTicket, $dateTicket){
        $ticket=new Ticket();
        $toReturn = $ticket->getAllTicket($statusTicket, $dateTicket);
        return $toReturn;
    }

    function getMyProject($dateTicket){
        $projet=new Projet();
        $toReturn = $projet->getAllProject($dateTicket);
        return $toReturn;
    }


    //Créer, consulter un projet (appel a la classe projet)

}

//Utilisateur avec des droits moyen
class Rapporteur extends Utilisateur{

    function __construct($id) {
        parent::__construct($id);
        $bdd=new BDD();
        $db=$bdd->connexion();
        $getInfoUser = $db->prepare('SELECT * FROM Utilisateur WHERE idUtilisateur=?');
        $getInfoUser->execute(array($id));
        $data=$getInfoUser->fetch();

        $this->numUtilisateur = $id;
        $this->nomUtilisateur = $data['nomUtilisateur'];
        $this->prenomUtilisateur = $data['prenomUtilisateur'];
        $this->emailUtilisateur = $data['emailUtilisateur'];
        $this->mdpUtilisateur = $data['mdpUtilisateur'];
        $this->type = $data['status'];        
    }
    //Créer un client ; consulter un client

    function getMyCustumers($idCurrentUser){
        $bdd=new BDD();
        $db=$bdd->connexion();
        $getInfoUser = $db->prepare('SELECT distinct idUtilisateur, nomUtilisateur, prenomUtilisateur, emailUtilisateur, status FROM Utilisateur LEFT JOIN Ticket ON Utilisateur.idUtilisateur = Ticket.idClient WHERE Ticket.idCreateur=?');
        $getInfoUser->execute(array($idCurrentUser));
        return $getInfoUser;
    }

    //Créer, modifier, consulter un ticket (appel a la classe ticket)

    function getMyTicket($statusTicket, $dateTicket){
        $ticket=new Ticket();
        $toReturn = $ticket->getAllTicketClient($statusTicket, $dateTicket);
        return $toReturn;
    }

    function getMyProject($dateTicket){
        $projet=new Projet();
        $toReturn = $projet->getAllProject($dateTicket);
        return $toReturn;
    }

    //Créer, consulter un projet (appel a la classe projet)



}

//Utilisateur avec des droits faible
class Client extends Utilisateur{

    function __construct($id) {
        parent::__construct($id);
        $bdd=new BDD();
        $db=$bdd->connexion();
        $getInfoUser = $db->prepare('SELECT * FROM Utilisateur WHERE idUtilisateur=?');
        $getInfoUser->execute(array($id));
        $data=$getInfoUser->fetch();

        $this->numUtilisateur = $id;
        $this->nomUtilisateur = $data['nomUtilisateur'];
        $this->prenomUtilisateur = $data['prenomUtilisateur'];
        $this->emailUtilisateur = $data['emailUtilisateur'];
        $this->mdpUtilisateur = $data['mdpUtilisateur'];
        $this->type = $data['status'];        
    }
    //Créer son compte

    //Créer, modifier, consulter un ticket (appel a la classe ticket)

    function getMyTicket($statusTicket, $dateTicket){
        $idUser = $this->numUtilisateur;
        $ticket=new Ticket();
        $toReturn = $ticket->getAllTicketClient($statusTicket, $dateTicket, $idUser);
        return $toReturn;
    }

    function getMyProject($dateTicket){
        $idUser = $this->numUtilisateur;
        $projet=new Projet();
        $toReturn = $projet->getAllProjectClient($dateTicket, $idUser);
        return $toReturn;
    }

    //Créer, consulter un projet (appel a la classe projet)

}

?>