<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // The method that will read all of the data needed in this section
    public function read() {
        $this->load->model('dashboard_model', 'dashboard');
        $data = $this->dashboard->read();
        
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}

?>