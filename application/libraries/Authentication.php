<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication {
	protected $CI;

	// Default Constructor
	public function __construct() {

		$this->CI =& get_instance();
    	$this->CI->load->library('session');
		$this->CI->load->helper('cookie');
	}

	// The method to check if the user has logged in
    public function UserLoggedIn() {

    	// Check if the user data are in cache then return it
    	// This can avoid additional requests to the server
    	if ($this->CI->session->has_userdata('user'))
    		return true;

    	// Check if the COOKIE token is existing
		if (isset($_COOKIE['token'])) {
			$this->CI->load->model('logintoken_model', 'login_token');
			// Get the record of token in the database matching the value of COOKIE token
			$token = $this->CI->login_token->db->get_where('tbl_login_tokens', array('token' => sha1(get_cookie('token'))))->row();
			
			$this->CI->load->model('account_model', 'account');
			// Get the record of account in the database matching the value of user_id from token
			$user = $this->CI->account->db->get_where('tbl_accounts', array('id' => $token->user_id))->row();

			// Set the user information to the model account
			$this->CI->account->id = $user->id;
			$this->CI->account->username = $user->username;
			$this->CI->account->password = NULL;
			$this->CI->account->firstname = $user->firstname;
			$this->CI->account->lastname = $user->lastname;
			$this->CI->account->sex = $user->sex == 1 ? 'Male' : 'Female';

			// Get the privileges of the user
			$this->CI->load->model('accountprivileges_model', 'account_privileges');
			$privileges = $this->CI->account_privileges->db->get_where('tbl_accounts_privileges', array('account_id' => $this->CI->account->id))->row();

			// Set the privileges to the model
			$this->CI->account_privileges->privileges = $privileges->privileges;

			// Check if the request token is missing
			if (!isset($_COOKIE['request_token'])) {
				// Request a new token to avoid cookie attack
				$this->CI->login_token->db->delete('tbl_login_tokens', array('token' => sha1(get_cookie('token'))));
				$this->CI->login_token->user_id = $this->CI->account->id;
				$this->CI->login_token->setCookie();
			}

			// Cache the user data into the session to avoid many requests to the server
			$this->CI->session->set_userdata('user', (array)$this->CI->account);
			$this->CI->session->set_userdata('user-privileges', (array)$this->CI->account_privileges);

			return true;
		}
		else 
			return false;
	}

	public function isUserHasAccess($page) {
		$privileges = json_decode($this->CI->session->userdata('user-privileges')['privileges']);

		foreach ($privileges as $key => $value)
			if ($page === $key) return $value;
	}

	public function redirectToHasAccess() {
		$privileges = json_decode($this->CI->session->userdata('user-privileges')['privileges']);

		foreach ($privileges as $key => $value)
			if ($value) redirect('/' . $key);

		setcookie('trigger', 1, time() + 300, '/', null, null, true);
		redirect('accounts/logout');
	}

	// The method to check credentials of the user
	public function login($username, $password) {
		// Default error for login
    	$data = array('success' => false, 'response' => 'Invalid username or password.');

    	$this->CI->load->model('account_model', 'account');
    	$this->CI->account->username = $username;
    	$password = $password;

    	// Get the record of account in database where username is equal to text inputted
    	$user = $this->CI->account->db->get_where('tbl_accounts', array('username' => $this->CI->account->username))->row();

    	// Check if there is a row retrieved from the database
    	if ($user) {
    		// Get the hash password of the account from the database
    		$password_hash = $user->password;

    		// Verify the password provided with the hash version
	    	if (password_verify($password, $password_hash)) {
	    		// Log in successfully
	    		$data = array('success' => true, 'response' => NULL);
	    		$this->CI->load->model('logintoken_model', 'login_token');
	    		$this->CI->login_token->user_id = $user->id;

	    		// Set the cookie for security purposes
				$this->CI->login_token->setCookie();
				
				// Add a log history for the login history
				$this->CI->load->model('history_model', 'history');
				$this->CI->history->account_id = $user->id;
				$this->CI->history->type = 1;
				$this->CI->history->description = "User $user->username has logged in to the system.";
				$this->CI->history->insert();
	    	}
	    }

	    return $data;
    }

    // The method to log out and end the current session
    public function logout() {
       	$this->CI->load->model('logintoken_model', 'login_token');
    	// Delete the login token in the database where user_id is equal current user
    	$this->CI->login_token->db->where('user_id', $this->CI->session->userdata('user')['id']);
    	$this->CI->login_token->db->delete('tbl_login_tokens');
    	// Unset the cookie to renew it the next time somebody logged in
    	$this->CI->login_token->unsetCookie();

		$this->CI->load->model('history_model', 'history');
		$this->CI->history->account_id = $this->CI->session->userdata('user')['id'];
		$username = $this->CI->session->userdata('user')['username'];

    	// Removes the user data from the cache
    	$this->CI->session->unset_userdata('user');
    	$this->CI->session->sess_destroy();

    	if (isset($_COOKIE['trigger'])) {
			setcookie('trigger', 1, time() - 60 * 60, '/');
    		redirect('/error');
		}
		
		// Add a log history for the logout history
		$this->CI->history->type = 1;
		$this->CI->history->description = "User $username has logged out of the system.";
		$this->CI->history->insert();

    	// Redirect to the login page
    	redirect('/');
    }
}

?>