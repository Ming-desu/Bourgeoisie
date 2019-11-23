<?php 

class Category_model extends CI_Model {
	public $id;
	public $description;

	public function __construct() {
		$this->load->database();
	}
}

?>