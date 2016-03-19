<?php

class DAOSessionConference {


    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    //insert
    public function ajoutSessionConference(SessionConference $sc)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO session_conference (id_con,id_ses,dateeffective_sc,etat_sc) VALUES(:id_con, :id_ses, :dateeffective_sc, :etat_sc)");
            $stmt->bindValue(":id_con",$sc->getId_con());
            $stmt->bindValue(":id_ses",$sc->getId_ses());
            $stmt->bindValue(":dateeffective_sc",$sc->getDateeffective_sc());
            $stmt->bindValue(":etat_sc",$sc->getEtat_sc());


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
    public function rechercheSesConference($id)
    {
        $stmt = $this->db->query("SELECT * FROM session_conference WHERE id_sc='$id'");
        
        return $stmt;

    }


    //update
    public function modifierSessionConference(SessionConference $sc)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE session_conference SET id_con=:id_con, id_ses=:id_ses, dateeffective_sc=:dateeffective_sc, etat_sc=:etat_sc WHERE id_sc=:id_sc");
             $stmt->bindValue(":id_con",$sc->getId_con());
            $stmt->bindValue(":id_ses",$sc->getId_ses());
            $stmt->bindValue(":dateeffective_sc",$sc->getDateeffective_sc());
            $stmt->bindValue(":etat_sc",$sc->getEtat_sc());
            $stmt->bindValue(":id_sc",$sc->getId_sc());


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
    public function supprimerSessionConference($id)
    {
        $stmt = $this->db->query("DELETE FROM session_conference WHERE id_sc='$id'");
        
        return $stmt;
    }


//select all
    public function listeSessionConferences()
    {
        $stmt = $this->db->query("select * from session_conference");
        
        return $stmt;
    }
    
public function redirect($url)
   {
       header("Location: $url");
       exit();
   }

}