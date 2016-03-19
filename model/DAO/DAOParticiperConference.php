<?php

class DAOParticiperConference {

    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }


    //insert
    public function ajoutPartiConference(ParticiperConference $pConf)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO participer_conference (id_per,id_sc,typeparticipant_pconf,date_pconf) VALUES(:id_per, :id_sc, :typeparticipant_pconf, :date_pconf)");
            $stmt->bindValue(":id_per",$pConf->getId_per());
            $stmt->bindValue(":id_sc",$pConf->getId_sc());
            $stmt->bindValue(":typeparticipant_pconf",$pConf->getTypeParticipant());
            $stmt->bindValue(":date_pconf",$pConf->getDate_pconf());


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
    public function modifierPartiConference(ParticiperConference $pConf)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE participer_conference SET id_per=:id_per, id_sc=:id_sc, typeparticipant_pconf=:typeparticipant_pconf, date_pconf=:date_pconf WHERE id_pconf=:id_pconf");
           $stmt->bindValue(":id_per",$pConf->getId_per());
            $stmt->bindValue(":id_sc",$pConf->getId_sc());
            $stmt->bindValue(":typeparticipant_pconf",$pConf->getTypeParticipant());
            $stmt->bindValue(":date_pconf",$pConf->getDate_pconf());
            $stmt->bindValue(":id_pconf",$pConf->getId_pconf());


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
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        return true;
    }


//select all
    public function listePartiConferences()
    {
        $stmt = $this->db->prepare("select * from participer_conference");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        return $stmt;
    }


}