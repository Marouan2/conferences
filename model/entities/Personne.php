  <?php
  class Personne
  {
    private $id_per;
    private $sexe_per;
    private $nom_per;
    private $prenom_per;
    private $email_per;
    private $telephone_per;
    private $fonction_per;
    private $datecre_per;
    private $login;
    private $password;
    
    
    
     public function __construct($login,$password,$sexe_per, $nom_per, $prenom_per, $email_per, $telephone_per, $fonction_per)  
  		{  
        $this->login = $login;
        $this->password = $password;
  			$this->sexe_per = $sexe_per;
  			$this->nom_per = $nom_per;
  			$this->prenom_per = $prenom_per;
  			$this->email_per = $email_per;
  			$this->telephone_per = $telephone_per;
  			$this->fonction_per = $fonction_per;
  		} 
    
    
    
    
    // Liste des getters
    
    public function getId_per()
  {
  return $this->id_per ;
  }

   public function getLogin()
  {
  return $this->login ;
  }

public function getPassword()
  {
  return $this->password;
  }

    public function getSexe_per()
    {
      return $this->sexe_per;
    }
    
    public function getNom_per()
    {
      return $this->nom_per;
    }
    
    public function getPrenom_per()
    {
      return $this->prenom_per;
    }
    
    public function getEmail_per()
    {
      return $this->email_per;
    }
    
    public function getTelephone_per()
    {
      return $this->telephone_per;
    }
    
    public function getFonction_per()
    {
      return $this->fonction_per;
    }
     public function getDatecre_per()
    {
      return $this->datecre_per;
    }
    
   
    
    // Liste des setters
    public function setId_per($id_per)
  {
  $this->id_per = $id_per ;
  }

   public function setLogin($login)
  {
  $this->login = $login ;
  }

   public function setPassword($password)
  {
  $this->password = $password ;
  }
    
    public function setSexe_per($sexe_per)
    {
     
        $this->sexe_per = $sexe_per;
      
    }
    
    public function setNomPer($nom_per)
    {
     
        $this->nom_per = $nom_per;
      
    }
    
    public function setPrenomPer($prenom_per)
    {
      
        $this->prenom_per = $prenom_per;
      
    }
    
    public function setEmailPer($email_per)
    {
      
        $this->email_per = $email_per;
      
    }
    
    public function setTelephone($telephone_per)
    {
      
        $this->telephone_per = $telephone_per;
      
    }
    
    public function setFonction($fonction_per)
    {
      
        $this->fonction_per = $fonction_per;
      
    }
    public function setDateCreation($datecre_per)
    {
     
        $this->datecre_per = $datecre_per;
      
    }
  }
  ?>