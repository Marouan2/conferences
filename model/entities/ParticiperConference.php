  <?php
  class ParticiperConference
  {
    private $id_pconf;
    private $id_per;
    private $id_sc;
    private $typeParticipant_pconf;
    private $date_pconf;

    public function __construct($id_per, $id_sc, $typeParticipant_pconf, $date_pconf)  
      {  
        $this->_id_per = $id_per;
        $this->_id_sc = $id_sc;
        $this->_typeParticipant_pconf = $typeParticipant_pconf;
        $this->_date_pconf= $date_pconf;
      } 
    

    // Liste des getters
    
    public function getId_pconf()
  {
  return $this->id_pconf ;
  }

    public function getId_per()
  {
  return $this->id_per ;
  }
    
    public function getId_sc()
  {
  return $this->id_sc ;
  }
    
    public function getTypeParticipant()
    {
      return $this->typeParticipant_pconf;
    }

     public function getDate_pconf()
    {
      return $this->date_pconf;
    }
    
   
    
    // Liste des setters

    public function setId_pconf($id_pconf)
  {
  $this->id_pconf = $id_pconf ;
  }

   public function setId_per($id_per)
  {
  $this->id_per = $id_per ;
  }
    
    public function setId_sc($id_sc)
  {
  $this->id_sc = $id_sc ;
  }
    
    public function setTypeParticipant($typeParticipant_pconf)
    {
     
        $this->typeParticipant_pconf = $typeParticipant_pconf;
      
    }
    
    public function setDateConf($date_pconf)
    {
     
        $this->date_pconf = $date_pconf;
      
    }
  }
  ?>
