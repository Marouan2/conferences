<?php
/**
 * Created by PhpStorm.
 * User: samih
 * Date: 06/03/16
 * Time: 18:22
 */

class Conference {

    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    //insert
    public function ajoutConference($code_con,$libelle_con, $description_con, $id_ses, $etat_con)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO conference(code_con, libelle_con, description_con, id_ses, etat_con) VALUES(:1, :2, :3, :4, :5)");
            $stmt->bindparam(":1",$code_con);
            $stmt->bindparam(":2",$libelle_con);
            $stmt->bindparam(":3",$description_con);
            $stmt->bindparam(":4",$id_ses);
            $stmt->bindparam(":5",$etat_con);


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
        $stmt = $this->db->prepare("SELECT * FROM conference WHERE id_con=:id");
        $stmt->execute(array(":id"=>$id));
        $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;

    }


    //update
    public function modifierConference($id_con,$libelle_con, $description_con, $id_ses, $etat_con)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE conference SET  libelle_con=:1, description_con=:2, id_ses=:3, etat_con=:4 WHERE id_con=:5");
            $stmt->bindparam(":1",$libelle_con);
            $stmt->bindparam(":2",$description_con);
            $stmt->bindparam(":3",$id_ses);
            $stmt->bindparam(":4",$etat_con);
            $stmt->bindparam(":5",$id_con);


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
        $stmt = $this->db->prepare("DELETE FROM conference WHERE id_con=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();
        return true;
    }


//select all
    public function listeConference()
    {
        $stmt = $this->db->prepare("select * from conference");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        return $stmt;
    }


}