<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Conference.php");
include ("model/DAO/DAOConference.php");

$conf=new DAOConference($db_instance);

    $delete_conf = $_GET['delete_conf'];
    $conf->supprimerConference($delete_conf);
    $conf->redirect('profile.php');
?>