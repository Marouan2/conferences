	<?php 

	class SessionConference  {
		private $Id_sc
		,$Id_con
		,$Id_ses
		,$Dateeffective_sc
		,$Etat_sc
		; 

		public function __construct($Id_con, $Id_ses, $Dateeffective_sc, $Etat_sc)  
		{  
			$this->Id_con = $Id_con;
			$this->Id_ses = $Id_ses;
			$this->Dateeffective_sc = $Dateeffective_sc;
			$this->Etat_sc = $Etat_sc;
		} 
		

		public function getId_sc()
		{
			return $this->Id_sc ;
		}
		public function getId_con()
		{
			return $this->Id_con ;
		}
		public function getId_ses()
		{
			return $this->Id_ses ;
		}
		public function getDateeffective_sc()
		{
			return $this->Dateeffective_sc ;
		}
		public function getEtat_sc()
		{
			return $this->Etat_sc ;
		}
		public function setId_sc($Id_sc)
		{
			$this->Id_sc = $Id_sc ;
		}
		public function setId_con($Id_con)
		{
			$this->Id_con = $Id_con ;
		}
		public function setId_ses($Id_ses)
		{
			$this->Id_ses = $Id_ses ;
		}
		public function setDateeffective_sc($Dateeffective_sc)
		{
			$this->Dateeffective_sc = $Dateeffective_sc ;
		}
		public function setEtat_sc($Etat_sc)
		{
			$this->Etat_sc = $Etat_sc ;
		}

}
		?>