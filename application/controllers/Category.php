<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	// Default Constructor
	public function __construct() {

		// Loads the parent constructor
		parent::__construct();

		// Load some of the library of CodeIgniter
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('authentication');		

		// Forbids anyone to access this controller if not logged in
		if (!$this->authentication->UserLoggedIn())
			redirect('/');
	}

	// The method that will create the category
	public function create() {
		
		// Sets the rules of the validation
		$config = array(
			array(
				'field' => 'category_description',
				'label' => 'Category Description',
				'rules' => 'trim|required|max_length[32]'
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
    		$this->load->model('category_model', 'category');
    		$this->category->description = html_escape(ucwords($this->input->post('category_description')));

			// Check if the category being added is already existing
    		$query = $this->category->db->get_where('tbl_categories', array('description' => $this->category->description));

    		if ($query->num_rows() == 0) {
				
				// Add the categories
    			$this->category->db->insert('tbl_categories', $this->category);
    			$error = array('success' => true, 'response' => "Successfully created category.");

				// Add the action to the history
    			$user = $this->session->userdata('user');
    			$this->load->model('history_model', 'history');
				$this->history->account_id = $user['id'];
				$this->history->type = 2;
				$this->history->description = "Category ". $this->category->description ." has inserted into the system.";
				$this->history->insert();
    		}
    		else
    			$error = array('success' => false, 'response' => "Category ".$this->category->description." is already existing.");
    	}

    	$this->output->set_content_type('application/json')->set_output(json_encode($error));
	}

	// The method to delete a category
	public function delete() {
			
		// Deletes the category
		$this->load->model('category_model', 'category');
		$this->category->db->where('id', $this->input->post('id'))->delete('tbl_categories');
		$error = array('success' => true, 'response' => "Successfully deleted category.");

		// Save the action to the history
		$user = $this->session->userdata('user');
		$this->load->model('history_model', 'history');
		$this->history->account_id = $user['id'];
		$this->history->type = 2;
		$this->history->description = "Category ". $this->category->description ." was deleted from the system.";
		$this->history->insert();

    	$this->output->set_content_type('application/json')->set_output(json_encode($error));
	}

	// The method that will read all of the category
	public function read() {

		// Read the category in acscending order
		$this->load->model('category_model', 'category');
		$categories = $this->db->select('*')->order_by('description', 'ASC')->get('tbl_categories');

		$data = array();
		foreach ($categories->result() as $key => $row) {
			$data[] = array(
				'id' => $row->id,
				'description' => $row->description
			);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// The method that will return the count of the item foreach category in the system
	public function read_with_count() {

		// Reads the category
		$this->load->model('category_model', 'category');
		$categories = $this->db->select('*')->order_by('description', 'ASC')->get('tbl_categories');

		$data = array();

		// Gets the count foreach category
		foreach ($categories->result() as $key => $row) {
			$query = $this->db->select('COUNT(id) as count')
				->where('category_id', $row->id)
				->get('tbl_products')->row();

			if ($query->count == 0) continue;
			$data[] = array(
				'id' => $row->id,
				'description' => $row->description,
				'count' => $query->count
			);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
