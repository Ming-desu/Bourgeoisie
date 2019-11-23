<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	// Default Constructor
	public function __construct() {

		// Call the parent constructor
		parent::__construct();

		// Load some of the CodeIgniter Library
		$this->load->library('form_validation');
		$this->load->library('authentication');

		// Forbid anyone who will try to access this if not logged in
		if (!$this->authentication->UserLoggedIn())
			redirect('/');
	}

	// The method that will create a product
	public function create() {
		
		// Set the rules of the validation
		$config = array(
			array(
				'field' => 'sku',
				'label' => 'SKU',
				'rules' => 'trim|required|max_length[64]'
			),
			array(
				'field' => 'category',
				'label' => 'Category',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'description',
				'label' => 'Product Description',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'qty',
				'label' => 'Quantity',
				'rules' => 'trim|required|max_length[11]'
			),
			array(
				'field' => 'reorder',
				'label' => 'Reorder Point',
				'rules' => 'trim|required|max_length[11]'
			),
			array(
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'trim|required'
			)
		);

		$error = [];

		$this->form_validation->set_rules($config);
    	$this->form_validation->set_message('required', 'Please input your {field}.');

		// Run the validation and check for the errors
    	if (!$this->form_validation->run()) {
    		$error = array('success' => false, 'response' => preg_split('/\r\n|\r|\n/', validation_errors())[0]);
    	}
    	else {

			// Add the product to the database 
    		$this->load->model('product_model', 'product');
			$this->product->category_id = html_escape($this->input->post('category'));
			$this->product->sku = html_escape(strtoupper($this->input->post('sku')));
			$this->product->description = html_escape(ucfirst($this->input->post('description')));
			$this->product->qty = html_escape($this->input->post('qty'));
			$this->product->reorder = html_escape($this->input->post('reorder'));
			$this->product->price = html_escape($this->input->post('price'));

			$error = $this->product->insert();

			// Save the action to the history
			$user = $this->session->userdata('user');
			$this->load->model('history_model', 'history');
			$this->history->account_id = $user['id'];
			$this->history->type = 2;
			$this->history->description = "Product ". $this->product->sku ." has inserted into the system.";
			$this->history->insert();
    	}

    	$this->output->set_content_type('application/json')->set_output(json_encode($error));
	}

	// The method to read all of the products
	// <param name="$search">The string to be searched</param>
	// <param name="$id">The string to be searched if the mode is finding the id</param>
	public function read($search = FALSE, $id = 0) {
		$this->load->model('product_model', 'product');
		$data = $this->product->read($search, $id);		

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// The method that will read products taking into account the category
	// <param name="$category">The category to be filtered</param>
	public function read_with_category($category) {
		$this->load->model('product_model', 'product');
		$data = $this->product->read_with_category($category);		

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// The method to update the product in the system
	public function update() {

		// Set the rules of the validation
		$config = array(
			array(
				'field' => 'update_sku',
				'label' => 'SKU',
				'rules' => 'trim|required|max_length[64]'
			),
			array(
				'field' => 'update_category',
				'label' => 'Category',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'update_description',
				'label' => 'Product Description',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'update_qty',
				'label' => 'Quantity',
				'rules' => 'trim|required|max_length[11]'
			),
			array(
				'field' => 'update_reorder',
				'label' => 'Reorder Point',
				'rules' => 'trim|required|max_length[11]'
			),
			array(
				'field' => 'update_price',
				'label' => 'Price',
				'rules' => 'trim|required'
			)
		);

		$error = [];

		$this->form_validation->set_rules($config);
    	$this->form_validation->set_message('required', 'Please input your {field}.');

		// Run the validation and check if there was an error
    	if (!$this->form_validation->run()) {
    		$error = array('success' => false, 'response' => preg_split('/\r\n|\r|\n/', validation_errors())[0]);
    	}
    	else {

			// Updates the product in the system
    		$this->load->model('product_model', 'product');
    		$this->product->id = html_escape($this->input->post('update_id'));
    		$this->product->category_id = html_escape($this->input->post('update_category'));
    		$this->product->sku = html_escape(strtoupper($this->input->post('update_sku')));
    		$this->product->description = html_escape(ucfirst($this->input->post('update_description')));
    		$this->product->qty = html_escape($this->input->post('update_qty'));
    		$this->product->reorder = html_escape($this->input->post('update_reorder'));
    		$this->product->price = html_escape($this->input->post('update_price'));

    		$error = $this->product->update();

			// Save the action to the history
    		$user = $this->session->userdata('user');
			$this->load->model('history_model', 'history');
			$this->history->account_id = $user['id'];
			$this->history->type = 2;
			$this->history->description = "Product #". $this->product->id ." was updated in the system.";
			$this->history->insert();
    	}

    	$this->output->set_content_type('application/json')->set_output(json_encode($error));
	}

	// The method that will delete the product based on id
	// <param name="$id">The id to be deleted</param>
	public function delete($id) {

		// Deletes the product based on the id
		$error = array('success' => true, 'response' => 'Successfully deleted product.');
		$this->load->model('product_model', 'product');
		$this->product->id = html_escape(trim($id));
		$this->product->delete();

		// Save the action to the history
		$user = $this->session->userdata('user');
		$this->load->model('history_model', 'history');
		$this->history->account_id = $user['id'];
		$this->history->type = 2;
		$this->history->description = "Product #". $this->product->id ." was deleted from the system.";
		$this->history->insert();

		$this->output->set_content_type('application/json')->set_output(json_encode($error));
	}
}
