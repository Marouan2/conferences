<?php
session_start(); 
include_once '../config/connexion.php';
include ("../entities/Personne.php");
include ("../DAO/DAOPersonne.php");




$per=new DAOPersonne($db_instance);

//$id_per = $_GET['delete_id'];
//Verification login
// if($per->is_loggedin()!="")
// {
//  $per->redirect('/conference/index.php');
// }

//Déconnexion personne
if (isset($_GET['deconnexion']))
{
  $per->logout();
  $per->redirect('index.php');
}

// Si on a voulu créer une personne.  
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$sexe= trim($_POST['sexe']);
	$nom= trim($_POST['nom']);
	$prenom= trim($_POST['prenom']);
	$email = trim($_POST['email']);
	$tel= trim($_POST['tel']);
	$fonction= trim($_POST['fonction']);
    

  $newpersonne = new Personne($username,$password,$sexe,$nom,$prenom,$email,$tel,$fonction); // On crée un nouveau personnage.
  if (isset($_POST['ajouter'])) 
{
  if ($per->verifyMail($email))
  {
    $message = 'Le mail choisi est invalide.';
   }

  else
  {
    $per->ajoutPersonne($newpersonne);
    $per->redirect('/conference/profile.php');
  }
}
elseif (isset($_POST['supprimer'])) 
{
   $delete_id = $_GET['delete_id'];
    $per->supprimerPersonne($delete_id);
    $per->redirect('profile.php');
}
// Si on a voulu modifier une personne.
elseif (isset($_POST['modifier'])) 
{
  if ($per->verifyMail($email)) // Si celui-ci existe.
  {
    $edit_id = $_GET['edit_id'];
    $edit_id= $_POST['edit_id'];
    $per->modifierPersonne($edit_id);
    $per->redirect('/conference/profile.php');
  }
  else
  {
    $message = 'Ce personnage n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
  }
}




//recherche personne
elseif(isset($_POST['recherche_per']))
{

    //$per->recherchePersonne($id_per);
 
}

//liste personnes
elseif(isset($_POST['liste_per']))
{

 $per->listePersonnes();

}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    
    <meta charset="utf-8" />
  </head>
  <body>
   <!--  <p>Nombre de personnages créés : <?= $manager->count() ?></p> -->
<?php
if (isset($message)) // On a un message à afficher ?
{
  echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
}
?>
