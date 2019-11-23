<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	// Default Constructor
	public function __construct() {

		// Calls the parent constructor
		parent::__construct();

		// Load some helper and library needed
		// in this controller.
		$this->load->library('authentication');
	}

	// The method to view the page
	// <param name="$page">The name of the view</param>
	public function view($page = 'login') {
		if ($page == 'error')
			$this->session->set_flashdata('error', 'It seems that you do not have any permission.');

		// Before loading the page
		// Check first if user is trying to access page aside from login and register
		if (!$this->authentication->UserLoggedIn())

			// Check if the page that the user requesting is not these two in order to avoid infinite redirect
    	   	if ($page !== 'login' && $page !== 'register')	
    	   		// Redirect to the login
       			redirect('/');

       	// Check if the user is already logged in and accessing the login and register page
       	if (($page === 'login' || $page === 'register') && $this->authentication->UserLoggedIn())
       		// Redirect to the dashboard
       		redirect('/dashboard');

       	$pages = array('dashboard', 'products', 'accounts', 'transaction', 'sales', 'logs');

       	if (in_array($page, $pages) && !$this->authentication->isUserHasAccess($page)) {
       		$this->authentication->redirectToHasAccess();
       		return;
       	}

       	// Check if the view that user requesting is not existing in the system
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php'))
        	// Show file not found
            show_404();

        $data['user'] = $this->session->userdata('user');

        // Load the view to the browser
  		  $this->load->view('pages/'.$page, $data);
      }
  }

?>