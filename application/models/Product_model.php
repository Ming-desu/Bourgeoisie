<?php 

class Product_model extends CI_Model {
	public $id;
	public $category_id;
	public $sku;
	public $description;
	public $qty;
	public $reorder;
	public $price;

	public function __construct() {
		$this->load->database();
	}

	public function insert() {
		$query = $this->db->get_where('tbl_products', array('sku' => $this->sku));

		if ($query->num_rows() == 0) {
			$this->db->insert('tbl_products', $this);
			$error = array('success' => true, 'response' => "Successfully created product.");
		}
		else
			$error = array('success' => false, 'response' => "Product SKU ".$this->sku." is already existing.");

		return $error;
	}

	public function read($search, $id) {
		$data = array();	

		if ($search == 'id' && $id != 0)
			$query = $this->db
				->select('tbl_products.id, category_id, sku, tbl_products.description, qty, reorder, price, tbl_categories.description as category')
				->join('tbl_categories', 'tbl_products.category_id = tbl_categories.id', 'left')
				->where('tbl_products.id', $id)
				->get('tbl_products');
		
		else {
			$query = $this->db
				->select('tbl_products.id, category_id, sku, tbl_products.description, qty, reorder, price, tbl_categories.description as category')
				->join('tbl_categories', 'tbl_products.category_id = tbl_categories.id', 'left')
				->order_by('qty', 'ASC')
				->get('tbl_products');

			
			if ($search !== FALSE) {
				$str_search = html_escape(trim($search));
				$query = $this->db
					->select('tbl_products.id, category_id, sku, tbl_products.description, qty, reorder, price, tbl_categories.description as category')
					->join('tbl_categories', 'tbl_products.category_id = tbl_categories.id', 'left')
					->like('tbl_products.id', $search)
					->or_like('sku', $search)
					->or_like('tbl_products.description', $search)
					->or_like('tbl_products.category_id', $search)
					->or_like('tbl_categories.description', $search)
					->order_by('qty', 'ASC')
					->get('tbl_products');
			}
		}

		foreach ($query->result() as $key => $row) {
			$data[] = array(
				'id' => $row->id,
				'category_id' => $row->category_id, 
				'category' => $row->category,
				'sku' => $row->sku,
				'description' => $row->description,
				'qty' => $row->qty,
				'reorder' => $row->reorder,
				'price' => $row->price
			);
		}

		return $data;
	}

	public function read_with_category($category) {
		$data = array();	

		if ($category !== '--all')
			$query = $this->db
				->select('tbl_products.id, category_id, sku, tbl_products.description, qty, reorder, price, tbl_categories.description as category')
				->join('tbl_categories', 'tbl_products.category_id = tbl_categories.id', 'left')
				->where('tbl_products.category_id', $category)
				->order_by('sku', 'ASC')
				->get('tbl_products');
		else
			$query = $this->db
				->select('tbl_products.id, category_id, sku, tbl_products.description, qty, reorder, price, tbl_categories.description as category')
				->join('tbl_categories', 'tbl_products.category_id = tbl_categories.id', 'left')
				->order_by('sku', 'ASC')
				->get('tbl_products');

		foreach ($query->result() as $key => $row) {
			$data[] = array(
				'id' => $row->id,
				'category_id' => $row->category_id, 
				'category' => $row->category,
				'sku' => $row->sku,
				'description' => $row->description,
				'qty' => $row->qty,
				'reorder' => $row->reorder,
				'price' => $row->price
			);
		}

		return $data;
	}

	public function update() {
		$query = $this->db
    		->select('*')->from('tbl_products')
    		->where(array('sku' => $this->sku, 'id !=' => $this->id))
    		->get();

		if ($query->num_rows() == 0) {
			$this->db->where('id', $this->id);
			$this->db->update('tbl_products', $this);
			$error = array('success' => true, 'response' => "Successfully updated product.");
		}
		else
			$error = array('success' => false, 'response' => "Product SKU ".$this->sku." is already existing.");

		return $error;
	}

	public function delete() {
		$this->db->where('id', $this->id)->delete('tbl_products');
	}
}

?>