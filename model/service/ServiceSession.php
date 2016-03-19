<?php
session_start(); 
include_once '../config/connexion.php';
include_once '../entities/Session.php';
include_once '../DAO/DAOSession.php';

$ses=new DAOSession($db_instance);

// Si on veux créer une session.
if(isset($_POST['ajouter']))
{
 $libelle = trim($_POST['libelle']);
 $datesession = $_POST['datesession'];
 $description = trim($_POST['description']);


// On crée une nouvelle session.
$newsession = new Session($libelle,$datesession,$description); 

$ses->ajoutSession($newsession);
$ses->redirect('/conference/profile.php');
  
}


// Si on veux modifier une session.
elseif (isset($_POST['modifier'])) 
{
  
    $ses->modifierSession($newsession);
  
}

elseif(isset($_POST['supprimer']))
{
    $delete_ses = $_GET['delete_ses'];
    $ses->supprimerSession($delete_ses);
    $ses->redirect('/conference/profile.php');
}

//recherche une session.
elseif(isset($_POST['recherche_session']))
{

    $ses->rechercheSession($id_session);
 
}
//liste des sessions.
elseif(isset($_POST['liste_sessions']))
{
 $ses->listeSessions();   
 
}

?>

