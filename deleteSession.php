<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Session.php");
include ("model/DAO/DAOSession.php");

$ses=new DAOSession($db_instance);

    $delete_ses = $_GET['delete_ses'];
    $ses->supprimerSession($delete_ses);
    $ses->redirect('profile.php');


?>