<?php

class DAOConference {

    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    //insert
    public function ajoutConference(Conference $conf)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO conference (code_con,libelle_con,description_con,id_salle) VALUES(:code_con, :libelle_con, :description_con, :id_salle)");
            $stmt->bindValue(":code_con",$conf->getCodeConf());
            $stmt->bindValue(":libelle_con",$conf->getLibelleConf());
            $stmt->bindValue(":description_con",$conf->getDescriptionConf());
            $stmt->bindValue(":id_salle",$conf->getIdSalle());



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
    public function rechercheConference($id)
    {
        $stmt = $this->db->query("SELECT * FROM conference WHERE id_con='$id'");
        
        return $stmt;

    }


    //update
    public function modifierConference($id_con)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE conference SET  code_con=:code_con,libelle_con=:libelle_con, description_con=:description_con, id_salle=:id_salle WHERE id_con=:id_con");
            $stmt->bindValue(":code_con",$conf->getCodeConf());
            $stmt->bindValue(":libelle_con",$conf->getLibelleConf());
            $stmt->bindValue(":description_con",$conf->getDescriptionConf());
            $$stmt->bindValue(":id_salle",$conf->getIdSalle());
            $stmt->bindValue(":id_con",$id_con);

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
    public function supprimerConference($id)
    {
        $stmt = $this->db->query("DELETE FROM conference WHERE id_con='$id'");
        
        return $stmt;
    }

    //read by Id
    public function readById(){
 
    $query = "SELECT code_con, libelle_con, description_con, id_salle FROM  conference  WHERE  id_con = ?  LIMIT 0,1";
 
    $stmt = $this->db->prepare( $query );
    $stmt->bindParam(1, $this->id_con);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->code_con = $row['code_con'];
    $this->libelle_con = $row['libelle_con'];
    $this->description_con = $row['description_con'];
    $this->id_salle = $row['id_salle'];
}

 public function readNameConference(){
     
    $query = "SELECT libelle_con FROM conference WHERE id_con = ? limit 0,1";
 
    $stmt = $this->db->prepare( $query );
    $stmt->bindParam(1, $this->id_con);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->libelle_con = $row['libelle_con'];
}

public function read(){
        //select all data
        $query = "SELECT id_con, libelle_con FROM conference ORDER BY libelle_con";  
 
        $stmt = $this->db->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }


//select all
    public function listeConferences()
    {
        $stmt = $this->db->query("select * from conference");      

        return $stmt;
    }

public function redirect($url)
   {
       header("Location: $url");
       exit();
   }

}