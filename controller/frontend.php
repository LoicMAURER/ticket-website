<?php
session_start();

//echo "test : " . $_SESSION["is_loged"]; // test de la variable log

//echo "identifiant : " . $_SESSION["is_id"];

require("model/frontend.php");

// Accueil du site 

function accueil(){
    if(isset($_SESSION["is_loged"]) and ($_SESSION["is_loged"] == true) ){ 
        $req=affichageAcceuil($_SESSION["is_id"]);
        require('view/accueilView.php');
    }else{

       require('view/signInView.php'); 
    }
    
}


function checkConnexion(){

    if(isset($_POST["inputEmail"]) and isset($_POST["inputPassword"])){
        $user=new Utilisateur();
        $user->connexionUser($_POST["inputEmail"], $_POST["inputPassword"]);
    }

    header("Location: index.php");

}

function breakConnection(){
    session_destroy();
    header("Location: index.php");
}

// Partie CONSULT

/*function myProjects()
{
    if(isset($_POST["dateCreation"])){
        $req=getAllProject($_POST["dateCreation"]); 
    }
    else{
        $req=getAllProject("all");
    
    }
    require('view/consultProjetsView.php'); 
}
*/

function myProjects()
{
    if(isset($_POST["dateCreation"])){

        switch($_SESSION["is_type"]){ //Switch en fonction du type de l'utilisateurs : administrateur / rapporteur / client
            case "admin": 
                $admin = new Administrateur((int)$_SESSION["is_id"]); //Creation d'un objet Administrateur pour avoir accès à ses méthodes
                $req=$admin->getMyProject($_POST["dateCreation"]); //Appel de la méthode getMyTicket de la class Administrateur
            break;

            case "client":
                $client = new Client((int)$_SESSION["is_id"]);
                $req=$client->getMyProject($_POST["dateCreation"]);
            break;

            case "report":
                $report = new Rapporteur((int)$_SESSION["is_id"]);
                $req=$report->getMyProject($_POST["dateCreation"]);
            break;
        }
    }
    else{

        switch($_SESSION["is_type"]){
            case "admin": 
                $admin = new Administrateur((int)$_SESSION["is_id"]);
                $req=$admin->getMyProject("all");
            break;

            case "client":
                $client = new Client((int)$_SESSION["is_id"]);
                $req=$client->getMyProject("all");
            break;

            case "report":
                $report = new Rapporteur((int)$_SESSION["is_id"]);
                $req=$report->getMyProject("all");
            break;
        }
    }

    require('view/consultProjetsView.php'); 
}

function consultOneProject(){
    if(isset($_POST["input_1"]) and isset($_POST["input_2"])){
        $projet=new Projet();
        $req=$projet->getInfoOneProject($_POST["input_1"]);
        $numProject=$_POST["input_1"];
        $numClient=$_POST["input_2"];
        //echo $numClient;
        require('view/consultOneProjet_View.php'); 
    }else{
        //require('view/consultOneProjet_View.php'); 
    }
}


//GESTION AFFICHAGE TICKETS

function myTickets()
{
    if(isset($_POST["statusTicket"]) and isset($_POST["dateCreation"])){

        switch($_SESSION["is_type"]){ //Switch en fonction du type de l'utilisateurs : administrateur / rapporteur / client
            case "admin": 
                $admin = new Administrateur((int)$_SESSION["is_id"]); //Creation d'un objet Administrateur pour avoir accès à ses méthodes
                $req=$admin->getMyTicket($_POST["statusTicket"], $_POST["dateCreation"]); //Appel de la méthode getMyTicket de la class Administrateur
            break;

            case "client":
                $client = new Client((int)$_SESSION["is_id"]);
                $req=$client->getMyTicket($_POST["statusTicket"], $_POST["dateCreation"]);
            break;

            case "report":
                $report = new Rapporteur((int)$_SESSION["is_id"]);
                $req=$report->getMyTicket($_POST["statusTicket"], $_POST["dateCreation"]);
            break;
        }
    }
    else{

        switch($_SESSION["is_type"]){
            case "admin": 
                $admin = new Administrateur((int)$_SESSION["is_id"]);
                $req=$admin->getMyTicket("all", "all");
            break;

            case "client":
                $client = new Client((int)$_SESSION["is_id"]);
                $req=$client->getMyTicket("all", "all");
            break;

            case "report":
                $report = new Rapporteur((int)$_SESSION["is_id"]);
                $req=$report->getMyTicket("all", "all");
            break;
        }
    }

    require('view/consultTicketsView.php'); 
}


function consultOneTicket(){
    if(isset($_POST["input_1"])){
        $ticket=new Ticket();
        $req=$ticket->getInfoOneTicket($_POST["input_1"]);
        require('view/consultOneTicket_View.php'); 
    }else{
        require('view/consultTicketsView.php'); 
    }
}


function modifyTicket(){
    if(isset($_POST["idTicket"]) and isset($_POST["inputDescriptionTicket"]) and isset($_POST["ticketStatus"])){
        $req = modifyTicketModel($_POST["idTicket"], $_POST["inputDescriptionTicket"], $_POST["ticketStatus"]); 
        header("Location: index.php");
    }   
    else{
        echo "Aucune modification prise en compte";
        header("Refresh: 2; url=view/index.php?action=myTicket");
    } 
}




