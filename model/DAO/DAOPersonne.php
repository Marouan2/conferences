<?php

class DAOPersonne {

    private $db;

	public function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    //insert
	public function ajoutPersonne(Personne $per)
    {
        try
        {
            //$new_password = password_hash($per->getPassword(), PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO personne (username,password,sexe_per,nom_per,prenom_per,email_per,telephone_per,fonction_per) VALUES(:username,:password,:sexe_per, :nom_per, :prenom_per, :email_per, :telephone_per, :fonction_per)");
            $stmt->bindValue(":username",$per->getLogin());
            $stmt->bindValue(":password",$per->getPassword());
            $stmt->bindValue(":sexe_per",$per->getSexe_per());
            $stmt->bindValue(":nom_per",$per->getNom_per());
            $stmt->bindValue(":prenom_per",$per->getPrenom_per());
            $stmt->bindValue(":email_per",$per->getEmail_per());
            $stmt->bindValue(":telephone_per",$per->getTelephone_per());
            $stmt->bindValue(":fonction_per", $per->getFonction_per());
           


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
	public function recherchePersonne($id_per)
    {
        $stmt = $this->db->query("SELECT * FROM personne WHERE id_per='$id_per'");
       
        return $stmt;

    }


    //update
    public function modifierPersonne($id_per)
    {
        
            $stmt = $this->db->query("UPDATE personne SET username='$username',password='$password',sexe_per='$sexe', nom_per='$nom',  prenom_per='$prenom',  email_per='$email',  telephone_per='$tel', fonction_per='$fonction' WHERE id_per='$id_per'");
            
           return $stmt;

    }

    //delete
        public function supprimerPersonne($id)
        {
            $stmt = $this->db->query("DELETE FROM personne WHERE id_per='$id'");
           // $stmt->bindValue(":id",$id);
            //$stmt->execute();
            return $stmt;
        }


//select all
	public function listePersonnes()
    {
        $stmt = $this->db->query("select * from personne");
        return $stmt;
    }

//find by mail
public function verifyMail($email_per)
    {
       try
       {
        
          $stmt = $this->db->query("SELECT * FROM personne WHERE email_per=:email_per ");
          $stmt->execute(array(':email_per'=>$email_per));
          $row=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if($row['email_per']==$email_per) {
                          
                return true;
             }
             else
             {

                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }    





public function login($username,$password)
    {
       
          $stmt = $this->db->query("SELECT * FROM personne WHERE username='$username' AND password='$password' LIMIT 1");
         return $stmt;
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
       exit();
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }

}