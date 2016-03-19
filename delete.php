<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Personne.php");
include ("model/DAO/DAOPersonne.php");

$per=new DAOPersonne($db_instance);

    $delete_id = $_GET['delete_id'];
    $per->supprimerPersonne($delete_id);
    $per->redirect('profile.php');
 ?>