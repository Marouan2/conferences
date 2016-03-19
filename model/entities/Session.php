	<?php
	class Session {
	private $id_ses;
	private $libelle_ses;
	private $datePrevue_ses;
	private $description_ses;
	private $etat_ses;



	 public function __construct($libelle_ses, $datePrevue_ses, $description_ses)  
			{  
				$this->libelle_ses = $libelle_ses;
				$this->datePrevue_ses = $datePrevue_ses;
				$this->description_ses = $description_ses;
				
			} 


	public function getId_ses()
	{
	return $this->id_ses ;
	}
	public function getLibelle_ses()
	{
	return $this->libelle_ses ;
	}
	public function getDatePrevue_ses()
	{
	return $this->datePrevue_ses ;
	}
	public function getDescription_ses()
	{
	return $this->description_ses ;
	}
	public function getEtat_ses()
	{
	return $this->etat_ses ;
	}
	public function setId_ses($id_ses)
	{
	$this->id_ses = $id_ses ;
	}
	public function setLibelle_ses($libelle_ses)
	{
	$this->libelle_ses = $libelle_ses ;
	}
	public function setDatePrevue_ses($datePrevue_ses)
	{
	$this->datePrevue_ses = $datePrevue_ses ;
	}
	public function setDescription_ses($description_ses)
	{
	$this->description_ses = $description_ses ;
	}
	public function setEtat_ses($etat_ses)
	{
	$this->etat_ses = $etat_ses ;
	}
	}


	?>