<?php
session_start(); 
include_once '../config/connexion.php';
include_once '../entities/SessionConference.php';
include_once '../DAO/DAOSessionConference.php';

$per=new DAOSessionConference($db_instance);

// Si on veux créer une session.
if(isset($_POST['ajouter']))
{
 $confer = trim($_POST['conf']);
 $sessio = trim($_POST['sess']);
 $date = trim($_POST['date']);
 $etat = trim($_POST['etat']);

// On crée une nouvelle session.
$sessionConference = new SessionConference($confer,$sessio,$date,$etat); 

$per->ajoutSessionConference($sessionConference);
 $per->redirect('/conference/profile.php'); 
}


// Si on veux modifier une session.
elseif (isset($_POST['modifier'])) 
{
  
    $per->modifierSessionConference($sessionConference);
  
}

//recherche une session.
elseif(isset($_POST['recherche_sessionConference']))
{

    $per->rechercheSesConference($id_ses_conf);
 
}
//liste des sessions.
elseif(isset($_POST['liste_sessionsConference']))
{
 $per->listeSessionConferences();   
 
}

?>
