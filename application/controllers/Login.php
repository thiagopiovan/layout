<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		// Load form helper library
		$this->load->helper('form');		
		// Load form validation library
		$this->load->library('form_validation');		
		// Load session library
		$this->load->library('session');		
		// Load database
		$this->load->model('login_model');
	}
		
	// Show login page
	public function index() {
		$this->load->view('login');
	}
	
	// Show registration page
	public function registration_show() {
		$this->load->view('registration');
	}
	
	// Validate and store registration data in database
	public function new_registration() {	
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration');
		} else {
			$data = array(
				'name' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);

			$result = $this->login_model->registration_insert($data);

			if ($result == TRUE) {
				$data['message_display'] = 'Cadastro realizado!';
				$this->load->view('login', $data);
			} else {
				$data['message_display'] = 'Usuário já existe!';
				$this->load->view('registration', $data);
			}
		}
	}
	
	// Check for user login process
	public function login_process() {	
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('admin');
			}else{
				$this->load->view('login');
			}
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

			$result = $this->login_model->login($data);

			if ($result == TRUE) {			
				$username = $this->input->post('username');
				$result = $this->login_model->read_user_information($username);

				if ($result != false) {
					$session_data = array(
					'username' => $result[0]->name,
					'email' => $result[0]->email,
				);

					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->load->view('admin');
				}
			} else {
				$data = array(
					'error_message' => 'Usuário ou senha inválido!'
				);
			$this->load->view('login', $data);
			}
		}
	}
	
	// Logout from admin page
	public function logout() {	
		// Removing session data
		$sess_array = array(
			'username' => ''
		);

		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Desconectado!';
		$this->load->view('login', $data);
	}		
}