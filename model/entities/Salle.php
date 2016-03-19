  <?php
  class Salle
  {
    private $_idSalle;
    private $_nomSalle;
    private $_nbPlaceSalle;
    private $_typeSalle;


     public function __construct($nomSalle, $nbPlaceSalle, $typeSalle)  
  		{  
  			$this->_nomSalle = $nomSalle;
  			$this->_nbPlaceSalle = $nbPlaceSalle;
  			$this->_typeSalle = $typeSalle;			
  		} 
    
    

    public function getIdSalle() 
     { 
       return $this->_idSalle; 
     }
    public function getNomSalle() 
     { 
       return $this->_nomSalle; 
     }
    public function getNbPlaceSalle() 
     { 
       return $this->_nbPlaceSalle; 
     }
    public function getTypeSalle() 
     { 
       return $this->_typeSalle; 
     }
   
   

    public function setIdSalle($idSalle)
    {
    
      $this->_idSalle = (int) $idSalle;
    }
    
          
    public function setNomSalle($nomSalle)
    {

      if (is_string($nomSalle) && strlen($nomSalle) <= 30)
      {
        $this->_nomSalle = $nomSalle;
      }
    }

    public function setNbPlaceSalle($nbPlaceSalle)
    {
      
        $this->_libelleConf = $nbPlaceSalle;

    }

    public function setTypeSalle($typeSalle)
    {
      
        $this->_typeSalle = $typeSalle;
      
    }

    
  }

  ?>