function myCustomers()
{
    
   switch($_SESSION["is_type"]){ //Switch en fonction du type de l'utilisateurs : administrateur / rapporteur / client
            case "admin": 
                $admin = new Administrateur((int)$_SESSION["is_id"]); 
                $req=$admin->getMyCustumers($_SESSION["is_id"]); 
                require('view/consultCustomersView.php');  
            break;

            case "report":
                $report = new Rapporteur((int)$_SESSION["is_id"]);
                $req=$report->getMyCustumers($_SESSION["is_id"]);
                require('view/consultCustomersView.php');  
            break;

            case "client":
                if(isset($_SESSION["is_loged"]) and ($_SESSION["is_loged"] == true) ){ 
                $req=affichageAcceuil();
                require('view/accueilView.php');
                }
            break;
    }
    
}

function reports()
{

    require('view/report.php');
}

// Partie ACTIONS

function data_createTicket()
{
    if(isset($_POST["inputTitleTicket"]) and  isset($_POST["inputClientNumber"]) and  isset($_POST["inputDescriptionTicket"]) and isset($_POST["ticketDomain"]) and  isset($_POST["ticketStatus"]))
    {
        
        $ticket=new Ticket();
        $ticket->creation_tickets($_POST["inputTitleTicket"], $_POST["inputClientNumber"], $_POST["inputDescriptionTicket"], $_POST["ticketDomain"], $_POST["ticketStatus"],$_SESSION["is_id"]); 
        
    }

    header("Location: index.php");
 
}

function data_createTicketInProject()
{
    
    if(isset($_POST["inputNumberProject"]) and isset($_POST["inputTitleTicket"]) and isset($_POST["inputClientNumber"])and  isset($_POST["inputDescriptionTicket"]) and isset($_POST["ticketDomain"]) and isset($_POST["ticketStatus"]))
    {
        $ticket=new Ticket();
        $valeurTicket = $ticket->creation_tickets($_POST["inputTitleTicket"], $_POST["inputClientNumber"], $_POST["inputDescriptionTicket"], $_POST["ticketDomain"], $_POST["ticketStatus"],$_SESSION["is_id"]);
        $contenu=new Contenu();
        $contenu->addTicketToProject($_POST["inputNumberProject"], $valeurTicket);

    }

    header("Location: index.php");
 
}




function data_createProject()
{    
    if(isset($_POST["inputTitleProjet"]) and isset($_POST["inputDescriptionProjet"]) and isset($_POST["inputClientNumber"])){
        $req = creation_Project($_POST["inputTitleProjet"], $_POST["inputDescriptionProjet"], $_POST["inputClientNumber"]); 
    }
    
    header("Location: index.php");

}


function data_modifyInformations()  
{
    if(isset($_POST["inputEmail"]) and isset($_POST["inputPassword"])){
        $req = modifyMyInformations($_POST["inputEmail"], $_POST["inputPassword"]); 
    }
    
    header("Location: index.php");
}


function data_creationAccount()  
{
    if(isset($_POST["inputName"]) and isset($_POST["inputShortName"]) and isset($_POST["inputEmail"]) and isset($_POST["inputPassword"])){
        $req = createUser($_POST["inputName"], $_POST["inputShortName"], $_POST["inputEmail"], $_POST["inputPassword"]); 
    }
    
    header("Location: index.php");
}

function data_addAccount()
{
    if(isset($_POST["inputName"]) and isset($_POST["inputShortName"]) and isset($_POST["inputEmail"]) and isset($_POST["inputPassword"]) and isset($_POST["inputStatus"])){
        $req = addUser($_POST["inputName"], $_POST["inputShortName"], $_POST["inputEmail"], $_POST["inputPassword"], $_POST["inputStatus"]); 
    }
    header("Location: index.php");
}

// Parties Forms


function form_createAccountView(){
    require('view/form_createAccountView.php'); 
}

function form_modifyInformationsView()
{
    require('view/modifyMyInformationsView.php'); 
}

function form_createTicketInProjectView(){
    if(isset($_POST["input_1"]) and isset($_POST["input_2"])){ // Si il reçoit l'id du projet
        $projet=new Projet();
        $numProject=$_POST["input_1"];
        $numClient=$_POST["input_2"];
        //echo $numClient;
        require('view/creationTicketInProject.php'); 
    }else{
        //require('view/creationTicketInProject.php'); 
    }

}

function form_addAccountView(){
    require('view/addAccountView.php');
}

function form_createTicketView()
{
  
    require('view/creationTicketView.php'); 
}

function form_createProjectView()
{
  
    require('view/creationProjetView.php') ;
}




// Partie Informations 

function myInformations()
{
    //$req = consultationMyInformations(); 
  
    require('view/consultMyInformationsView.php'); 
}

function consultOneUser(){
    $user=new Utilisateur();
    $req=$user->consultInfoUser($_POST["input_1"]);
    require('view/consultOneUser_View.php'); 
}

function AboutTicketManager()
{
    //$req = about(); 
  
    require('view/consultAboutView.php'); 
}













/*


function requete_five()
{
    $req = requete_fifth($_POST['nomVille']); 

    require('view/requete_fifthView.php');  
}

*/


