<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Salle.php");
include ("model/DAO/DAOSalle.php");

$sal=new DAOSalle($db_instance);

    $delete_sal = $_GET['delete_sal'];
    $sal->supprimerSalle($delete_sal);
    $sal->redirect('profile.php');
?>