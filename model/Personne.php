<?php
/**
 * Created by PhpStorm.
 * User: samih
 * Date: 06/03/16
 * Time: 13:04
 */

class Personne {


    private $db;

	function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    //insert
	public function ajoutPersonne($sexe_per, $nom_per, $prenom_per, $email_per, $telephone_per, $fonction_per, $datecre_per, $etat_per)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO personne(sexe_per, nom_per, prenom_per, email_per, telephone_per, fonction_per, datecre_per, etat_per) VALUES(:1, :2, :3, :4, :5, :6, :7, :8)");
            $stmt->bindparam(":1",$sexe_per);
            $stmt->bindparam(":2",$nom_per);
            $stmt->bindparam(":3",$prenom_per);
            $stmt->bindparam(":4",$email_per);
            $stmt->bindparam(":5",$telephone_per);
            $stmt->bindparam(":6", $fonction_per);
            $stmt->bindparam(":7",$datecre_per);
            $stmt->bindparam(":8",$etat_per);


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
	public function recherchePersonne($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM personne WHERE id_per=:id");
        $stmt->execute(array(":id"=>$id));
        $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;

    }


    //update
    public function modifierPersonne($id_per,$sexe_per, $nom_per, $prenom_per, $email_per, $telephone_per, $fonction_per, $datecre_per, $etat_per)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE personne SET sexe_per=:1, nom_per=:2,  prenom_per=:3,  email_per=:4,  telephone_per=:5, fonction_per=:6, datecre_per=:7, etat_per=:8 WHERE id_per=:9");
            $stmt->bindparam(":1",$sexe_per);
            $stmt->bindparam(":2",$nom_per);
            $stmt->bindparam(":3",$prenom_per);
            $stmt->bindparam(":4",$email_per);
            $stmt->bindparam(":5",$telephone_per);
            $stmt->bindparam(":6",$fonction_per);
            $stmt->bindparam(":7",$datecre_per);
            $stmt->bindparam(":8",$etat_per);
            $stmt->bindparam(":9",$id_per);


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
        public function supprimerPersonne($id)
        {
            $stmt = $this->db->prepare("DELETE FROM personne WHERE id_per=:id");
            $stmt->bindparam(":id",$id);
            $stmt->execute();
            return true;
        }


//select all
	public function listePersonne()
    {
        $stmt = $this->db->prepare("select * from personne");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        return $stmt;
    }


}