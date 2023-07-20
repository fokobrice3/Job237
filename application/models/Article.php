<?php
  
class Article extends CI_Model{
	 
 	public function __construct( $data=array() ) { 
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM article');
		return $query->result_array();
	}
	public function get($d,$f) {  
		$query = $this->db->query('SELECT * FROM article ORDER BY dateCreation DESC LIMIT ?,?',array($d,$f));
		return $query->result_array();
	} 
	public function getArticle($idArticle) {  
		$query = $this->db->query('SELECT * FROM article WHERE idArticle=?',array($idArticle));
		return $query->result_array();
	} 
	public function number() {  
		$query = $this->db->query('SELECT * FROM article LIMIT 90');
		return $query->num_rows();
	}
}
 
?>