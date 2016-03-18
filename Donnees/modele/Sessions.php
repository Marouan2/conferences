<?php
/**
 * Created by PhpStorm.
 * User: samih
 * Date: 07/03/16
 * Time: 12:40
 */

class Sessions {



    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    //insert
    public function ajoutSessions($llibelle_ses, $dateprevue_ses, $description_ses, $etat_ses)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO sessions(llibelle_ses, dateprevue_ses, description_ses, etat_ses) VALUES(:1, :2, :3, :4)");
            $stmt->bindparam(":1",$llibelle_ses);
            $stmt->bindparam(":2",$dateprevue_ses);
            $stmt->bindparam(":3",$description_ses);
            $stmt->bindparam(":4",$etat_ses);


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
    public function rechercheSessions($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM sessions WHERE id_ses=:id");
        $stmt->execute(array(":id"=>$id));
        $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;

    }


    //update
    public function modifierSessions($id_ses, $llibelle_ses, $dateprevue_ses, $description_ses, $etat_ses)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO sessions(llibelle_ses=:1, dateprevue_ses=:2, description_ses=:3, etat_ses=:4 WHERE id_ses=:5)");
            $stmt->bindparam(":1",$llibelle_ses);
            $stmt->bindparam(":2",$dateprevue_ses);
            $stmt->bindparam(":3",$description_ses);
            $stmt->bindparam(":4",$etat_ses);
            $stmt->bindparam(":5",$id_ses);


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
    public function supprimerSessions($id)
    {
        $stmt = $this->db->prepare("DELETE FROM sessions WHERE id_ses=:id");
        $stmt->bindparam(":id",$id);
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



}