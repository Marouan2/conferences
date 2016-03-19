<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Conference.php");
include ("model/DAO/DAOConference.php");
include ("model/DAO/DAOSalle.php");
$conf=new DAOConference($db_instance);

$id_con = null;
if ( !empty($_GET['id_con'])) {
	$id_con = $_GET['id_con'];
}

if (isset($_POST['modifier'])) 
{
	$code = trim($_POST['code']);
	$libelle = trim($_POST['libelle']);
	$description = trim($_POST['description']);
	$salle = trim($_POST['salle']);	

	$result=$db_instance->query("UPDATE conference SET code_con='$code',libelle_con='$libelle',description_con='$description', id_salle='$salle' WHERE id_con='$id_con'");      

	$conf->redirect('profile.php');

}
$stmt=$conf->rechercheConference($id_con);
$stmt->execute(array($id_con));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
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
		<form method="post" action="editConference.php?id_con=<?php echo $row['id_con'];?>" role="form">
			<div class="modal-body "> 

				<div id="signupalert" style="display:none" class="alert alert-danger">
					<p>Error:</p>
					<span></span>
				</div>

				<div class="form-group">
					<label for="code" class="col-md-3 control-label">Code</label>

					<input type="text" id="code" class="form-control" name="code" value="<?php echo $row['code_con']; ?>" required>

				</div>

				<div class="form-group">
					<label for="lib" class="col-md-3 control-label">Libelle Conference</label>

					<input type="text" id="lib" class="form-control" name="libelle" value="<?php echo $row['libelle_con']; ?>" required>

				</div>

				<div class="form-group">
					<label for="desc" class="col-md-3 control-label">Description</label>
					
					<input type="text"  id="desc" class="form-control" name="description" value="<?php echo $row['description_con']; ?>" required> 
					                                                 
				</div>

				<div class="form-group">
					<label for="Nom" class="col-md-3 control-label">Salle</label>
					<?php
					$conference=new DAOConference($db_instance);
					$salle=new DAOSalle($db_instance);
					$stm=$salle->read();
					echo "<select class='form-control' name='salle' id='salle' required>";

					echo "<option  disabled selected>Choisir une Salle</option>";
					while ($row_salle = $stm->fetch(PDO::FETCH_ASSOC)){
						extract($row_salle);
						if($row['id_salle']==$id_salle){
							echo "<option value='$id_salle' selected>";
						}else{
							echo "<option value='$id_salle'>";
						}

						echo "$nom_salle</option>";
					}
					echo "</select>";
					?>	

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




