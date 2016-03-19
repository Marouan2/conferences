<?php

class DAOSalle {

    private $db;

	function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    //insert
	public function ajoutSalle(Salle $sal)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO salle (nom_salle,nb_places_salle,type_salle) VALUES(:nom_salle, :nb_places_salle, :type_salle)");
            $stmt->bindValue(":nom_salle",$sal->getNomSalle());
            $stmt->bindValue(":nb_places_salle",$sal->getNbPlaceSalle());
            $stmt->bindValue(":type_salle",$sal->getTypeSalle());    


            $stmt->execute();
            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }

    }
    //getbyid
	public function rechercheSalle($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM salle WHERE id_salle=:id");
        $stmt->execute(array(":id"=>$id));
        $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;

    }


    //update
    public function modifierSalle(Salle $per)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE salle SET nom_salle=:nom_salle, nb_places_salle=:nb_places_salle,  type_salle=:type_salle WHERE id_salle=:id_salle");
             $stmt->bindValue(":nom_salle",$sal->getNomSalle());
            $stmt->bindValue(":nb_places_salle",$sal->getNbPlaceSalle());
            $stmt->bindValue(":type_salle",$sal->getTypeSalle());
            $stmt->bindValue(":id_salle",$per->getIdSalle());


            $stmt->execute();
            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }

    }

    //delete
        public function supprimerSalle($id)
        {
            $stmt = $this->db->prepare("DELETE FROM salle WHERE id_salle=:id");
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            return true;
        }


//select all
	public function listeSalles()
    {
        $stmt = $this->db->prepare("select * from salle");
        $stmt->execute();
        $stmt->fetch(PDO::FETCH_ASSOC);

        return $stmt;
    }

    public function read(){
        //select all data
        $query = "SELECT id_salle, nom_salle FROM salle ORDER BY nom_salle";  
 
        $stmt = $this->db->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function readName(){
     
    $query = "SELECT nom_salle FROM salle WHERE id_salle = ? limit 0,1";
 
    $stmt = $this->db->prepare( $query );
    $stmt->bindParam(1, $this->id_salle);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->nom_salle = $row['nom_salle'];
}

public function redirect($url)
   {
       header("Location: $url");
       exit();
   }


}