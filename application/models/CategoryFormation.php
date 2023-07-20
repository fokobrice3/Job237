<?php
  
class CategoryFormation extends CI_Model{
	
	// Properties 
	public $idCatogory = null;
	public $nom= null;
	public $name= null;
	
	//Method
 	public function __construct( $data=array() ) {
		if ( isset( $data['idCatogory'] ) ) $this->idCatogory = (int) $data['idCategory'];
		if ( isset( $data['nom'] ) ) $this->nom = (int) $data['nom'];  
		if ( isset( $data['name'] ) ) $this->name = (int) $data['name'];   
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM catform ORDER BY nom ASC');
		return $query->result_array();
	} 
	public function get($idCatogory) {  
		$query = $this->db->query('SELECT * FROM catform WHERE idCategory=?',array($idCatogory));
		return $query->row();
	} 
	public function getList($d,$f) {  
		$query = $this->db->query('SELECT idCategory, nom, name, COUNT(idCategory) as nbFormation from formation GROUP BY idCategory ORDER BY nbFormation DESC LIMIT ?,?',array($d,$f));	
		//$query = $this->db->query('SELECT * FROM catform WHERE idCategory IN (SELECT idCategory in formation GROUP by idCategory) ORDER BY nom ASC LIMIT ?,?',array($d,$f));
		return $query->result_array();
	} 
	
}
 
?>