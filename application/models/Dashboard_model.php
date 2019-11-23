<?php 

class Dashboard_model extends CI_Model {
    public $total_items;
    public $out_of_stock;
    public $low_in_stock;
    public $good_in_stock;
    public $total_sales;

	public function __construct() {
		$this->load->database();
    }
    
    public function read() {
        $this->total_items = $this->db->get('tbl_products')->num_rows();
        $this->out_of_stock = $this->db->query('SELECT * FROM tbl_products WHERE qty = 0')->num_rows();
        $this->low_in_stock = $this->db->query('SELECT * FROM tbl_products WHERE qty <= reorder')->num_rows();
        $this->good_in_stock = $this->db->query('SELECT * FROM tbl_products WHERE qty > reorder')->num_rows();
        $this->total_sales = number_format($this->db->select('SUM(total_amount) as total')->where('date(timestamp)', date('Y-m-d'))->get('tbl_sales')->row()->total, 2);

        return $this;
    }
}

?>