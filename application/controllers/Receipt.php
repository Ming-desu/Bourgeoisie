<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Receipt extends CI_Controller {

	// The method to view the receipt based on id
	// <param name="$id">The id of the receipt to view</param>
    public function view($id) {

		// Read the receipt
    	$this->load->model('sales_model', 'sales');
    	$this->sales->id = $id;
    	$sales = $this->sales->read();

    	$this->load->model('salesdetails_model', 'sales_details');
    	$this->sales_details->sales_id = $id;
    	$sales_details = $this->sales_details->read();

        $this->load->view('pages/receipt', array('sales' => $sales, 'sales_details' => $sales_details));
    }
}

?>