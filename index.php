<?php 
session_start();
    include("model/config/connexion.php");   
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Gestion Annuaire !</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/design.css">
        <link rel="stylesheet" href="assets/css/details.css">
        <link rel="stylesheet" href="assets/css/error-page.css">

        <style>      
            body{
                padding-top:60px;
            }
            /* fix padding under menu after resize */
            @media screen and (max-width: 767px) {
                body { padding-top: 60px; }
            }
            @media screen and (min-width:768px) and (max-width: 991px) {
                body { padding-top: 110px; }
            }
            @media screen and (min-width: 992px) {
                body { padding-top: 60px; }
            }
        </style>
        <style >
            .table > tbody > tr > td {
               vertical-align: middle;
            }

        </style>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
       
    </head>
    
<body>
<?php include("template/header.php"); ?>

<div id="presentation" class="container"> 
    <div class="row">
        <div class="col-md-6" style="margin-top: 30px;">
            <img src="assets/img/conference.jpg" width="534" height="435">
        </div>
        <div class="col-md-4">
            <h2> conférence : </h2>
            <p>
                
            La conférence est l'une des formes de conversation entre personnes.
           Elle est une confrontation d'idées (scientifiques ou médicales, philosophiques, politique…) sur un sujet jugé d'importance par les participants.
           C'est pourquoi, son organisation est généralement formelle, elle rassemble un ou plusieurs intervenants (spécialistes) et leurs contradicteurs ou citoyens ou représentants de la société civile dans certaines conférences (conférence citoyenne, conférence de consensus).

            </p>
            <p>
              Elle est utilisée dans différentes occasions, souvent pour permettre à un intervenant de délivrer à un large auditoire des informations sur un sujet dont il est un spécialiste.
            </p>
            
        </div>
        <div class="col-md-2">
             
        </div>
    </div>
</div>

<?php 
    include ("template/footer.php"); 
?>

