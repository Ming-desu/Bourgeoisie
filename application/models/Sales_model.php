<?php 

class Sales_model extends CI_Model {
    public $id;
    public $account_id;
    public $tax;
    public $discount;
    public $cash_tendered;
    public $total_amount;
    public $timestamp;

    public function __construct() {
        $this->load->database();
    }

    public function insert() {
        $this->db->insert('tbl_sales', $this);
        $sales = $this->db->select('MAX(id) as max')->get('tbl_sales')->row();
        $this->id = $sales->max;

        return $this;
    }

    public function read($start = FALSE, $end = FALSE) {
        if ($start == FALSE && $end == FALSE) {
            $query = $this->db->select('tbl_sales.id, tbl_accounts.firstname, tbl_sales.cash_tendered, tbl_sales.total_amount, tbl_sales.timestamp')
                    ->join('tbl_accounts', 'tbl_sales.account_id = tbl_accounts.id', 'left')
                    ->where('tbl_sales.id', $this->id)
                    ->get('tbl_sales');
        }
        else {
            $query = $this->db->select('tbl_sales.id, tbl_accounts.firstname, tbl_sales.cash_tendered, tbl_sales.total_amount, tbl_sales.timestamp')
                    ->join('tbl_accounts', 'tbl_sales.account_id = tbl_accounts.id', 'left')
                    ->where('date(tbl_sales.timestamp) >= ', date('Y-m-d', strtotime($start)))
                    ->where('date(tbl_sales.timestamp) <= ', date('Y-m-d', strtotime($end)))
                    ->get('tbl_sales');
        }
     
        $data = array();

        foreach ($query->result() as $key => $row) {
            $data[] = array(
                'id' => $row->id,
                'firstname' => $row->firstname, 
                'cash_tendered' => $row->cash_tendered,
                'total_amount' => number_format($row->total_amount, 2),
                'timestamp' => $row->timestamp
            );
        }

        return $data;
    }

    public function delete() {
        $this->db->where('id', $this->id)->delete('tbl_sales');
    }

    public function end() {
        date_default_timezone_set('Asia/Manila');
        $this->timestamp = date('Y-m-d h:i:sa');
        $this->db->set(array('cash_tendered' => $this->cash_tendered, 'total_amount' => $this->total_amount, 'timestamp' => $this->timestamp))->where('id', $this->id)->update('tbl_sales');

        $query = $this->db->where('sales_id', $this->id)->get('tbl_sales_details');

        foreach ($query->result() as $key => $row)
            $this->db->set('qty', 'qty-' . $row->qty, FALSE)->where('id', $row->product_id)->update('tbl_products');
    }
}

?>