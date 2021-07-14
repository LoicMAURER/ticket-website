<?php

class Ticket{
    private $numTicket;
    private $dateTicket;
    private $titreTicket;
    private $descriptionTicket;
    private $statusTicket;

    //Consulter liste des ticket en fonction de l'utilisateurs

    /// Création d'un ticket
    function creation_tickets($title, $idClient, $description, $domain, $status,$idCreateur){

        $date = date("Y-m-d");
        $idClient=(int)$idClient;
        $bdd=new BDD();
        $db=$bdd->connexion();

            try{   
                $add_ticket = $db->prepare('INSERT INTO ticket VALUES (?,?,?,?,?,?,?,?)');
                $add_ticket->execute(array(0,$title,$domain,$description,$status,$date,$idCreateur,$idClient));
                return $db->lastInsertId();
            }
            catch (Exception $e){
                die('Erreur requête base de donnée: ' . $e->getMessage());
            }
    }



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

    function getInfoOneTicket($idValue){
        $idValue=(int)($idValue);
        $bdd=new BDD();
        $db=$bdd->connexion();
        $getTicket = $db->prepare('SELECT idTicket, titreTicket, description FROM ticket WHERE idTicket=?;');
        $getTicket->execute(array($idValue));
        return $getTicket;
        exit;
    }

    function getAllTicket($statusTicket, $dateTicket){
 
        $bdd=new BDD();
        $db=$bdd->connexion();
        $currentDate = date("Y-m-d"); // Recupère la date courante
        $dateTicket=$this->filterDate($dateTicket);
            
        /* Si il veux afficher toutes les dates et tous les statut*/

        if($dateTicket=="all" && $statusTicket=="all"){
               try{   
                    $getAll_ticket = $db->prepare('SELECT * FROM Ticket JOIN Utilisateur ON Ticket.idClient=Utilisateur.idUtilisateur WHERE etat<>"finish" ORDER BY dateCreation DESC;');
                    $getAll_ticket->execute();
                    return $getAll_ticket;
                }
                catch (Exception $e){
                    die('Erreur requête base de donnée: ' . $e->getMessage());
                }
            exit;
        }

        /* Si il veux afficher tout les status*/

        elseif($statusTicket=="all" && $dateTicket!="all"){
               try{   
                $getAll_ticket = $db->prepare('SELECT * FROM Ticket JOIN Utilisateur ON Ticket.idClient=Utilisateur.idUtilisateur WHERE dateCreation>=? AND dateCreation<=? AND etat<>"finish" ORDER BY dateCreation DESC;');
                $getAll_ticket->execute(array($dateTicket, $currentDate));
                return $getAll_ticket;
                }
                catch (Exception $e){
                    die('Erreur requête base de donnée: ' . $e->getMessage());
                }
            exit;
        }

     

        /* Si il veux afficher toutes les dates*/

        elseif($dateTicket=="all" && $statusTicket!="all"){
               try{   
                $getAll_ticket = $db->prepare('SELECT * FROM Ticket JOIN Utilisateur ON Ticket.idClient=Utilisateur.idUtilisateur WHERE etat=? ORDER BY dateCreation DESC;');
                $getAll_ticket->execute(array($statusTicket));
                return $getAll_ticket;
                }
                catch (Exception $e){
                    die('Erreur requête base de donnée: ' . $e->getMessage());
                }
            exit;
        }

        /*En cas d'affichage entièrement filtré */
        else{
            try{   
                $getAll_ticket = $db->prepare('SELECT * FROM Ticket JOIN Utilisateur ON Ticket.idClient=Utilisateur.idUtilisateur WHERE etat=? AND dateCreation>=? AND dateCreation<=? ORDER BY dateCreation DESC;');
                $getAll_ticket->execute(array($statusTicket, $dateTicket, $currentDate));
                return $getAll_ticket;
            }
            catch (Exception $e){
                die('Erreur requête base de donnée: ' . $e->getMessage());
            }
        }
        exit;
    }

    
    function getAllTicketClient($statusTicket, $dateTicket, $idUser){
 
        $bdd=new BDD();
        $db=$bdd->connexion();
        $currentDate = date("Y-m-d"); // Recupère la date courante
        $dateTicket=$this->filterDate($dateTicket);
            
        /* Si il veux afficher toutes les dates et tous les statut*/

        if($dateTicket=="all" && $statusTicket=="all"){
               try{   
                    $getAll_ticket = $db->prepare('SELECT * FROM Ticket JOIN Utilisateur ON Ticket.idClient=Utilisateur.idUtilisateur WHERE idClient=? AND etat<>"finish" ORDER BY dateCreation DESC;');
                    $getAll_ticket->execute(array($idUser));
                    return $getAll_ticket;
                }
                catch (Exception $e){
                    die('Erreur requête base de donnée: ' . $e->getMessage());
                }
            exit;
        }

        /* Si il veux afficher tout les status*/

        elseif($statusTicket=="all" && $dateTicket!="all"){
               try{   
                $getAll_ticket = $db->prepare('SELECT * FROM Ticket JOIN Utilisateur ON Ticket.idClient=Utilisateur.idUtilisateur WHERE idClient=? AND dateCreation>=? AND dateCreation<=? AND etat<>"finish" ORDER BY dateCreation DESC;');
                $getAll_ticket->execute(array($idUser, $dateTicket, $currentDate));
                return $getAll_ticket;
                }
                catch (Exception $e){
                    die('Erreur requête base de donnée: ' . $e->getMessage());
                }
            exit;
        }

     

        /* Si il veux afficher toutes les dates*/

        elseif($dateTicket=="all" && $statusTicket!="all"){
               try{   
                $getAll_ticket = $db->prepare('SELECT * FROM Ticket JOIN Utilisateur ON Ticket.idClient=Utilisateur.idUtilisateur WHERE idClient=? AND etat=? ORDER BY dateCreation DESC;');
                $getAll_ticket->execute(array($idUser, $statusTicket));
                return $getAll_ticket;
                }
                catch (Exception $e){
                    die('Erreur requête base de donnée: ' . $e->getMessage());
                }
            exit;
        }

        /*En cas d'affichage entièrement filtré */
        else{
            try{   
                $getAll_ticket = $db->prepare('SELECT * FROM Ticket JOIN Utilisateur ON Ticket.idClient=Utilisateur.idUtilisateur WHERE idClient=? AND etat=? AND dateCreation>=? AND dateCreation<=? ORDER BY dateCreation DESC;');
                $getAll_ticket->execute(array($idUser, $statusTicket, $dateTicket, $currentDate));
                return $getAll_ticket;
            }
            catch (Exception $e){
                die('Erreur requête base de donnée: ' . $e->getMessage());
            }
        }
        exit;
    }

    //Consulter liste des ticket en fonction d'un projet

    //Créer un ticket

    //Modifier un ticket

}

?>