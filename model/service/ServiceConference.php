<?php
session_start();
include_once '../config/connexion.php';
include_once '../entities/Conference.php';
include_once '../DAO/DAOConference.php';




//Verification login 
// if($per->is_loggedin()!="")
// {                                           **Slotion 1: Normalement on doit ajoutet une classe de virify logine pour l'ajouter au debut de chaque page **
 // $per->redirect('index.php');				 **Slotion 2: ajouter Servicepersonne.php  a chaque page**
// }
$conf=new DAOConference($db_instance);

        $code = trim($_POST['code']);
		$libelle = trim($_POST['libelle']);
		$description = trim($_POST['description']);
		$salle = trim($_POST['salle']);				
		// On crée un nouveau conference.
		$newConf = new Conference($code, $libelle, $description, $salle);

// Si on veux créer un conference.
if (isset($_POST['ajouter'])) 
	{  	
        // On ajoute le nouveau conference.
		$conf->ajoutConference($newConf);
		$conf->redirect('/conference/profile.php');

	}
	
	
// Si on veux modifier conference.
elseif (isset($_POST['modifier_conf'])) 
	{
 
		$sal->modifierConference($newConf);
			
 
	}
	
// Si on veux supprimer un conference.
elseif(isset($_POST['supprimer_conf']))
	{
		if(isset($_POST['id_conf']) && !empty($_POST['id_conf'])) // Si celui-ci existe.
			{
				$id_conf = mysql_real_escape_string($_POST['id_conf']);
				$sal->supprimerConference($id_conf);
			}
		else
			{
				$message = 'Ce conference n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
			}
	}

	
// Affichage d'une liste des conferences 	
elseif (isset($_POST['liste_conf'])) 
	{
 
		$list_conf = $sal->listeConferences();
 
	}	
	
	
?>

