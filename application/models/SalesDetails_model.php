<?php 

class SalesDetails_model extends CI_Model {
    public $id;
    public $sales_id;
    public $product_id;
    public $qty;
    public $price;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        $count = $this->db->where(array('sales_id' => $this->sales_id, 'product_id' => $this->product_id))->get('tbl_sales_details')->num_rows();
        
        if ($count > 0)
            $this->db->set('qty', 'qty+'.$this->qty, FALSE)->where(array('sales_id' => $this->sales_id, 'product_id' => $this->product_id))->update('tbl_sales_details');
        else
            $this->db->insert('tbl_sales_details', $this);
    }

    public function read() {
        $query = $this->db
            ->select('tbl_sales_details.id, tbl_sales_details.qty, tbl_sales_details.price, (tbl_sales_details.price * tbl_sales_details.qty) as total, tbl_products.sku, tbl_products.description')
            ->join('tbl_products', 'tbl_sales_details.product_id = tbl_products.id', 'left')
            ->where('tbl_sales_details.sales_id', $this->sales_id)
            ->get('tbl_sales_details');

        $data = array();
        foreach ($query->result() as $key => $row) {
            $data[] = array(
                'id' => $row->id,
                'qty' => $row->qty, 
                'price' => $row->price,
                'total' => $row->total,
                'sku' => $row->sku,
                'description' => $row->description
            );
        }    

        return $data;
    }

    public function update() {
        $this->db->set('qty', $this->qty)->where('id', $this->id)->update('tbl_sales_details');
    }

    public function delete() {
        $this->db->where('sales_id', $this->sales_id)->delete('tbl_sales_details');
    }

    public function delete_item() {
        $this->db->where('id', $this->id)->delete('tbl_sales_details');
    }
}

?>