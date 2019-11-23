<?php 

class LoginToken_model extends CI_Model {
	public $user_id;
	public $token;

	public function __construct() {
		$this->load->database();
	}

	public function setCookie() {
		$cstrong = true;
		$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
		$this->token = sha1($token);

		$this->db->insert('tbl_login_tokens', $this);
		
		// Set a cookie valid for 24 hours
		setcookie('token', $token, time() + 60 * 60 * 24, '/', null, null, true);
		// Set a cookie valid for 3 hours
		// If this expires, then request a new token...
		setcookie('request_token', sha1(time()), time() + 60 * 60 * 3, '/', null, null, true);
	}

	public function unsetCookie() {
		setcookie('token', time(), time() - 60 * 60 * 24, '/');
		setcookie('request_token', time(), time() - 60 * 60 * 3, '/');
	}
}

?>