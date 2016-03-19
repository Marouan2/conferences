<?php

class DAOSession {

    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    //insert
    public function ajoutSession(Session $ses)
    {
        try
        {
            //$date=date('d-m-Y',strtotime($ses->getDatePrevue_ses()));
            $req = "INSERT INTO sessions (libelle_ses,dateprevue_ses,description_ses) VALUES(:libelle_ses,:dateprevue_ses,:description_ses)";
            $stmt = $this->db->prepare($req);
            $stmt->bindValue(":libelle_ses",$ses->getLibelle_ses());
            $stmt->bindValue(":dateprevue_ses",$ses->getDatePrevue_ses());
            $stmt->bindValue(":description_ses",$ses->getDescription_ses());
           


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
    public function rechercheSession($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM sessions WHERE id_ses=:id");
        $stmt->execute(array(":id"=>$id));
        $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;

    }


    //update
    public function modifierSession(Session $ses)
    {
        try
        {

            $stmt = $this->db->prepare("UPDATE sessions SET libelle_ses=:llibelle_ses, dateprevue_ses=:dateprevue_ses, description_ses=:description_ses, etat_ses=:etat_ses WHERE id_ses=:id_ses");
            $stmt->bindValue(":llibelle_ses",$ses->getLibelle_ses());
            $stmt->bindValue(":dateprevue_ses",$ses->getDatePrevue_ses());
            $stmt->bindValue(":description_ses",$ses->getDescription_ses());
            $stmt->bindValue(":etat_ses",$ses->getEtat_ses());
            $stmt->bindValue(":id_ses",$ses->getId_ses());


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
    public function supprimerSession($id)
    {
        $stmt = $this->db->prepare("DELETE FROM sessions WHERE id_ses=:id");
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        return true;
    }


//select all
    public function listeSessions()
    {
        $stmt = $this->db->prepare("select * from sessions");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        return $stmt;
    }

public function readNameSession(){
     
    $query = "SELECT libelle_ses FROM sessions WHERE id_ses = ? limit 0,1";
 
    $stmt = $this->db->prepare( $query );
    $stmt->bindParam(1, $this->id_ses);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->libelle_ses = $row['libelle_ses'];
}

public function read(){
        //select all data
        $query = "SELECT id_ses, libelle_ses FROM sessions ORDER BY libelle_ses";  
 
        $stmt = $this->db->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

public function redirect($url)
   {
       header("Location: $url");
       exit();
   }

}