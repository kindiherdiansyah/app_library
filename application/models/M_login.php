<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {


	public function login($username,$password)
	{

		$query = $this->db->where('username',$username)
		->where('password',$password)
		->from('user')
		->get();
		return $query;
		
	}
}
