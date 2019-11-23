<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	// The method that will read all of the history
	// <param name="$search">The string to be searched</param>
	public function read($search = FALSE) {
		$this->load->model('history_model', 'history');
		$data = $this->history->read($search);		

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}

?>