  <?php
  class Conference
  {
    private $_id;
    private $_codeConf;
    private $_libelleConf;
    private $_descriptionConf;
    private $_etatConf;
    private $_idsalle;


    public function __construct($codeConf, $libelleConf, $descriptionConf,$idsalle)  
  		{  
  		
  			$this->_codeConf = $codeConf;
  			$this->_libelleConf = $libelleConf;
  			$this->_descriptionConf = $descriptionConf;
        $this->_idsalle = $idsalle;
  		} 
    
    
    
    public function getId()
     {
       return $this->_id;
     }
    public function getCodeConf()
     {
       return $this->_codeConf;
     }
    public function getLibelleConf()
     {
       return $this->_libelleConf;
     }
    public function getDescriptionConf()
     {
       return $this->_descriptionConf;
     }
    public function getEtatConf()
     {
       return $this->_etatConf;
     }

public function getIdSalle()
     {
       return $this->_idsalle;
     }

    public function setId($id)
    {
      // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
      $this->_id = (int) $id;
    }


    public function setCodeConf($codeConf)
    {
      
      if (is_string($codeConf) && strlen($codeConf) <= 30)
      {
        $this->_codeConf = $codeConf;
      }
    }

    public function setLibelleConf($libelleConf)
    {

        $this->_libelleConf = $libelleConf;

    }

    public function setDescriptionConf($descriptionConf)
    {

        $this->_descriptionConf = $descriptionConf;

    }

    public function setEtatConf($etatConf)
    {

        $this->_etatConf = $etatConf;

    }

    public function setIdsalle($id)
    {
      // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
      $this->_idsalle = (int) $id;
    }

  }

  ?>