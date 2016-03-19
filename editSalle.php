<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Salle.php");
include ("model/DAO/DAOSalle.php");

$sal=new DAOSalle($db_instance);

$id_salle = null;
    if ( !empty($_GET['id_salle'])) {
        $id_salle = $_GET['id_salle'];
    }



if (isset($_POST['modifier'])) 
{
	$nom_salle = $_POST['nomsalle'];
	$nbplaces = trim($_POST['nbplaces']);
	$type = trim($_POST['typesalle']);
    

    $result=$db_instance->query("UPDATE salle SET nom_salle='$nom_salle',nb_places_salle='$nbplaces',type_salle='$type' WHERE id_salle='$id_salle'");
      

    $sal->redirect('profile.php');
 
}
 $row=$sal->rechercheSalle($id_salle);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Using Bootstrap modal</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style type="text/css">
		.hidden {
			display: none !important;
		}

	</style>
</head>
<body>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Update form</h4>
		</div>
		<form method="post" action="editSalle.php?id_salle=<?php echo $row['id_salle'];?>" role="form">
			<div class="modal-body "> 

				<div id="signupalert" style="display:none" class="alert alert-danger">
					<p>Error:</p>
					<span></span>
				</div>

				<div class="form-group">
					<label for="Nom" class="col-md-3 control-label">Nom salle</label>

					<input type="text" id="Nom" class="form-control" name="nomsalle" value="<?php echo $row['nom_salle']; ?>" required>

				</div>

				<div class="form-group">
					<label for="nb" class="col-md-3 control-label">Nombre places</label>
					
				<input type="text" id="nb" class="form-control" name="nbplaces" value="<?php echo $row['nb_places_salle']; ?>" required>                                              
				</div>

				<div class="form-group">
					<label for="Nom" class="col-md-3 control-label">Type salle</label>

					<input type="text" id="Nom" class="form-control" name="typesalle" value="<?php echo $row['type_salle']; ?>" required>
				</div>
			</div>		

			<div class="panel-footer" style="margin-bottom:-14px;">
				<input type="submit" class="btn btn-primary" name="modifier" value="Update" />&nbsp;
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>

</body>
</html>




