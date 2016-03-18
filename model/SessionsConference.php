<?php
/**
 * Created by PhpStorm.
 * User: samih
 * Date: 07/03/16
 * Time: 12:25
 */

class SessionsConference {


    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    //insert
    public function ajoutSesConference($id_con, $id_ses, $dateeffective_sc, $etat_sc)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO session_conference(id_con, id_ses, dateeffective_s, etat_sc) VALUES(:1, :2, :3, :4)");
            $stmt->bindparam(":1",$id_con);
            $stmt->bindparam(":2",$id_ses);
            $stmt->bindparam(":3",$dateeffective_sc);
            $stmt->bindparam(":4",$etat_sc);


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
        $stmt = $this->db->prepare("SELECT * FROM session_conference WHERE id_pconf=:id");
        $stmt->execute(array(":id"=>$id));
        $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;

    }


    //update
    public function modifierPartiConference($id_sc,$id_con, $id_ses, $dateeffective_sc, $etat_sc)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE session_conference SET id_con=:1, id_ses=:2, dateeffective_sc=:3, etat_s=:4 WHERE id_sc=:5");
            $stmt->bindparam(":1",$id_con);
            $stmt->bindparam(":2",$id_ses);
            $stmt->bindparam(":3",$dateeffective_sc);
            $stmt->bindparam(":4",$etat_sc);
            $stmt->bindparam(":5",$id_sc);


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
    public function supprimerPartiConference($id)
    {
        $stmt = $this->db->prepare("DELETE FROM session_conference WHERE id_sc=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();
        return true;
    }


//select all
    public function listePartiConference()
    {
        $stmt = $this->db->prepare("select * from session_conference");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        return $stmt;
    }


}