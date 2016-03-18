<?php
/**
 * Created by PhpStorm.
 * User: samih
 * Date: 07/03/16
 * Time: 12:25
 */

class ParticiperConference {


    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    //insert
    public function ajoutPartiConference($id_per, $id_con, $typeparticipant_pconf, $date_pconf)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO participer_conference(id_per, id_con, typeparticipant_pconf, date_pconf) VALUES(:1, :2, :3, :4)");
            $stmt->bindparam(":1",$id_per);
            $stmt->bindparam(":2",$id_con);
            $stmt->bindparam(":3",$typeparticipant_pconf);
            $stmt->bindparam(":4",$date_pconf);


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
    public function recherchePartiConference($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM participer_conference WHERE id_pconf=:id");
        $stmt->execute(array(":id"=>$id));
        $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;

    }


    //update
    public function modifierPartiConference($id_pconf,$id_per, $id_con, $typeparticipant_pconf, $date_pconf)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE participer_conference SET id_per=:1, id_con=:2, typeparticipant_pconf=:3, date_pconf=:4 WHERE id_pconf=:5");
            $stmt->bindparam(":1",$id_per);
            $stmt->bindparam(":2",$id_con);
            $stmt->bindparam(":3",$typeparticipant_pconf);
            $stmt->bindparam(":4",$date_pconf);
            $stmt->bindparam(":5",$id_pconf);


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
        $stmt = $this->db->prepare("DELETE FROM participer_conference WHERE id_pconf=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();
        return true;
    }


//select all
    public function listePartiConference()
    {
        $stmt = $this->db->prepare("select * from participer_conference");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        return $stmt;
    }


}