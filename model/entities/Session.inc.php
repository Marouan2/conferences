<?php
class Session {
private $Id_ses
,$Libelle_ses
,$DatePrevue_ses
,$Description_ses
,$Etat_ses
; 
public function getId_ses()
{
return $this->Id_ses ;
}
public function getLibelle_ses()
{
return $this->Libelle_ses ;
}
public function getDatePrevue_ses()
{
return $this->DatePrevue_ses ;
}
public function getDescription_ses()
{
return $this->Description_ses ;
}
public function getEtat_ses()
{
return $this->Etat_ses ;
}
public function setId_ses($Id_ses)
{
$this->Id_ses = $Id_ses ;
}
public function setLibelle_ses($Libelle_ses)
{
$this->Libelle_ses = $Libelle_ses ;
}
public function setDatePrevue_ses($DatePrevue_ses)
{
$this->DatePrevue_ses = $DatePrevue_ses ;
}
public function setDescription_ses($Description_ses)
{
$this->Description_ses = $Description_ses ;
}
public function setEtat_ses($Etat_ses)
{
$this->Etat_ses = $Etat_ses ;
}
}


?>