<?php
  
class Pole_Service extends CI_Model{
	 
 	public function __construct( $data=array() ) { 
	}   
	public function getPoles() {  
		$query = $this->db->query('SELECT * FROM pole');
		return $query->result_array();
	}
	public function getServices() {  
		$query = $this->db->query('SELECT * FROM service');
		return $query->result_array();
	}
	public function getServicesFromPole($p) {  
		$query = $this->db->query('SELECT * FROM service WHERE idPole = ?',array($p));
		return $query->result_array();
	}
	public function getServicesByPoles() {  
		$query = $this->db->query('SELECT service.titreENG as titENG, service.titreFR as titFR, service.descriptionENG as descENG, service.descriptionFR as descFR, service.idService, service.idPole, pole.titreFR as titreFR, pole.titreENG as titreENG FROM service LEFT JOIN pole ON service.idPole=pole.idPole ORDER BY pole.idPole ASC');
		return $query->result_array();
	}
	
}
 
?>