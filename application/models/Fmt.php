<?php
  
class Fmt extends CI_Model{
	 
 	public function __construct( $data=array() ) { 
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM formation');
		return $query->result_array();
	}
	public function get($d,$f) {  
		$query = $this->db->query('SELECT * FROM formation ORDER BY dateCreation DESC LIMIT ?,?',array($d,$f));
		return $query->result_array();
	} 
	public function getFormation($d,$f) {  
		$query = $this->db->query('SELECT * FROM formation ORDER BY dateDebut DESC LIMIT ?,?',array($d,$f));
		return $query->result_array();
	} 
	public function getFormation_cat($idCategory,$d,$f) {  
		$query = $this->db->query('SELECT * FROM formation WHERE idCategory=? ORDER BY dateDebut DESC LIMIT ?,?',array($idCategory,$d,$f));
		return $query->result_array();
	}
	public function getFromID($idFormation) {  
		$query = $this->db->query('SELECT * FROM formation WHERE idFormation=?',array($idFormation));
		return $query->row();
	}  
	public function number() {  
		$query = $this->db->query('SELECT * FROM formation LIMIT 90');
		return $query->num_rows();
	}
	public function numberFromCat($idCategory) {  
		$query = $this->db->query('SELECT * FROM formation WHERE idCategory=? LIMIT 90',array($idCategory));
		return $query->num_rows();
	}
}
 
?>