<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Conference.php");
include ("model/DAO/DAOConference.php");
include ("model/DAO/DAOSalle.php");
include ("model/DAO/DAOSession.php");
include ("model/DAO/DAOSessionConference.php");

$conf_sc=new DAOSessionConference($db_instance);

$id_sc = null;
if ( !empty($_GET['id_sc'])) {
	$id_sc = $_GET['id_sc'];
}

if (isset($_POST['modifier'])) 
{
	$conf = trim($_POST['conf']);
	$sess = trim($_POST['sess']);
	$date = trim($_POST['date']);
	$etat = trim($_POST['etat']);	

	$result=$db_instance->query("UPDATE session_conference SET id_con='$conf',id_ses='$sess',dateeffective_sc='$date', etat_sc='$etat' WHERE id_sc='$id_sc'");      

	$conf_sc->redirect('profile.php');

}
$stmt=$conf_sc->rechercheSesConference($id_sc);
$stmt->execute(array($id_sc));
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
		<form method="post" action="editEvenement.php?id_sc=<?php echo $row['id_sc'];?>" role="form">
			<div class="modal-body "> 

				<div id="signupalert" style="display:none" class="alert alert-danger">
					<p>Error:</p>
					<span></span>
				</div>

				<div class="form-group">
					<label for="code" class="col-md-3 control-label">Conference</label>
                    <?php
					$sc=new DAOSessionConference($db_instance);
					$conf=new DAOConference($db_instance);
					$stm=$conf->read();
					echo "<select class='form-control' name='conf' id='code' required>";

					echo "<option  disabled selected>Choisir une conference</option>";
					while ($row_conf = $stm->fetch(PDO::FETCH_ASSOC)){
						extract($row_conf);
						if($row['id_con']==$id_con){
							echo "<option value='$id_con' selected>";
						}else{
							echo "<option value='$id_con'>";
						}

						echo "$libelle_con</option>";
					}
					echo "</select>";
					?>	

				</div>

				<div class="form-group">
					<label for="sess" class="col-md-3 control-label">Session</label>
                    <?php
					$sc=new DAOSessionConference($db_instance);
					$ses=new DAOSession($db_instance);
					$stm=$ses->read();
					echo "<select class='form-control' name='sess' id='sess' required>";

					echo "<option  disabled selected>Choisir une Salle</option>";
					while ($row_ses = $stm->fetch(PDO::FETCH_ASSOC)){
						extract($row_ses);
						if($row['id_ses']==$id_ses){
							echo "<option value='$id_ses' selected>";
						}else{
							echo "<option value='$id_ses'>";
						}

						echo "$libelle_ses</option>";
					}
					echo "</select>";
					?>	
				</div>

				<div class="form-group">
					<label for="desc" class="col-md-3 control-label">Date</label>
					
					<input type="date"  id="desc" class="form-control" name="date" value="<?php echo $row['dateeffective_sc']; ?>" required> 
					                                                 
				</div>
                <div class="form-group">
					<label for="desc" class="col-md-3 control-label">Etat</label>
					
					<input type="text"  id="desc" class="form-control" name="etat" value="<?php echo $row['etat_sc']; ?>" required> 		                                                 
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




