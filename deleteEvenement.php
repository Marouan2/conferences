<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/SessionConference.php");
include ("model/DAO/DAOSessionConference.php");

$sal=new DAOSessionConference($db_instance);

    $delete_even = $_GET['delete_even'];
    $sal->supprimerSessionConference($delete_even);
    $sal->redirect('profile.php');
?>