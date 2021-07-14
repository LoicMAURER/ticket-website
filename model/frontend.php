<?php

require("model/Utilisateurs.php");
require("model/Projet.php");
require("model/Ticket.php");
require("model/Contenu.php");

class BDD{
    private $host;
    private $dbname;
    private $user;
    private $password;

    function __construct() {
        $this->host = "10.0.7.1";
        $this->port = 3306;
        $this->dbname = "projet_ticketing";
        $this->user = "adminFLNL";
        $this->password = "flnl741devops";
    }

    function connexion()
    {
        try{
        $db = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname","$this->user","$this->password");
        }
        catch (Exception $e){
            die('Erreur connexion base de donnée: ' . $e->getMessage());
        }
    return $db;
    }

    function deconnexion($db)
    {
        $db=null;
    }
}

//MODIFIER §§§§§§§§§§§§§§
function affichageAcceuil($idUser){

    $bdd=new BDD();
    $db=$bdd->connexion();

    try{
        
        if($_SESSION["is_type"]=="admin" || $_SESSION["is_type"]=="report"){       
            $multiCount = $db->prepare('SELECT 
                                    (SELECT COUNT(*) FROM ticket) as countTicket,
                                    (SELECT COUNT(*) FROM projet) as countProject;');

            $multiCount->execute();
            $data=$multiCount->fetch();
            return $data;
        }
        else{
            $multiCount = $db->prepare('SELECT 
                                    (SELECT COUNT(*) FROM ticket WHERE idClient=?) as countTicket,
                                    (SELECT COUNT(*) FROM projet WHERE idClient=?) as countProject;');
            $multiCount->execute(array($idUser,$idUser));
            $data=$multiCount->fetch();
            return $data;
        }
        

    }
    catch (Exception $e){
        die('Erreur requête base de donnée: ' . $e->getMessage());
    }
}
//FIN MODIF


// Création d'un utilisateur
function createUser($name, $shortName, $email, $password){

    $bdd=new BDD();
    $db=$bdd->connexion();

    try{
        
        $verify_mail = $db->prepare('select count(*) as nbr from utilisateur where emailUtilisateur = ?');
        $verify_mail->execute(array($email));
        $data = $verify_mail->fetch();

        if($data["nbr"] == 1){
            echo 'Un comtpe est déjà créé avec cette adresse mail !';
            return false;
        }
        else{
            $res = $db->prepare('insert into utilisateur values (?,?,?,?,?,?)');
            $res->execute(array(0, $name, $shortName, $email, $password, 1));
            $data = $res->fetch();
        } 
    }
    catch (Exception $e){
        die('Erreur requête base de donnée: ' . $e->getMessage());
    }
}

function addUser($name, $shortName, $email, $password, $status){

    $bdd=new BDD();
    $db=$bdd->connexion();

    try{
        
        $verify_mail = $db->prepare('select count(*) as nbr from utilisateur where emailUtilisateur = ?');
        $verify_mail->execute(array($email));
        $data = $verify_mail->fetch();

        if($data["nbr"] == 1){
            echo 'Un comtpe est déjà créé avec cette adresse mail !';
            return false;
        }
        else{
            $res = $db->prepare('insert into utilisateur values (?,?,?,?,?,?)');
            $res->execute(array(0, $name, $shortName, $email, $password, $status));
            $data = $res->fetch();
        } 

    }
    catch (Exception $e){
        die('Erreur requête base de donnée: ' . $e->getMessage());
    }
}



/// Modifier un ticket
function modifyTicketModel($id, $description, $status){

    $date = date("Y-m-d");
    $id=(int)$id;
    $bdd=new BDD();
    $db=$bdd->connexion();

        try{   
            $add_ticket = $db->prepare('UPDATE Ticket SET description=?, etat=? WHERE idTicket=? ');
            $add_ticket->execute(array($description, $status, $id));

        }
        catch (Exception $e){
            die('Erreur requête base de donnée: ' . $e->getMessage());
        }
} 

function creation_Project($title, $description, $clientNumber){

    $date = date("Y-m-d");

    $bdd=new BDD();
    $db=$bdd->connexion();

    try{   
        $add_ticket = $db->prepare('insert into projet values (?,?,?,?,?,?)');
        $add_ticket->execute(array(0,$title,$description,$date,$_SESSION['is_id'],$clientNumber));
        $data = $add_ticket->fetch();
    }
    catch (Exception $e){
        die('Erreur requête base de donnée: ' . $e->getMessage());
    }
}


function modifyMyInformations($email, $password){

    $bdd=new BDD();
    $db=$bdd->connexion();

    try{   
        $modifyInfos = $db->prepare('UPDATE utilisateur SET emailUtilisateur = ?, mdpUtilisateur = ? WHERE idUtilisateur = ?');
        $modifyInfos->execute(array($email, $password, $_SESSION['is_id']));
        return $modifyInfos;
    }
    catch (Exception $e){
        die('Erreur requête base de donnée: ' . $e->getMessage());
    }

}

/*
if(isset($_POST['connectAccount'])) { 
    connexionUser();
}
if(isset($_POST['createAccount'])) { 
    createUser();
}
if(isset($_POST['createTicket'])){
    createTicket();
}
if(isset($_POST['createProject'])){
    createProject();
}
*/