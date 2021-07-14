<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {

    switch($_GET['action']){

        case "accueil":
            accueil();
            break;

// Partie connexion

        case "testConnexion":
            checkConnexion();
            break;

        case "destroySession":
            breakConnection();
            break;

        case "createAccount":
            data_creationAccount();
            break;

// Parties Consults

        case "myProjects":
            myProjects();
            break;   
        case "consultOneProject":
            //echo $_POST["input_2"];
            consultOneProject();
            break;

        case "myTickets":
            myTickets();
            break;
        
        case "consultOneTicket_View":
            consultOneTicket();
            break;



        case "modifyTicket":
            modifyTicket();
            break;
            
        case "myCustomers":
            myCustomers();
            break;  

        case "reports":
            reports();
            break; 

// Parties Actions 

        case "createTicket":
            data_createTicket();
            break;

        case "createTicketInProject":
            //echo $_POST["inputNumberProject"];
            data_createTicketInProject();
            break;

        case "createProject":
            data_createProject();
            break;

        case "modifyInformations":
            data_modifyInformations();
            break;
        
        case "addAccount":
            data_addAccount();
        break;

// Parties affichage forms

        case "form_createAccount":
            form_createAccountView();
            break;
        
        case "form_addAccount":
            form_addAccountView();
        break;

        case "form_createTicket":
            form_createTicketView();
            break;

        case "form_createTicketInProject":
            //echo $_POST["input_2"];
            form_createTicketInProjectView();
            break;

        case "form_createProject":
            form_createProjectView();
            break;


        case "form_modifyInformations":
            form_modifyInformationsView();
            break;

// Parties Informations

        case "myInformations":
            myInformations();
            break;

        case "aboutTicketManager":
            aboutTicketManager();
            break;

        case "consultOneUser_View":
            consultOneUser();
            break;

    }

} else {
    accueil();
}
