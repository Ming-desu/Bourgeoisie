<?php 

class Account_model extends CI_Model {
	public $id;
	public $username;
	public $password;
	public $firstname;
	public $lastname;
	public $sex;

	public function __construct() {
		$this->load->database();
	}

	public function insert() {
		// Check if username is existing...
		$query = $this->db->get_where('tbl_accounts', array('username' => $this->username));

		// No account with the username
		if ($query->num_rows() == 0) {
    		
    		// Insert the account in the database
    		$this->db->insert('tbl_accounts', $this);

    		$error = array('success' => true, 'response' => 'Successfully created account.');
    	}
    	else {
    		$error = array('success' => false, 'response' => "Username ".$this->username." is already taken.");
    	}

    	return $error;
	}

	public function read($search, $id) {
		$data = array();	

		if ($search == 'id' && $id != 0)
			$query = $this->db
				->where('id', $id)
				->get('tbl_accounts');
		
		else {
			$query = $this->db
				->order_by('firstname', 'ASC')
				->get('tbl_accounts');

			
			if ($search !== FALSE) {
				$str_search = html_escape(trim($search));
				$query = $this->db
					->like('id', $search)
					->or_like('username', $search)
					->or_like('firstname', $search)
					->or_like('lastname', $search)
					->order_by('firstname', 'ASC')
					->get('tbl_accounts');
			}
		}

		foreach ($query->result() as $key => $row) {
			$data[] = array(
				'id' => $row->id,
				'username' => $row->username, 
				'firstname' => $row->firstname,
				'lastname' => $row->lastname,
				'sex' => $row->sex
			);
		}

		return $data;
	}

	public function update() {
		$query = $this->db
    		->select('*')->from('tbl_accounts')
    		->where(array('username' => $this->username, 'id !=' => $this->id))
    		->get();

    	if (!empty($this->password)) 
    		if (strlen($this->password) < 8)
    			return array('success' => false, 'response' => "Password must be atleast 8 characters.");
    		if (strlen($this->password) > 16) 
    			return array('success' => false, 'response' => "Password must be atmost 16 characters.");

		if ($query->num_rows() == 0) {
			$this->db->set('username', $this->username);
			if (!empty($this->password)) {
				$password = password_hash(html_escape($this->password), PASSWORD_BCRYPT);
				$this->db->set('password', $password);
			}
			$this->db->set('firstname', $this->firstname);
			$this->db->set('lastname', $this->lastname);
			$this->db->set('sex', $this->sex);
			$this->db->where('id', $this->id);
			$this->db->update('tbl_accounts');
			$error = array('success' => true, 'response' => "Successfully updated account.");
		}
		else
			$error = array('success' => false, 'response' => "Username ".$this->sku." is already existing.");

		return $error;
	}

	public function delete() {
		$this->db->where('id', $this->id);
		$this->db->delete('tbl_accounts');
	}
}

?>