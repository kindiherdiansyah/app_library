<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('gagal',"Halaman tidak dapat diakses.");
            redirect('Login');
        }
	}


	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/dashboard');
		// $this->load->view('header');
		// $this->load->view('sidebar');
		// $this->load->view('page/home');
		// $this->load->view('footer');

		
	}
}
