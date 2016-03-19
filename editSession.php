<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Session.php");
include ("model/DAO/DAOSession.php");

$ses=new DAOSession($db_instance);

$id_ses = null;
    if ( !empty($_GET['id_ses'])) {
        $id_ses = $_GET['id_ses'];
    }



if (isset($_POST['modifier'])) 
{
	$libelle = trim($_POST['libelle']);
    $datesession = $_POST['datesession'];
    $description = trim($_POST['description']);

    $result=$db_instance->query("UPDATE sessions SET libelle_ses='$libelle',dateprevue_ses='$datesession',description_ses='$description' WHERE id_ses='$id_ses'");
      

    $ses->redirect('profile.php');
 
}
 $row=$ses->rechercheSession($id_ses);
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
		<form method="post" action="editSession.php?id_ses=<?php echo $row['id_ses'];?>" role="form">
			<div class="modal-body "> 

				<div id="signupalert" style="display:none" class="alert alert-danger">
					<p>Error:</p>
					<span></span>
				</div>

				<div class="form-group">
					<label for="Nom" class="col-md-3 control-label">Libelle</label>

					<input type="text" id="Nom" class="form-control" name="libelle" value="<?php echo $row['libelle_ses']; ?>" required>

				</div>

				<div class="form-group">
					<label for="nb" class="col-md-3 control-label">Date session</label>
					
				<input type="date" id="nb" class="form-control" name="datesession" value="<?php echo $row['dateprevue_ses']; ?>" required>                                              
				</div>

				<div class="form-group">
					<label for="Nom" class="col-md-3 control-label">Description</label>

					<input type="text" id="Nom" class="form-control" name="description" value="<?php echo $row['description_ses']; ?>" required>
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




