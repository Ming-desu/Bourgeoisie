<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    // Default Constructor
    public function __construct() {

        // Load the parent constructor
        parent::__construct();

        // Load some of the CodeIgniter Library
        $this->load->library('session');
    }

    // The method that will create a new transaction
    public function new() {

        // Create a blank transaction in the database
        $this->load->model('sales_model', 'sales');
        $this->sales->account_id = $this->session->userdata('user')['id'];
        $sales = $this->sales->insert();

        // Save the action in the history
        $user = $this->session->userdata('user');
        $this->load->model('history_model', 'history');
        $this->history->account_id = $user['id'];
        $this->history->type = 3;
        $this->history->description = "Transaction #". $this->sales->id ." started.";
        $this->history->insert();

        $this->output->set_content_type('application/json')->set_output(json_encode($sales));
    }

    // The method that will add an item to the transaction itself
    public function add_item() {

        // Add the item to the transaction
        $this->load->model('salesdetails_model', 'sales_details');
        $this->sales_details->sales_id = $this->input->post('sales_id');
        $this->sales_details->product_id = $this->input->post('product_id');
        $this->sales_details->qty = $this->input->post('qty');
        $this->sales_details->price = $this->input->post('price');
        $this->sales_details->insert();
    }

    // The method that will cancel the transaction
    public function cancel() {

        // Delete the transaction being processed
        $this->load->model('sales_model', 'sales');
        $this->sales->id = $this->input->post('sales_id');
        $this->sales->delete();

        // Also delete the transaction items if there is any
        $this->load->model('salesdetails_model', 'sales_details');
        $this->sales_details->sales_id = $this->input->post('sales_id');
        $this->sales_details->delete();

        // Save the action in the history
        $user = $this->session->userdata('user');
        $this->load->model('history_model', 'history');
        $this->history->account_id = $user['id'];
        $this->history->type = 3;
        $this->history->description = "Transaction #". $this->sales->id ." cancelled";
        $this->history->insert();
    }

    // The method that will read the items of a transaction based on the id
    // <param name="$id">The id of the transaction to be read</param>
    public function read_sales_details($id) {
        $this->load->model('salesdetails_model', 'sales_details');
        $this->sales_details->sales_id = $id;
        $data = $this->sales_details->read();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // The method that will update the quantity of an item in the transaction
    public function update_sales_details() {
        $this->load->model('salesdetails_model', 'sales_details');
        $this->sales_details->id = $this->input->post('id');
        $this->sales_details->qty = $this->input->post('qty');
        $data = $this->sales_details->update();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // The method that will delete an item in the transaction
    public function delete_sales_details($id) {
        $this->load->model('salesdetails_model', 'sales_details');
        $this->sales_details->id = $id;
        $data = $this->sales_details->delete_item();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // The method that will end the transaction and update the blank transaction 
    // and fill it with the information that had been processed
    public function end() {

        // Updates the transaction details to put the latest available information
        $this->load->model('sales_model', 'sales');
        $this->sales->id = $this->input->post('id');
        $this->sales->cash_tendered = $this->input->post('cash_tendered');
        $this->sales->total_amount = $this->input->post('total_amount');
        $data = $this->sales->end();

        // Save the action to the history
        $user = $this->session->userdata('user');
        $this->load->model('history_model', 'history');
        $this->history->account_id = $user['id'];
        $this->history->type = 3;
        $this->history->description = "Transaction #". ltrim($this->sales->id, '0') ." ended.";
        $this->history->insert();

        $this->output->set_content_type('application/json')->set_output(json_encode($data));        
    }

    // The method that will read the summary of the sales depending on the dates
    public function read() {
        $this->load->model('sales_model', 'sales');
        $data = $this->sales->read($this->input->post('startDate'), $this->input->post('endDate'));

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}

?>