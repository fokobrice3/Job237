<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LanguageSwitcher extends CI_Controller {
	
	public function __construct() { 
		parent::__construct(); 
		session_start();
	}
 
	function switchLang($language = "") { 
	
		$language = ($language != "") ? $language : "french"; 	
		
		$_SESSION['site_lang'] = $language;
		//$this->session->set_userdata('site_lang', $language);  
		
		redirect($_SERVER['HTTP_REFERER']);
    }
}

