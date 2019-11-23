<?php

class History_model extends CI_Model {
    public $id;
    public $account_id;
    public $type;
    public $description;
    public $timestamp;

    public function __construct() {
        $this->load->database();
    }

    public function insert() {
        date_default_timezone_set('Asia/Manila');
        $this->timestamp = date('Y-m-d h:i:sa');
        $this->db->insert('tbl_logs', $this);
    }

    public function read($search = FALSE) {
        $data = array();

        $query = $this->db
            ->select('tbl_accounts.firstname, tbl_accounts.lastname, tbl_logs.description, tbl_logs.timestamp')
            ->join('tbl_accounts', 'tbl_logs.account_id = tbl_accounts.id', 'left')
            ->get('tbl_logs');

        
        if ($search !== FALSE) {
            $str_search = html_escape(trim($search));
            $query = $this->db
                ->select('tbl_accounts.firstname, tbl_accounts.lastname, tbl_logs.description, tbl_logs.timestamp')
                ->join('tbl_accounts', 'tbl_logs.account_id = tbl_accounts.id', 'left')
                ->like('tbl_accounts.username', $search)
                ->or_like('tbl_accounts.firstname', $search)
                ->or_like('tbl_accounts.lastname', $search)
                ->get('tbl_logs');
        }

        foreach ($query->result() as $key => $row) {
            $data[] = array(
                'name' => $row->firstname . ' ' . $row->lastname,
                'description' => $row->description,
                'timestamp' => $row->timestamp
            );
        }

        return $data;
    }
}

?>