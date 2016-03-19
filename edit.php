<?php
session_start();
include("model/config/connexion.php");
include ("model/entities/Personne.php");
include ("model/DAO/DAOPersonne.php");

$per=new DAOPersonne($db_instance);

$id_per = null;
    if ( !empty($_GET['id_per'])) {
        $id_per = $_GET['id_per'];
    }



if (isset($_POST['modifier'])) 
{
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$sexe= trim($_POST['sexe']);
	$nom= trim($_POST['nom']);
	$prenom= trim($_POST['prenom']);
	$email = trim($_POST['email']);
	$tel= trim($_POST['tel']);
	$fonction= trim($_POST['fonction']);
    
    

    $result=$db_instance->query("UPDATE personne SET username='$username',password='$password',sexe_per='$sexe', nom_per='$nom',  prenom_per='$prenom',  email_per='$email',  telephone_per='$tel', fonction_per='$fonction' WHERE id_per='$id_per'");
      

    $per->redirect('profile.php');
 
}
 $stmt=$per->recherchePersonne($id_per);
$stmt->execute(array($id_per));
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
		<form method="post" action="edit.php?id_per=<?php echo $row['id_per'];?>" role="form">
			<div class="modal-body "> 

				<div id="signupalert" style="display:none" class="alert alert-danger">
					<p>Error:</p>
					<span></span>
				</div>

				<div class="form-group">
					<label for="Nom" class="col-md-3 control-label">Username</label>

					<input type="text" id="Nom" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>

				</div>

				<div class="form-group">
					<label for="password" class="col-md-3 control-label">Mot de passe</label>

					<input type="password" id="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>

				</div>

				<div class="form-group">
					<label for="sexe" class="col-md-3 control-label">Sexe</label>
					
				<input type="text" id="sexe" class="form-control" name="sexe" value="<?php echo $row['sexe_per']; ?>" required>                                                    
				</div>

				<div class="form-group">
					<label for="Nom" class="col-md-3 control-label">Nom</label>

					<input type="text" id="Nom" class="form-control" name="nom" value="<?php echo $row['nom_per']; ?>" required>

				</div>


				<div class="form-group">
					<label for="prenom" class="col-md-3 control-label">Prenom</label>

					<input type="text" id="prenom" class="form-control" name="prenom" value="<?php echo $row['prenom_per']; ?>"  required>

				</div>
				<div class="form-group">
					<label for="age" class="col-md-3 control-label">Email</label>

					<input type="text" id="age"  class="form-control" name="email" value="<?php echo $row['email_per']; ?>"  required>

				</div>



				<div class="form-group">
					<label for="url" class="col-md-3 control-label">Telephone</label>

					<input type="text" id="url" class="form-control" name="tel" value="<?php echo $row['telephone_per']; ?>"  required>

				</div>
				<div class="form-group">
					<label for="role" class="col-md-3 control-label">Fonction</label>

					<input type="text" id="role" class="form-control" name="fonction" value="<?php echo $row['fonction_per']; ?>"  required>

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




