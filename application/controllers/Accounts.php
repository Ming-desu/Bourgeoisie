<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

    // Default Constructor
	public function __construct() {

        // Calls the parent constructor
        parent::__construct();
        
        // Load some of the CodeIgniter library
        $this->load->library('form_validation');
        $this->load->library('authentication');
        $this->load->library('session');
	}

    // The method that fires when a user tries to log in
    public function login() {

        // Gets the username and password of the user
        $username = html_escape(trim($this->input->post('username')));
        $password = html_escape(trim($this->input->post('password')));

        // Gets the response to the login and print it out
        $data = $this->authentication->login($username, $password);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // The method that fires when a user logs out of the session
    public function logout() {
        $this->authentication->logout();
    }

    // A method that will create an account
    public function register() {
        
        // Set the rules of the field in CodeIgniter's Form_Validation Library
    	$config = array(
    		array(
    			'field' => 'firstname',
    			'label' => 'Firstname',
    			'rules' => 'trim|required|min_length[2]|max_length[30]'
    		),
    		array(
    			'field' => 'lastname',
    			'label' => 'Lastname',
    			'rules' => 'trim|required|min_length[2]|max_length[30]'
    		),
    		array(
    			'field' => 'username',
    			'label' => "Username",
    			'rules' => "trim|required|min_length[5]|max_length[24]",
    		),
    		array(
    			'field' => 'password',
    			'label' => 'Password',
    			'rules' => 'trim|required|min_length[8]|max_length[16]'
    		)
    	);

    	$error = [];

    	$this->form_validation->set_rules($config);
    	$this->form_validation->set_message('required', 'Please input your {field}.');

        // Check if there was an error
    	if (!$this->form_validation->run()) {
    		$error = array('success' => false, 'response' => preg_split('/\r\n|\r|\n/', validation_errors())[0]);
    	}
    	else {

            // Set the information to the account model
    		$this->load->model('account_model', 'account');
    		$this->account->username = html_escape($this->input->post('username'));
            $this->account->firstname = html_escape(ucwords($this->input->post('firstname')));
            $this->account->lastname = html_escape(ucwords($this->input->post('lastname')));
            $this->account->sex = html_escape($this->input->post('sex'));
            $this->account->password = password_hash(html_escape($this->input->post('password')), PASSWORD_BCRYPT);
            
            // Counter check if there is an account
            $count = $this->account->db->get('tbl_accounts')->num_rows();
            $error = $this->account->insert();

            // Check if the username is already taken
            $account = $this->account->db->get_where('tbl_accounts', array('username' => $this->account->username))->row();

            // Add the privileges to its model
            $this->load->model('accountprivileges_model', 'account_privileges');            
            $this->account_privileges->account_id = $account->id;
            
            // Default Privilege
            // When first user created
            $privileges = array(
                'dashboard' => TRUE,
                'products' => TRUE,
                'accounts' => TRUE,
                'transaction' => TRUE,
                'sales' => TRUE,
                'history' => TRUE
            );

            if ($count > 0) {
                $privileges = array(
                    'dashboard' => FALSE,
                    'products' => FALSE,
                    'accounts' => FALSE,
                    'transaction' => FALSE,
                    'sales' => FALSE,
                    'history' => FALSE
                );
            }
            
            $this->account_privileges->privileges = json_encode($privileges);
            $this->account_privileges->insert();
    	}

    	$this->output->set_content_type('application/json')->set_output(json_encode($error));
    }

    // The method that will read the account base on the value passed on the parameter
    // <param name="$search">The string to be searched to the database</param>
    // <param name="$id">The string to be searched if the method is finding the id</param>
    public function read($search = FALSE, $id = 0) {
        $this->load->model('account_model', 'account');
        $data = $this->account->read($search, $id);     

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // The method that updates the accounts user information
    public function update() {
        
        // Forbid anyone to access this method if the user is not logged in
        if (!$this->authentication->UserLoggedIn())
            redirect('/');

        // Check if an account is updating the super admin
        // Since the first account created is the super admin therefore it will have an id of 1
        if ($this->session->userdata('user')['id'] != 1 && html_escape(trim($this->input->post('update_id'))) == 1)
            $error = array('success' => false, 'response' => 'You do not have permission to update this account.');            
        else {

            // Set the rules of the Form_Validation library 
            $config = array(
                array(
                    'field' => 'update_firstname',
                    'label' => 'Firstname',
                    'rules' => 'trim|required|min_length[2]|max_length[30]'
                ),
                array(
                    'field' => 'update_lastname',
                    'label' => 'Lastname',
                    'rules' => 'trim|required|min_length[2]|max_length[30]'
                ),
                array(
                    'field' => 'update_username',
                    'label' => "Username",
                    'rules' => "trim|required|min_length[5]|max_length[24]",
                )
            );

            $error = [];

            $this->form_validation->set_rules($config);
            $this->form_validation->set_message('required', 'Please input your {field}.');

            // Check if there was an error in the validation
            if (!$this->form_validation->run()) {
                $error = array('success' => false, 'response' => preg_split('/\r\n|\r|\n/', validation_errors())[0]);
            }
            else {
                
                // Load the account model and put the values there
                $this->load->model('account_model', 'account');
                $this->account->id = html_escape($this->input->post('update_id'));
                $this->account->username = html_escape($this->input->post('update_username'));
                $this->account->firstname = html_escape(ucwords($this->input->post('update_firstname')));
                $this->account->lastname = html_escape(ucwords($this->input->post('update_lastname')));
                $this->account->sex = html_escape($this->input->post('update_sex'));
                $this->account->password = $this->input->post('update_password');
                $error = $this->account->update();
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($error));
    }

    // The method to take place when account is being deleted
    // <param name="$id">The id of the account to be deleted</param>
    public function delete($id) {
        
        // Forbid anyone to access this method if not logged in
        if (!$this->authentication->UserLoggedIn())
            redirect('/');

        // Check if the account being deleted is currently logged in by you
        if ($this->session->userdata('user')['id'] == $id)
            $error = array('success' => false, 'response' => 'Cannot delete because you are using it.');

        // Check if the account being deleted is the super admin
        else if ($this->session->userdata('user')['id'] != 1 && $id == 1)
            $error = array('success' => false, 'response' => 'You do not have permission to delete this account.');            
        else {
            $error = array('success' => true, 'response' => 'Successfully deleted account.');
            
            // Deletes the account
            $this->load->model('account_model', 'account');
            $this->account->id = html_escape(trim($id));
            $this->account->delete();
            
            // Deletes the privileges
            $this->load->model('accountprivileges_model', 'account_privileges');
            $this->account_privileges->account_id = $this->account->id;
            $this->account_privileges->delete();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($error));
    }

    // The method that returns the privileges of an account
    // <param name="$id">The id of the account to read from</param>
    public function privileges_read($id) {
        $this->load->model('accountprivileges_model', 'account_privileges');
        $data = $this->account_privileges->read($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // The method to update the privileges of the account
    public function privileges_update() {

        // Check if the account being update is the super admin
        if (html_escape(trim($this->input->post('account_id'))) == 1)
            $error = array('success' => false, 'response' => 'You do not have permission to update this account\'s privileges.');
        else {
            $this->load->model('accountprivileges_model', 'account_privileges');
            $this->account_privileges->account_id = html_escape(trim($this->input->post('account_id')));

            // Sets the privileges
            $privileges = array(
                'dashboard' => $this->input->post('checkbox_dashboard') === null ? FALSE : TRUE,
                'products' => $this->input->post('checkbox_products') === null ? FALSE : TRUE,
                'accounts' => $this->input->post('checkbox_accounts') === null ? FALSE : TRUE,
                'transaction' => $this->input->post('checkbox_transaction') === null ? FALSE : TRUE,
                'sales' => $this->input->post('checkbox_sales') === null ? FALSE : TRUE,
                'history' => $this->input->post('checkbox_history') === null ? FALSE : TRUE
            );

            $this->account_privileges->privileges = json_encode($privileges);   
            $error = $this->account_privileges->update();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($error));
    }
}
