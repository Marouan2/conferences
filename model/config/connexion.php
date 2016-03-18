 <?php 
 //instaciation de la connaixion
  require_once 'db_connect.php';
	$db_conf = new DB_CONNECT();
	$db_instance=$db_conf->connect();

/*
 $resultats=$db_instance->query("SELECT * FROM conference ");
 $resultats->setFetchMode(PDO::FETCH_OBJ);
 while( $resultat = $resultats->fetch() )
 {
     echo 'Utilisateur : '.$resultat->module_con.'<br>';
 }
 $resultats->closeCursor();
*/
	?>
	
		
 