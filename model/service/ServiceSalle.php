<?php
session_start(); 
include_once '../config/connexion.php';
include_once '../entities/Salle.php';
include_once '../DAO/DAOSalle.php';



$sal=new DAOSalle($db_instance);

// Si on veux créer une salle.
if (isset($_POST['ajouter'])) 
	{	
		$nom_salle = $_POST['nomsalle'];
		$nbplaces = trim($_POST['nbplaces']);
		$type = trim($_POST['typesalle']);
		
		// On crée une nouvelle salle.
		$newSalle = new Salle($nom_salle,$nbplaces,$type);
		
        // On ajoute la nouvelle salle.
		$sal->ajoutSalle($newSalle);
        $sal->redirect('/conference/profile.php');
	}
// Si on veux modifier une salle.
elseif (isset($_POST['modifier_salle'])) 
	{
 
		$sal->modifierSalle($newSalle);		
		
 
	}

// Si on veux supprimer une salle.
elseif(isset($_POST['supprimer_salle']))
	{
		if(isset($_POST['id_salle']) && !empty($_POST['id_salle'])) // Si celui-ci existe.
			{
				$id_salle = mysql_real_escape_string($_POST['id_salle']);

				if($per->recherchePartiConference($id_salle))

				   $sal->supprimerSalle($id_salle);
			    else
				   $message = 'Cette Salle n\'existe pas !'; // S'il n'existe pas, on affichera ce message.

			}
		else
			{
				$message = 'Cette Salle n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
			}
	}

// Affichage d'une liste des salles 	
elseif (isset($_POST['liste_salle'])) 
	{ 
		$list_salle = $sal->listeSalles();
 
	}
	
?>
