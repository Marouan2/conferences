<?php

/**
 * Connexion à la base
 */
class DB_CONNECT {    

      function connect() {
        require_once __DIR__ . '/db_config.php';

          try {
              $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE.'', DB_USER, DB_PASSWORD);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
              print "Erreur !: " . $e->getMessage() . "<br/>";
              die();
          }

		return $db;
    }
  
    function close($mysqli) {
        $dbh = null;
    }

}

?>