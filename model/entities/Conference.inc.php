<?php
class Conference
{
  private $_id;
  private $_codeConf;
  private $_libelleConf;
  private $_descriptionConf;
  private $_etatConf;



  public function id()
   {
     return $this->_id;
   }
  public function codeConf()
   {
     return $this->_codeConf;
   }
  public function libelleConf()
   {
     return $this->_libelleConf;
   }
  public function descriptionConf()
   {
     return $this->_descriptionConf;
   }
  public function etatConf()
   {
     return $this->_etatConf;
   }


  public function setId($id)
  {
    // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
    $this->_id = (int) $id;
  }


  public function setCodeConf($codeConf)
  {
    // On v�rifie qu'il s'agit bien d'une cha�ne de caract�res.
    // Dont la longueur est inf�rieure � 30 caract�res.
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

}

?>