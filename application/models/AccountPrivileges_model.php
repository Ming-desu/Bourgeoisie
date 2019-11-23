<?php

class AccountPrivileges_model extends CI_Model {
	public $id;
	public $account_id;
	public $privileges;

	public function __construct() {
		$this->load->database();
	}

	public function read($id) {
		$query = $this->db->where('account_id', $id)
			->get('tbl_accounts_privileges');

		$data = array();
		if ($query->num_rows() != 0) {
			$row = $query->row();
			$data = json_decode($row->privileges);
		}

		return $data;
	}

	public function insert() {
		$this->db->insert('tbl_accounts_privileges', $this);
	}

	public function update() {
		$this->db->replace('tbl_accounts_privileges', $this);
		return array('success' => true, 'response' => 'Successfully updated account privileges.');
	}

	public function delete() {
		$this->db->where('account_id', $this->account_id)->delete('tbl_accounts_privileges');
	}
}

?>