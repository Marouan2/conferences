  <?php
  include_once 'model/config/connexion.php';
  include_once 'model/entities/ParticiperConference.php';
  include_once 'model/DAO/DAOParticiperConference.php';

  session_start(); 


  $per=new DAOParticiperConference($db_instance);

  // Si on veux créer un participant.
  if(isset($_POST['ajouter']))
  {
   $id_participe = trim($_POST['id_participe']);
   $id_personne = trim($_POST['personne']);
   $id_sesconf = trim($_POST['session_conference']);
   $typeParticipant = trim($_POST['typeParticipant']);
   $date_pconf = trim($_POST['date_pconf']);

  // On crée un nouveau un participant.
  $participerConference = new ParticiperConference($id_personne,$id_sesconf,$typeParticipant,$date_pconf); 

  $per->ajoutPartiConference($participerConference);
    
  }

  // Si on veux modifier un participant.
  elseif (isset($_POST['modifier'])) 
  {
    
      $per->modifierPartiConference($participerConference);
    
  }

  elseif(isset($_POST['supprimer']))
  {
  if(isset($_POST['delete_id']) && !empty($_POST['delete_id'])) // Si celui-ci existe.
    {
    	$delete_id = mysql_real_escape_string($_POST['delete_id']);

      if($per->recherchePartiConference($delete_id))

          $per->supprimerPartiConference($delete_id);
      else
          $message = 'Ce participant conférence n\'existe pas !'; // S'il n'existe pas, on affichera ce message.

    }
    else
    {
      $message = 'Ce participant conférence n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
    }
  }

  //recherche partipant conférence
  elseif(isset($_POST['recherche_participant']))
  {

      $per->recherchePartiConference($id_participe);
   
  }
  //liste des partipants conférence
  elseif(isset($_POST['liste_participant']))
  {

   $per->listePartiConferences();     
   
  }

  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>TP : Mini jeu de combat</title>
      
      <meta charset="utf-8" />
    </head>
    <body>
      <p>Nombre de personnages créés : <?= $manager->count() ?></p>
  <?php
  if (isset($message)) // On a un message à afficher ?
  {
    echo '<p>', $message, '</p>'; // Si oui, on l'affiche.
  }
  ?>
