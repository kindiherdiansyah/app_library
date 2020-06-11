<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
	}


	public function index()
	{
		$this->load->view('template/login');
		
	}

	public function login_akses()
	{
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));

		$access = $this->M_login->login($username,$password);

		if ($access->num_rows()==1)
		{
			foreach ($access->result_array() as $data) {
				$session['username'] = $data['username'];
				$session['nama'] = $data['nama'];
			
			$this->session->set_userdata($session);
			redirect('Home');
			}
		}else{
			$this->session->set_flashdata("gagal", "<strong> Username atau Password salah ! </strong>");
			redirect('Login');
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
		
	}
	
}
